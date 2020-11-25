<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PackageMembership;
use Auth;

class PackageMembershipMeta extends Model
{
	protected $table = 'membership_pack_meta';

	public function package(){
		return $this -> belongsTo(PackageMembership::class, '_packet', 'id');
	}
}
