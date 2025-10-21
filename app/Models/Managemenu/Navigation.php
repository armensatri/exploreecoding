<?php

namespace App\Models\Managemenu;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
  HasSluggable,
};

class Navigation extends Model
{
  use HasSluggable, HasRandomUrl, HasSearchable;

  protected $table = 'navigations';

  protected $fillable = [
    'sn',
    'name',
    'slug',
    'routee',
    'button_name',
    'description',
    'url'
  ];

  protected $sFields = [
    'name'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }
}
