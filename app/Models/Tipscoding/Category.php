<?php

namespace App\Models\Tipscoding;

use App\Models\Tipscoding\Tipscoding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\Models\{
  HasSearchable,
  HasCacheVersion,
};

class Category extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasFactory;

  protected $table = 'categories';

  protected $fillable = [
    'sc',
    'name',
    'slug',
    'image',
  ];

  protected $sFields = [
    'name'
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function tipscodings()
  {
    return $this->hasMany(Tipscoding::class);
  }
}
