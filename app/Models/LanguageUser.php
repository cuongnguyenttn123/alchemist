<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LanguageUser extends Model
{
	protected $table = "language_user";
	
	public $timestamps = false;
	
    public function user(){
		return $this -> belongsTo('App\Model\User', 'user_id', 'id');
	}
	
	public function language(){
		return $this -> belongsTo('App\Model\Language', 'language_id', 'id');
	}
}
