<?php

namespace App\Observers;

use App\Models\Published\Status;
use Illuminate\Support\Facades\Cache;

use App\Models\Manageuser\{
  User,
  Role,
  Permission
};

use App\Models\Managemenu\{
  Menu,
  Submenu,
  Explore,
  Navigation
};

use App\Models\Programming\{
  Path,
  Roadmap,
  Playlist,
  Post
};

class DataSummaryObserver
{
  /**
   * Clear dashboard summary cache.
   */
  protected function clearDataSummaryCache(): void
  {
    Cache::forget('data.index.summary');
  }

  public function created($model): void
  {
    $this->clearDataSummaryCache();
  }

  public function updated($model): void
  {
    $this->clearDataSummaryCache();
  }

  public function deleted($model): void
  {
    $this->clearDataSummaryCache();
  }
}
