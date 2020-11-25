<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Libs\Calculator;

use App\Models\Album;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\PostLikeStatus;
use App\Models\User;
use App\Models\UserRp;

use Auth;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
  protected $table = 'posts';
  protected $fillable = ['caption'];
  protected $casts = ['list_media'=>'array', 'list_file'=>'array'];

  /*status
    0 - publish
    1 - private
  */

  public $max_albumfeed;
  public $max_videofeed;

  public function __construct(){
    $this->max_albumfeed = 1;
    $this->max_videofeed = 1;
  }

  public function scopePublish($query)
  {
    return $query->where('status', 0)->orderby('id', 'desc');
  }

  public function scopeToPrivate($query)
  {
    return $query->update(['status'=> 1]);
  }

  public function scopeToFeed($query)
  {
    return $query->update(['status'=> 0]);
  }

  public function getCaptionAttribute($value){
    $parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="$1" target="_blank">$1</a>', '$1<a href="">@$2</a>', '$1<a href="'.route("newsfeed").'?hashtag=$2">#$2</a>'), $value);
    return nl2br($parsedMessage);
  }

  public function album(){
    return $this->belongsTo(Album::class, '_album');
  }

  public function media(){
    return $this->hasMany(Media::class, 'post_media');
  }


  public function video(){
    return $this -> hasOne(Video::class, 'id', '_video');
  }

  public function user(){
    return $this->belongsTo(User::class, '_user');
  }

  public function comments(){
    return $this->hasMany(PostComment::class, '_post')->whereNull('comment_id');
  }
  public function commentcomment(){
    return $this->hasMany(PostComment::class, '_post');
  }
  public function countCommentComments($id){
    return $this->commentcomment->where('comment_id',$id)->count();
  }

  public function checkComment(){
    if (Auth::check()) {
      return !! $this->comments->where('_user', Auth::user()->id)->count();
    }
  }


  public function getListHashtagAttribute(){
    $rs = [];
    $arr = array_filter(static::pluck("hashtag")->toArray());
    foreach ($arr as $key => $value) {
      $new = array_filter(explode(',', trim($value)));
      $rs = array_merge($new, $rs);
    }
    return array_unique($rs);
  }

  public function getTotalCommentsAttribute(){
    return $this->comments->count();
  }

  //get attach files
  public function images(){
    if(!empty($this->list_media))
      return Media::whereIn('id', $this->list_media)->get();
  }

  public function files(){
    if(!empty($this->list_file))
      return Media::whereIn('id', $this->list_file)->get();
  }

  public function user_rp(){
    return $this->hasMany(UserRp::class, '_post');
  }

  public function bonusRP($check_day, $userId){
    $user_title = $this->user->user_title;
    $total_likes = $this->total_likes->count();
    $year = date("Y");
    $month = date("m");
    $total_post =  DB::table('posts')->where('_user', $userId)
      ->whereYear('created_at', '=', $year)
      ->where(function ($query) use ($month) {
        $query->whereMonth('created_at', '=', $month)
          ->orWhere(function($query) use ($month) {
            $query->whereMonth('created_at', '=', $month-1);
          })
          ->orWhere(function($query) use ($month) {
            $query->whereMonth('created_at', '=', $month-2);
          })
          ->get();
      })
      ->count();
    if($total_likes >= 30){
      $bonus_rp = Calculator::calculateRPBonus($user_title, $this->likes(), $total_likes, 1);
      return round($bonus_rp, 2);
    }
    return 0;
  }

  public function total_likes(){
    return $this->hasMany(PostLike::class, '_post');
  }

  public function status_likes(){
    return $this->hasMany(PostLikeStatus::class, '_post');
  }

  public function is_target(){
    if (Auth::check()) {
      return !! $this->total_likes->where('_user', Auth::user()->id)->count();
    }
  }

  public function is_like(){
    if (Auth::check()) {
      return !! $this->status_likes->where('_user', Auth::user()->id)->count();
    }
  }

  public function like_status(){
    if (Auth::check()) {
      return !! $this->status_likes->where('_user', Auth::user()->id)->where('like', 1)->count();
    }
  }

  public function like_status_value($data){
    $pl = DB::table('post_like_status')->where([
      '_user' => $data['_user'],
      '_post' => $data['_post'],
      // 'like'  => $data['like']
    ])->delete();
    return $pl;
  }

  public function user_liked(){
    if (Auth::check()) {
      return !! $this->total_likes->where('_user', Auth::user()->id)->where('like', 1)->count();
    }
  }

  public function user_disliked(){
    if (Auth::check()) {
      return !! $this->total_likes->where('_user', Auth::user()->id)->where('like', 0)->count();
    }
  }

  public function likes(){
    return $this->total_likes->where('like', 1)->count();
  }
  public function user_like_status(){
      return $this->status_likes->where('like', 1)->count();
  }

  public function dislikes(){
    return $this->total_likes->where('like', 0)->count();
  }

  public function gethashtags($text) {
    //Match the hashtags
    preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $text, $matchedHashtags);
    $hashtag = '';
    // For each hashtag, strip all characters but alpha numeric
    if(!empty($matchedHashtags[0])) {
      foreach($matchedHashtags[0] as $match) {
        $hashtag .= preg_replace("/[^a-z0-9]+/i", "", $match).',';
      }
    }
    //to remove last comma in a string
    return rtrim($hashtag, ',');
  }
  public function addNew($data) {
    extract($data);
    $this->_user = $user;
    $this->caption = $caption;
    if($list_file)
      $this->list_file = $list_file;
    if($_video)
      $this->_video = $_video;
    if($external_link)
      $this->external_link = $external_link;
    if($list_media)
      $this->list_media = $list_media;
    $this->hashtag = $this->gethashtags($caption);
    if ($this->save()) {
      return $this;
    }

  }
  public function edit($data) {
    extract($data);

    $this->_user = $user;
    $this->caption = $caption;
    $this->list_file = $list_file;
    $this->_video = $_video;
    $this->external_link = $external_link;
    $this->list_media = $list_media;
    $this->hashtag = $this->gethashtags($caption);
    if ($this->save()) {
      return $this;
    }

  }

  public function attachments()
  {
    return $this->hasMany(PostAttachments::class, '_post', 'id');
  }

  //check current user auth
  public function getIsAuthorAttribute(){
    return !!  Auth::check() && $this->_user === Auth::id();
  }
  public function likecmt(){
    return $this->hasMany('App\Models\PostLikeCmt','_post','id');
  }

}
