<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Location extends Model
{
    protected $table = 'location';
    protected $fillable = ['city','country','state'];
    /**
    * @author khaih
    * @email khaihoangdev@gmail.com
    * @desc get list locations
     * @require [location id]
    * @return [Location]
    * @time 12/24/2018
    * @status Finish
    */
    public function media(){
        return $this -> belongsTo('App\Models\Media', 'media_id', 'id');
    }
    public function project_location(){
        return $this -> hasMay('App\Models\ProjectLocation', 'location_id', 'id');
    }
    public function locations($id= null){
        $locations = (object) ["_curr"=>$this->where("id",$id)->first()];
        if($id){
            $locations -> states  = DB::select("select id,state from location where state IS NOT NULL and country = (select country from location where id = ?) group by state",[$id]);
            $locations -> cities  = DB::select("select id, city from location where city IS NOT NULL and state = (select state from location where id = ?) group by city", [$id]);
        }else{
            $locations = $this->all();
        }
        return $locations;
    }

    public function countries(){
      $countries = $this->select("id","country")->where("country","<>","")->groupBy("country")->get();
      return $countries;
    }

    /**
     * @desc this func require name of country. It will return an array contain all of state at there
     * @param int $_country
     * @return array
     */

    public function _states($_country){
        $states = DB::select("select id,state from location where state IS NOT NULL and country = (select country from location where id = ?) group by state",[$_country]);
      return $states;
    }

    /**
     * @desc this func require name of country or state or both. It will return an array contain all of city at there
     * @param string $_country
     * @param string $_state
     * @return mixed
     */
    public function _cities($data = ["_country"=>'','_state'=>'']){
        $cities = [];
        if($data["_country"]!='' && $data['_state']!=''){
            $cities = DB::select("select id,city from location where city IS NOT NULL and country = (select country from location where id = ? ) and state = (select state from location where id = ?) group by city",[$data["_country"],$data["_state"]]);
        }else{
            $cities = DB::select("select id, city from location where city IS NOT NULL and State IS NULL and country = (select country from location where id = ?) group by city", [$data["_country"]]);
        }
      return $cities;
    }

    public function _update($data)
    {
        $user_name = Auth::user()->username;
        $state = false;
        if($data['id']){
            $row = $this->find($data['id']);
            $row->country = $data['country'];
            $row->country_code = $data['country_code'];
            if($data['media_id'] != null){
                $del_img = Media::find($row->media_id);
                if($del_img){
                    $del_link_img = $del_img->ori_name;
                    $del_img->delete();
                    unlink("public/uploads/".$user_name."/".$del_link_img);
                }
                $row->media_id = $data['media_id'];
            }
            $state = $row->save();
               
        }else{
            $this->country = $data['country'];
            $this->country_code = $data['country_code'];
            $this->media_id = $data['media_id'];
            $state =  $this->save()?$this->id:false;
        }
        return $state;
    }
    public function  _delete($id){
        $user_name = Auth::user()->username;
        $row = $this->find($id);
        $check_project = ProjectLocation::where('location_id',$id)->count();
        $check_user = User::where('_location',$id)->count();
        if($check_project > 0 ||  $check_user > 0){
            return false;
        }else{
            if($row){
                if($row->media_id != null){
                    $del_media = Media::find($row->media_id);
                    if($del_media){
                        $img_url = $del_media->ori_name;
                        $del_media->delete();
                        unlink("public/uploads/".$user_name."/".$img_url);
                    }
                }
                return $row->delete();
            } 
        }
        return false;
    }
    //s2nhomau
    public function list_locations(){
      return  $this -> All();
    }
    //end
}
