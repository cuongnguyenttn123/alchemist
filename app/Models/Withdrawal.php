<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Withdrawal extends Model
{
   protected $table = 'withdrawals';
   /*S2nhomau*/
   public function user(){
      return $this -> belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function update_withdraw($request,$user){
      if($this->id){

      }else{
        $this -> user_id = $user->id;
        $this -> payment_method = $request -> payment_method;
        $this -> amount = $request -> amount;
        $this -> currency = $request -> currency;
        $this -> withdraw_email = $request -> withdraw_email;
        $this -> status = "Pending";
        $this->save();
        return $this;
      }
    }
    public function update_withdraw_bank($request,$user){
      if($this->id){

      }else{
        $this -> user_id = $user->id;
        $this -> payment_method = $request -> payment_method;
        $this -> amount = $request -> amount;
        $this -> currency = $request -> currency;
        $this -> withdraw_email = $user->email;
        $this-> transaction_id = $user->id. "_" . time();
        $this -> status = "Pending";
        $this->save();
        return $this;
      }
    }
    public function processes_withdraw($status){
      $this -> status = $status;
      return $this -> save();
    }
    //check status
    public function check_status(){
      if($this -> status == "Pending"){
        return true;
      }else{
        return false;
      }
    }
  /*end S2nhomau*/
}
