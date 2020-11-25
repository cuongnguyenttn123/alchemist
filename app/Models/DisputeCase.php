<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Models\DisputeStatus;

class DisputeCase extends Model
{
	protected $table = 'disputes_case';

	protected $fillable = ['dispute_id','user_id','title','description'];

    public function scopeWithAuth($query)
    {
        return $query->where(['user_id' => Auth::user()->id])->first() ?? false;
    }

	public function user(){
		return $this -> belongsTo('App\Models\User', 'user_id', 'id');
	}
	public function dispute(){
		return $this -> belongsTo('App\Models\Dispute', 'dispute_id', 'id');
	}
	public function dispute_attachments(){
		return $this -> hasMany('App\Models\DisputeAttachments', 'dispute_id', 'id');
	}

	public function dispute_case_update($data){
		if($this -> id){
            $this->update([
            	'dispute_id'=>$data['dispute_id'],
            	'user_id'=> Auth::user()->id,
            	'title'=>$data['title'],
            	'description'=>$data['description'],
            ]);
            return $this;
		}else{
			$this -> dispute_id = $data['dispute_id'];
	        $this -> user_id = Auth::user()->id;
	        $this -> title = $data['title'];
	        $this -> description = $data['description'];
	        $row =  $this->save();
	        return $this;
		}
	}
}
