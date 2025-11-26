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
    $this->clearUserCache();
  }

  /**
   * Handle the User "updated" event.
   */
  public function updated(User $user): void
  {
    $this->clearUserCache($user->id);
  }

  /**
   * Handle the User "deleted" event.
   */
  public function deleted(User $user): void
  {
    $this->clearUserCache($user->id);
  }

  /**
   * Clear relevant user cache.
   */
  protected function clearUserCache(?int $userId = null): void
  {
    // If using Redis or Memcached, you can use Cache::keys. For file cache, must clear known keys only.
    // Fallback: clear the default index key (may not clear all filtered variants)
    // Limitation: If using file or array cache, cannot clear all filtered index keys
    Cache::forget('users.index');

    if ($userId) {
      Cache::forget('users.show.' . $userId);
      Cache::forget('personal.user.' . $userId);
      Cache::forget('profile.user.' . $userId);
      Cache::forget('creator.user.' . $userId);
      Cache::forget('member.user.' . $userId);
      Cache::forget('owner.user.' . $userId);
      Cache::forget('superadmin.user.' . $userId);
    }
  }
}
