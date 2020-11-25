<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Arbiter;
use App\Models\Dispute;
use App\Models\Payment;

use App\Models\Project;
use App\Libs\Calculator;
use App\Models\Milestone;
use App\Models\DisputeCase;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DisputeAttachments;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\DisputeArbiter\Confirm;
use App\Notifications\Dispute\SendResult;

use App\Notifications\Dispute\DisputeAccept;
use App\Notifications\Dispute\DisputeCancel;
use App\Notifications\Dispute\InviteArbiter;
use App\Events\DisputeArbiter\NotifStartVote;
use App\Events\DisputeArbiter\NotifDisputeStart;
use App\Events\DisputeArbiter\AfterArbitersVoted;

use App\Events\DisputeArbiter\InviteArbiter as Invite;
use App\Events\DisputeArbiter\Payment as EventPayment;
use App\Mail\Dispute\DefendantPlaintiffRequestedDispute;
use App\Mail\Dispute\PlaintiffDisputeAccepted;
use App\Mail\Dispute\PlaintiffSentDisputeRequestConfirmation;

class disputeController extends Controller
{
    public $return_error;

    public function __construct()
    {
        $this->return_error = response()->json([
            'error' => true,
            'message' => 'Error'
        ], 200);

        $this->middleware(['frontendLogin']);
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
        $this->dispute = new Dispute;
        $this->arbiter = new Arbiter;
        $this->dispute_case = new DisputeCase;
        $this->ms = new Milestone;
        $this->project = new Project;
        $this->payment = new Payment;
        $this->total_arbiter = 5;
    }

    //create dispute
    public function newDispute(Request $request)
    {
        $data = $request->toArray();
        $ms = $this->ms->find($request->milestone_id);
        $project = $this->project->find($request->_project);
        if (!$ms || !$project) {
            return $this->return_error;
        }
        $takeCredit = $this->dispute->takeCredit($ms->price);
        if ($this->user->total_credit < $takeCredit) {
            return response()->json([
                'error' => true,
                'message' => 'Your credit not enaugh'
            ], 200);
        }
        $data['_user_from'] = $this->user->id;
        $data['total_credit'] = $takeCredit;

        $new_dispute = $this->dispute->create_dispute($data);

        if ($new_dispute) {
            Mail::to($this->dispute->plaintiff)->send(
                new PlaintiffSentDisputeRequestConfirmation(
                    $this->dispute->plaintiff,
                    $this->dispute->defendant,
                    $this->dispute,
                    $project,
                    $ms
                )
            );

            Mail::to($this->dispute->defendant)->send(
                new DefendantPlaintiffRequestedDispute(
                    $this->dispute->plaintiff,
                    $this->dispute->defendant,
                    $this->dispute,
                    $project,
                    $ms
                )
            );

            return response()->json([
                'error' => false,
                'message' => 'Your dispute created'
            ], 200);
        }
        return response()->json([
            'error' => true,
            'message' => 'create dispute error'
        ], 200);
    }

    //update dispute
    public function post_update_dispute(Request $request)
    {
        $data =  array(
            '_user_from' => 99,
            '_user_to' => 47,
            '_project' => 47,
            'milestone_id' => '121',
            'description' => 'sửa tranh chấp 12',
            '_status' => '1',
            'title' => 'sửa tranh châp',
        );
        $id_dispute = 62;
        $update_dispute = $this->dispute->update_dispute($id_dispute, $data);
        if ($update_dispute) {
            return response()->json([
                'error' => false,
                'message' => 'Your dispute updated'
            ], 200);
        }
        return response()->json([
            'error' => true,
            'message' => 'update dispute error'
        ], 200);
    }
    //get list dispute
    public function get_list_dispute()
    {
        $list_disputes = $this->dispute->list_disputes();
        return $list_disputes;
    }


    //find arbiter
    public function find_arbiter(Request $request)
    {
        $keyword = "a";
        $id_dispute = 71;
        $find_arbiter = $this->arbiter->find_arbiter($id_dispute, $keyword);
        return $find_arbiter;
    }

