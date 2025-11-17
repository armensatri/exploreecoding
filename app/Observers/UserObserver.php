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
    //
  }

  /**
   * Handle the User "updated" event.
   */
  public function updated(User $user): void
  {
    Cache::forget("dashboard_owner_{$user->id}");
    Cache::forget("dashboard_superadmin_{$user->id}");
    Cache::forget("dashboard_creator_{$user->id}");
    Cache::forget("dashboard_member_{$user->id}");

    Cache::forget("account_profile_{$user->id}");
    Cache::forget("account_profile_edit_{$user->id}");
  }

  /**
   * Handle the User "deleted" event.
   */
  public function deleted(User $user): void
  {
    Cache::forget("dashboard_owner_{$user->id}");
    Cache::forget("dashboard_superadmin_{$user->id}");
    Cache::forget("dashboard_creator_{$user->id}");
    Cache::forget("dashboard_member_{$user->id}");

    Cache::forget("account_profile_{$user->id}");
    Cache::forget("account_profile_edit_{$user->id}");
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
