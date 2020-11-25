<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;
use App\Models\User;
class SendEmailController extends Controller
{
	public function getSendMail(){
		return view('phongtestmail.form_send_mail');
	}

	public function postSendMail(Request $request){
		$postSendMail = $this -> sendMail($request -> name,$request-> message, $request -> email_receive);
		if($postSendMail == 'Success'){
			return "Success email";

		}else{
			return "Error email";
		}
	}

    // gọi function để sent email
    function sendMail($name,$message,$email){
    	$data = array(
    		'name' => $name,
    		'message' => $message
    	);
        Mail::send($email)->send(new SendMail($data));
        return 'Success';
    }
}
