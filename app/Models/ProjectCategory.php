<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected  $table = "project_category";
    protected $fillable = ['_category', '_project'];

    public function categories($_project){
        return $this->where('_project',$_project)->get();
    }
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc Delete all match with project id
    * @return
    * @time 12/28/2018
    * @status Finish
    */
    public function _delete_all($_project){
        $this->where('_project',$_project)->delete();
    }
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc insert new match project - category
    * @return
    * @time 12/28/2018
    * @status Finish
    */
    public function _update( $_category, $_project){
        return $this->insert(['_category'=>$_category,'_project'=>$_project]);
    }
}
