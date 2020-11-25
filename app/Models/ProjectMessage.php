<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class ProjectMessage extends Model
{
    protected $table = 'project_messages';

    protected $casts = ['files' => 'array'];

    public function project(){
        return $this -> belongsTo('App\Models\Project', '_project', 'id');
    }

    public function user(){
        return $this -> belongsTo('App\Models\User', '_user', 'id');
    }

    //get attach files
    public function attach(){
        if(!empty($this->files))
            return ProjectAttachments::whereIn('id', $this->files)->get();
    }

    public function filesname(){
        return implode(', ', $this->attach()->pluck('name')->toArray());;
    }

    //check current user author
    public function getIsAuthorAttribute(){
        return $this->_user === $this->project->_employer;
    }

    //partner
    public function getPartnerAttribute(){
        if($this->is_author){
            return $this->project->userwon;
        }else {
            return $this->project->user;
        }
    }

    /**
    * @desc Update|insert comment of project
    * @return bool
    * @status Finish
    * @requires 
    * @param int _project project id
    * @param int _user user id
    * @param string message 
    * @param int _parent project message id
    * @param int _id project message id if wana update exsited row
    * @created 08h:22/01/2019
    * @updated 
    */
    public function _update($data){
        extract($data);
        $this->_project = $project;
        $this->_user = $user;
        $this->files = $files;
        $this->message = $message;
        /*if(isset($parent)){
            $this->_parent = $parent;
        }*/
        $this->save();
        return $this->id;
    }

    /**
    * @desc delete existed row
    * @return bool
    * @status Finish
    * @requires 
    * @param int id project message id
    * @created 08h:22/01/2019
    * @updated 
    */
    public function _delete($_id){
      return $this->where('id',$_id)->delete();
    }

    // public function getMessageAttribute($value){
    //     //The Regular Expression filter
    //     $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

    //     // Check if there is a url in the text
    //     if(preg_match_all($reg_exUrl, $value, $url)) {

    //         // Loop through all matches
    //         foreach($url[0] as $newLinks){
    //             if(strstr( $newLinks, ":" ) === false){
    //                 $link = 'http://'.$newLinks;
    //             }else{
    //                 $link = $newLinks;
    //             }

    //             // Create Search and Replace strings
    //             $search  = $newLinks;
    //             $replace = '<a href="'.$link.'" title="'.$newLinks.'" target="_blank">'.$link.'</a>';
    //             $value = str_replace($search, $replace, $value);
    //         }
    //     }

    //     //Return result
    //     return $value;
    // }


}
