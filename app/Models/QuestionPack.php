<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionPack extends Model
{
    protected $table = "question_pack";

    public function question_packs($_project){
        $question_packs = $this->select('question_pack.id as _pack','question.*')
            ->leftJoin('question','question._pack','=','question_pack.id')
            ->where("_project",$_project)
            ->get();
        return $question_packs;
    }

    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc return id if the row contain project id existed or create new then retrurn id
    * @return int
    * @time 12/28/2018
    * @status Finish
    */
    public  function _update($_project){
        $res = $this->where('_project', $_project)->first();
        if($res)
            return $res->id;
        $this->_project = $_project;
        $this->save();
        return $this->id;
    }

    /**
    * @desc delete all pack 
    * @return int
    * @status Finish
    * @requires 
    * @created 08h:28/01/2019
    * @updated 
    */
    public function _delete_all($_project){
      $res = $this->where('_project',$_project);
      if($res->first()){
        $_id = $res->first()->id;
        $res->delete();
        return $_id;
      }
      return 0;
    }
}

