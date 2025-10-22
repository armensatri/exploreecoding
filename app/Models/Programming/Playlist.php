<?php

namespace App\Models\Programming;

use App\Models\Published\Status;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
  HasSluggable,
};

use App\Models\Programming\{
  Roadmap,
  Post
};

class Playlist extends Model
{
  use HasRandomUrl, HasSearchable, HasSluggable;

  protected $table = 'playlists';

  protected $fillable = [
    'status_id',
    'roadmap_id',
    'spl',
    'name',
    'slug',
    'description',
    'image',
    'url'
  ];

  protected $sFields = [
    'name'
  ];

  protected $sRelations = [
    'roadmap' => 'name'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function roadmap()
  {
    return $this->belongsTo(Roadmap::class);
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
