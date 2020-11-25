<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class OrderStatus extends Model
{
	protected $table = 'order_status';

	public function order(){
		return $this -> hasMany(Order::class, '_status', 'id');
	}

}
