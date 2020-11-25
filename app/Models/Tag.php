<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Project;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['name',"_project"];


    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc Get list tag with project id passing
    * @return [Tag]
    * @time 12/24/2018
    * @status Finish
    */
    public function tags($_project){
        $tags = $this->where("_project", $_project)->get();
        return $tags;
    }
    
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc delete all row match with project id
    * @return 
    * @time 12/28/2018
    * @status Finish
    */
    public function _delete_all($_project){
        return $this->where('_project',$_project)->delete();
    }
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc Update|insert tag with tag name, project id
    * @return bool
    * @time 12/24/2018
    * @status Finish
    */
    public function _update($name, $_project){
        $this->name = $name;
        $this->_project = $_project;
        $this->save();
    }

	public function category(){
		return $this -> belongsTo(Project::class, '_project', 'id');
	}
}
