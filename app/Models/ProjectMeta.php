<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMeta extends Model
{
    protected $table = "project_meta";

    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc Get list meta with project id passing
    * @return [ProjectMeta]
    * @time 12/21/2018
    * @status Finish
    */
    public function metas($_project){
        $data = $this->where('_project',$_project)->get();
        return $data;

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
    * @desc update|insert new meta with meta, project id passing
    * @return bool
    * @time 12/21/2018
    * @status Finish
    */
    public function _update($meta, $_project){
        $this->meta_key = $meta["key"];
        $this->meta_value = $meta["value"];
        $this->_project = $_project;

        return $this->save();

    }
}
