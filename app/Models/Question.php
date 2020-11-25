<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question";

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

    public function _update($question, $_pack){

        $this->question = $question -> question;
        $this->option_a = $question -> option_a;
        $this->option_b = $question -> option_b;
        $this->option_c = $question -> option_c;
        $this->option_d = $question -> option_d;
        $this->correct_option = $question -> correct_option;
        $this->_pack = $_pack;

        return $this->save();
    }

    public function update_list($questions){

    }
}