    //ramdom arbiter
    public function random_arbiter(Request $request)
    {
        $data =  array(
            'id_arbiter' => null,
            'id_dispute' => $request->id_dispute,
        );
        $id_dispute = $data['id_dispute'];
        $dispute = Dispute::find($id_dispute);
        //tính toán số trọng tài cho tranh chấp
        $arbiters_accept = $dispute->arbiters_accept()->count();
        $arbiters_pending = $dispute->arbiters_pending()->count();
        $total = $this->total_arbiter - $arbiters_accept - $arbiters_pending;
        //
        if ($total > 0) {
            //lấy 6 trọng tài
            $random_arbiters = $this->arbiter->ramdom_arbiter($id_dispute, $total);
            foreach ($random_arbiters as $random_arbiter) {
                $add_arbiter = $this->arbiter->add_list_arbiter_random($data, $random_arbiter->id);
                $random_arbiter->notify((new InviteArbiter($dispute)));
            }
            if ($add_arbiter) {
                return response()->json([
                    'error' => false,
                    'message' => 'Your added arbiter'
                ], 200);
            }
            return response()->json([
                'error' => true,
                'message' => 'add arbiter error'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'You can not add arbiter, because list arbiter full'
            ], 200);
        }
    }

    // arbiter accept
    public function accept_arbiter(Request $request)
    {
        $data = $request->toArray();
        $data =  array(
            'status' => 1,
            'id_dispute' => $request->id_dispute ?? 75,
        );

        //lấy list arbiter của dispute
        $id_dispute = $data['id_dispute'];
        $list_arbiters = $this->arbiter->list_arbiter($id_dispute);

        foreach ($list_arbiters as $arbiter) {
            //accept all arbiter
            $accept_arbiter = $this->arbiter->accept_arbiter($data, $arbiter->id);
        }
        if ($accept_arbiter) {
            return response()->json([
                'error' => false,
                'message' => 'Acepted'
            ], 200);
        }
        return  $this->return_error;
    }

    //arbiter vote random
    public function arbiter_vote(Request $request)
    {
        $data = $request->toArray();
        $data =  array(
            'id_dispute' => $request->id_dispute,
        );
        //lấy list arbiter của dispute
        $id_dispute = $data['id_dispute'];
        $list_arbiters = $this->arbiter->list_arbiter($id_dispute);
        foreach ($list_arbiters as $arbiter) {
            $array = [0, 1];
            $random = Arr::random($array);
            $random_str = Str::random(40);
            //accept all arbiter
            $arbiter_vote = Arbiter::find($arbiter->id);
            $arbiter_vote->vote = $random;
            $arbiter_vote->description = $random_str;
            $arbiter_vote->save();
        }
        if ($arbiter_vote) {
            return response()->json([
                'error' => false,
                'message' => 'arbiter voted'
            ], 200);
        }
        return response()->json([
            'error' => true,
            'message' => 'vote error'
        ], 200);
    }
    //arbiter save before vote
    public function arbiterSave(Request $request)
    {

        $user = $this->user;
        $dispute = Dispute::find($request->id);

        $arbiter = Arbiter::where(['id_dispute' => $request->id, 'user_arbiter_id' => $user->id])->first();

        if (!$dispute || !$arbiter) return $this->return_error;

        $files = $request->file('files');

        $media = [];
        $description = $arbiter->description;
        if (!is_array($description)) {
            $description = [];
        }

        if ($files) {
            foreach ($files as $file) {
                $fc = new FileController();
                $store_info = $fc->dispute_attachment($file);
                $attachment = $store_info['attachment'];
                $upload_path = $store_info['upload_path'];
                //dd($upload_path);
                $pj_attachment = new DisputeAttachments();
                $pj_attachment->id_user = $user->id;
                $pj_attachment->dispute_id = $dispute->id;
                $pj_attachment->url = $upload_path;
                $pj_attachment->name = $attachment->name;
                $pj_attachment->ori_name = $attachment->ori_name;
                $pj_attachment->extension = $attachment->extension;
                $pj_attachment->size = $attachment->size;
                $pj_attachment->save();
                $media[] = $pj_attachment->id;
            }
        }

        $description[$request->type] = [
            'desc' => $request->description,
            'media' => $media
        ];

        $arbiter->description = $description;
        $arbiter->save();

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }
    //arbiter vote single
    public function submitVote(Request $request)
    {

        $user = $this->user;
        $data = $request->toArray();
        $files = $request->file('files');

        $user_id = Auth::user()->id;
        $dispute = Dispute::find($request->id);

        $arbiter = Arbiter::where(['id_dispute' => $request->id, 'user_arbiter_id' => $user->id])->first();

        if (!$dispute || !$arbiter) return $this->return_error;

        $media = [];
        $description = $arbiter->description;
        if (!is_array($description)) {
            $description = [];
        }

        if ($files) {
            foreach ($files as $file) {
                $fc = new FileController();
                $store_info = $fc->dispute_attachment($file);
                $attachment = $store_info['attachment'];
                $upload_path = $store_info['upload_path'];
                //dd($upload_path);
                $pj_attachment = new DisputeAttachments();
                $pj_attachment->id_user = $user->id;
                $pj_attachment->dispute_id = $dispute->id;
                $pj_attachment->url = $upload_path;
                $pj_attachment->name = $attachment->name;
                $pj_attachment->ori_name = $attachment->ori_name;
                $pj_attachment->extension = $attachment->extension;
                $pj_attachment->size = $attachment->size;
                $pj_attachment->save();
                $media[] = $pj_attachment->id;
            }
        }

        $description[$request->type] = [
            'desc' => $request->description,
            'media' => $media
        ];

        $arbiter->description = $description;
        $arbiter->vote = $request->vote;
        $arbiter = $arbiter->save();

        //check
        $check = $dispute->status->status;
        if ($check == "Processing") {

            if ($dispute->is_results) {
                //send notification
                event(new AfterArbitersVoted([$dispute]));
            }
            return response()->json([
                'error' => false,
                'message' => 'Vote Success'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'you vote error'
            ], 200);
        }
    }

