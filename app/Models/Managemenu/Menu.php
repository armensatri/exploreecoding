<?php

namespace App\Models\Managemenu;

use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasSluggable,
  HasSearchable,
  HasCacheVersion,
};

class Menu extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasSluggable;

  protected $table = 'menus';

  protected $fillable = [
    'sm',
    'name',
    'slug',
    'description',
  ];

  protected $sFields = [
    'name',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function submenus()
  {
    return $this->hasMany(Submenu::class);
  }

  public function roles()
  {
    return $this->belongsToMany(
      Role::class,
      'role_has_menu',
      'menu_id',
      'role_id'
    );
  }
}
