<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Media;
use App\Models\Post;

class Video extends Model
{


  public function post(){
      return $this->hasOne(Post::class, '_video', 'id');
  }

  public function media(){
      return $this->belongsTo(Media::class, '_media', 'id');
  }

  public function thumbnail_model(){
      return $this->belongsTo(Media::class, '_thumbnail', 'id');
  }

  public function getImageUrlAttribute(){
      return $this->thumbnail_model->url ?? "img/vid-4.jpg";
  }

  public function getTimeAgoAttribute(){
      return $this->created_at->diffForHumans() ?? "";
  }

  public function _delete(){
    if($this->post){
        $this->post->delete();
    }
    //$this->media->delete();
    if($this->delete()){
      return true;
    }
  }

}
