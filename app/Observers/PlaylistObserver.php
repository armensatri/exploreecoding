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
    $this->clearPlaylistCache();
  }

  /**
   * Handle the Playlist "updated" event.
   */
  public function updated(Playlist $playlist): void
  {
    $this->clearPlaylistCache($playlist->id);
  }

  /**
   * Handle the Playlist "deleted" event.
   */
  public function deleted(Playlist $playlist): void
  {
    $this->clearPlaylistCache($playlist->id);
  }

  /**
   * Clear relevant playlist cache.
   */
  protected function clearPlaylistCache(?int $playlistId = null): void
  {
    Cache::forget('playlists.index.ids');

    if ($playlistId) {
      Cache::forget('playlists.show.' . $playlistId);
    }
  }
}
