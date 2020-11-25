<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use Mail;
use Auth;
use App\Libs\Calculator;

use App\Models\User;
use App\Models\UserFavorite;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User_Status;
use App\Models\UserPoint;
use App\Models\UserTitle;

use App\Models\Project;

use App\Models\Rating;
use App\Models\Review;

use App\Models\Bid;
use App\Models\Album;
use App\Models\Media;
use App\Models\Milestone;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\Arbiter;
use App\Models\Dispute;
use App\Models\BidMessage;
use App\Models\ProjectMessage;
use App\Models\Contest;

use App\Models\UserRp;

use App\Events\NewBid;
use App\Events\AwardBid;
use App\Events\AcceptProject;
use App\Events\CancelProject;
use App\Events\NewProject;
use App\Events\NewMessage;
use App\Events\RequestMilestone;
use App\Events\Shortlisted;
use App\Events\NewContest;

use App\Events\DisputeArbiter\InviteArbiter as EventInvite;
use App\Events\DisputeArbiter\Payment;
use App\Events\DisputeArbiter\afterArbitersVoted;

use App\Notifications\BidMessageNotification;
use App\Notifications\ReleaseNotification;
use App\Notifications\AwardBidNotification;
use App\Notifications\NewBidNotification;
use App\Notifications\CompleteNotification;

use App\Notifications\TrackingUploadNotification;

// use App\Notifications\Contest\SendResult;

use App\Notifications\Dispute\DisputeRequest;
use App\Notifications\Dispute\DisputeCancel;
use App\Notifications\Dispute\DisputeAccept;
use App\Notifications\Dispute\AfterPayment;
use App\Notifications\Dispute\ConfirmAccept;
use App\Notifications\Dispute\InviteArbiter;
// use App\Notifications\Dispute\NotifDisputeStart;
use App\Notifications\Dispute\NotifStartVote;
use App\Notifications\Dispute\SendResult;
use App\Notifications\Dispute\NotifArbiter;
use App\Notifications\Dispute\NotifUser;
use App\Notifications\Dispute\NotifAfterVoted;

use App\Events\DisputeArbiter\NotifDisputeStart;

use App\Mail\Dispute\MailStart;
use App\Mail\Dispute\MailToAbiter;

class TestController extends Controller
{
    protected $rating;
    protected $review;

    public function __construct()
    {
        $this->rating = new Rating();
        $this->review = new Review();
        $this->arbiter = new Arbiter();
        $this->dispute = new Dispute();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'alo';
    }

