<?php

namespace App\Models\Published;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasSluggable,
  HasRandomUrl,
  HasSearchable
};

class Status extends Model
{
  use HasRandomUrl, HasSearchable, HasSluggable;

  protected $table = 'statuses';

  protected $fillable = [
    'ss',
    'name',
    'slug',
    'bg',
    'text',
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
}
