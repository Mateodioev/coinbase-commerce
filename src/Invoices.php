<?php 

namespace Mateodioev\CoinbaseCommerce;

class Invoices
{
  /**
   * Lists all the invoices
   * 
   * @see https://docs.cloud.coinbase.com/commerce/reference/getinvoices
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
   * @param string $id Code or ID of invoice to be shown
   * @see https://docs.cloud.coinbase.com/commerce/reference/getinvoice
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
   * 
   * @param array $invoiceData
   *  - business_name - string
   *  - customer_email - string
   *  - customer_name - string
   *  - memo - string
   *  - local_price - object
   * @see https://docs.cloud.coinbase.com/commerce/reference/createinvoice
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
   * @param string $id Code or ID of invoice to be voided
   * @see https://docs.cloud.coinbase.com/commerce/reference/voidinvoice
   */
  public function void(string $id)
  {
    return Client::getInstance()
      ->makeRequest('/invoices/' . $id . '/void', method: 'PUT');
  }

  /**
   * Resolve an invoice that has been previously marked as unresolved.
   * Supply the unique invoice code that was returned when the invoice was created.
   *
   * @param string $id Code or ID of invoice to be resolved
   * @see https://docs.cloud.coinbase.com/commerce/reference/resolveinvoice
   */
  public function resolve(string $id)
  {
    return Client::getInstance()
      ->makeRequest('/invoices/' . $id . '/resolve', method: 'PUT');
  }
}
