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
    $this->clearRoleCache();
  }

  /**
   * Handle the Role "updated" event.
   */
  public function updated(Role $role): void
  {
    $this->clearRoleCache($role->id);
  }

  /**
   * Handle the Role "deleted" event.
   */
  public function deleted(Role $role): void
  {
    $this->clearRoleCache($role->id);
  }

  /**
   * Clear relevant role cache.
   */
  protected function clearRoleCache(?int $roleId = null): void
  {
    // Fallback: clear the default index key (may not clear all filtered variants)
    Cache::forget('roles.index');

    if ($roleId) {
      Cache::forget('roles.show.' . $roleId);
    }
  }
}
