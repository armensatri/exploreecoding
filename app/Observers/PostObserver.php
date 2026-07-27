<?php

namespace App\Observers;

use App\Models\Programming\Post;

class PostObserver
{
  /**
   * Handle the Post "created" event.
   */
  public function created(Post $post): void
  {
    $this->invalidate($post);
  }

  /**
   * Handle the Post "updated" event.
   */
  public function updated(Post $post): void
  {
    $this->invalidate($post);
  }

  /**
   * Handle the Post "deleted" event.
   */
  public function deleted(Post $post): void
  {
    $this->invalidate($post);
  }

  /**
   * Clear relevant post cache.
   */
  protected function invalidate(Post $post): void
  {
    Post::bumpCacheVersion();
  }
}
