<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilters
{
  protected $request;
  protected $builder;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function apply(Builder $builder)
  {
    $this->builder = $builder;
    foreach ($this->filters() as $name => $value) {
      $name = $this->toCamelCase($name);
      if (!method_exists($this, $name)) {
        continue;
      }
      $this->$name($value);
//      if(!$value){
//        $this->$name();
//      }
//      else{
//        $this->$name($value);
//      }
//      if(is_string($value) && strlen($value)){
//        $this->$name($value);
//      }
//      elseif (is_array($value)) {
//        $this->$name($value);
//      } else {
//        $this->$name();
//      }
    }
    return $this->builder;
  }

  public function filters()
  {
    return $this->request->all();
  }

  protected function toCamelCase($string)
  {
    $str = str_replace('_', '', ucwords($string, '_'));
    return lcfirst($str);
  }
  function escateLike($string, $expPercent = false)
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

}

