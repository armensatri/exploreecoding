<?php

namespace App\Notifications;

use App\Models\Manageuser\User;
use App\Models\Tipscoding\TipscodingComment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TipscodingCommentReactionNotification extends Notification
{
  use Queueable;

  public function __construct(
    public TipscodingComment $comment,
    public string $reaction,
    public User $actor
  ) {}

  public function via(object $notifiable): array
  {
    return ['database'];
  }

  public function toArray(object $notifiable): array
  {
    return [
      'comment_id' => $this->comment->id,

      'tipscoding_id' =>
      $this->comment->tipscoding_id,

      'actor_id' =>
      $this->actor->id,

      'actor_name' =>
      $this->actor->name,

      'reaction' =>
      $this->reaction,

      'comment' =>
      $this->comment->comment,

      'type' =>
      'tipscoding.comment.reaction',
    ];
  }
}
