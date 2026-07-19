<?php

namespace Database\Seeders\View;

use App\Models\Manageuser\User;
use App\Models\Tipscoding\Tipscoding;
use App\Models\View\Tipscodingview;
use Illuminate\Database\Seeder;

class TipscodingviewSeeder extends Seeder
{
  public function run(): void
  {
    $users = User::pluck('id');

    $tipscodings = Tipscoding::select('id', 'title')->get();

    foreach ($users as $userId) {
      $randomTipscodings = $tipscodings->random(3);

      foreach ($randomTipscodings as $tipscoding) {
        Tipscodingview::firstOrCreate(
          [
            'user_id' => $userId,
            'tipscoding_id' => $tipscoding->id
          ],
          [
            'tipscoding_title' => $tipscoding->title
          ]
        );
      }
    }
  }
}
