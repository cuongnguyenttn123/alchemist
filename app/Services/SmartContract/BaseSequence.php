<?php


namespace App\Services\SmartContract;

use Illuminate\Support\Facades\DB;

class BaseSequence
{
  public static function setSequenceByType($type)
  {
    $lastSequence = DB::table('sequences')->where('name', '=', $type)->latest('value')->first();
    $sequenceNumber = 0;
    if ($lastSequence) {
      $sequenceNumber = $lastSequence->value + 1;
    }
    $sequence = DB::table('sequences')->insert([
      'name' => $type,
      'value' => $sequenceNumber,
    ]);

    return $sequenceNumber;
  }
}
