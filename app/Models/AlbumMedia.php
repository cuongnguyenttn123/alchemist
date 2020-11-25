<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumMedia extends Model
{
  protected $table = 'album_media';

  /**
  * @desc insert media to album
  * @return bool    
  * @status Finish
  * @requires 
  * @created 10h:23/01/2019
  * @updated 
  */
  public function _update($_album, $_media){
    $this->_album = $_album;
    $this->_media = $_media;
    return $this->save();
  }


  /**
  * @desc delete row album_media  
  * @return bool
  * @status Finish
  * @requires 
  * @created 10h:23/01/2019
  * @updated 
  */
  public function _delete($_id){
    return $this->where('id',$_id)->delete();
  }
}
