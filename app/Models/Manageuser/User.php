<?php

namespace App\Models\Manageuser;

use App\Models\Manageuser\Role;
use App\Models\Programming\Post;
use App\Models\Tipscoding\Tipscoding;
use App\Models\View\Pathview;
use App\Traits\Models\{HasSearchable, HasCacheVersion,};
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasCacheVersion;
  use HasSearchable;

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

  public function pathviews()
  {
    return $this->hasMany(Pathview::class);
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
