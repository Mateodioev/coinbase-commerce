<?php 

namespace Mateodioev\CoinbaseCommerce;

class Invoices
{
  /**
   * Lists all the invoices
   */
  public function list()
  {
    return Client::getInstance()
      ->makeRequest('/invoices');
  }

  /**
   * Retrieves the details of an invoice that has been previously created. 
   * Supply the unique short code that was returned when the invoice was created. 
   * This information is also returned when an invoice is first created.
   *
   * @param string $id Invoice code or id
   */
  public function show(string $id)
  {
    return Client::getInstance()
      ->makeRequest('/invoices/' . $id);
  }

  /**
   * To send an invoice in cryptocurrency, you need to create an invoice object and provide the user 
   * with the hosted url where they will be able to pay. Once an invoice is viewed at the hosted url, 
   * a charge will be generated on the invoice.
   */
  public function create(array $invoiceData)
  {
    return Client::getInstance()
      ->makeRequest('/invoices/', $invoiceData, 'POST');
  }

  /**
   * Voids an invoice that has been previously created. 
   * Supply the unique invoice code that was returned when the invoice was created.
   *
   * @param string $id Invoice code or id
   */
  public function void(string $id)
  {
    return Client::getInstance()
      ->makeRequest('/invoices/' . $id . '/void', method: 'POST');
  }

  public function resolve(string $id)
  {
    return Client::getInstance()
      ->makeRequest('/invoices/' . $id . '/resolve', method: 'POST');
  }
}
