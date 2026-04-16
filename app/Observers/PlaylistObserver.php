<?php

namespace App\Observers;

use App\Models\Programming\Playlist;
use Illuminate\Support\Facades\Cache;

class PlaylistObserver
{
  /**
   * Handle the Playlist "created" event.
   */
  public function created(Playlist $playlist): void
  {
    $this->invalidate($playlist);
  }

  /**
   * Handle the Playlist "updated" event.
   */
  public function updated(Playlist $playlist): void
  {
    $this->invalidate($playlist);
  }

  /**
   * Handle the Playlist "deleted" event.
   */
  public function deleted(Playlist $playlist): void
  {
    $this->invalidate($playlist);
  }

  /**
   * Clear relevant playlist cache.
   */
  protected function invalidate(Playlist $playlist): void
  {
    Playlist::bumpCacheVersion();
  }
}
