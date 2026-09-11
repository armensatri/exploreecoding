<?php

namespace App\Models\Account;

use App\Models\Manageuser\User;
use App\Traits\Models\HasSearchable;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
  use HasSearchable;

  protected $table = 'sosmeds';

  protected $fillable = [
    'user_id',
    'linkedin',
    'github',
    'threads',
    'instagram',
    'x',
    'facebook',
    'tiktok',
  ];

  protected $sFields = [
    'username'
  ];

  protected $sRelations = [
    'user' => 'username'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
