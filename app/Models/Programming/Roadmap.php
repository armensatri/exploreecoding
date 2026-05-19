<?php

namespace App\Models\Programming;

use App\Helpers\RandomUrl;
use App\Models\Published\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Programming\{
  Path,
  Playlist
};

use App\Traits\Models\{
  HasSearchable,
  HasCacheVersion,
};

class Roadmap extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasFactory;

  protected $table = 'roadmaps';

  protected $fillable = [
    'status_id',
    'path_id',
    'sr',
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
    'path' => 'name',
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

  public function path()
  {
    return $this->belongsTo(Path::class);
  }

  public function playlists()
  {
    return $this->hasMany(Playlist::class);
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
