<?php

namespace App\Models\Managemenu;

use App\Models\Manageuser\Role;
use App\Models\Managemenu\Menu;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSluggable,
  HasSearchable
};

class Submenu extends Model
{
  use HasRandomUrl, HasSearchable, HasSluggable;

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
    'url'
  ];

  protected $sFields = [
    'name',
  ];

  protected $sRelations = [
    'menu' => 'name',
  ];

  public function getRouteKeyName()
  {
    return 'url';
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
