<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class skill_user extends Model
{
    protected $table = 'skill_user';
    protected $fillable = ['name','_category'];

    /**
     * @return array
     */
    public function skills(){
        return $this->belongsToMany('App\Skill', 'skill_user', '_user', '_skill');
    }
    

    public function users()
    {
        return $this->belongsToMany('App\Users', 'skill_user', '_user', '_skill');
    }

}
