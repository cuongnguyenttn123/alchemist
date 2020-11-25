<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
	protected $table = 'user_meta';

    protected $fillable = [
        'meta_key', 'meta_value',
    ];

	public function user(){
		return $this->belongsTo('App\Models\User', '_user', 'id');
	}

	public static function value_key($key, $user_id){
		return static::where('meta_key', $key)->where('_user', $user_id)->pluck('meta_value')->first();
	}

	public static function set($key, $value, $user_id){
		$meta = static::firstOrNew(['meta_key'=> $key, '_user'=> $user_id]);
		// return $id->update(['meta_value'=> $value, '_user'=> $value]);
        $meta->meta_value = $value;
        $meta->_user = $user_id;
        return $meta->save();
	}

}
