<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Album;
use App\Models\User;
use App\Models\Post;

class PostLike extends Model
{
  protected $table = 'post_liked';
  protected $fillable = [
    '_user', '_post', 'like'
  ];

  public function post(){
    return $this->belongsTo(Post::class, '_post');
  }

  public function user(){
    return $this->belongsTo(User::class, '_user');
  }

  public function _update($data){
  	// $pl = $this->where('_user', $data['_user'])->where('_post', $data['_post'])->first();

  	$pl = $this->where([
  		'_user' => $data['_user'],
  		'_post' => $data['_post'],
  		// 'like'  => $data['like']
  	])->delete();

  	$new = $this->create([
  		'_user' => $data['_user'],
  		'_post' => $data['_post'],
  		'like'  => $data['like']
  	]);
    //$new->save();
    return $new;
  }


}
