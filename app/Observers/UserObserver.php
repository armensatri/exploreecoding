<?php

namespace App\Observers;

use App\Models\Manageuser\User;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
  private function clearCache(User $user)
  {
    $keys = [
      "dashboard_owner_{$user->id}",
      "dashboard_superadmin_{$user->id}",
      "dashboard_creator_{$user->id}",
      "dashboard_member_{$user->id}",

      "account_profile_{$user->id}",
      "account_profile_edit_{$user->id}",
    ];

    foreach ($keys as $key) {
      Cache::forget($key);
    }
  }

  /**
   * Handle the User "created" event.
   */
  public function created(User $user): void
  {
    $this->clearCache($user);
  }

  /**
   * Handle the User "updated" event.
   */
  public function updated(User $user): void
  {
    $this->clearCache($user);
  }

  /**
   * Handle the User "deleted" event.
   */
  public function deleted(User $user): void
  {
    $this->clearCache($user);
  }

  /**
   * Handle the User "restored" event.
   */
  public function restored(User $user): void
  {
    //
  }

  /**
   * Handle the User "force deleted" event.
   */
  public function forceDeleted(User $user): void
  {
    //
  }
}
