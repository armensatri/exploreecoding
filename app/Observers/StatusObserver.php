<?php

namespace App\Observers;

use App\Models\Published\Status;
use Illuminate\Support\Facades\Cache;

class StatusObserver
{
  /**
   * Handle the Status "created" event.
   */
  public function created(Status $status): void
  {
    $this->invalidate($status);
  }

  /**
   * Handle the Status "updated" event.
   */
  public function updated(Status $status): void
  {
    $this->invalidate($status);
  }

  /**
   * Handle the Status "deleted" event.
   */
  public function deleted(Status $status): void
  {
    $this->invalidate($status);
  }

  /**
   * Clear relevant status cache.
   */
  protected function invalidate(Status $status): void
  {
    Status::bumpCacheVersion();
  }
}
