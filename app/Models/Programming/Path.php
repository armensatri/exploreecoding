<?php

namespace App\Models\Programming;

use App\Models\Programming\Playlist;
use App\Models\Programming\Roadmap;
use App\Models\Published\Status;
use App\Models\View\Pathview;
use App\Traits\Models\{HasSearchable, HasCacheVersion,};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasFactory;

  protected $table = 'paths';

  protected $fillable = [
    'status_id',
    'sp',
    'name',
    'slug',
    'description',
    'image',
  ];

  protected $sFields = [
    'name'
  ];

  protected $sRelations = [
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

  public function roadmaps()
  {
    return $this->hasMany(Roadmap::class);
  }

  public function playlists()
  {
    return $this->hasManyThrough(
      Playlist::class,
      Roadmap::class
    );
  }

  public function pathviews()
  {
    return $this->hasMany(Pathview::class);
  }
}
