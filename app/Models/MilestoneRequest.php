<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MilestoneRequest extends Model
{
	protected $table = 'milestone_requests';
    protected $fillable = ['status'];

	public function createNew($data) {
		extract($data);

        $this->_milestone = $milestone;
        $this->_user = $user;
        $this->value = $value ?? null;
        $this->status = 'pending';

        return $this->save();
	}

    public function milestone(){
        return $this->belongsTo(Milestone::class, '_milestone', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, '_user', 'id');
    }

    public function getProjectAttribute(){
        return $this->milestone->project;
    }






}
