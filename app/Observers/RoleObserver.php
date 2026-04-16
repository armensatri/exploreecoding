<?php

namespace App\Observers;

use App\Models\Manageuser\Role;
use Illuminate\Support\Facades\Cache;

class RoleObserver
{
  /**
   * Handle the Role "created" event.
   */
  public function created(Role $role): void
  {
    $this->invalidate($role);
  }

  /**
   * Handle the Role "updated" event.
   */
  public function updated(Role $role): void
  {
    $this->invalidate($role);
  }

  /**
   * Handle the Role "deleted" event.
   */
  public function deleted(Role $role): void
  {
    $this->invalidate($role);
  }

  /**
   * Clear relevant role cache.
   */
  protected function invalidate(Role $role): void
  {
    Role::bumpCacheVersion();
  }
}
