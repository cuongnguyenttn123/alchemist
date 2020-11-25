<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Libs\Calculator;

use App\Models\User;

class UserRp extends Model
{
  protected $table = 'user_rp';
  protected $fillable = ["id", "_user","_post", "point"];

  public function __construct(){
    $this->_user = new User();
  }

  public function likepost($data, $bonus_rp){
    extract($data);
    $this->_user = $_user;
    $this->point = $bonus_rp;
    if (isset($_post)) {
    	$this->_post = $_post;
    }
    if($this->save()){
      return $this->id;
    }
    return false;
  }


}
