<?php

namespace App\Observers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\Cache;

class MenuObserver
{
  /**
   * Handle the Menu "created" event.
   */
  public function created(Menu $menu): void
  {
    $this->invalidate($menu);
  }

  /**
   * Handle the Menu "updated" event.
   */
  public function updated(Menu $menu): void
  {
    $this->invalidate($menu);
  }

  /**
   * Handle the Menu "deleted" event.
   */
  public function deleted(Menu $menu): void
  {
    $this->invalidate($menu);
  }

  /**
   * Clear relevant menu cache.
   */
  protected function invalidate(Menu $menu): void
  {
    Menu::bumpCacheVersion();
  }
}
