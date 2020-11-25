<?php

return [
  'api' => [
    'base_url' => env('SMART_CONTRACT_API_BASE_URL'),
    'alchemist_contract' => env('SMART_CONTRACT_ALCHEMIST_CONTRACT'),
    'seeker_contract' => env('SMART_CONTRACT_SEEKER_CONTRACT'),
    'from' => env('SMART_CONTRACT_API_FROM'),
    'signer' => env('SMART_CONTRACT_API_SIGNER'),
    'key' => env('SMART_CONTRACT_API_KEY'),
  ]
];
