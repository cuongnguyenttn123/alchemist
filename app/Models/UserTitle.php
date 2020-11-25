<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTitle extends Model
{
  protected $table = 'user_title';

  public static function list_title($type) {
  	$q = static::where('type', $type)->get();
  	return $q;
  }
}
