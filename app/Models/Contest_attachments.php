<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Contest_attachments extends Model
{

    public function user(){
        return $this -> belongsTo(User::class, 'id_user', 'id');
    }

    public function dispute(){
        return $this -> belongsTo(Dispute::class, 'dispute_id', 'id');
    }

    public function getLinkAttribute(){
        return url(asset('public/'.$this->url));
    }

   	/*public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }*/
}
