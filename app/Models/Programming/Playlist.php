<?php

namespace App\Models\Programming;

use App\Helpers\RandomUrl;
use App\Helpers\Searching;
use App\Models\Programming\Post;
use App\Models\Published\Status;
use App\Models\Programming\Roadmap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Playlist extends Model
{
  use Sluggable, HasFactory;

  protected $table = 'playlists';

  protected $fillable = [
    'roadmap_id',
    'spl',
    'name',
    'slug',
    'url',
    'views',
    'status_id',
    'description',
    'image'
  ];

  public function roadmap()
  {
    return $this->belongsTo(Roadmap::class);
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'name'
      ]
    ];
  }

  protected static function boot()
  {
    parent::boot();

    static::saving(function ($playlist) {
      if (empty($playlist->url)) {
        do {
          $url = RandomUrl::GenerateUrl();
        } while (Playlist::where('url', $url)->exists());

        $playlist->url = $url;
      }
    });
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name', 'views'];

    $relations = [
      'status' => 'name',
      'roadmap' => 'name'
    ];

    $query->whereHas('status', function ($query) {
      $query->where('name', '!=', 'draft');
    });

    $query->when(
      $filters['search'] ?? false,
      function ($query, $search) use ($fields, $relations) {
        Searching::applySearch($query, $search, $fields, $relations);
      }
    );
  }

  public function scopeDraft(Builder $query, array $filters): void
  {
    $fields = ['name', 'views'];

    $relations = [
      'status' => 'name',
      'roadmap' => 'name'
    ];

    $query->whereHas('status', function ($query) {
      $query->where('name', '=', 'draft');
    });

    $query->when(
      $filters['search'] ?? false,
      function ($query, $search) use ($fields, $relations) {
        Searching::applySearch($query, $search, $fields, $relations);
      }
    );
  }
}
