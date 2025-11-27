<?php

namespace App\Observers;

use App\Models\Managemenu\Navigation;
use Illuminate\Support\Facades\Cache;

class NavigationObserver
{
  /**
   * Handle the Navigation "created" event.
   */
  public function created(Navigation $navigation): void
  {
    $this->clearNavigationCache();
  }

  /**
   * Handle the Navigation "updated" event.
   */
  public function updated(Navigation $navigation): void
  {
    $this->clearNavigationCache($navigation->id);
  }

  /**
   * Handle the Navigation "deleted" event.
   */
  public function deleted(Navigation $navigation): void
  {
    $this->clearNavigationCache($navigation->id);
  }

  /**
   * Clear relevant navigation cache.
   */
  protected function clearNavigationCache(?int $navigationId = null): void
  {
    Cache::forget('navigations.index');

    if ($navigationId) {
      Cache::forget('navigations.show.' . $navigationId);
    }
  }
}
