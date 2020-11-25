<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

use App\Models\User;
use App\Models\Bid;

class BidMessage extends Model
{
    protected $table = 'bid_messages';

    protected $casts = ['files' => 'array'];

    public function user(){
        return $this -> belongsTo(User::class, '_user', 'id');
    }

    public function bid(){
        return $this -> belongsTo(Bid::class, '_bid', 'id');
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
        return $this->_user === $this->bid->_freelancer;
    }
    public function getMessageAttribute($value){
        //The Regular Expression filter
        $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

        // Check if there is a url in the text
        if(preg_match_all($reg_exUrl, $value, $url)) {

            // Loop through all matches
            foreach($url[0] as $newLinks){
                if(strstr( $newLinks, ":" ) === false){
                    $link = 'http://'.$newLinks;
                }else{
                    $link = $newLinks;
                }

                // Create Search and Replace strings
                $search  = $newLinks;
                $replace = '<a class="linkcustom" href="'.$link.'" title="'.$newLinks.'" target="_blank">'.$link.'</a>';
                $value = str_replace($search, $replace, $value);
            }
        }

        //Return result
        return $value;
    }

    //partner
    public function getPartnerAttribute(){
        if($this->is_author){
            return $this->bid->project->user;
        }else {
            return $this->bid->user;
        }
    }

    /**
    * @desc Update|insert comment of bid message
    * @return id
    * @updated 
    */
    public function _update($data){
        extract($data);
        $this->_bid = $bid;
        $this->_user = $user;
        if($files)
            $this->files = $files;
        $this->message = $message;
        if(isset($parent)){
            $this->_parent = $parent;
        }
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


}
