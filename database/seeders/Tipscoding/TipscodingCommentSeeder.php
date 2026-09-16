<?php

namespace Database\Seeders\Tipscoding;

use App\Models\Manageuser\User;
use App\Models\Tipscoding\Tipscoding;
use App\Models\Tipscoding\TipscodingComment;
use Illuminate\Database\Seeder;

class TipscodingCommentSeeder extends Seeder
{
  public function run(): void
  {
    $users = User::query()
      ->select('id')
      ->limit(5)
      ->get();

    $tipscodings = Tipscoding::query()
      ->select('id')
      ->limit(3)
      ->get();

    if ($users->isEmpty() || $tipscodings->isEmpty()) {
      $this->command->warn(
        'User atau Tipscoding belum tersedia.'
      );

      return;
    }

    foreach ($tipscodings as $tipscoding) {

      for ($i = 1; $i <= 5; $i++) {

        $user = $users->random();

        $comment = TipscodingComment::create([
          'tipscoding_id' => $tipscoding->id,
          'user_id' => $user->id,
          'parent_id' => null,
          'comment' => "Ini komentar utama ke-{$i} untuk tipscoding ID {$tipscoding->id}.",
          'status' => 'approved',
        ]);

        // Buat 2 reply untuk setiap komentar utama
        for ($j = 1; $j <= 2; $j++) {

          $replyUser = $users->random();

          TipscodingComment::create([
            'tipscoding_id' => $tipscoding->id,
            'user_id' => $replyUser->id,
            'parent_id' => $comment->id,
            'comment' => "Ini reply ke-{$j} untuk komentar {$comment->id}.",
            'status' => 'approved',
          ]);
        }
      }
    }
  }
}
