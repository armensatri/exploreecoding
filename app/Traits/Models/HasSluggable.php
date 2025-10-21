<?php

namespace App\Traits\Models;

use Cviebrock\EloquentSluggable\Sluggable;

trait HasSluggable
{
  use Sluggable;

  public function sluggable(): array
  {
    $source = property_exists($this, 'sluggable')
      ? $this->sluggable : 'name';

    return [
      'slug' => [
        'source' => $source
      ]
    ];
  }
}
