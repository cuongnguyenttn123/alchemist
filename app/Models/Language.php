<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

use App\Models\User;

class Language extends Model
{
	protected $table = 'language';
  public function users(){
    return $this -> belongsToMany('App\Models\User', 'language_user', 'language_id', 'user_id');
  }
}
