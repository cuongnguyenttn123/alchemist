<?php

namespace App\Http\Controllers;

use App\Constraints\Skills;
use App\Http\Filters\AlchemistFilters;
use App\Http\Filters\ProjectFilters;
use App\Http\Filters\SeekerFilters;
use App\Models\Bid;
use App\Models\Language;
use App\Models\ListType;
use App\Models\Location;
use App\Models\Project;
use APP\Models\ProjectStatus;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserMeta;
use App\Models\UserTitle;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
  public function seekers(SeekerFilters $filters)
  {
//    return User::with('role')->withRole(4)->filter($filters)->desc()->paginate(9);
    return view('find_seeker', [
      'inputs' => $filters->filters(),
      'user' => auth()->user(),
      'skills' => Skill::all(),
      'seeker_title' => UserTitle::list_title('seeker'),
      'list_location' => Location::All(),
      'list_type' => ListType::All(),
      'list_language' => Language::All(),
      'users' => User::with('role')->seeker()->filter($filters)->desc()->paginate(9),
      'seeker_skills' => Skills::where('type', 'seeker'),
      'alchemist_skills' => Skills::where('type', 'alchemist'),
    ]);
  }

  public function alchemist(Request $request,AlchemistFilters $filters)
  {
//      $data =User::with('role')->alchemist()->filter($filters)->paginate(9);
      $inputs = $request->all([
          'orderby',
          'keyword',
          'filter_skill',
          'level',
          'location',
          'language',
          'order_by',
          'order_value',
          'minprice',
          'maxprice',
      ]);
      $data['users'] = $this->filterSeeker(9, [
          'orderby' => $inputs['orderby'],
          'keyword' => $inputs['keyword'],
          'filter_skill' => $inputs['filter_skill'],
          'level' => $inputs['level'],
          'location' => $inputs['location'],
          'order_by' => $inputs['order_by'],
          'order_value' => $inputs['order_value'],
          'language' => $inputs['language'],
          'min_price' => $inputs['minprice'],
          'max_price' => $inputs['maxprice'],
      ],$filters);
//      dd( User::with('role')->alchemist()->filter($filters)->desc()->paginate(9)->toArray());
//    return User::with('role')->alchemist()->filter($filters)->desc()->paginate(9);
    return view('find_user', [
      'inputs' => $filters->filters(),
      'user' => auth()->user(),
      'skills' => Skill::all(),
      'alchemist_title' => UserTitle::list_title('alchemist'),
      'list_location' => Location::All(),
      'list_type' => ListType::All(),
      'list_language' => Language::All(),
      'users' =>$data['users'],
      'seeker_skills' => Skills::where('type', 'seeker'),
      'alchemist_skills' => Skills::where('type', 'alchemist'),
    ]);
  }

  public function projects(Request $request,ProjectFilters $filters)
  {
      $inputs = $request->all([
      'orderby',
      'keyword',
      'filter_skill',
      'list_type',
      'location',
      'language',
      'order_by',
      'order_value',
      'minprice',
      'maxprice',
  ]);
    $data= $this->filterSearch( 9,[
        'orderby' => $inputs['orderby'],
        'keyword' => $inputs['keyword'],
        'filter_skill' => $inputs['filter_skill'],
        'list_type' => $inputs['list_type'],
        'location' => $inputs['location'],
        'order_by' => $inputs['order_by'],
        'order_value' => $inputs['order_value'],
        'language' => $inputs['language'],
        'min_price' => $inputs['minprice'],
        'max_price' => $inputs['maxprice'],
    ],$filters);
    return view('search_project', [
      'skills' => Skill::all(),
      'list_type' => ListType::Available(),
      'list_location' => Location::All(),
      'list_language' => Language::All(),
      'user' => auth()->user(),
      'projects' => $data,
    'files' => auth()->user() ? auth()->user()->medias() : []
    ]);
  }

    public function filterSeeker($limit = 15, $condition = [],$filters)
    {

        $users = User::with([
            'role',
            'location',
            'usermeta',
        ])->alchemist();
        if (isset($condition['keyword'])) {
            $keyword = '%' . $this->escape_like($condition['keyword']) . '%';
            $users = $users->where(function ($q) use ($keyword) {
                $q->orWhere('email', 'LIKE', $keyword)
//                    ->orWhere('username', 'LIKE', $keyword)
                    ->orWhereRaw('CONCAT(first_name," ",last_name) LIKE "'.addslashes($keyword).'"');
            });
        }

        if (isset($condition['filter_skill'])) {
            $skillIds = [];
            foreach ($condition['filter_skill'] as $skill) {
                if ($skill) {
                    $skillModel = Skill::where('id', $skill)->first();
                    if ($skillModel) {
                        $skillIds[] = $skillModel->id;
                    }
                }
            }
            $users = $users->whereHas('skills', function ($q) use ($skillIds) {
                $q->whereIn('_skill', $skillIds);
            });
        }

        if (isset($condition['location'])) {
            $users = $users->whereIn('_location', $condition['location']);
        }

        if (isset($condition['language'])) {
        $users = $users->whereHas('languages', function ($q) use ($condition) {
          $idLanguage = Language::where('language_name', $condition['language'])->get(['id'])->toArray();
          $q->whereIn('language_id', $idLanguage);
        });
      }
        if (isset($condition['min_price']) || isset($condition['max_price'])){
            $dataPrice = [
                'min_price'=>$condition['min_price'],
                'max_price'=>$condition['max_price'],
            ];
            $users->whereHas('usermeta', function ($q) use ($dataPrice) {
                if ($dataPrice['min_price'] && $dataPrice['max_price']) {
                    $q->where('meta_key', 'hourly_hire')
                        ->where('meta_value', '>', (int)$dataPrice['min_price'])
                        ->where('meta_value', '<', (int)$dataPrice['max_price']);
                }else{
                    if ($dataPrice['min_price']){
                        $q->where('meta_key', 'hourly_hire')
                            ->where('meta_value', '>', (int)$dataPrice['min_price']);
                    }else{
                        $q->where('meta_key', 'hourly_hire')
                            ->where('meta_value', '<', (int)$dataPrice['max_price']);
                    }
                }
            });

        }

        if (isset($condition['order_by']) && isset($condition['order_value'])) {
            switch ($condition['order_by']) {
                case 'total_points':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return ($user->sbp + $user->RP);
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return ($user->sbp + $user->RP);
                        });
                    }
                    if (isset($condition['level'])) {
                        $levels = UserTitle::select('min_level', 'max_level')->whereIn('id', $condition['level'])->get()->toArray();
                        $users = $users->filter(function ($user, $key) use ($condition, $levels) {
                            foreach ($levels as $level) {
                                if ($user->level >= $level['min_level'] && $user->level <= $level['max_level']) {
                                    return $user;
                                }
                            }
                        });
                    }
                    return $this->paginate($users, $limit);
                    break;
                case 'SBP':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->SBP;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->SBP;
                        });
                    }
                    if (isset($condition['level'])) {
                        $levels = UserTitle::select('min_level', 'max_level')->whereIn('id', $condition['level'])->get()->toArray();
                        $users = $users->filter(function ($user, $key) use ($condition, $levels) {
                            foreach ($levels as $level) {
                                if ($user->level >= $level['min_level'] && $user->level <= $level['max_level']) {
                                    return $user;
                                }
                            }
                        });
                    }
                    return $this->paginate($users, $limit);
                    break;
                case 'RP':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            $user->RP;
                            return $user->RP;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->RP;
                        });
                    }
                    if (isset($condition['level'])) {
                        $levels = UserTitle::select('min_level', 'max_level')->whereIn('id', $condition['level'])->get()->toArray();
                        $users = $users->filter(function ($user, $key) use ($condition, $levels) {
                            foreach ($levels as $level) {
                                if ($user->level >= $level['min_level'] && $user->level <= $level['max_level']) {
                                    return $user;
                                }
                            }
                        });
                    }
                    return $this->paginate($users, $limit);
                    break;
                case 'rate':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->average_score;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->average_score;
                        });
                    }

                    if (isset($condition['level'])) {
                        $levels = UserTitle::select('min_level', 'max_level')->whereIn('id', $condition['level'])->get()->toArray();
                        $users = $users->filter(function ($user, $key) use ($condition, $levels) {
                            foreach ($levels as $level) {
                                if ($user->level >= $level['min_level'] && $user->level <= $level['max_level']) {
                                    return $user;
                                }
                            }
                        });
                    }
                    return $this->paginate($users, $limit);
                    break;
                case 'projects_completed':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return  $user->projects_joined()->count();
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->projects_joined()->count();
                        });
                    }

                    break;
                case 'contests_won':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->contests_win()->count();
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->contests_win()->count();
                        });
                    }
                    break;
                case 'completed_placed':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->contests_placed()->count();
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->contests_placed()->count();
                        });
                    }

                    break;
                case 'total_disputes':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->total_disputes;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->total_disputes;
                        });
                    }

                    break;
                case 'disputes_win':
                    $users = $users->get();

                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->disputes_win;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->disputes_win;
                        });
                    }

                    break;
                case 'disputes_lost':
                    $users = $users->get();
                    if ($condition['order_value'] == 'desc') {
                        $users = $users->sortByDesc(function ($user) {
                            return $user->disputes_lose;
                        });
                    } else {
                        $users = $users->sortBy(function ($user) {
                            return $user->disputes_lose;
                        });
                    }

                    break;
            }
        }

        if (!($users instanceof Collection)) {
            $users = $users->get();
        }
        if (isset($condition['level'])) {
            $levels = UserTitle::select('min_level', 'max_level')->whereIn('id', $condition['level'])->get()->toArray();
            $users = $users->filter(function ($user, $key) use ($condition, $levels) {
                foreach ($levels as $level) {
                    if ($user->level >= $level['min_level'] && $user->level <= $level['max_level']) {
                        return $user;
                    }
                }
            });
        }

        return $this->paginate($users, $limit);
    }
    public function paginate($items, $perPage = 15, $baseUrl = null, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        $lap->setPath(config('app.url') . '/find_alchemist');
        return $lap;
    }
    function escape_like($string, $expPercent = false)
    {
        if ($expPercent) {
            $search = ['\\', '_', '&', '|'];
            $replace = ['\\\\', '\_', '\&', '\|'];
        } else {
            $search = ['\\', '%', '_', '&', '|'];
            $replace = ['\\\\', '\%', '\_', '\&', '\|'];
        }

        return str_replace($search, $replace, $string);
    }
    public function filterSearch($limit = 15, $condition = [],$filters)
    {
        $projects = Project::with([
            'user', 'skills', 'categories', 'locations', 'languages', 'listtype','bids'
        ])->where('bid_end','>=',(time()-86400))->orderBy('created_at', 'DESC');

        if (isset($condition['keyword'])) {
            $keyword = '%' . $this->escape_like($condition['keyword']) . '%';
            $projects =$projects->where('name', 'LIKE', $keyword);
        }
        if (isset($condition['filter_skill'])) {
            $skillIds = [];
            foreach ($condition['filter_skill'] as $skill) {
                if ($skill) {
                    $skillModel = Skill::where('id', $skill)->first();
                    if ($skillModel) {
                        $skillIds[] = $skillModel->id;
                    }
                }
            }
            $projects = $projects->whereHas('skills', function ($q) use ($skillIds) {
                return $q->whereIn('id', $skillIds);
            });
        }

        if (isset($condition['location'])) {
          $location =$condition['location'];
          $projects = $projects->whereHas('user', function ($q) use ($location) {
                return $q->whereIn('_location', $location);
          });
//            $projects = $projects->whereIn('_location', $condition['location']);
        }
        if (isset($condition['language'])) {
            $projects = $projects->whereHas('languages', function ($q) use ($condition) {
                return  $q->whereIn('language_id', $condition['language']);
            });
        }

        if (isset($condition['min_price']) || isset($condition['max_price'])){
            $dataPrice = [
                'min_price'=>$condition['min_price'],
                'max_price'=>$condition['max_price'],
            ];
                if ($dataPrice['min_price']){
                    $projects= $projects->where('budget', '>', (int)$dataPrice['min_price']);
                }
                if ($dataPrice['max_price']) {
                    $projects = $projects->where('budget', '<', (int)$dataPrice['max_price']);
                }
        }
        if (isset($condition['list_type'])) {
            $dataListType= ListType::whereIn('id', $condition['list_type'])->get(['id'])->toArray();
            foreach ($dataListType as $value){
              $projects = $projects->whereHas('listtype', function ($q) use ($value) {
                return $q->where('id', $value);
              });
            }

        }
        if (isset($condition['level'])) {
            $levels = UserTitle::select('min_level', 'max_level')->whereIn('id', $condition['level'])->get()->toArray();
            $projects = $projects->filter(function ($projects, $key) use ($condition, $levels) {
                foreach ($levels as $level) {
                    if ($projects->level >= $level['min_level'] && $projects->level <= $level['max_level']) {
                        return $projects;
                    }
                }
            });
        }
        if (!($projects instanceof Collection)) {
            $projects = $projects->get();
        }
        if (isset($condition['order_by']) && isset($condition['order_value'])) {

            switch ($condition['order_by']) {
                case 'date_posted':
                    if ($condition['order_value'] == 'desc') {
                        $projects = $projects->sortByDesc(function ($user) {
                            return $user->created_at;
                        });
                    } else {
                        $projects = $projects->sortBy(function ($user) {
                            return $user->created_at;
                        });
                    }
                    break;
                case 'by_price':
                    if ($condition['order_value'] == 'desc') {
                        $projects = $projects->sortByDesc(function ($project) {
                            return $project->budget;
                        });
                    } else {
                        $projects = $projects->sortBy(function ($project) {
                            return $project->budget;
                        });
                    }
                    break;
                case 'of_bid':
                    if ($condition['order_value'] == 'desc') {
                        $projects = $projects->sortByDesc(function ($project) {
                            return count($project->bids);
                        });
                    } else {
                        $projects = $projects->sortBy(function ($project) {
                            return count($project->bids);
                        });
                    }
                    break;
            }
        }else{
          foreach ($projects as &$project){
            $project->listype_point = 0;
            if ($project->listtype && $project->listtype->contains(function ($value, $key) {
                return $value->type_name =="Featured";
              })){
              $project->listype_point += 2;
            }
            if ($project->listtype && $project->listtype->contains(function ($value, $key) {
                return $value->type_name =="Urgent";
              })){
              $project->listype_point += 1;
            }
          }
          $projects = $projects->sortByDesc(function ($project) {
            return [$project->listype_point,$project->created_at->timestamp];
          });
        }
        // add column


        return $this->paginateProject($projects, $limit);
    }
  public function paginateProject($items, $perPage = 15, $baseUrl = null, $page = null, $options = [])
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

    $items = $items instanceof Collection ? $items : Collection::make($items);
    $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    $lap->setPath(config('app.url') . '/search');
    return $lap;
  }


  public function searchAlchemist(Request $request)
  {
    $inputs = $request->all([
      'order_value',
      'search',
      'id',
      'order_by'
    ]);
    $user = Auth::user();
    $target_user = Auth::user();
    $project = Project::where('id', $inputs['id'])->first();
    $bidsItem = $project->bids;
    $idUser = [];
    $bids = [];
    $idUserItem = [];
    if (isset($inputs['search'])){
      foreach ($bidsItem as $bid){
        if (stripos($bid->user->full_name, $inputs['search']) !== false) {
          $idUser[] = $bid->user->id;
        }
      }
      $userBid = $this->sortBidByUser($idUser, $inputs);
      if ($userBid != null){
        $idUserItem[] = array_column($userBid->toArray(), 'id');
        $bids = $this->findBidByUser($inputs['id'], $idUserItem[0]);
      }

    }else{
      $bids = $bidsItem;
    }

    if($project){
      if($project->user_bided()){
        return view('myprofile.project-bids-alchemist', compact('user','target_user', 'project'));
      }elseif($project->is_author()) {
        return view('myprofile.project-bids', compact('user','target_user', 'project', 'bids'));
      }else {
        return abort(404);
      }
    }else {
      return abort(404);
    }
  }

  public function findBidByUser($id, $idUser)
  {
    $bids =[];
    if (!empty($idUser)) {
      for ($index = 0; $index<count($idUser); $index++){
        $bids[] = Bid::where('_project', $id)->where('_freelancer', $idUser[$index])->first();
      }

      return $bids;
    }
  }

  public static function findUserById($idUser)
  {
    $listUser =[];
    if (!empty($idUser)) {
      for ($index = 0; $index<count($idUser); $index++){
        $listUser[] = User::find($idUser[$index]);
      }

      return $listUser;
    }
  }

  public static function sortBidByUser($idUserList, $condition = []){
    $users = User::whereIn('id', $idUserList);
    if (isset($condition['order_by']) && isset($condition['order_value'])) {
      switch ($condition['order_by']) {
        case 'total_points':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->points;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->points;
            });
          }
          return $users;
          break;
        case 'SBP':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->SBP;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->SBP;
            });
          }
          return $users;
          break;
        case 'SP':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->SP;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->SP;
            });
          }
          return $users;
          break;
        case 'RP':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              $user->RP;
              return $user->RP;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->RP;
            });
          }
          return $users;
          break;
        case 'rate':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->average_score;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->average_score;
            });
          }
          return $users;
          break;
        case 'projects_completed':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return  $user->projects_joined()->count();
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->projects_joined()->count();
            });
          }
          return $users;
          break;
        case 'contests_won':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->contests_win()->count();
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->contests_win()->count();
            });
          }
          return $users;
          break;
        case 'completed_placed':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->contests_placed()->count();
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->contests_placed()->count();
            });
          }
          return $users;
          break;
        case 'total_disputes':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->total_disputes;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->total_disputes;
            });
          }
          return $users;
          break;
        case 'disputes_win':
          $users = $users->get();

          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->disputes_win;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->disputes_win;
            });
          }
          return $users;
          break;
        case 'disputes_lost':
          $users = $users->get();
          if ($condition['order_value'] == 'desc') {
            $users = $users->sortByDesc(function ($user) {
              return $user->disputes_lose;
            });
          } else {
            $users = $users->sortBy(function ($user) {
              return $user->disputes_lose;
            });
          }
          return $users;
          break;
      }
    }else{
      return $users->get();
    }
  }
}
