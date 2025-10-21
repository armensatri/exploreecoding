<?php

namespace App\Models\Managemenu;

use App\Models\Manageuser\Role;
use App\Models\Managemenu\Submenu;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSluggable,
  HasSearchable
};

class Menu extends Model
{
  use HasRandomUrl, HasSearchable, HasSluggable;

  protected $table = 'menus';

  protected $fillable = [
    'sm',
    'name',
    'slug',
    'description',
    'url'
  ];

  protected $sFields = [
    'name',
  ];

  public function getRouteKeyName()
  {
    return 'url';
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
