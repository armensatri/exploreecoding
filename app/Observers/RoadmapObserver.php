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
    $this->clearRoadmapCache();
  }

  /**
   * Handle the Roadmap "updated" event.
   */
  public function updated(Roadmap $roadmap): void
  {
    $this->clearRoadmapCache($roadmap->id);
  }

  /**
   * Handle the Roadmap "deleted" event.
   */
  public function deleted(Roadmap $roadmap): void
  {
    $this->clearRoadmapCache($roadmap->id);
  }

  /**
   * Clear relevant roadmap cache.
   */
  protected function clearRoadmapCache(?int $roadmapId = null): void
  {
    Cache::forget('roadmaps.index');

    if ($roadmapId) {
      Cache::forget('roadmaps.show.' . $roadmapId);
    }
  }
}
