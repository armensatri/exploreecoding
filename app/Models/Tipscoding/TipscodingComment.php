<?php

namespace App\Models\Tipscoding;

use App\Models\Manageuser\User;
use App\Models\Tipscoding\Tipscoding;
use App\Models\Tipscoding\TipscodingCommentReaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipscodingComment extends Model
{
  use HasFactory;

  protected $fillable = [
    'tipscoding_id',
    'user_id',
    'parent_id',
    'comment',
    'status',
  ];

  public function tipscoding(): BelongsTo
  {
    return $this->belongsTo(
      Tipscoding::class,
      'tipscoding_id'
    );
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(
      User::class,
      'user_id'
    );
  }

  public function parent(): BelongsTo
  {
    return $this->belongsTo(
      self::class,
      'parent_id'
    );
  }

  public function replies(): HasMany
  {
    return $this->hasMany(
      self::class,
      'parent_id'
    );
  }

  public function reactions(): HasMany
  {
    return $this->hasMany(
      TipscodingCommentReaction::class,
      'comment_id'
    );
  }
}
