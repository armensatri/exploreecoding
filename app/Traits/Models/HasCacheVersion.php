<?php

namespace App\Traits\Models;

use Illuminate\Support\Facades\Cache;

trait HasCacheVersion
{
  /**
   * Unique cache version key per model
   */
  protected static function cacheVersionKey(): string
  {
    return static::class . '.cache.version';
  }

  /**
   * Get current cache version
   */
  public static function cacheVersion(): string
  {
    return Cache::rememberForever(
      static::cacheVersionKey(),
      fn() => (string) now()->timestamp
    );
  }

  /**
   * Bump cache version (invalidate all index cache)
   */
  public static function bumpCacheVersion(): void
  {
    Cache::forever(
      static::cacheVersionKey(),
      (string) now()->timestamp
    );
  }
}
