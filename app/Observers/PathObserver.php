<?php

namespace App\Observers;

use App\Models\Programming\Path;
use Illuminate\Support\Facades\Cache;

class PathObserver
{
  /**
   * Handle the Path "created" event.
   */
  public function created(Path $path): void
  {
    $this->invalidate($path);
  }

  /**
   * Handle the Path "updated" event.
   */
  public function updated(Path $path): void
  {
    $this->invalidate($path);
  }

  /**
   * Handle the Path "deleted" event.
   */
  public function deleted(Path $path): void
  {
    $this->invalidate($path);
  }

  /**
   * Clear relevant path cache.
   */
  protected function invalidate(Path $path): void
  {
    Path::bumpCacheVersion();
  }
}
