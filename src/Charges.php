<?php 

namespace Mateodioev\CoinbaseCommerce;

class Charges
{
  /**
   * Lists all the charges
   */
  public function list()
  {
    return Client::getInstance()
      ->makeRequest('/charges');
  }

  /**
   * Retrieves the details of a charge that has been previously created.
   * Supply the unique charge code that was returned when the charge was created.
   * This information is also returned when a charge is first created.
   */
  public function show(string $charge_id)
  {
    return Client::getInstance()
      ->makeRequest('/charges/' . $charge_id);
  }

  /**
   * To get paid in cryptocurrency, you need to create a charge object and provide the user with a
   * cryptocurrency address to which they must send cryptocurrency.
   * Once a charge is created a customer must broadcast a payment to the blockchain before the charge expires.
   */
  public function create(array $chargeData)
  {
    return Client::getInstance()
      ->makeRequest('/charges', $chargeData, 'POST');
  }

  /**
   * Cancels a charge that has been previously created.
   * Supply the unique charge code that was returned when the charge was created.
   */
  public function cancel(string $charge_id)
  {
    return Client::getInstance()
      ->makeRequest('/charges/' . $charge_id . '/cancel ', method: 'POST');
  }

  /**
   * Resolve a charge that has been previously marked as unresolved. 
   * Supply the unique charge code that was returned when the charge was created.
   */
  public function resolve(string $charge_id)
  {
    return Client::getInstance()
      ->makeRequest('/charges/' . $charge_id . '/resolve', method: 'POST');
  }
}
