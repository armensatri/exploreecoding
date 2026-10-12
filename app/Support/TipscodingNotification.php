<?php

namespace App\Support;

use Illuminate\Notifications\DatabaseNotification;

class TipscodingNotification
{
  public static function message(
    DatabaseNotification $notification
  ): string {
    $username = $notification->data['actor_username']
      ?? $notification->data['reporter_username']
      ?? 'seseorang';

    $username = '<span class="text-blue-600">'
      . '@'
      . e($username)
      . '</span>';

    return match ($notification->data['type'] ?? null) {
      'tipscoding.comment' =>
      $username . ' mengomentari tipscoding anda',

      'tipscoding.comment.reply' =>
      $username . ' membalas komentar anda',

      'tipscoding.comment.reaction' =>
      $username . ' menyukai komentar anda',

      'tipscoding.comment.pinned' =>
      $username . ' menyematkan komentar anda',

      'tipscoding.comment.report' =>
      $username . ' melaporkan sebuah komentar',

      'tipscoding.comment.report.result' => match (
        $notification->data['status'] ?? null)
        {
          'resolved' =>
            '<span class="text-blue-600">'
            . 'laporan anda di setujui'
            . '</span>'
            . ' komentar di sembunyikan',

          'rejected' =>
            '<span class="text-blue-600">'
            . 'laporan anda di tolak'
            . '</span>'
            . ' komentar tetap di tampilkan',

          default =>
            '<span class="text-blue-600">'
            . 'laporan anda telah di tinjau'
            . '</span>',
        },

      default =>
      'anda memiliki notification baru',
    };
  }
}
