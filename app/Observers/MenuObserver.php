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
    Cache::forget('menus_index_' . implode(
      '_',
      request()->all()
    ));
  }

  /**
   * Handle the Menu "updated" event.
   */
  public function updated(Menu $menu): void
  {
    Cache::forget('menus_index_' . implode(
      '_',
      request()->all()
    ));

    Cache::forget("menu_show_{$menu->id}");
  }

  /**
   * Handle the Menu "deleted" event.
   */
  public function deleted(Menu $menu): void
  {
    Cache::forget('menus_index_' . implode(
      '_',
      request()->all()
    ));

    Cache::forget("menu_show_{$menu->id}");
  }

  /**
   * Handle the Menu "restored" event.
   */
  public function restored(Menu $menu): void
  {
    //
  }

  /**
   * Handle the Menu "force deleted" event.
   */
  public function forceDeleted(Menu $menu): void
  {
    //
  }
}
