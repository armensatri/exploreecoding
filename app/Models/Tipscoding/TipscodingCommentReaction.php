<?php

namespace App\Models\Tipscoding;

use App\Models\Manageuser\User;
use App\Models\Tipscoding\TipscodingComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipscodingCommentReaction extends Model
{
  use HasFactory;

  protected $fillable = [
    'comment_id',
    'user_id',
    'type',
  ];

  public function comment(): BelongsTo
  {
    return $this->belongsTo(
      TipscodingComment::class,
      'comment_id'
    );
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(
      User::class,
      'user_id'
    );
  }
}
