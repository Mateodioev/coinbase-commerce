<?php 

namespace Mateodioev\CoinbaseCommerce;

class Utils
{
  public static function hashEqual(string $str1, string $str2): bool
  {
    if (function_exists('hash_equals')) {
      return \hash_equals($str1, $str2);
    }

    if (strlen($str1) != strlen($str2)) {
      return false;
    } else {
      $res = $str1 ^ $str2;
      $ret = 0;

      for ($i = strlen($res) - 1; $i >= 0; $i--) {
        $ret |= ord($res[$i]);
      }
      return !$ret;
    }
  }
}
