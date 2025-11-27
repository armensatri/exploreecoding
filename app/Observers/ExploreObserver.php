<?php

namespace App\Observers;

use App\Models\Managemenu\Explore;
use Illuminate\Support\Facades\Cache;

class ExploreObserver
{
  /**
   * Handle the Explore "created" event.
   */
  public function created(Explore $explore): void
  {
    $this->clearExploreCache();
  }

  /**
   * Handle the Explore "updated" event.
   */
  public function updated(Explore $explore): void
  {
    $this->clearExploreCache($explore->id);
  }

  /**
   * Handle the Explore "deleted" event.
   */
  public function deleted(Explore $explore): void
  {
    $this->clearExploreCache($explore->id);
  }

  /**
   * Clear relevant explore cache.
   */
  protected function clearExploreCache(?int $exploreId = null): void
  {
    Cache::forget('explores.index');

    if ($exploreId) {
      Cache::forget('explores.show.' . $exploreId);
    }
  }
}
