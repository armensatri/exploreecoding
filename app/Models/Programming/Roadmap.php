<?php

namespace App\Models\Programming;

use App\Helpers\RandomUrl;
use App\Helpers\Searching;
use App\Models\Published\Status;
use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roadmap extends Model
{
  use Sluggable, HasFactory;

  protected $table = 'roadmaps';

  protected $fillable = [
    'path_id',
    'sr',
    'name',
    'slug',
    'url',
    'views',
    'status_id',
    'description',
    'image'
  ];

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

  public function path()
  {
    return $this->belongsTo(Path::class);
  }

  public function playlists()
  {
    return $this->hasMany(Playlist::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  protected static function boot()
  {
    parent::boot();

    static::saving(function ($roadmap) {
      if (empty($roadmap->url)) {
        do {
          $url = RandomUrl::GenerateUrl();
        } while (Roadmap::where('url', $url)->exists());

        $roadmap->url = $url;
      }
    });
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name', 'views'];

    $relations = [
      'status' => 'name',
      'path' => 'name'
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
      'path' => 'name'
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
