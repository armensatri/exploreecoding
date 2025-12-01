<?php

namespace App\Observers;

use App\Models\Programming\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
  /**
   * Handle the Post "created" event.
   */
  public function created(Post $post): void
  {
    $this->clearPostCache();
  }

  /**
   * Handle the Post "updated" event.
   */
  public function updated(Post $post): void
  {
    $this->clearPostCache($post->id);
  }

  /**
   * Handle the Post "deleted" event.
   */
  public function deleted(Post $post): void
  {
    $this->clearPostCache($post->id);
  }

  /**
   * Clear relevant post cache.
   */
  protected function clearPostCache(?int $postId = null): void
  {
    Cache::forget('posts.index.ids');

    if ($postId) {
      Cache::forget('posts.show.' . $postId);
    }
  }
}
