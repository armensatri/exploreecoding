<?php

namespace App\Models\Tipscoding;

use App\Models\Tipscoding\Tipscoding;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
  HasSluggable
};

class Category extends Model
{
  use HasFactory, HasSluggable, HasRandomUrl, HasSearchable;

  protected $table = 'categories';

  protected $fillable = [
    'sc',
    'name',
    'slug',
    'url'
  ];

  protected $sFields = [
    'name'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function tipscodings()
  {
    return $this->hasMany(Tipscoding::class);
  }
}
