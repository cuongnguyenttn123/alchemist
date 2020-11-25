<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\Bid;

class Skill extends Model
{
    protected $table = 'skill';
    protected $fillable = ['name','_category'];

    /**
     * @return array
     */

    public function skills(){
        $skills = DB::select("
            select skill.*, category.name as category from skill
            inner join category on category.id = skill._category
        ");
        return $skills;
    }

    public function getSkillsByCat($cat_id){
        $this->where('_category', $cat_id)->get();
    }

    public function getCountJobsAttribute(){
        return $this->projects->count();
    }

    public function bids()
    {
        return $this->belongsToMany(Bid::class, 'bid_skill', '_bid', '_skill');
    }

    public function users()
    {
        return $this->belongsToMany('App\Model\Users', 'skill_user', '_user', '_skill');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', '_category', 'id');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project',  'project_skill', 'skill_id', 'project_id');
    }

    public function _update($data)
    {
        $state = false;
        if($data['id']){
            $row = $this->find($data['id']);
            if($row)
              $state = $row->update(['name'=>$data['name'],['_category'=>$data['_category']]]);
            else
              return false;
        }else{
            $this->name = $data['name'];
            $this->_category = $data['_category'];
            $state =  $this->save();
        }
        return $state;
    }
    public function  _delete($id){
        $row = $this->find($id);
        if( $row)
            return $row->delete();
        return false;
    }

    //s2nhomau
    public function list_skills(){
        $list_skills = Skill::select('skill.*','category.name as name_category')->join('category','category.id','=','skill._category')->get();
        return $list_skills;
    }
    //end
}
