<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use App\Models\User;

class UserPoint extends Model
{
  protected $table = 'user_point';

  public function __construct(){
    // $this->_user = new User();
  }

  public function user(){
      return $this -> belongsTo(User::class, '_user', 'id');
  }

  public function _update($data){
    $this->_user = $data['user_id'];
    $this->type_point = $data['type_point'];
    $this->point = $data['point'];
    if (isset($data['action'])) {
    	$this->action = $data['action'];
    }
    if (isset($data['action_id'])) {
    	$this->action_id = $data['action_id'];
    }
    // save
    if($this->save()){
      return $this->id;
    }
    return false;
  }

}
