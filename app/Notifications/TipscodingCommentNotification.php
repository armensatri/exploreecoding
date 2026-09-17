<?php

namespace App\Notifications;

use App\Models\Tipscoding\TipscodingComment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TipscodingCommentNotification extends Notification
{
  use Queueable;

  public function __construct(
    public TipscodingComment $comment
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
      'comment' => $this->comment->comment,
      'type' => $this->comment->parent_id
        ? 'tipscoding.comment.reply'
        : 'tipscoding.comment',
    ];
  }
}
