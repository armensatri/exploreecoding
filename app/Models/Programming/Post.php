<?php

namespace App\Models\Programming;

use App\Helpers\RandomUrl;
use App\Helpers\Searching;
use App\Models\Published\Status;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use Sluggable, HasFactory;

  protected $table = 'posts';

  protected $fillable = [
    'playlist_id',
    'sp',
    'title',
    'slug',
    'excerpt',
    'content',
    'views',
    'status_id',
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
        'source' => 'title'
      ]
    ];
  }

  public function playlist()
  {
    return $this->belongsTo(Playlist::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  protected static function boot()
  {
    parent::boot();

    static::saving(function ($post) {
      if (empty($post->url)) {
        do {
          $url = RandomUrl::GenerateUrl();
        } while (Post::where('url', $url)->exists());

        $post->url = $url;
      }
    });
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name', 'views'];

    $relations = [
      'status' => 'name',
      'playlist' => 'name'
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
      'playlist' => 'name'
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
