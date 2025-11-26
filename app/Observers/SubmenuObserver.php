<?php

namespace App\Observers;

use App\Models\Managemenu\Submenu;
use Illuminate\Support\Facades\Cache;

class SubmenuObserver
{
  /**
   * Handle the Submenu "created" event.
   */
  public function created(Submenu $submenu): void
  {
    $this->clearSubmenuCache();
  }

  /**
   * Handle the Submenu "updated" event.
   */
  public function updated(Submenu $submenu): void
  {
    $this->clearSubmenuCache($submenu->id);
  }

  /**
   * Handle the Submenu "deleted" event.
   */
  public function deleted(Submenu $submenu): void
  {
    $this->clearSubmenuCache($submenu->id);
  }

  /**
   * Clear relevant submenu cache.
   */
  protected function clearSubmenuCache(?int $submenuId = null): void
  {
    // Fallback: clear the default index key (may not clear all filtered variants)
    Cache::forget('submenus.index');

    if ($submenuId) {
      Cache::forget('submenus.show.' . $submenuId);
    }
  }
}
