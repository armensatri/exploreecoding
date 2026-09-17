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

      default =>
      'Anda memiliki notification baru',
    };
  }
}
