<?php 

namespace Mateodioev\CoinbaseCommerce;

class Events
{
  /**
   * Lists all the events
   * 
   * @see https://docs.cloud.coinbase.com/commerce/reference/getevents
   */
  public function list()
  {
    return Client::getInstance()
      ->makeRequest('/events');
  }

  /**
   * Retrieves the details of an event. 
   * Supply the unique identifier of the event, which you might have received in a webhook.
   * 
   * @param string $eventId ID of event to be shown
   * @see https://docs.cloud.coinbase.com/commerce/reference/getevent
   */
  public function show(string $eventId)
  {
    return Client::getInstance()
      ->makeRequest('/events/' . $eventId);
  }
}
