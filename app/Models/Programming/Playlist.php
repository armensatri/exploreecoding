<?php

namespace App\Models\Programming;

use App\Models\Programming\Path;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;
use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
  use HasCacheVersion;
  use HasFactory, HasSearchable;

  protected $table = 'playlists';

  protected $fillable = [
    'status_id',
    'roadmap_id',
    'spl',
    'name',
    'slug',
    'description',
    'image',
  ];

  protected $sFields = [
    'name',
  ];

  protected $sRelations = [
    'roadmap' => 'name',
    'status' => 'name',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function roadmap()
  {
    return $this->belongsTo(Roadmap::class);
  }

  public function path()
  {
    return $this->hasOneThrough(
      Path::class,
      Roadmap::class,
      'id',
      'id',
      'roadmap_id',
      'path_id'
    );
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
