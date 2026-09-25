<?php

namespace App\Notifications;

use App\Models\Tipscoding\TipscodingCommentReport;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TipscodingCommentReportNotification extends Notification
{
  use Queueable;

  public function __construct(
    public TipscodingCommentReport $report
  ) {}

  /**
   * Get the notification's delivery channels.
   */
  public function via(object $notifiable): array
  {
    return ['database'];
  }

  /**
   * Get the array representation of the notification.
   */
  public function toArray(object $notifiable): array
  {
    return [
      'report_id' => $this->report->id,
      'comment_id' => $this->report->tipscoding_comment_id,
      'tipscoding_id' => $this->report->comment?->tipscoding_id,
      'reporter_id' => $this->report->user_id,
      'reporter_name' => $this->report->user?->name,
      'reason' => $this->report->reason,
      'comment' => $this->report->comment?->comment,
      'type' => 'tipscoding.comment.report',
    ];
  }
}
