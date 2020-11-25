<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Optional extends Model
{
    protected $table = 'optional';
    protected $fillable = ['meta_name','meta_key','meta_value','meta_description'];


    /**
     * @return array
     */
    public function optionals(){
        $skills = $this->all();
        return $skills;
    }

    public function _update($data)
    {
//        dd($data);
        $state = false;
        if($data['id']){
            $row = $this->find($data['id']);
            $state = $row->update(
                [
                    'meta_name'=>$data['name'],
                    'meta_key'=>$data['meta_key'],
                    'meta_value'=>$data['value'],
                    'meta_description'=>$data['description']
                ]);
        }else{
            $this->meta_name = $data['name'];
            $this->meta_key = $data['meta_key'];
            $this->meta_value = $data['value'];
            $this->meta_description = $data['description'];
            $state =  $this->save()?$this->id:false;
        }
        return $state;
    }
    public function  _delete($id){
        $row = $this->find($id);
        if( $row)
            return $row->delete();
        return false;
    }
}
