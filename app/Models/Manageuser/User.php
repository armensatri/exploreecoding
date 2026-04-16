<?php

namespace App\Models\Manageuser;

use App\Models\Manageuser\Role;
use App\Models\Programming\Post;
use App\Models\Tipscoding\Tipscoding;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\Models\{
  HasRandomUrl,
  HasSearchable,
  HasCacheVersion,
};

class User extends Authenticatable
{
  use HasCacheVersion;
  use HasRandomUrl, HasSearchable;

  protected $table = 'users';

  protected $fillable = [
    'name',
    'username',
    'email',
    'password',
    'image',
    'role_id',
    'status_on_of',
    'last_seen',
    'status',
    'url'
  ];

  protected $sFields = [
    'name'
  ];

  protected $sRelations = [
    'role' => 'name',
  ];

  protected $hidden = [
    'password'
  ];

  protected function casts()
  {
    return [
      'password' => 'hashed'
    ];
  }

  public function getRouteKeyName()
  {
    return 'url';
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
