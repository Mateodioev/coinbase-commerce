<?php 

namespace Mateodioev\CoinbaseCommerce;

class Invoices
{
  public function list()
  {
    return Client::getInstance()->makeRequest('/invoices');
  }

  public function show(string $id)
  {
    return Client::getInstance()->makeRequest('/invoices/' . $id);
  }

  public function create(array $invoiceData)
  {
    return Client::getInstance()->makeRequest('/invoices/', $invoiceData, 'POST');
  }

  public function void(string $id)
  {
    return Client::getInstance()->makeRequest('/invoices/' . $id, method: 'POST');
  }

  public function resolve(string $id)
  {
    return Client::getInstance()->makeRequest('/invoices/' . $id, method: 'POST');
  }
}
