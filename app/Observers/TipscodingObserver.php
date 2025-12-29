<?php

namespace App\Observers;

use App\Models\Tipscoding\Tipscoding;
use Illuminate\Support\Facades\Cache;

class TipscodingObserver
{
  /**
   * Handle the Tipscoding "created" event.
   */
  public function created(Tipscoding $tipscoding): void
  {
    $this->invalidate($tipscoding);
  }

  /**
   * Handle the Tipscoding "updated" event.
   */
  public function updated(Tipscoding $tipscoding): void
  {
    $this->invalidate($tipscoding);
  }

  /**
   * Handle the Tipscoding "deleted" event.
   */
  public function deleted(Tipscoding $tipscoding): void
  {
    $this->invalidate($tipscoding);
  }

  /**
   * Clear relevant tipscoding cache.
   */
  protected function invalidate(Tipscoding $role): void
  {
    Tipscoding::bumpCacheVersion();
  }
}