    public function singleDispute($id)
    {
        $user = $this->user;
        $dispute = Dispute::find($id);
        if ($dispute && ($dispute->is_plaintiff || $dispute->is_defendant || $dispute->is_arbiter)) {
            return view('disputedetail', compact('dispute', 'user'));
        }
        return abort(404);
    }
    // arbiter accept cancel
    public function acceptcancel(request $request)
    {
        $user = $this->user;
        $dispute = Dispute::find($request->id_dispute);

        $arbiter = Arbiter::where(['id_dispute' => $request->id_dispute, 'user_arbiter_id' => $user->id])->first();

        if (!$dispute || !$arbiter) return $this->return_error;

        $takeCredit = $dispute->arbitration_fee;

        if ($user->total_credit < $takeCredit) {
            return response()->json([
                'error' => true,
                'message' => 'Your credit not enaugh'
            ], 200);
        }

        $type = $request->type;
        //check
        $check = $dispute->status->status;
        if ($check == "Processing") {
            if ($arbiter) {
                if ($type == 'accept') {
                    $arbiter->status = 1;
                    $arbiter->save();

                    $user->spendCredit($takeCredit);

                    // notif when 5 arbiter accepted
                    if ($dispute->arbiters_accept()->count() > 4) {
                        $dispute->update_deadline('user');
                        // $dispute->update_deadline('arbiter');
                        event(new NotifDisputeStart([$dispute]));
                    }
                } else {
                    $arbiter->status = 2;
                    $arbiter->save();

                    // random arbiter
                    $random_arbiters = $this->arbiter->ramdom_arbiter($dispute->id);
                    foreach ($random_arbiters as $random_arbiter) {
                        $add_arbiter = $this->arbiter->add_list_arbiter_random($dispute->id, $random_arbiter->id);
                    }
                    event(new Invite([$dispute, $random_arbiters]));
                }
                return response()->json([
                    'error' => false,
                    'message' => 'Success'
                ], 200);
            }
            return response()->json([
                'error' => true,
                'message' => 'Error'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Error'
            ], 200);
        }
    }

