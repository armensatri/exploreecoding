<?php

namespace App\Models\Manageuser;

use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use App\Traits\Models\HasSluggable;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasSluggable;

  protected $table = 'permissions';

  protected $fillable = [
    'name',
    'slug',
    'guard_name',
  ];

  protected $sFields = [
    'name',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
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
