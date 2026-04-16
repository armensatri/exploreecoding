<?php

namespace App\Observers;

use App\Models\Programming\Roadmap;
use Illuminate\Support\Facades\Cache;

class RoadmapObserver
{
  /**
   * Handle the Roadmap "created" event.
   */
  public function created(Roadmap $roadmap): void
  {
    $this->invalidate($roadmap);
  }

  /**
   * Handle the Roadmap "updated" event.
   */
  public function updated(Roadmap $roadmap): void
  {
    $this->invalidate($roadmap);
  }

  /**
   * Handle the Roadmap "deleted" event.
   */
  public function deleted(Roadmap $roadmap): void
  {
    $this->invalidate($roadmap);
  }

  /**
   * Clear relevant roadmap cache.
   */
  protected function invalidate(Roadmap $roadmap): void
  {
    Roadmap::bumpCacheVersion();
  }
}
