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
    $this->clearPathCache();
  }

  /**
   * Handle the Path "updated" event.
   */
  public function updated(Path $path): void
  {
    $this->clearPathCache($path->id);
  }

  /**
   * Handle the Path "deleted" event.
   */
  public function deleted(Path $path): void
  {
    $this->clearPathCache($path->id);
  }

  /**
   * Clear relevant path cache.
   */
  protected function clearPathCache(?int $pathId = null): void
  {
    Cache::forget('paths.index');

    if ($pathId) {
      Cache::forget('paths.show.' . $pathId);
    }
  }
}
