<?php

namespace App\Observers;

use App\Models\Manageuser\Permission;
use Illuminate\Support\Facades\Cache;

class PermissionObserver
{
  /**
   * Handle the Permission "created" event.
   */
  public function created(Permission $permission): void
  {
    $this->invalidate($permission);
  }

  /**
   * Handle the Permission "updated" event.
   */
  public function updated(Permission $permission): void
  {
    $this->invalidate($permission);
  }

  /**
   * Handle the Permission "deleted" event.
   */
  public function deleted(Permission $permission): void
  {
    $this->invalidate($permission);
  }

  /**
   * Clear relevant permission cache.
   */
  protected function invalidate(Permission $permission): void
  {
    Permission::bumpCacheVersion();
  }
}
