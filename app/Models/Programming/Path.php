<?php

namespace App\Models\Programming;

use App\Models\Published\Status;
use App\Models\Programming\Roadmap;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
};

class Path extends Model
{
  use HasRandomUrl, HasSearchable;

  protected $table = 'paths';

  protected $fillable = [
    'status_id',
    'sp',
    'name',
    'slug',
    'description',
    'image',
    'url'
  ];

  protected $sFields = [
    'name'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function roadmaps()
  {
    return $this->hasMany(Roadmap::class);
  }
}
