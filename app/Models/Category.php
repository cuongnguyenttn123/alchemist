<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Bool_;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name','_parent'];

    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc Get list category
    * @return [Category]
    * @time 12/21/2018
    * @status Finish
    */
    public function categories(){
        $categories = DB::select("
        select t1.id as id,t1._parent as _parent,get_name_cate(t1.id) AS Current,get_name_cate(t1._parent) as Parent, count(project_category._project) as 'projects' from category t1 left join project_category on project_category._category = t1.id group by project_category._category
        ");
        return $categories;
    }


    public function skills()
    {
        return $this->hasMany('App\Models\Skill', '_category', 'id');
    }

    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc Update|Insert category, update when data contain id
    * @return Bool
    * @time 12/21/2018
    * @status Finish
    */
    public function _update($data)
    {
        $state = false;
        if($data['id']){
            $row = $this->find($data['id']);
            if($row)
              $row->update(['name'=>$data['name'],['_parent'=>$data['_parent']]]);
        }else{
            $this->name = $data['name'];
            $this->_parent = $data['_parent'];
            $state =  $this->save();
        }
        return $state;
    }
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc Delete category with id passing
    * @return  Bool
    * @time 12/21/2018
    * @status Finish
    */
    public function  _delete($id){
        $row = $this->find($id);
        $childs = DB::select("select id from category where _parent =".$row->id);
        if(!count($childs) && $row){
            return $row->delete();
        }else{
            return false;
        }
    }

    public function projects(){
        return $this -> belongsToMany('App\Models\Project', 'project_category', '_project', '_category');
    }

    public function skill_category(){
        return $this -> hasMany('App\Models\Skill','_category', 'id');
    }

    public function project_categorys(){
         return $this -> hasMany('App\Models\ProjectCategory','_category','id');
    }

    public function slug(){
        return str_slug($this->name);
    }

    public function permalink(){
        // return str_slug($this->name);
        return route('search.cat', [str_slug($this->name), $this->id]);
    }
    //s2nhomau
    public function list_categorys(){
        $list_categorys = $this-> all();
        return $list_categorys;
    }
    //end s2

}
