<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class GitPush extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'git:push {message=update}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description =
  'Menjalankan git add, commit, dan push sekaligus';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $message = $this->argument('message');

    $this->info('Menjalankan: git add .');
    (new Process(['git', 'add', '.']))->run();

    $this->info("Menjalankan: git commit -m \"$message\"");
    (new Process(['git', 'commit', '-m', $message]))->run();

    $this->info('Menjalankan: git push -u origin main');
    (new Process(['git', 'push', '-u', 'origin', 'main']))->run();

    $this->info('✅ Push selesai.');
  }
}
