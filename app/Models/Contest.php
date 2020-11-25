<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Carbon\Carbon;
use App\Libs\Calculator;

use App\Models\Entrie;
use App\Models\User;
use App\Models\Prize;

class Contest extends Model
{
    const SELECT_PODIUM_MAIL_STATUS = 'select podium mail sent';

    protected $fillable = ['status'];
    public $max_shortlist = 10;

    public function getTimeStartAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');
    }

    public function getTimeEndAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d-m-Y');
    }

    public function scopeOpening($query)
    {
        return $query->orderBy('id', 'desc')->get();
    }

    public function favorites()
    {
        return $this->morphMany('App\Models\Favorite', 'favoritable');
    }

    public function is_saved()
    {
        return !!Auth::user() && $this->favorites->where('user_id', Auth::user()->id)->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user_create', 'id');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Contest_attachments', 'id_contest', 'id');
    }

    public function author_attachments()
    {
        return $this->attachments->where('id_user', $this->id_user_create);
    }

    public function preview_att()
    {
        return $this->attachments->where('preview', 1);
    }

    public function delivery_att()
    {
        return $this->attachments->where('preview', null);
    }

    public function contests_attachment()
    {
        return $this->attachments->where('id_user', Auth::user()->id);
    }

    public function entries()
    {
        return $this->hasMany(Entrie::class, 'contest_id', 'id')->orderByRaw(\DB::raw('-`rank` DESC'))->groupBy('id_user');
    }

    public function getTotalEntriesAttribute()
    {
        return $this->entries->count();
    }

    public function getMaxRankAttribute()
    {
        return $this->entries->max('rank');
    }

    public function entries_rank()
    {
        return $this->entries()->whereNotNull('rank')->get();
    }

    public function hasrank()
    {
        return $this->entries_rank()->count();
    }

    public function vitri($num)
    {
        return !!$this->entries()->where('rank', $num)->count();
    }

    public function entry_win()
    {
        return $this->entries()->where('rank', 1)->first();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'contest_category', 'contest_id', 'category_id');
    }
    public function skill()
    {
        return $this->belongsToMany(Skill::class, 'contest_skill', 'contest_id', 'skill_id');
    }
    public function user_title()
    {
        return $this->belongsToMany(UserTitle::class, 'contest_user_title', 'contest_id', 'user_title_id');
    }
    public function getCatnameAttribute()
    {
        return implode(', ', $this->categories->pluck('name')->toArray());
    }

    public function getSkillnameAttribute()
    {
        return implode(', ', $this->skill->pluck('name')->toArray());
    }

    public function getDayLeftAttribute()
    {
        $date = Carbon::parse($this->time_end)->format('d-m-Y 23:59');
        $date = Carbon::parse($date);

        $diff = $date->diffInDays();
        return $diff;
    }

    public function allTests()
    {
        // return $this->tests()->orderby('id_user', 'desc')->pluck('id_user')->toArray();
        $data = $this->entries()->select('entries.*')
            ->leftjoin('prizes', 'entries.id', '=', 'prizes.test_id')
            ->orderByRaw('-prizes.rank desc')
            ->get();
        //$data = $this->tests()->select('entries.*')->join('entries', 'contests.id', '=', 'entries.contest_id')->get();
        return $data;
    }

    public function prizes()
    {
        return $this->hasManyThrough(
            Prize::class,
            Entrie::class,
            'contest_id', // Foreign key on  tests table...
            'test_id', // Foreign key on prizes table...
            'id', // Local key on tests table...
            'id' // Local key on prizes table...
        );
    }

    //check current user auth
    public function getPositionPrizeAttribute()
    {
        $bien = $this->prizes->count() + 1;
        return $this->addOrdinalNumberSuffix($bien);
    }

    //check current user auth
    public function is_author()
    {
        return !!Auth::check() && $this->id_user_create == Auth::user()->id;
    }

    //check current user posted
    public function user_posted()
    {
        return !!Auth::check() && $this->entries->where('id_user', Auth::user()->id)->count();
    }

    public function user_entry_alchemist()
    {
      return $this->entries->where('id_user', Auth::user()->id)->fisrt();
    }

    function addOrdinalNumberSuffix($num)
    {
        if (!in_array(($num % 100), array(11, 12, 13))) {
            switch ($num % 10) {
                    // Handle 1st, 2nd, 3rd
                case 1:
                    return $num . 'st';
                case 2:
                    return $num . 'nd';
                case 3:
                    return $num . 'rd';
            }
        }
        return $num . 'th';
    }

    public function complete()
    {
        $this->update(['status' => 'completed']);
    }
    public function getIsCompletedAttribute()
    {
        return !!$this->status == 'completed';
    }


    public function earnpoint($rank)
    {
        $user_title = $this->entries->where('rank', $rank)->first();
        if (!$user_title) return 0;
        $user_title = $user_title->user->user_title;
        if ($rank <= 3) {
            $point = Calculator::contestPointEarn($user_title, $rank);
            return $point;
        }
        return 0;
    }

    public function permalink()
    {
        return route('contest.detail', $this->id);
    }

    public function totalDay(){
      return (strtotime($this->time_end) - strtotime($this->time_start))/(60*60*24);
    }

  public function list_type()
  {
    return $this->belongsToMany(ListType::class, 'contest_list_type', 'contest_id');
  }
  public function shortlist_entries()
  {
    return $this->entries()->where('shortlist', 1);
  }
}
