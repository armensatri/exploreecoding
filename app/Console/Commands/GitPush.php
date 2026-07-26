<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

#[Signature('git:push {message=update}')]
#[Description('Menjalankan git add, commit, dan push sekaligus')]

class GitPush extends Command
{
    public function handle()
    {
        $message = $this->argument('message');

        $this->info('run: git add .');
        (new Process(['git', 'add', '.']))->run();

        $this->info("run: git commit -m \"$message\"");
        (new Process(['git', 'commit', '-m', $message]))->run();

        $this->info('run: git push -u origin main');
        (new Process(['git', 'push', '-u', 'origin', 'main']))->run();

        $this->info('✅ Push selesai.');
    }
}
