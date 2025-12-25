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
    $this->invalidate($submenu);
  }

  /**
   * Handle the Submenu "updated" event.
   */
  public function updated(Submenu $submenu): void
  {
    $this->invalidate($submenu);
  }

  /**
   * Handle the Submenu "deleted" event.
   */
  public function deleted(Submenu $submenu): void
  {
    $this->invalidate($submenu);
  }

  /**
   * Clear relevant submenu cache.
   */
  protected function invalidate(Submenu $submenu): void
  {
    Submenu::bumpCacheVersion();
  }
}
