<?php

namespace App\Notifications;

use App\Models\Manageuser\User;
use App\Models\Tipscoding\TipscodingComment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TipscodingCommentPinnedNotification extends Notification
{
  use Queueable;

  public function __construct(
    public TipscodingComment $comment,
    public User $actor,
  ) {}

  /**
   * Notification channels.
   */
  public function via(object $notifiable): array
  {
    return [
      'database',
    ];
  }

  /**
   * Database notification.
   */
  public function toDatabase(object $notifiable): array
  {
    return [
      'type' => 'tipscoding.comment.pinned',

      'comment_id' => $this->comment->id,

      'tipscoding_id' => $this->comment->tipscoding_id,

      'actor_id' => $this->actor->id,

      'actor_name' => $this->actor->name,

      'comment' => $this->comment->comment,
    ];
  }
}
