<?php

namespace App\Models\View;

use App\Models\Manageuser\User;
use App\Models\Tipscoding\Tipscoding;
use Illuminate\Database\Eloquent\Model;

class Tipscodingview extends Model
{
  protected $table = 'tipscoding_view';

  protected $fillable = [
    'tipscoding_id',
    'user_id'
  ];

  public function tipscoding()
  {
    return $this->belongsTo(Tipscoding::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
