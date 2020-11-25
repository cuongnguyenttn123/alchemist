<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Media;
use App\Models\Prize;
use App\Models\Contest;

use App\Libs\Calculator;

use Auth;
use Carbon\Carbon;

class Entrie extends Model
{

  protected $fillable = ['rank','shortlist'];

    // rename the id column, not mandatory
    protected $primaryKey = 'id';

    // tell Eloquent that uuid is a string, not an integer
    protected $keyType = 'string';

    public function user(){
      return $this -> belongsTo(User::class, 'id_user', 'id');
  	}

    public function contest(){
      return $this -> belongsTo(Contest::class, 'contest_id', 'id');
  	}

    public function preview_attachments(){
      return Contest_attachments::where(
        [
          'id_user'=> $this->id_user,
          'id_contest'=> $this->contest_id,
          'preview'=> 1,
        ]
      )->get();
    }

    public function prize(){
      return $this -> hasOne(Prize::class,'test_id','id');
  	}

    public function getPositionPrizeAttribute(){
		  return $this->addOrdinalNumberSuffix($this->rank);
      // return $this->addOrdinalNumberSuffix($this->prize->rank);
  	}

    public function getPrizeAwardAttribute(){
      if($this->rank == 1){
        return $this->contest->total_prize;
      }
      return 0;
    }

    public function getSbpAwardAttribute(){
      if($this->rank <= 3){
        $point = Calculator::contestPointEarn($this->user->user_title, $this->rank);
        return $point;
      }
      return 0;
    }

  //check current user auth
  public function is_author(){
    return !!  Auth::check() && $this->id_user == Auth::user()->id;
  }

	public function media(){
	    $media = Media::find($this->medias);
	    return $media;
	}

	function addOrdinalNumberSuffix($num) {
	    if (!in_array(($num % 100),array(11,12,13))){
	      switch ($num % 10) {
	        // Handle 1st, 2nd, 3rd
	        case 1:  return $num.'st';
	        case 2:  return $num.'nd';
	        case 3:  return $num.'rd';
	      }
	    }
	    return $num.'th';
	 }
   public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
    public function delivery_attachments(){
      return Contest_attachments::where(
        [
          'id_user'=> $this->id_user,
          'id_contest'=> $this->contest_id,
          'preview'=> null,
        ]
      )->get();
    }
}
