<?php

namespace App\Models\Programming;

use App\Models\Manageuser\User;
use App\Models\Programming\Playlist;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;
use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasCacheVersion;
  use HasFactory, HasSearchable;

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
  ];

  protected $sFields = [
    'title',
  ];

  protected $sRelations = [
    'status' => 'name',
    'playlist' => 'name',
    'user' => 'username',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function scopeAccessPosts(Builder $query, User $user): Builder
  {
    $roleName = $user->role?->name ?? $user->role?->slug;

    return match (strtolower((string) $roleName)) {
      'creator' => $query->where('user_id', $user->id),
      'member'  => $query->whereRaw('1 = 0'),
      default   => $query,
    };
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

  public function roadmap()
  {
    return $this->hasOneThrough(
      Roadmap::class,
      Playlist::class,
      'id',
      'id',
      'playlist_id',
      'roadmap_id'
    );
  }
}
