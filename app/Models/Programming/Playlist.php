<?php

namespace App\Models\Programming;

use App\Helpers\RandomUrl;
use App\Models\Published\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Programming\{
  Post,
  Roadmap
};

use App\Traits\Models\{
  HasSearchable,
  HasCacheVersion,
};

class Playlist extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasFactory;

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
    'roadmap' => 'name',
    'status' => 'name'
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
