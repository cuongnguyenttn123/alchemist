<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Album;
use App\Models\User;
use App\Models\Post;

class PostComment extends Model
{
	protected $table = 'post_comment';
  protected $casts = ['list_media'=>'array', 'list_file'=>'array'];

  public $max_albumfeed;
  public $max_videofeed;

  public function __construct(){
    $this->max_albumfeed = 1;
    $this->max_videofeed = 1;
  }

	public function scopeAll($query)
	{
		return $query->whereNull('comment_id')->get();
	}

	public function post(){
		return $this->belongsTo(Post::class, '_post');
	}

	public function user(){
		return $this->belongsTo(User::class, '_user');
	}

	public function comments(){
		return $this->hasMany(PostComment::class, 'comment_id');
	}
	public function childrenComments()
	{
		return $this->hasMany(PostComment::class)->with('comments');
	}

	public function image(){
		return $this->belongsTo(Media::class, 'media_id');
	}

  public function files(){
    if(!empty($this->list_file))
      return Media::whereIn('id', $this->list_file)->get();
  }

  public function images(){
    if(!empty($this->list_media))
      return Media::whereIn('id', $this->list_media)->get();
  }

  public function video(){
    return $this -> hasOne(Video::class, 'id', '_video');
  }
  public function getTotalCommentsAttribute(){
    return $this->comments->count();
  }
	public function getIsParentAttribute(){
		return $this->comment_id === null;
	}
  public function postlikecmt(){
    return $this->hasMany('App\Models\PostLikeCmt','_comment' ,'id');
  }

  public function addNew($data) {
    extract($data);

    $this->_user = $user;
    $this->_post = $post;
    $this->content = $content;
    if($list_file)
      $this->list_file = $list_file;
    if($comment_id)
      $this->comment_id = $comment_id;
    if($_video)
      $this->_video = $_video;
    if($external_link)
      $this->external_link = $external_link;
    if($list_media)
      $this->list_media = $list_media;
    if ($this->save()) {
      return $this;
    }

  }
  public function edit($data) {
    extract($data);
    $this->_user = $_user;
    $this->content = $content;
    $this->list_file = $list_file;
    $this->_video = $_video;
    $this->external_link = $external_link;
    $this->list_media = $list_media;
    if ($this->save()) {
      return $this;
    }

  }


}
