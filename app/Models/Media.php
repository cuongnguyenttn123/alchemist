<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Media extends Model
{
    protected $table = 'media';
    protected $fillable = ['_user','name','url','size','extension'];

    public function _update($media){
        $this->_user = $media["_user"];
        $this->url = $media["url"];
        $this->ori_name = $media["ori_name"];
        $this->name = $media["name"];
        $this->size = $media["size"];
        $this->extension = $media["extension"];
        if($this->save())
            return $this;
        return false;
    }

    public function user(){
        return $this -> belongsTo(User::class, '_user', 'id');
    }

    public function bid(){
        return $this -> hasOne(Bid::class, 'medias', 'id');
    }

    public function video(){
        return $this -> hasOne(Video::class, '_media', 'id');
    }

    public function getIsFeaturedAttribute(){
        return $this->featured === 1;
    }

    public function updateFeature($value){
        $this->featured = $value;
        return $this->save();
        // return $this->update(['featured' => $value]);
    }

    public function doFeatured($in, $out){
        if($in || $out ){
            if($in) {
                $this->whereIn('id', $in)->update(['featured' => 1]);
            }
            if($out) {
                $this->whereIn('id', $out)->update(['featured' => 0]);
            }
            return true;
        }
        return false;
    }

    public function scopeFeatureImages($query){
        return $query->whereIn('extension', ['jpg', 'png'])->where('featured', 1)->take(9)->get();
    }

    public function scopeFeatureVideos($query){
        return $query->whereIn('extension', ['mp4', 'webm'])->where('featured', 1)->get();
    }

    public function scopeTotalFeaturedImages($query){
        return $query->whereIn('extension', ['jpg', 'png'])->where('featured', 1)->count();
    }

    public function scopeTotalFeaturedVideos($query){
        return $query->whereIn('extension', ['mp4', 'webm'])->where('featured', 1)->count();
    }

}
