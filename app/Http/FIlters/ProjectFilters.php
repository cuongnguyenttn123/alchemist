<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;

class ProjectFilters extends QueryFilters
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
      $q->whereIn('id', $skills);
    });
  }

  public function level($level)
  {
    return $this->builder->whereIn('level', $level);
  }

  public function location($location)
  {
    return $this->builder->whereIn('_location', $location);
  }

  public function language($language)
  {
    return $this->builder->whereHas('languages', function ($q) use ($language) {
      $q->whereIn('language_id', $language);
    });
  }

  public function minprice($minPrize)
  {
    if ($minPrize) {
      return $this->builder->where('budget', '>=', $minPrize);
    }
    return $this->builder;
  }

  public function maxprice($maxPrize)
  {
    if ($maxPrize) {
      return $this->builder->where('budget', '<=', $maxPrize);
    }
    return $this->builder;
  }
}
