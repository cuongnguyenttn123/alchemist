<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Album;
use App\Models\User;
use App\Models\Post;

class PostLikeCmt extends Model
{
  protected $table = 'post_like_cmt';
//  protected $fillable = [
//    '_user', '_post', 'like'
//  ];

  public function post(){
    return $this->belongsTo('App\Models\Post','_post' ,'id');
  }

  public function user(){
    return $this->belongsTo('App\Models\User','_user','id');
  }
  public function postcmt(){
    return $this->belongsTo('App\Models\PostComment','_comment' ,'id');
  }

}
