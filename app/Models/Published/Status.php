<?php

namespace App\Models\Published;

use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use App\Traits\Models\HasSluggable;
use Illuminate\Database\Eloquent\Model;

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
