<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
  public function complete(Milestone $milestone)
  {
    $message = 'Success';
    $error = false;
    if(!$milestone->complete()){
      $message = 'Error';
      $error = true;
    }
      return response()->json(['error'=>$error,'message'=> $message],200);
  }
}
