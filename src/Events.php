<?php 

namespace Mateodioev\CoinbaseCommerce;

class Events
{
  public function list()
  {
    return Client::getInstance()->makeRequest('/events');
  }

  public function show(string $event_id)
  {
    return Client::getInstance()->makeRequest('/events/' . $event_id);
  }
}
