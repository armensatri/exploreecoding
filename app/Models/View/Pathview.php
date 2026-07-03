<?php

namespace App\Models\View;

use App\Models\Manageuser\User;
use App\Models\Programming\Path;
use Illuminate\Database\Eloquent\Model;

class Pathview extends Model
{
  protected $table = 'path_view';

  protected $fillable = [
    'path_id',
    'user_id'
  ];

  public function path()
  {
    return $this->belongsTo(Path::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
