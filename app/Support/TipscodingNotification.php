<?php

namespace App\Support;

use Illuminate\Notifications\DatabaseNotification;

class TipscodingNotification
{
  public static function message(
    DatabaseNotification $notification
  ): string {

    return match ($notification->data['type'] ?? null) {

      'tipscoding.comment' => ($notification->data['actor_name'] ?? 'Seseorang')
        . ' mengomentari TipsCoding Anda',

      'tipscoding.comment.reply' => ($notification->data['actor_name'] ?? 'Seseorang')
        . ' membalas komentar Anda',

      'tipscoding.comment.reaction' => ($notification->data['actor_name'] ?? 'Seseorang')
        . ' menyukai komentar Anda',

      'tipscoding.comment.pinned' => ($notification->data['actor_name'] ?? 'Seseorang')
        . ' menyematkan komentar Anda',

      'tipscoding.comment.report' => ($notification->data['reporter_name'] ?? 'Seseorang')
        . ' melaporkan sebuah komentar',

      'tipscoding.comment.report.result' => match ($notification->data['status'] ?? null) {
        'resolved' =>
        'Laporan Anda telah di tindaklanjuti dan komentar disembunyikan',

        'rejected' =>
        'Laporan Anda telah ditolak dan komentar tetap ditampilkan',

        default =>
        'Laporan Anda telah ditinjau',
      },

      default =>
      'Anda memiliki notification baru',
    };
  }
}
