<?php 

namespace Mateodioev\CoinbaseCommerce;

class Webhook
{
  /**
   * @param string $payload Raw request payload
   * @param string $sigHeader SHA256 HMAC signature of the raw request payload
   * @param string $secret String Webhook Secret Key
   */
  public function verifySignature(string $payload, string $sigHeader, $secret): bool
  {
    $compute = \hash_hmac('sha256', $payload, $secret);

    return Utils::hashEqual($sigHeader, $secret);
  }
}
