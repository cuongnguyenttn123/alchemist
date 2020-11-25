<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

use App\Models\Dispute;

class DisputeAttachments extends Model
{
    
    protected $table = 'dispute_attachments';

    public function scopeWithAuth($query)
    {
        return $query->where(['id_user' => Auth::user()->id])->get();
    }

    public function user(){
        return $this -> belongsTo(User::class, 'id_user', 'id');
    }

    public function dispute(){
        return $this -> belongsTo(Dispute::class, 'dispute_id', 'id');
    }

    public function getLinkAttribute(){
        return url(asset('public/'.$this->url));
    }

}
