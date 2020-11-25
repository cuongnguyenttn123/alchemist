<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Contest;
use App\Models\Test;

class Prize extends Model
{
    protected $table = 'prizes';
    
    public function user(){
      return $this -> belongsTo(Test::class);
  	}
}
