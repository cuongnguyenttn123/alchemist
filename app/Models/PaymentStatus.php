<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Payment;

class PaymentStatus extends Model
{
	protected $table = 'payment_status';
  	protected $fillable = ['id', 'status'];

	public function payment(){
		return $this -> hasMany(Payment::class, '_status', 'id');
	}

}
