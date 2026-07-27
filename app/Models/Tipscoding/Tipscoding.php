<?php

namespace App\Models\Tipscoding;

use App\Models\Manageuser\User;
use App\Models\View\Tipscodingview;
use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipscoding extends Model
{
  use HasCacheVersion;
  use HasFactory, HasSearchable;

  protected $table = 'tipscodings';

  protected $fillable = [
    'user_id',
    'category_id',
    'title',
    'slug',
    'excerpt',
    'content',
    'image',
  ];

  protected $sFields = [
    'title',
  ];

  protected $sRelations = [
    'category' => 'name',
    'user' => 'username',
  ];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function tipscodingviews()
  {
    return $this->hasMany(Tipscodingview::class);
  }

  public function scopeAccessTipscodings(Builder $query, User $user)
  {
    $role = $user->role?->name;

    return match ($role) {
      'creator' => $query->where('user_id', $user->id),
      'member' => $query->whereKey([]),
      default => $query,
    };
  }
}
