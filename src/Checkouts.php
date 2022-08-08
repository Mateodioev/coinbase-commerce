<?php 

namespace Mateodioev\CoinbaseCommerce;

class Checkouts
{
  public static function list()
  {
    return Client::getInstance()->makeRequest('/checkouts');
  }

  public function create(array $checkoutData)
  {
    return Client::getInstance()->makeRequest('/checkouts', $checkoutData, 'POST');
  }

  public function update(string $checkout_id, array $checkoutData)
  {
    return Client::getInstance()->makeRequest('/checkouts/' . $checkout_id, $checkoutData, 'PUT');
  }

  public function delete(string $checkout_id)
  {
    return Client::getInstance()->makeRequest('/checkouts/' . $checkout_id, method: 'DELETE');
  }
}
