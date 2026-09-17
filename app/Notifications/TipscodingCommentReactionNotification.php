<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Tipscoding\TipscodingComment;

class TipscodingCommentReactionNotification extends Notification
{
  use Queueable;

  public function __construct(
    public TipscodingComment $comment,
    public string $reaction
  ) {}

  public function via(object $notifiable): array
  {
    return ['database'];
  }

  public function toArray(object $notifiable): array
  {
    return [
      'comment_id' => $this->comment->id,
      'tipscoding_id' => $this->comment->tipscoding_id,
      'actor_id' => $this->comment->user_id,
      'actor_name' => $this->comment->user->name,
      'reaction' => $this->reaction,
      'comment' => $this->comment->comment,
      'type' => 'tipscoding.comment.reaction',
    ];
  }
}
