<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Http\Controllers\SendEmailController;
use App\Notifications\TaskNotification;
use App\Notifications\JobNotification;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
class NotificationController extends Controller
{

	 public function __construct()
    {
        $this->skill = new Project();
        $this ->SendEmailController = new SendEmailController();
    }

	 //test notification
    public function getSendNotification(){
    	$type = "newjob";
    	if($type == "newjob"){
    		
	    	$data = array(
	    		'project_id' => 11,
	    		'user_id' => 47,
	    		'email_send' => true,
	    		'message' => 'tuyển người làm',
	    	);
    	}elseif($type == "bidjob"){
    		$Project = Project::find(11);
	    	$data = array(
	    		'project_id' => 11,
	    		'user_id' => 47,
	    		'email_send' => true,
	    		'message' => 'đồng ý',
	    	);
    	}elseif ($type == "admin") {
    		$data = array(
	    		'type' => $type,
	    		'data'=>[
	    			'message' => 'message',
	    		],
	    		 
	    	);
    	}
    	
    	$test = $this->sendNotification($type,$data);
    	return $test;
    }
    //get all notification
    public function getMarkAsRead(){
    	$this -> allMarkAsRead();
    	return redirect()->back();
    	
    }
    //*******************************************//
    function sendNotification($type,$data_in){
    	extract($data_in);
    	if($type == "newjob"){
    		//tạo data_out cho bảng notification
    		$project = Project::find($project_id);
    		$link_job = $project->permalink();
    		$data_out = array(
    			'type' => $type,
	    		'data'=>[
	    			'user_id' => $user_id,
	    			'message' => $message,
	    			'name_job'=>$project -> name,
	    			'short_description' => $project ->short_description,
	    			'budget' => $project ->budget,
	    			'link_job' =>$link_job,
	    		],
    		);
    		//lấy list user sent new job
    		$role_id = 3;
    		$list_user = User::select('users.id','username','email')
			->join('role_user', function ($join) use ($role_id){
				if($role_id != ''){
					$join->on('users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', $role_id);
				}
			})->get();
			foreach ($list_user as $user){
                $this -> TaskNotification($user,$data_out);
				if($email_send){
					//$this ->SendEmailController->sendMail($user->username,$message,$link_job,$user->email);
				}
				
			}
    	}elseif($type == "bidjob"){
    		if($user_id != null){
    			//tạo data_out cho bảng notification
	    		$project = Project::find($project_id);
	    		$link_job = $project->permalink();
	    		$data_out = array(
	    			'type' => $type,
		    		'data'=>[
		    			'user_id' => $user_id,
		    			'message' => $message,
		    			'name_job'=>$project ->name,
		    			'short_description' => $project ->short_description,
		    			'budget' => $project ->budget,
		    			'link_job' =>$link_job,
		    		],
	    		);
	    		//lấy list user sent new job
    			$user = User::find($user_id);
    			if($email_send){
    				$this -> TaskNotification($user,$data_out);
    				$this ->SendEmailController->sendMail($user->username,$message,$link_job,$user->email);
    			}else{
    				$this -> TaskNotification($user,$data_out);
    			}
    			
    		}else{
    			return "Error";
    		}
    		
    	}
    	return "Success";
    }
    //function sent TaskNotification
    function TaskNotification($user,$data){
    	return $user -> notify((new TaskNotification($data)));
    }
    //function all read notification
    public function allMarkAsRead(){
    	return auth()->user()->unreadNotifications->markAsRead();
    }
    //read 1 notification
    public function markAsRead(Request $request){
    	return auth()->user()->unreadNotifications->find($request->not_id)->markAsRead();
    }
    //end notification
}
