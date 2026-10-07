<?php

namespace App\Support;

use Illuminate\Notifications\DatabaseNotification;

class TipscodingNotification
{
  public static function message(
    DatabaseNotification $notification
  ): string {
    return match ($notification->data['type'] ?? null) {
      'tipscoding.comment' => (
        $notification->data['actor_name'] ?? 'Seseorang'
        ) . ' mengomentari tipscoding anda',

      'tipscoding.comment.reply' => (
        $notification->data['actor_name'] ?? 'Seseorang'
        ) . ' membalas komentar anda',

      'tipscoding.comment.reaction' => (
        $notification->data['actor_name'] ?? 'Seseorang'
        ) . ' menyukai komentar anda',

      'tipscoding.comment.pinned' => (
        $notification->data['actor_name'] ?? 'Seseorang'
        ) . ' menyematkan komentar anda',

      'tipscoding.comment.report' => (
        $notification->data['reporter_name'] ?? 'Seseorang'
        ) . ' melaporkan sebuah komentar',

      'tipscoding.comment.report.result' => match (
        $notification->data['status'] ?? null)
        {
          'resolved' =>
          'laporan Anda telah di tindak lanjuti dan komentar di sembunyikan',

          'rejected' =>
          'laporan anda telah di tolak dan komentar tetap di tampilkan',

          default =>
          'laporan anda telah di tinjau',
        },

      default =>
      'anda memiliki notification baru',
    };
  }
}
