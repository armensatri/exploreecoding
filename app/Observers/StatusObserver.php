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
    $this->clearStatusCache();
  }

  /**
   * Handle the Status "updated" event.
   */
  public function updated(Status $status): void
  {
    $this->clearStatusCache($status->id);
  }

  /**
   * Handle the Status "deleted" event.
   */
  public function deleted(Status $status): void
  {
    $this->clearStatusCache($status->id);
  }

  /**
   * Clear relevant status cache.
   */
  protected function clearStatusCache(?int $statusId = null): void
  {
    Cache::forget('statuses.index');

    if ($statusId) {
      Cache::forget('statuses.show.' . $statusId);
    }
  }
}
