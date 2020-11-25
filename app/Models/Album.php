<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Media;
use App\Models\Post;

class Album extends Model
{
  protected $table = 'albums';
  protected $casts = ['data' => 'array'];

  /**
  * @desc update|insert album
  * @return bool
  * @status Finish
  * @requires The user was login before
  * @created 10h:23/01/2019
  * @updated
  * @param string album name of album
  * @param string description description of album
  * @param int _id id of album - unrequired
  */
  public function _update($album, $description, $_id = 0){

    if(!$_id){
      $_user = Auth::user()->id;
      $this->album = $album;
      $this->description = $description;
      $this->_user = $_user;
      return $this->save();
    }else{
      return $this->where('id',$_id)->update(['album'=>$album,'description'=> $description]);
    }

  }
  public function user(){
    return $this->belongsTo(User::class, '_user');
  }
  public function _delete(){
    if($this->post) {
      $this->post->delete();
    }
    $this->media()->detach();
    if($this->delete()){
      return true;
    }
  }

  public function post(){
    return $this->hasOne(Post::class, '_album');
  }

  public function media(){
      return $this->belongsToMany(Media::class, 'album_media', '_album', '_media');
  }
  public function imageDecription($id){
    return $this->data[$id];
  }
  public function images(){
      return $this->media->pluck('url')->all();
  }
  public function imageAll(){
    return $this->media->all();
  }
  public function firstImageUrl(){
      return $this->media->pluck('url')->first();
  }

  public function postToPrivate(){
      return $this->post()->toPrivate();
  }

  public function postToFeed(){
      return $this->post()->toFeed();
  }

  public function getIsFeedAttribute(){
      return !! $this->post->status != 1;
  }
}
