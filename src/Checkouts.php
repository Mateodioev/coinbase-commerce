<?php 

namespace Mateodioev\CoinbaseCommerce;

class Checkouts
{
  /**
   * Lists all the checkouts
   * 
   * @see https://docs.cloud.coinbase.com/commerce/reference/getcheckouts
   */
  public static function list()
  {
    return Client::getInstance()
      ->makeRequest('/checkouts');
  }

  /**
   * Show a single checkout
   * 
   * @param string $id ID of checkout to be shown
   * @see https://docs.cloud.coinbase.com/commerce/reference/getcheckout
   */
  public function show(string $id)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts/' . $id);
  }

  /**
   * Create a new checkout.
   * 
   * @param array $checkoutData Array or params to create new checkout
   *  - name - string
   *  - description - description
   *  - requested_info - array of strings
   *  - pricing_type - string
   *  - local_price - object
   * @see https://docs.cloud.coinbase.com/commerce/reference/createcheckout
   */
  public function create(array $checkoutData)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts', $checkoutData, 'POST');
  }

  /**
   * Update a checkout.
   * 
   * @param string $checkoutId ID of checkout to be updated
   * @param array $checkoutData Params to update
   *  - name - string
   *  - description - string
   *  - requested_info - array of strings
   *  - local_price - object
   * @see https://docs.cloud.coinbase.com/commerce/reference/updatecheckout
   */
  public function update(string $checkoutId, array $checkoutData)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts/' . $checkoutId, $checkoutData, 'PUT');
  }

  /**
   * Delete a checkout.
   * 
   * @param string $checkoutId ID of checkout to be deleted
   * see https://docs.cloud.coinbase.com/commerce/reference/deletecheckout
   */
  public function delete(string $checkoutId)
  {
    return Client::getInstance()
      ->makeRequest('/checkouts/' . $checkoutId, method: 'DELETE');
  }
}
