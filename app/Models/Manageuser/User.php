<?php

namespace App\Models\Manageuser;

use App\Helpers\Searching;
use App\Models\Manageuser\Role;
use App\Models\Programming\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory;

  protected $table = 'users';

  protected $fillable = [
    'name',
    'username',
    'email',
    'password',
    'image',
    'role_id',
    'is_active'
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
    return $this->belongsTo(Role::class);
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }

  public function active(): array
  {
    return $this->is_active ?
      [
        'bg' => 'bg-green-200',
        'text' => 'text-green-800',
        'active' => 'active'
      ] :
      [
        'bg' => 'bg-red-200',
        'text' => 'text-red-800',
        'active' => '!active'
      ];
  }

  public function hasPermission($permission)
  {
    return $this->role?->permissions->contains('name', $permission);
  }

  public function scopeSearch(Builder $query, array $fillters): void
  {
    $fields = ['name'];

    $relations = [
      'role' => 'name'
    ];

    $query->when(
      $fillters['search'] ?? false,
      function ($query, $search) use ($fields, $relations) {
        Searching::applySearch($query, $search, $fields, $relations);
      }
    );
  }
}
