<?php

namespace App\Models\Programming;

use App\Models\Published\Status;
use App\Models\Programming\Playlist;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
};

class Post extends Model
{
  use HasRandomUrl, HasSearchable;

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
    'playlist' => 'name'
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
}
