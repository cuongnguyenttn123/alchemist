<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;

use App\Models\Bid;
use App\Models\BidMessage;
use App\Models\Milestone;
use App\Models\ProjectAttachments;

use App\Events\NewMessage;

class BidController extends Controller
{
  
  public function create(Request $req){
    $data = $req->all();
    $bid = new Bid();
    $_user = Auth::user()->id;
    $_bid = $bid->_update($data['_project'], $_user, $data['title'], $data['description'], $data['file'], $data['price'], $data['workday']);

    foreach ($data['miles'] as $mile){
        $_mile = new Milestone();
        $_mile->_update_mile_bid($mile,$_bid);
    }
    return "ok";
  }

  public function getMessages(Request $request){
    $bid = Bid::find($request->id);
    $data = '';
            /*foreach ($bid->messages as $message) {
                $view = View::make('template_part.content-bidmessage', ['message' => $message]);
                $data .= (string) $view;
            }*/
    $view = View::make('template_part.content-divbidmessage', ['bid' => $bid]);
    $data .= (string) $view;
    
    return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
  }

  public function postMessage(Request $request){
    $user = Auth::user();
    $bid = Bid::find($request->id);
    $project = $bid->project;

    $arr_files = [];
    $files = $request->file('files');
    if ($files) {
        foreach ($files as $file) {
            $fc = new FileController();
            $store_info = $fc->store_attachment($file);
            $attachment = $store_info['attachment'];
            $upload_path = $store_info['upload_path'];
            // @dd($upload_path);
            $pj_attachment = new ProjectAttachments();
            $pj_attachment->_project = $project->id;
            $pj_attachment->_user = $user->id;
            $pj_attachment->url = $upload_path;
            $pj_attachment->name = $attachment->name;
            $pj_attachment->ori_name = $attachment->ori_name;
            $pj_attachment->extension = $attachment->extension;
            $pj_attachment->size = $attachment->size;
            $pj_attachment->save();
            $arr_files[] = $pj_attachment->id;
        }
    }

    $data = [
            'user' => $user->id,
            'bid' => $request->id,
            'files' => $arr_files,
            'message' => $request->message
            ];
    $bidmes = new BidMessage();
    $bides_id = $bidmes->_update($data);
    $view = View::make('template_part.content-bidmessage', ['message' => $bidmes]);
    $data = (string) $view;

    //call event
    event(new NewMessage($bidmes, $type = 'bid'));

    return response()->json([
            'error' => false,
            'data' => $data,
            'message' => 'success'
        ], 200);
  }

}
