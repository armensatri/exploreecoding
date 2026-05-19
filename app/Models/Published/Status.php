<?php

namespace App\Models\Published;

use App\Helpers\RandomUrl;
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

  protected static function bootHasRandomUrl()
  {
    static::creating(function (Model $model) {
      if (empty($model->url)) {
        do {
          $url = RandomUrl::generateUrl();
        } while ($model->newQuery()->where('url', $url)->exists());

        $model->url = $url;
      }
    });
  }
}
