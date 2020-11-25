<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
	protected $table = 'rating';

    public $timestamps = false;

    public function getNameAttribute($data)
    {
        return ucwords(str_replace('_', ' ', $this->rating_type));
    }

    public function store($data)
    {
        $this->rating_type = $data['rating_type'];
        $this->value = $data['value'];
        $this->_from = $data['_from'];
        $this->_to = $data['_to'];
        $this->_project = $data['_project'];
        $this->point = $data['point'];
        $rt =  $this->save();
        return $rt;
    }

}
