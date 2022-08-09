<?php 

namespace Mateodioev\CoinbaseCommerce;

class Events
{
  /**
   * Lists all the events
   */
  public function list()
  {
    return Client::getInstance()
      ->makeRequest('/events');
  }

  /**
   * Retrieves the details of an event. 
   * Supply the unique identifier of the event, which you might have received in a webhook.
   */
  public function show(string $event_id)
  {
    return Client::getInstance()
      ->makeRequest('/events/' . $event_id);
  }
}
