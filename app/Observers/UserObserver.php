<?php

namespace App\Observers;

use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
  /**
   * Handle the User "created" event.
   */
  public function created(User $user): void
  {
    $this->invalidate($user);
  }

  /**
   * Handle the User "updated" event.
   */
  public function updated(User $user): void
  {
    $this->invalidate($user);
  }

  /**
   * Handle the User "deleted" event.
   */
  public function deleted(User $user): void
  {
    $this->invalidate($user);
  }

  /**
   * Clear relevant user cache.
   */
  protected function invalidate(User $user): void
  {
    User::bumpCacheVersion();
  }
}
