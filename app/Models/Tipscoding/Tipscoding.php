<?php

namespace App\Models\Tipscoding;

use App\Helpers\RandomUrl;
use App\Models\Manageuser\User;
use App\Models\Tipscoding\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\Models\{
  HasSearchable,
  HasCacheVersion,
};

use Illuminate\Database\Eloquent\{
  Model,
  Builder
};

class Tipscoding extends Model
{
  use HasCacheVersion;
  use HasSearchable, HasFactory;

  protected $table = 'tipscodings';

  protected $fillable = [
    'user_id',
    'category_id',
    'title',
    'slug',
    'excerpt',
    'content',
    'image',
    'url'
  ];

  protected $sFields = [
    'title'
  ];

  protected $sRelations = [
    'category' => 'name',
    'user' => 'username'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function scopeAccessTipscodings(Builder $query, User $user)
  {
    $role = $user->role?->name;

    return match ($role) {
      'creator' => $query->where('user_id', $user->id),
      'member'  => $query->whereKey([]),
      default   => $query,
    };
  }

  protected static function bootHasRandomUrl()
  {
    static::creating(function (Model $model) {
      if (empty($model->url)) {
        do {
          $url = RandomUrl::generateUrl();
        } while ($model->newQuery()->where('url', $url)->exists());

        $model->url = $url;
      }
    });
  }
}
