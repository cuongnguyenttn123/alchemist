<?php

namespace App\Models;
use Storage;
use URL;
use File;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostAttachments extends Model
{
  protected $table = 'post_attachments';
  protected $fillable = ['_user','name','url','size','extension'];

  public static function boot()
  {
    parent::boot();

    ProjectAttachments::deleted(function($attachment){
      $file = public_path().$attachment->url;
      if(File::isFile($file)){
        File::delete($file);
      }
    });
  }

  public function _update($file){
    $this->_user = $file["_user"];
    $this->url = $file["url"];
    $this->ori_name = $file["ori_name"];
    $this->name = $file["name"];
    $this->size = $file["size"];
    $this->extension = $file["extension"];
    $this->time = $file["time"];
    if($this->save())
      return $this;
    return false;
  }

  public function user(){
    return $this -> belongsTo(User::class, '_user', 'id');
  }

  public function post(){
    return $this -> belongsTo(Post::class, '_post', 'id');
  }

  public function getLinkAttribute(){
    return url(asset('public/'.$this->url));
  }

}
