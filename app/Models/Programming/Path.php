<?php

namespace App\Models\Programming;

use App\Helpers\RandomUrl;
use App\Helpers\Searching;
use App\Models\Published\Status;
use App\Models\Programming\Roadmap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;

class Path extends Model
{
  use Sluggable;

  protected $table = 'paths';

  protected $fillable = [
    'sp',
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

  public function roadmaps()
  {
    return $this->hasMany(Roadmap::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  protected static function boot()
  {
    parent::boot();

    static::saving(function ($path) {
      if (empty($path->url)) {
        do {
          $url = RandomUrl::GenerateUrl();
        } while (Path::where('url', $url)->exists());

        $path->url = $url;
      }
    });
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name', 'views'];

    $relations = [
      'status' => 'name'
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
      'status' => 'name'
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
