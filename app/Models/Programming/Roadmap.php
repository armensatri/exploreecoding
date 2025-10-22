<?php

namespace App\Models\Programming;

use App\Models\Published\Status;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
  HasSluggable,
};

use App\Models\Programming\{
  Path,
  Playlist
};

class Roadmap extends Model
{
  use HasRandomUrl, HasSearchable, HasSluggable;

  protected $table = 'roadmaps';

  protected $fillable = [
    'status_id',
    'path_id',
    'sr',
    'name',
    'slug',
    'description',
    'image',
    'url'
  ];

  protected $sFields = [
    'name'
  ];

  protected $sRelations = [
    'path' => 'name'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function path()
  {
    return $this->belongsTo(Path::class);
  }

  public function playlists()
  {
    return $this->hasMany(Playlist::class);
  }
}
