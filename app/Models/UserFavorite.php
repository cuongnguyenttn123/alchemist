<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserFavorite extends Model
{
  protected $table = 'user_favorite';

  /**
  * @author khaih
  * @email khaihoangdev@gmail.com
  * @desc insert user favorite
  * @return bool
  * @time 09h:15/01/2019
  * @status Finish
  * @requires:
  * $type|string|["profile","project"]|type of favorite
  * $_id|int
  */
  public function _update($type, $_id){
    if($type && $_id){
      switch ($type) {
        case 'profile':
          $this->_profile = $_id;
          break;
        case 'project':
          $this->_project = $_id;
          break;
      }
      $_user = Auth::user()->id;
      $this->_user = $_user;
      return $this->save();
    }
    return false;
  }

  /**
  * @author khaih
  * @email khaihoangdev@gmail.com
  * @desc Delete favorite with id passing
  * @return bool
  * @time 08h:16/01/2019
  * @status Finish
  * @requires $id
  */
  public function _delete($id){
    if($id)
      return $this->where('id',$id)->delete();
    return false;
  }

  /**
  * @author khaih
  * @email khaihoangdev@gmail.com
  * @desc list all favorite with type passing: profile|project
  * @return [object]
  * @status Finish
  * @requires $type=profile|project
  * @created 08h:16/01/2019
  * @updated 
  */
  public function list_favorite($type){
    $list = [];
    $_user = Auth::user()->id;
    switch($type){
      case "profile":{
        $list = $this->select('_profile')->where([
          ['_user', '=', $_user],
          ['_profile', '>', 0]
        ])->get();
        break;
      }
      case 'project':{
        $list = $this->select('_project')->where([
          ['_user', '=', $_user],
          ['_project', '>', 0]
        ])->get();
        break;
      }
    }
    return $list;
  }

}