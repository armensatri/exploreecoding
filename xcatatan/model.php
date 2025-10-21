<?php

namespace App\Models\xcatatan;

use App\Traits\Searchable;
use App\Traits\HasRandomUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SearchableDiModel extends Model
{
  // use HasFactory, HasSluggable, Searchable, HasRandomUrl;

  // * HasRandomUrl
  // mengikuti trait dan model nya

  // * HasSluggable
  // di bawah table -> jika sluggablenya berbeda
  // jika tidak jangan di tulis
  protected $sluggable = 'name';

  // * HasSearcable single model
  protected array $sFields = [
    // field utama model
    'name',
    'username'
  ];

  // * HasSearcable jika ada relasi
  protected array $sRelations = [
    // jika (1) field di dalam relasi
    'role' => 'name',

    // jika (banyak) field di dalam relasi
    'profile' => [
      'bio',
      'location'
    ]
  ];
}
