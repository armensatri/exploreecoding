<?php

namespace App\Helpers;

class FormatNumber
{
  public static function short(int|float|null $number): string
  {
    $number ??= 0;

    return match (true) {
      $number >= 1_000_000_000 => self::format(
        $number / 1_000_000_000
      ) . ' M',
      $number >= 1_000_000 => self::format($number / 1_000_000) . ' jt',
      $number >= 1_000 => self::format($number / 1_000) . ' rb',
      default => (string) $number,
    };
  }

  private static function format(float $number): string
  {
    return fmod($number, 1) === 0.0
      ? (string) (int) $number
      : number_format($number, 1);
  }
}
