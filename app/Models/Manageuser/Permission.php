<?php

namespace App\Models\Manageuser;

use App\Models\Manageuser\Role;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSluggable,
  HasSearchable,
  HasCacheVersion,
};

class Permission extends Model
{
  use HasCacheVersion;
  use HasRandomUrl, HasSearchable, HasSluggable;

  protected $table = 'permissions';

  protected $fillable = [
    'name',
    'slug',
    'guard_name',
    'url'
  ];

  protected $sFields = [
    'name',
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function roles()
  {
    return $this->belongsToMany(
      Role::class,
      'role_has_permission',
      'role_id',
      'permission_id'
    );
  }
}
