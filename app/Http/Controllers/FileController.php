<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Libs\Generate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Media;
use App\Models\ProjectAttachments;
use App\Models\DisputeAttachments;

class FileController extends Controller
{
    public $media;

    public function __construct()
    {
        $this->media = new Media();
        $this->p_attach = new ProjectAttachments();
        $this->d_attach = new DisputeAttachments();
    }

    /**
  * @author khaihoangdev@gmail.com
  * @desc list all file in the username folder
  * @return json with list files 
  * @time 15h:11/12/2018
  */
  public function files(){
    // check user login
    $user = Auth::user();
    if(!$user) return Response::json(["status"=>"error! this method require user logged-in"], 400);

    $directory = Generate::gen_folder_name();

    $files = Storage::files($directory);

    $_files = [];
    foreach ($files as $file ) {
      array_push($_files,Generate::gen_file_info($file));      
    }
    return $_files;
  }
  /**
  * @author khaihoangdev@gmail.com
  * @desc upload file for user, require user logged-in
  * @return json with status
  * @time 14h:11/12/2018
  */
  public function upload(Request $req){

    // check user login
    $user = Auth::user();
    if(!$user) return Response::json(["status"=>"error! this method require user logged-in"], 400);
      $input = Input::all();
      $rules = array(
        'file' => 'doc|docx|xls|xlsx|pdf|image|max:2000',
    );

      $file = $req->file("file");
      $extension = $file->getClientOriginalExtension();
      $file_name = Generate::gen_file_name($file->getClientOriginalName(),$extension);
      $directory = Generate::gen_folder_name();

    $upload_success = $file->storeAs($directory,$file_name);
    if( $upload_success ) {
      $file_info = Generate::gen_file_info($upload_success);
      $_data = [
        "_user"=>$user->id,
        "name"=>$file_info->name,
        "ori_name"=>$file_info->ori_name,
        "url"=>$file_info->loc,
        "size"=>$file_info->size,
        "extension"=>$file_info->extension,
        "time"=>$file_info->time];
      $file = $this->media->_update($_data);
        if($file){
          return Response::json(["status"=>"success", "info"=>$file], 200);
      }
        return Response::json(["status"=>"error"], 400);
    } else {
      return Response::json(["status"=>"error"], 400);
    }
  }
  //store_file
  public function store_file($file){
     // check user login
    $user = Auth::user();
    $extension = $file->getClientOriginalExtension();
    $file_name = Generate::gen_file_name($file->getClientOriginalName(),$extension);
    $directory = Generate::gen_folder_name();
    $upload_success = $file->storeAs($directory,$file_name);
    if( $upload_success ) {
      $file_info = Generate::gen_file_info($upload_success);
      $_data = [
        "_user"=>$user->id,
        "name"=>$file_info->name,
        "ori_name"=>$file_info->ori_name,
        "url"=>$file_info->loc,
        "size"=>$file_info->size,
        "extension"=>$file_info->extension,
        "time"=>$file_info->time];
      $file = $this->media->_update($_data);
      if($file){
        return $file;
      }else{
        return false;
      }
    }
  }
  //end
  public function store_attachment($file){

    $extension = $file->getClientOriginalExtension();
    $file_name = Generate::gen_file_name($file->getClientOriginalName(),$extension);
    $directory = 'attachments';

    $upload_path = $file->storeAs($directory,$file_name);
    $file_info = Generate::gen_file_info($upload_path);
    return ['attachment' => $file_info, 'upload_path' => $upload_path];

  }

  //dispute attachment
  public function dispute_attachment($file){

    $extension = $file->getClientOriginalExtension();
    $file_name = Generate::gen_file_name($file->getClientOriginalName(),$extension);
    $directory = 'disputes';

    $upload_path = $file->storeAs($directory,$file_name);
    $file_info = Generate::gen_file_info($upload_path);
    return ['attachment' => $file_info, 'upload_path' => $upload_path];

  }
}
