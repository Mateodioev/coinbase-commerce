<?php 

namespace Mateodioev\CoinbaseCommerce;

class Charges
{
  /**
   * Lists all the charges
   * 
   * @see https://docs.cloud.coinbase.com/commerce/reference/getcharges
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
   * 
   * @param string $charge_id Code or ID of charge to be shown
   * @see https://docs.cloud.coinbase.com/commerce/reference/getcharge
   */
  public function show(string $chargeId)
  {
    return Client::getInstance()
      ->makeRequest('/charges/' . $chargeId);
  }

  /**
   * To get paid in cryptocurrency, you need to create a charge object and provide the user with a
   * cryptocurrency address to which they must send cryptocurrency.
   * Once a charge is created a customer must broadcast a payment to the blockchain before the charge expires.
   * 
   * @param array $chargeData Array or params to create new charge
   *  - name - string
   *  - description - string
   *  - pricing_type - string
   *  - local_price - object
   *  - metadata - object
   *  - redirect_url - string (optional)
   *  - cancel_url - string (optional)
   * 
   * @see https://docs.cloud.coinbase.com/commerce/reference/createcharge
   */
  public function create(array $chargeData)
  {
    return Client::getInstance()
      ->makeRequest('/charges', $chargeData, 'POST');
  }

  /**
   * Cancels a charge that has been previously created.
   * Supply the unique charge code that was returned when the charge was created.
   * 
   * @param string $chargeId Code or ID of charge to be canceled
   * 
   * @see https://docs.cloud.coinbase.com/commerce/reference/cancelcharge
   */
  public function cancel(string $chargeId)
  {
    return Client::getInstance()
      ->makeRequest('/charges/' . $chargeId . '/cancel ', method: 'POST');
  }

  /**
   * Resolve a charge that has been previously marked as unresolved. 
   * Supply the unique charge code that was returned when the charge was created.
   * 
   * @param string $chargeId Code or ID of charge to be resolved
   */
  public function resolve(string $chargeId)
  {
    return Client::getInstance()
      ->makeRequest('/charges/' . $chargeId . '/resolve', method: 'POST');
  }
}
