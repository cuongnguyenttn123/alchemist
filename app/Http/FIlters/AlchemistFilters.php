<?php

namespace App\Http\Filters;

use App\Models\UserTitle;
use Illuminate\Http\Request;

class AlchemistFilters extends QueryFilters
{
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
    parent::__construct($request);
  }

  public function id($id)
  {
    return $this->builder->where('id', $id);
  }

  public function orderBy($orderValue = 'asc')
  {
    $orderValue = $this->request->get('order_value', 'asc');

    return $this->builder;

  }

  public function keyword($keyword)
  {
    if (!$keyword) {
      return $this->builder;
    }
    $keyword = '%' . $this->escateLike($keyword) . '%';
    return $this->builder->where(function ($q) use ($keyword) {
      $q->orWhere('email', 'LIKE', $keyword)
        ->orWhere('username', 'LIKE', $keyword)
        ->orWhere('first_name', 'LIKE', $keyword)
        ->orWhere('last_name', 'LIKE', $keyword);
    });
  }

  public function filterSkill($skills = [])
  {
    return $this->builder->whereHas('skills', function ($q) use ($skills) {
      $q->whereIn('_skill', $skills);
    });
  }

  public function level($levels)
  {
    return $this->builder->whereIn('level', $levels);
  }

  public function location($locations)
  {
    return $this->builder->whereIn('_location', $locations);
  }

  public function language($languages)
  {
    return $this->builder->whereHas('languages', function ($q) use ($languages) {
      $q->whereIn('language_id', $languages);
    });
  }
}
