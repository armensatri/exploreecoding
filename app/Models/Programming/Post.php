<?php

namespace App\Models\Programming;

use App\Models\Manageuser\User;
use App\Models\Published\Status;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
  HasCacheVersion,
};

class Post extends Model
{
  use HasCacheVersion;
  use HasRandomUrl, HasSearchable, HasFactory;

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

  public function scopeAccessPosts($query, $user)
  {
    return $query
      ->when(
        $user->role->name === 'creator',
        fn($q) => $q->where('user_id', $user->id)
      )->when(
        $user->role->name === 'member',
        fn($q) => $q->whereNull('id')
      );
  }
}
