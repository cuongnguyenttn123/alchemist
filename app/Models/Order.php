<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\OrderStatus;

class Order extends Model
{
	protected $table = 'order';

	public function order_status(){
		return $this -> hasOne(OrderStatus::class, '_status', 'id');
	}

}