    public function query()
    {
        /*$bidmess = BidMessage::find(14);
        $mm = ProjectMessage::find(5);
        event(new NewMessage($mm, $type = 'project'));*/

        /*$current_user = Auth::user();
        $bidmess = BidMessage::find(6);
        $kq = $current_user->unreadNotifications->where('type', '');
        $kq = DB::table('notifications')
                ->where('data->type', 'dsfd')
                ->get();
        dd($kq);*/

        // $current_user->notify((new BidMessageNotification($bidmess)));

        /*$project = Project::find(83);
        $users = User::skip(43)->take(1)->get();
        foreach ($users as $key => $user) {
            dispatch(new \App\Jobs\SendEmailNewProject($user,$project));
        }*/
        // dump($current_user->projectsBidded('accepted')->pluck('id')->toArray());
        // dump($current_user->projects()->WithStatus('processing')->pluck('id')->toArray());
        // dd($current_user->projects()->WithBidStatus('accepted')->pluck('id')->toArray());

        /*$user = User::all();
        $project = Project::all();
        $ab = Arbiter::Votefrom()->get();

        $dispute = Dispute::find(9);
        $ab = $dispute->arbiters()->accepted()->get();
        foreach ($dispute->arbiters() as $key => $arbiter) {
            $vote_for = $arbiter->dongminh()->get();
        }*/

        /*$arbiter = Arbiter::find(11);
        $vote_for = $arbiter->dongminh()->get();*/
        // dd($vote_for);

        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delReview($id)
    {
        $rt = $this->rating->where('_project', $id)->delete();
        $rv = $this->review->where('_project', $id)->delete();
        dd('ok');
    }
    public function delAlbum($id)
    {
        $album = Album::find($id);
        $post = $album->post;
        $post->total_likes()->delete();
        $post->comments()->delete();
        $post->delete();
        $album->media()->detach();
        $album->delete();
        dd('ok');
    }
    public function delProject($id)
    {
        $pj = Project::find($id);
        dump($pj->bid_milestones->count());
        dump($pj->milestone->count());
        dump($pj->bids->count());
        dump($pj->categories->count());
        $pj->listtype;
        $pj->milestone;
        $pj->bids;
        $pj->skills;
        $pj->attachments;
        $pj->messages;
        $pj->reviews;
        return view('welcome');
    }
    public function delUser($id)
    {
        $u = User::find($id);
        // $u->delete();
        dump($u->role);
        dump($u->projects);
        dump($u->skills);
        dump($u->bids);
        dump($u->milestone_requests);
        dump($u->userpoint);
        dump($u->arbiters);
        dump($u->dispute_attachment);
        dump($u->disputes_case);
        dump($u->location);
        dump($u->charge_credit);
        dump($u->user_rp);
        dump($u->albums);
        dump($u->media);
        dump($u->reviews);
        dump($u->ratings);
        dump($u->contests);
        dump($u->entries);
        dump($u->withdrawals);
        dump($u->favorites);
        return view('welcome');
    }

    public function testip()
    {

        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = '222.166.18.210';
        $ip = '2001:ee0:46c3:bb0:dc2a:edd7:716e:7a58';
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        dd($details); // -> "VN HK"
    }
    public function finduser()
    {
        $arr = [];
        $list_t = UserTitle::whereIn('id', [1,2])->get(['min_level','max_level']);
        foreach ($list_t as $tit) {
            $pp = Calculator::levelToPointMin($tit->min_level, $tit->max_level);
            $arr[] = [$pp['min'],$pp['max']];
        }
        // dd($arr);
        $having = '';
        $i = 0;
        foreach($arr as $item){
            if($i > 0){
                $having .= " OR ";
            }
            $having .= "`sum_point` BETWEEN ".$item[0]." AND ".$item[1];
            $i++;
        }
        // dd($having);
        $d = UserPoint::select('_user', DB::raw('SUM(`point`) AS `sum_point`'))
            ->where('type_point', 'sbp')
            ->groupBy('_user')
            ->havingRaw($having)
            ->pluck('_user')
            ->toArray();
        return $d;
    }
    public function sendmailreg()
    {
        $user = User::find(44);
        $user->sendMailRegister();
        /*$pj = Project::find(97);
        event(new NewProject($pj));*/
        /*$bid = Bid::find(58);
        event(new Shortlisted($bid));*/
        /*$ms = milestone::find(176);
        $alchemist = $ms->user;
        $alchemist->notify((new TrackingUploadNotification($ms)));*/

        /*$pj = Contest::find(2);
        event(new NewContest($pj));*/

        return view('welcome');
    }
    public function testevent()
    {
        /*$emails = ['vukhanhthien197@gmail.com', 'myother@esomething.com','myother2@esomething.com'];

        Mail::send('email_template.test', [], function($message) use ($emails)
        {
            $message->to($emails)->subject('This is test e-mail');
        });
        var_dump( Mail:: failures());
        exit;*/
        /*$project = Project::find(87);
        event(new RequestMilestone($project));*/

        /*$pj = Project::find(97);
        event(new NewProject($pj));*/

        /*$pj = Contest::find(6);
        event(new NewContest($pj));*/

        /*$bid = Bid::find(65);
        event(new AwardBid($bid));*/

        /*$pj = Project::find(83);
        $pj->userwon->notify((new CompleteNotification($pj)));*/
        /*$bid = Bid::find(65);
        $ms = Milestone::find(183);
        dd($ms->updateDonework());*/

        return view('welcome');
    }
    public function image()
    {
        // open an image file
        // $img = Image::make('public/avatars/mod_avatar.jpg');

        // resize image instance
        // $img->fit(300, 300);

        // insert a watermark
        // $img->insert('public/watermark.png');

        // or create a new image resource from binary data
        $img = Image::make(file_get_contents('http://lorempixel.com/1000/1000'));
        $img->fit(1920, 640);
        // $img->fit(300, 300);

        // save image in desired format
        $img->save('public/test.jpg');

        echo '<img src="'.asset('public/test.jpg').'">';

        $user = User::find(43);
        $user->profile_banner = asset('public/test.jpg');
        $user->save();
        // $user->update(['profile_banner',asset('public/test.jpg')]);

    }

    public function test() {
        $user = User::find(43);
        $ms = Milestone::find(165);
        $bid = Bid::find(65);
        // $user->notify((new ReleaseNotification($ms)));
        // $user->notify((new AwardBidNotification($bid)));
        $c = Contest::find(2);
        $p = Project::find(99);
        event(new AcceptProject($p));
        return view('welcome');
    }

    public function create() {
        /*$pp = User::find(43);
        dd($pp->getMorphClass());*/
        $f = new \App\Models\Favorite;
        /*$f->check_exist([
            'user_id' => 43,
            'id' => 99,
            'type' => 'project',
        ]);*/
        /*dd($f->check_exist([
            'user_id' => 43,
            'id' => 99,
            'type' => 'project',
        ]));
        $users =  $pp->saved_projects;
        dump($users);
        dd($pp->favorites()->Model('contest'));
        $pp = Contest::find(5);
        dump($pp->favorites);*/

        /*$jsonString = file_get_contents(base_path('storage/countries_states.json'));

        $data = collect(json_decode($jsonString, true));
        $data = collect($data["countries"]);
        $a = $data->where('country', 'Antigua and Barbuda')->first();
        dd($a["states"]);
        dump(array_keys($a["states"]));*/

        $d = Dispute::find(27);
        event(new NotifDisputeStart([$d]));
        //sent mail
        // $email = new MailToAbiter($d);
        // Mail::to('vukhanhthien197@gmail.com')->send($email);


        return view('welcome');
    }
  public function testurl(){
    $string  = file_get_contents('https://www.youtube.com/watch?v=MiYvH9GHERI');
    require 'vendor/autoload.php';
    $dom = new IvoPetkov\HTML5DOMDocument();
    $dom->loadHTML($string);
    $dom->preserveWhiteSpace = false;
//get all meta tags
    $el = $dom->getElementsByTagName('meta');
dd($el);
    echo'<pre>';
    print_r($el);
    echo'</pre>';

    foreach($el as $val){
      //get value of each content
      echo $val -> getAttribute('content').'<br>';
    }


    $data = (object) getInfoUrl('https://www.youtube.com/watch?v=MiYvH9GHERI');
    $getID3 = new \getID3;
    dd(da);
    $file = $getID3->analyze('‪D:\Downloads\Background - 9584.mp4');
    echo("Duration: ".$file['playtime_string'].
      " / Dimensions: ".$file['video']['resolution_x']." wide by ".$file['video']['resolution_y']." tall".
      " / Filesize: ".$file['filesize']." bytes<br />");
  }
}
