<?php 

namespace Mateodioev\CoinbaseCommerce;

use Exception;
use Mateodioev\Request\Request;
use stdClass;
use function json_encode;

class Client
{
  private static $instance;
  private $http_client;

  private array $params;
  private const API_URL = 'https://api.commerce.coinbase.com';

  public static function init(string $api_key, string $api_version = '2018-03-22', int $timeout = 3): void
  {
    if (!self::$instance) {
      self::$instance = new self;
    }

    self::$instance->setApiKey($api_key)
      ->setApiVersion($api_version)
      ->setTimeout($timeout);
  }

  public function setParam(string $key, $value): Client
  {
    $this->params[$key] = $value;
    return $this;
  }

  public function getParam(string $key, $default = null)
  {
    return $this->params[$key] ?? $default;
  }

  public function setApiKey(string $key): Client
  {
    return $this->setParam('X-CC-Api-Key', $key);
  }

  public function setApiVersion(string $version): Client
  {
    return $this->setParam('X-CC-Version', $version);
  }

  public function setTimeout(int $timeout): Client
  {
    return $this->setParam('timeout', $timeout);
  }

  public function makeRequest(string $endpoint, $body = null, string $method = 'GET'): stdClass
  {
    $req = $this->getHttpClient();
    $req->init(self::API_URL, [
      CURLOPT_HTTPHEADER => [
        'X-CC-Api-Key: ' . $this->getParam('X-CC-Api-Key'),
        'X-CC-Version: ' . $this->getParam('X-CC-Version'),
        'Content-Type: application/json',
        'Accept: application/json',
        'User-Agent: Coinbase Commerce'
      ],
      CURLOPT_TIMEOUT => $this->getParam('timeout')
    ])->setMethod($method);
    
    if ($body) {
      $req->addOpt(CURLOPT_POSTFIELDS, json_encode($body));
    }

    $res = $req->Run($endpoint);
    $res->toJson(true);

    return $res->getBody();
  }

  public function getHttpClient(): Request
  {
    if (!isset($this->http_client)) {
      $this->http_client = new Request;
    }
    return $this->http_client;
  }

  public static function getInstance(): Client
  {
    if (!self::$instance) {
      throw new Exception('Init client first');
    }
  
    return self::$instance;
  }
}
