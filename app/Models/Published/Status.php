<?php

namespace App\Models\Published;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasSluggable,
  HasRandomUrl,
  HasSearchable,
  HasCacheVersion,
};

use App\Models\Programming\{
  Path,
  Roadmap,
  Playlist,
  Post,
};

class Status extends Model
{
  use HasCacheVersion;
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

  public function paths()
  {
    return $this->hasMany(Path::class);
  }

  public function roadmaps()
  {
    return $this->hasMany(Roadmap::class);
  }

  public function playlists()
  {
    return $this->hasMany(Playlist::class);
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
