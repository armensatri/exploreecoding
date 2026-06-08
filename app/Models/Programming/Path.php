<?php

namespace App\Models\Programming;

use Illuminate\Support\Str;
use App\Models\Published\Status;
use App\Models\Programming\Roadmap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\Models\{
  HasSearchable,
  HasCacheVersion,
};

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

  public function shortDescription(int $words = 8): string
  {
    return Str::words($this->description, $words);
  }
}
