<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

use App\Models\User;

class ListType extends Model
{
	protected $table = 'list_type';

	public function scopeAvailable() {
		return static::whereIn('type_name', ['Featured', 'Urgent'])->get();
	}

}
