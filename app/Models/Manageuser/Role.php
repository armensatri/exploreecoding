<?php

namespace App\Models\Manageuser;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasSluggable,
  HasSearchable,
  HasCacheVersion,
};

use App\Models\Managemenu\{
  Menu,
  Submenu
};

use App\Models\Manageuser\{
  User,
  Permission
};

class Role extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasSluggable;

  protected $table = 'roles';

  protected $fillable = [
    'sr',
    'name',
    'slug',
    'bg',
    'text',
    'description',
  ];

  protected $sFields = [
    'name'
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function users()
  {
    return $this->hasMany(User::class);
  }

  public function menus()
  {
    return $this->belongsToMany(
      Menu::class,
      'role_has_menu',
      'role_id',
      'menu_id'
    );
  }

  public function submenus()
  {
    return $this->belongsToMany(
      Submenu::class,
      'role_has_submenu',
      'role_id',
      'submenu_id'
    );
  }

  public function permissions()
  {
    return $this->belongsToMany(
      Permission::class,
      'role_has_permission',
      'role_id',
      'permission_id'
    );
  }
}
