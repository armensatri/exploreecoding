<?php

namespace App\Models\Manageuser;

use App\Models\Account\Sosmed;
use App\Models\Manageuser\Role;
use App\Models\Monitoring\Pathview;
use App\Models\Monitoring\Tipscodingview;
use App\Models\Programming\Post;
use App\Models\Tipscoding\Tipscoding;
use App\Models\Tipscoding\TipscodingComment;
use App\Models\Tipscoding\TipscodingCommentReaction;
use App\Traits\Models\HasCacheVersion;
use App\Traits\Models\HasSearchable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class User extends Authenticatable
{
  use HasCacheVersion;
  use HasSearchable;
  use Notifiable;

  protected $table = 'users';

  protected $fillable = [
    'name',
    'username',
    'email',
    'gender',
    'password',
    'image',
    'role_id',
    'status_on_of',
    'last_seen',
    'status',
    'province_code',
    'city_code',
    'district_code',
    'bio',
  ];

  protected $sFields = [
    'name',
  ];

  protected $sRelations = [
    'role' => 'name',
  ];

  protected $hidden = [
    'password',
  ];

  protected function casts()
  {
    return [
      'password' => 'hashed',
    ];
  }

  public function getRouteKeyName()
  {
    return 'username';
  }

  public function role()
  {
    return $this->belongsTo(Role::class, 'role_id', 'id');
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }

  public function tipscodings()
  {
    return $this->hasMany(Tipscoding::class);
  }

  public function sosmed()
  {
    return $this->hasOne(Sosmed::class, 'user_id');
  }

  public function pathviews()
  {
    return $this->hasMany(Pathview::class);
  }

  public function tipscodingviews()
  {
    return $this->hasMany(Tipscodingview::class);
  }

  public function hasSubmenu(string $submenu): bool
  {
    return $this->role
      ->submenus
      ->contains('name', $submenu);
  }

  public function hasPermission(string $permission): bool
  {
    return $this->role
      ?->permissions
      ?->contains('name', $permission) ?? false;
  }

  public function province()
  {
    return $this->belongsTo(
      Province::class,
      'province_code',
      'code'
    )->select([
      'code',
      'name',
    ]);
  }

  public function city()
  {
    return $this->belongsTo(
      City::class,
      'city_code',
      'code'
    )->select([
      'code',
      'name',
    ]);
  }

  public function district()
  {
    return $this->belongsTo(
      District::class,
      'district_code',
      'code'
    )->select([
      'code',
      'name',
    ]);
  }

  public function tipscodingComments()
  {
    return $this->hasMany(
      TipscodingComment::class,
      'user_id'
    );
  }

  public function tipscodingCommentReactions()
  {
    return $this->hasMany(
      TipscodingCommentReaction::class,
      'user_id'
    );
  }

  public function statusOnOf()
  {
    $online = $this->status_on_of;
    $color = $online ? 'green' : 'red';

    return [
      'bg' => "bg-{$color}-200",
      'text' => "text-{$color}-800",
      'statusOnOf' => $online ? 'online' : 'offline',
    ];
  }

  public function status()
  {
    $active = $this->status;
    $color = $active ? 'green' : 'red';

    return [
      'bg' => "bg-{$color}-200",
      'text' => "text-{$color}-800",
      'status' => $active ? 'active' : 'banned',
    ];
  }
}
