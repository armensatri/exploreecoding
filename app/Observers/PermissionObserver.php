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
    $this->clearPermissionCache();
  }

  /**
   * Handle the Permission "updated" event.
   */
  public function updated(Permission $permission): void
  {
    $this->clearPermissionCache($permission->id);
  }

  /**
   * Handle the Permission "deleted" event.
   */
  public function deleted(Permission $permission): void
  {
    $this->clearPermissionCache($permission->id);
  }

  /**
   * Clear relevant permission cache.
   */
  protected function clearPermissionCache(?int $permissionId = null): void
  {
    Cache::forget('permissions.index');

    if ($permissionId) {
      Cache::forget('permissions.show.' . $permissionId);
    }
  }
}
