<?php

namespace App\Models\Programming;

use App\Helpers\RandomUrl;
use App\Models\Manageuser\User;
use App\Models\Published\Status;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\{
  Model,
  Builder
};

use App\Traits\Models\{
  HasSearchable,
  HasCacheVersion,
};

class Post extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasFactory;

  protected $table = 'posts';

  protected $fillable = [
    'user_id',
    'status_id',
    'playlist_id',
    'sp',
    'title',
    'slug',
    'excerpt',
    'content',
    'image',
    'url'
  ];

  protected $sFields = [
    'title'
  ];

  protected $sRelations = [
    'status' => 'name',
    'playlist' => 'name',
    'user' => 'username',
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function playlist()
  {
    return $this->belongsTo(Playlist::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function scopeAccessPosts(Builder $query, User $user)
  {
    $role = $user->role?->name;

    return match ($role) {
      'creator' => $query->where('user_id', $user->id),
      'member'  => $query->whereKey([]),
      default   => $query,
    };
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
