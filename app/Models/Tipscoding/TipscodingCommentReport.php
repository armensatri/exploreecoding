<?php

namespace App\Models\Tipscoding;

use App\Models\Manageuser\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipscodingCommentReport extends Model
{
  protected $fillable = [
    'tipscoding_comment_id',
    'user_id',
    'reason',
    'description',
    'status',
    'reviewed_by',
    'reviewed_at',
  ];

  protected function casts(): array
  {
    return [
      'reviewed_at' => 'datetime',
    ];
  }

  public function comment(): BelongsTo
  {
    return $this->belongsTo(
      TipscodingComment::class,
      'tipscoding_comment_id'
    );
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(
      User::class,
      'user_id'
    );
  }

  public function reviewer(): BelongsTo
  {
    return $this->belongsTo(
      User::class,
      'reviewed_by'
    );
  }
}
