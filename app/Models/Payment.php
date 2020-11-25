<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Milestone;
use App\Models\PaymentStatus;

class Payment extends Model
{
	protected $table = 'payment';
  	protected $fillable = ['_status'];

	public function milestone(){
		return $this -> belongsTo(Milestone::class, '_milestone', 'id');
	}

	public function payment_status(){
		return $this -> hasMany(PaymentStatus::class, '_status', 'id');
	}

	public function status() {
		return $this -> belongsTo(PaymentStatus::class, '_status');
	}

    public function user(){
        return $this->milestone->bid->user;
    }

    public function getProjectAttribute(){
        return $this->milestone->bid->project;
    }

	public function cancelPayment(){
        $status = PaymentStatus::firstOrCreate(['status' => 'cancelled']);

      	$this->_status = $status->id;
      	return $this->save();
	}

	public function completePayment(){
        $status = PaymentStatus::firstOrCreate(['status' => 'completed']);

      	$this->_status = $status->id;
      	return $this->save();
	}

	public function createMilestonePayment($data){
      $status = PaymentStatus::firstOrCreate(['status' => 'pending']);
		  extract($data);
      $this->money = $price;
      $this->_milestone = $_milestone;
      $this->_status = $status->id;
      return $this->save();
	}

}
