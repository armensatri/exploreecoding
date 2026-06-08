<?php

namespace App\Models\Published;

use Illuminate\Database\Eloquent\Model;

use App\Models\Programming\{
  Path,
  Roadmap,
  Playlist,
  Post
};

use App\Traits\Models\{
  HasSluggable,
  HasSearchable,
  HasCacheVersion,
};

class Status extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasSluggable;

  protected $table = 'statuses';

  protected $fillable = [
    'ss',
    'name',
    'slug',
    'bg',
    'text',
    'description',
  ];

  protected $sFields = [
    'name',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
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
