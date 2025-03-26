<?php

namespace App\Models\Published;

use App\Helpers\RandomUrl;
use App\Models\Programming\Path;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Status extends Model
{
  protected $table = 'statuses';

  protected $fillable = [
    'ss',
    'name',
    'url',
    'bg',
    'text',
    'description'
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

  protected static function boot()
  {
    parent::boot();

    static::saving(function ($status) {
      if (empty($status->url)) {
        do {
          $url = RandomUrl::GenerateUrl();
        } while (Status::where('url', $url)->exists());

        $status->url = $url;
      }
    });
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name'];

    $query->when(
      $filters['search'] ?? false,
      fn($query, $search) =>
      $query->where(function ($query) use ($search, $fields) {
        foreach ($fields as $field) {
          $query->orWhere($field, 'like', '%' . $search . '%');
        }
      })
    );
  }
}
