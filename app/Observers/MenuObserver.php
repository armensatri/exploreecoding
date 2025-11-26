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
    $this->clearMenuCache();
  }

  /**
   * Handle the Menu "updated" event.
   */
  public function updated(Menu $menu): void
  {
    $this->clearMenuCache($menu->id);
  }

  /**
   * Handle the Menu "deleted" event.
   */
  public function deleted(Menu $menu): void
  {
    $this->clearMenuCache($menu->id);
  }

  /**
   * Clear relevant menu cache.
   */
  protected function clearMenuCache(?int $menuId = null): void
  {
    // Fallback: clear the default index key (may not clear all filtered variants)
    Cache::forget('menus.index');

    if ($menuId) {
      Cache::forget('menus.show.' . $menuId);
    }
  }
}