    // create + update dispute case
    public function sendCase(Request $request)
    {
        $rules = [
            "files" => "required",
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'validate' => true,
                'message' => $validator->errors()
            ], 200);
        }

        $data =  array(
            'dispute_id' => $request->id_dispute ?? 75,
            'title' => $request->case_title,
            'description' => $request->case_description,
        );
        $id_user = Auth::user()->id;
        $files = $request->file('files');
        // dd($request->file('files'));
        $dispute = Dispute::find($data['dispute_id']);
        if (!$dispute) return $this->return_error;

        $check = $dispute->status->status;
        if ($check == "Processing") {
            if ($files) {
                foreach ($files as $file) {
                    $fc = new FileController();
                    $store_info = $fc->dispute_attachment($file);
                    $attachment = $store_info['attachment'];
                    $upload_path = $store_info['upload_path'];
                    //dd($upload_path);
                    $pj_attachment = new DisputeAttachments();
                    $pj_attachment->id_user = $id_user;
                    $pj_attachment->dispute_id = $data['dispute_id'];
                    $pj_attachment->url = $upload_path;
                    $pj_attachment->name = $attachment->name;
                    $pj_attachment->ori_name = $attachment->ori_name;
                    $pj_attachment->extension = $attachment->extension;
                    $pj_attachment->size = $attachment->size;
                    $pj_attachment->save();
                }
                $dispute_case_update = DisputeCase::where(['dispute_id' => $data['dispute_id'], 'user_id' => $id_user])->first();
                if ($dispute_case_update) {
                    return response()->json([
                        'error' => true,
                        'message' => 'you can only up case once, If you have case please edit your case.'
                    ], 200);
                } else {
                    $dispute_case_create = $this->dispute_case->dispute_case_update($data);
                    if ($dispute_case_create) {
                        if ($dispute->check_dispute_case()) {
                            $dispute->update_deadline('arbiter');
                            event(new NotifStartVote([$dispute]));
                        }
                        return response()->json([
                            'error' => false,
                            'message' => 'Sent Successfully'
                        ], 200);
                    }
                    return response()->json([
                        'error' => true,
                        'message' => 'Sent error'
                    ], 200);
                }
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'your case create error'
                ], 200);
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'your case create error'
            ], 200);
        }
    }
    public function dispute_case_update(Request $request)
    {
        $data =  array(
            'dispute_id' => $request->dispute_id ?? 75,
            'title' => 'update title dispute case',
            'description' => 'update description title dispute case',
        );
        $id_user = Auth::user()->id;
        $files = $request->file('files');
        // dd($request->file('files'));
        if ($files) {
            foreach ($files as $file) {
                $fc = new FileController();
                $store_info = $fc->dispute_attachment($file);
                $attachment = $store_info['attachment'];
                $upload_path = $store_info['upload_path'];
                //dd($upload_path);
                $pj_attachment = new DisputeAttachments();
                $pj_attachment->id_user = $id_user;
                $pj_attachment->dispute_id = $data['dispute_id'];
                $pj_attachment->url = $upload_path;
                $pj_attachment->name = $attachment->name;
                $pj_attachment->ori_name = $attachment->ori_name;
                $pj_attachment->extension = $attachment->extension;
                $pj_attachment->size = $attachment->size;
                $pj_attachment->save();
            }
            $dispute_case_update = DisputeCase::where(['dispute_id' => $data['dispute_id'], 'user_id' => $id_user])->first();
            if ($dispute_case_update) {
                $dispute_case_create = $dispute_case_update->dispute_case_update($data);
                if ($dispute_case_create) {
                    //update dispute case thành công => check_dispute_case => send arbiter
                    //$dispute = Dispute::find($data['dispute_id']);
                    $dispute = $dispute_case_create->dispute;
                    $check = $dispute->check_dispute_case();
                    if ($check) {
                        //tính toán số trọng tài cho tranh chấp
                        $arbiters_accept = $dispute->arbiters_accept()->count();
                        $arbiters_pending = $dispute->arbiters_pending()->count();
                        $total = $this->total_arbiter - $arbiters_accept - $arbiters_pending;
                        if ($total > 0) {
                            //lấy 6 trọng tài
                            $random_arbiters = $this->arbiter->ramdom_arbiter($data['dispute_id'], $total);
                            foreach ($random_arbiters as $random_arbiter) {
                                $id_dispute = array('id_dispute' => $request->dispute_id);
                                $add_arbiter = $this->arbiter->add_list_arbiter_random($id_dispute, $random_arbiter->id);
                                //$random_arbiter->notify((new InviteArbiter($dispute)));
                            }
                            event(new Invite([$dispute, $random_arbiters]));
                        }
                    }
                    //end check dispute case and send arbiter
                    return response()->json([
                        'error' => false,
                        'message' => 'your case created'
                    ], 200);
                }
                return response()->json([
                    'error' => true,
                    'message' => 'your case update error'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'your case update error'
                ], 200);
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'your case update error'
            ], 200);
        }
    }
    //accept or cancel dispute
    public function acceptCancelDispute(Request $request)
    {
        $dispute = Dispute::find($request->id);

        if (!$dispute) return $this->return_error;
        if (!$dispute->is_plaintiff && !$dispute->is_defendant) return $this->return_error;

        if ($dispute->status_name == "Canceled") {
            return response()->json([
                'error' => true,
                'message' => 'Dispute was cancelled'
            ], 200);
        }
        if ($dispute->status_name == "Processing") {
            return response()->json([
                'error' => false,
                'message' => 'Dispute already process'
            ], 200);
        }
        if ($request->type == 'cancel') {
            $dispute->actionCancel();
        } else {
            $takeCredit = $dispute->court_fee;
            if ($dispute->plaintiff->total_credit < $takeCredit) {
                return response()->json([
                    'error' => true,
                    'message' => 'Plaintiff credit not enaugh'
                ], 200);
            }
            if ($dispute->defendant->total_credit < $takeCredit) {
                return response()->json([
                    'error' => true,
                    'message' => 'Defendant credit not enaugh'
                ], 200);
            }
            $dispute->actionProcess();

            Mail::to($dispute->plaintiff)->send(new PlaintiffDisputeAccepted(
                $dispute->plaintiff,
                $dispute->defendant,
                $dispute,
                $dispute->project,
                $dispute->milestone
            ));
        }
        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }
    //payment
    public function disputePayment(Request $request)
    {
        $user = $this->user;

        $d = Dispute::find($request->id_dispute);
        if (!$d) return $this->return_error;
        if ($d->cancel_project != null) return $this->return_error;

        // update point arbiter
        $results_dispute = $d->results_dispute();

        foreach ($d->arbiters_accept() as $a) {
            if ($a->is_win) {
                $tkn = $results_dispute->tkn_win;
            } else {
                $tkn = $results_dispute->tkn_lose;
            }
            $a->user_arbiter->refundCredit($tkn);
            $a->faction = $tkn;
            $a->save();
        }

        // win credit
        if ($d->is_from_win()) {
            $d->plaintiff->refundCredit($d->credit_win);
        } else {
            $d->defendant->refundCredit($d->credit_win);
        }

        $type = $request->type;
        $d->cancel_project = $type;
        $d->save();
        // cancel project
        if ($type == 1) {
            $d->project->updateStatus('Failed');
        }

        event(new EventPayment($d));

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }
    public function disputeContinue(Request $request)
    {

        $d = Dispute::find($request->id_dispute);
        if (!$d) return $this->return_error;

        if ($d->user_pay->wallet < $d->amount_payment) {
            return response()->json([
                'error' => true,
                'message' => 'Seeker wallet not enaugh'
            ], 200);
        }

        $user_receive = $d->user_receive;

        // create payment
        $this->payment->createMilestonePayment([
            '_milestone' => $d->milestone->id,
            'price' => $d->amount_payment
        ]);

        $d->user_pay->decrement('wallet', $d->amount_payment);
        $user_receive->increment('wallet', $d->amount_payment);

        $type = $request->type;
        if ($type == 0) {
            $d->milestone->updateStatus('Failed');
            $d->project->updateStatus('Failed');
        }
        if ($type == 1) {
            $d->milestone->updateStatus('Completed');
            $d->project->updateStatus('Processing');
        }
        $d->updateStatus('Completed');

        event(new Confirm($d));

        return response()->json([
            'error' => false,
            'message' => 'Success'
        ], 200);
    }
}
