<?php

namespace App\Services\SmartContract;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

abstract class BaseContractClient
{
  const METHOD_POST = 'POST';
  const METHOD_GET = 'GET';
  const METHOD_PUT = 'PUT';
  const METHOD_DELETE = 'DELETE';

  protected function headers()
  {
    return [
      'Authorization' => 'Bearer ' . config('smartcontract.api.key'),
      'Accept' => 'application/json',
    ];
  }

  protected function callUrl($endpoint)
  {
    return config('smartcontract.api.base_url') . $endpoint;
  }

  protected function logger()
  {
    return Log::channel('smartcontract');
  }

  protected function request($method, $endpoint, $args)
  {
    $this->logger()->debug('-------- REQUEST START -----------');

    $this->logger()->debug('Headers: ', $headers = $this->headers());

    $client = new Client([
      'headers' => $headers,
    ]);
    $options = [
      "args" => $args,
      "from" => config('smartcontract.api.from'),
      "signer" => config('smartcontract.api.signer'),
      "signAndSubmit" => true
    ];
    $this->logger()->debug('Options: ', $options);

    try {
      $response = $client
        ->request($method, $this->callUrl($endpoint), ['json' => $options])
        ->getBody()
        ->getContents();

      $this->log($method, $endpoint, $options, $response);

      $response = json_decode($response, true);
      return $response;
    }catch (\Exception $e) {
      $this->logger()->debug($e->getMessage());
      $this->log($method, $endpoint, $args, null);

      return $e->getMessage();
    }
  }

  protected function log($method, $endpoint, $parameters, $response)
  {
    $this->logger()->debug('Time: ' . now());
    $this->logger()->debug('URL: ' . $this->callUrl($endpoint));
    $this->logger()->debug('Parameters: ', $parameters);
    $this->logger()->debug('Method: ' . $method);
    $this->logger()->debug('Response: ' . $response);
    $this->logger()->debug('--------- REQUEST END ------------');
  }

}
