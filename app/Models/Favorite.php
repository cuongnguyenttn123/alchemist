<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Favorite extends Model
{
    protected $types = [
        'user' => 'App\Models\User',
        'project' => 'App\Models\Project',
        'contest' => 'App\Models\Contest'
    ];

    public $timestamps = false;

    public function favoritable()
    {
      return $this->morphTo();
    }

    public function scopeModel($query, $type = null)
    {
      if(!$type) return null;

      $type = array_get($this->types, $type);
      return $query->where(function ($query) use ($type) {
          $query->where('favoritable_type', '=', $type);
      })->get();
    }

    public function user_by()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function user()
    {
      return $this->morphTo('App\Models\User', 'favoritable');
    }

    public function contest()
    {
      return $this->morphTo('App\Models\Contest', 'favoritable');
    }

    public function project()
    {
      return $this->morphTo('App\Models\Project', 'favoritable');
    }
    public function check_exist($data) {
      extract($data);
      $type = array_get($this->types, $type);
      $exist = $this->where([
        'user_id' => $user_id,
        'favoritable_id' => $id,
        'favoritable_type' => $type,
      ])->first();
      if($exist)
        return $exist;
      return false;
    }
    public function addNew($data) {
      extract($data);
      if(!$type) return null;
      $type = array_get($this->types, $type);
      if(!$type) return null;
      $this->user_id = $user_id;
      $this->favoritable_id = $id;
      $this->favoritable_type = $type;
      if ($this->save()) {
        return true;
      }
      return false;
    }
    public function _delete($data) {
      extract($data);
      $type = array_get($this->types, $type);
      $this->where([
        'user_id' => $user_id,
        'favoritable_id' => $id,
        'favoritable_type' => $type,
      ])->delete();
    }

}
