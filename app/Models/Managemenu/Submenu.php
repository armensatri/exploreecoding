<?php

namespace App\Models\Managemenu;

use App\Models\Manageuser\Role;
use App\Models\Managemenu\Menu;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasSluggable,
  HasSearchable,
  HasCacheVersion,
};

class Submenu extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasSluggable;

  protected $table = 'submenus';

  protected $fillable = [
    'menu_id',
    'ssm',
    'name',
    'slug',
    'route',
    'active',
    'routename',
    'description',
  ];

  protected $sFields = [
    'name',
  ];

  protected $sRelations = [
    'menu' => 'name',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function menu()
  {
    return $this->belongsTo(Menu::class);
  }

  public function roles()
  {
    return $this->belongsToMany(
      Role::class,
      'role_has_submenu',
      'submenu_id',
      'role_id',
    );
  }
}
