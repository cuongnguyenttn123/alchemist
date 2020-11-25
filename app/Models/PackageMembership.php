<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\PackageMembershipMeta;

class PackageMembership extends Model
{
	protected $table = 'membership_pack';

  /**
  * @author khaih
  * @email khaihoangdev@gmail.com
  * @desc get pack with type
  * @return []
  * @time 10h:11/01/2019
  * @status Finish
  * @requires [@type|int|type of pack,[@strongly|bool|default false pack return include normal pack]]
  */
  public function get_packs($type = 0, $strongly= false){
    $res = $this->where('type',$type);
    if(!$strongly)
      $res = $res->whereOr('type',0);
    return  $res->get();
  }
	public function meta(){
		return $this -> hasMany(PackageMembershipMeta::class, '_packet', 'id');
	}
}
