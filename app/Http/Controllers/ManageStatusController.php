<?php

namespace App\Http\Controllers;

use App\Http\Requests\createManagerStatusRequest;
use App\Models\BidStatus;
use App\Models\DisputeStatus;
use App\Models\MilestoneStatus;
use App\Models\OrderStatus;
use App\Models\PaymentStatus;
use App\Models\User_Status;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageStatusController extends Controller
{

    /**
     * SkillController constructor.
     * Init category
     */
    public function __construct()
    {
        // $array_status = $this->array_status();
    }
    public function array_status() {
        $bid_status = BidStatus::all();
        $dispute_status = DisputeStatus::all();
        $milestone_status = MilestoneStatus::all();
        $order_status = OrderStatus::all();
        $payment_status = PaymentStatus::all();
        $project_status = ProjectStatus::all();
        $user_status = User_Status::all();
        $array = array(
                    'bid_status' => $bid_status,
                    'dispute_status' => $dispute_status,
                    'milestone_status' => $milestone_status,
                    'order_status' => $order_status,
                    'payment_status' => $payment_status,
                    'project_status' => $project_status,
                    'user_status' => $user_status,
                );
        return $array;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlist()
    {
        $current_tab = 'bid_status';
        $array_status = $this->array_status();
        // dd($array_status);
        return view('admin.status', compact('array_status'))->with('current_tab', $current_tab);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(createManagerStatusRequest $request)
    {
        $id = $request->id;
        $status = $request->status;
        $type_status = $request->type_status;
        $exist = DB::table($type_status)->where('status', $status)->first();
        if ($id != 0) {
            if (isset($exist) && $exist->id != $id) {
                return redirect()->route('admin.status')->with(['error'=>'Status exist']);
            }else {
                DB::table($type_status)->where('id', $id)->update(['status' => $status]);
                return redirect()->route('admin.status')->with('success', 'Status Editted');
            }
        }
        if ($exist) {
            return redirect()->route('admin.status')->with('error', 'Status exist');
        }else {
            DB::table($type_status)->insert(['status' => $status, 'description' => $status]);
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $type_status = $request->type;
        switch ($type_status) {
            case 'bid_status':
                $exist = BidStatus::find($id)->bid;
                break;
            case 'dispute_status':
                $exist = DisputeStatus::find($id)->dispute;
                break;
            case 'milestone_status':
                $exist = MilestoneStatus::find($id)->milestone;
                break;
            case 'order_status':
                $exist = OrderStatus::find($id)->order;
                break;
            case 'payment_status':
                $exist = PaymentStatus::find($id)->payment;
                break;
            case 'project_status':
                $exist = ProjectStatus::find($id)->project;
                break;
            case 'user_status':
                $exist = User_Status::find($id)->user;
                break;
            default:
                $exist = 0;
                break;
        }
        if ( count($exist) < 1 ) {
            DB::table($type_status)->where('id', $id)->delete();
            return redirect()->route('admin.status')->with('success', 'Success Deleted');
        }else {
            return redirect()->route('admin.status')->with('error', 'Cannot Deleted');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($data)
    {
        
    }
}