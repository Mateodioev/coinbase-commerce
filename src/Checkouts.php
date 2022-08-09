<?php 

namespace Mateodioev\CoinbaseCommerce;

class Checkouts
{
  /**
   * Lists all the checkouts
   */
  public static function list()
  {
    return Client::getInstance()
      ->makeRequest('/checkouts');
  }

  /**
   * Show a single checkout
   */
  public function show(string $id)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts/' . $id);
  }

  /**
   * Create a new checkout.
   */
  public function create(array $checkoutData)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts', $checkoutData, 'POST');
  }

  /**
   * Update a checkout.
   */
  public function update(string $checkout_id, array $checkoutData)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts/' . $checkout_id, $checkoutData, 'PUT');
  }

  /**
   * Delete a checkout.
   */
  public function delete(string $checkout_id)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts/' . $checkout_id, method: 'DELETE');
  }
}
