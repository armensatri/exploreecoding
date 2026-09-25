<?php

namespace App\Notifications;

use App\Models\Tipscoding\TipscodingCommentReport;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TipscodingCommentReportResultNotification extends Notification
{
  use Queueable;

  public function __construct(
    public TipscodingCommentReport $report
  ) {}

  public function via(object $notifiable): array
  {
    return ['database'];
  }

  public function toArray(object $notifiable): array
  {
    return [
      'report_id' => $this->report->id,
      'comment_id' => $this->report->tipscoding_comment_id,
      'tipscoding_id' => $this->report->comment?->tipscoding_id,
      'status' => $this->report->status,
      'comment' => $this->report->comment?->comment,
      'type' => 'tipscoding.comment.report.result',
    ];
  }
}
