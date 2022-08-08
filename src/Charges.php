<?php 

namespace Mateodioev\CoinbaseCommerce;

class Charges
{
  public function list()
  {
    return Client::getInstance()->makeRequest('/charges');
  }

  public function show(string $charge_id)
  {
    return Client::getInstance()->makeRequest('/charges/' . $charge_id);
  }

  public function create(array $chargeData)
  {
    return Client::getInstance()->makeRequest('/charges', $chargeData, 'POST');
  }

  public function cancel(string $charge_id)
  {
    return Client::getInstance()->makeRequest('/charges/' . $charge_id, method: 'POST');
  }

  public function resolve(string $charge_id)
  {
    return Client::getInstance()->makeRequest('/charges/' . $charge_id, method: 'POST');
  }
}
