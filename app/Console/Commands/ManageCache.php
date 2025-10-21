<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ManageCache extends Command
{
  protected $signature = 'manage:cache {--max=100 : Batas maksimal ukuran cache dalam MB}';

  protected $description = 'Menampilkan jumlah file dan membersihkan cache di storage/framework/cache/data jika ukuran melebihi batas';

  public function handle()
  {
    $path = storage_path('framework/cache/data');

    $maxSizeMB = (int) $this->option('max');

    if (!is_dir($path)) {
      $this->error("Folder tidak ditemukan: {$path}");
      return 1;
    }

    $totalSizeBytes = $this->folderSize($path);
    $totalFiles = $this->countFiles($path);

    $this->info("Folder: {$path}");
    $this->info("Jumlah file: {$totalFiles}");
    $this->info("Ukuran total: " . $this->humanFilesize($totalSizeBytes));

    $maxSizeBytes = $maxSizeMB * 1024 * 1024;

    if ($totalSizeBytes > $maxSizeBytes) {
      $this->warn(
        "Ukuran cache melebihi {$maxSizeMB} MB, membersihkan cache..."
      );

      $this->clearCache($path);
      $this->info("Cache berhasil dibersihkan.");
    } else {
      $this->info("Ukuran cache masih dalam batas aman.");
    }

    return 0;
  }

  private function folderSize($dir)
  {
    $size = 0;

    foreach (scandir($dir) as $file) {
      if ($file === '.' || $file === '..') {
        continue;
      }

      $path = $dir . DIRECTORY_SEPARATOR . $file;

      if (is_file($path)) {
        $size += filesize($path);
      } elseif (is_dir($path)) {
        $size += $this->folderSize($path);
      }
    }

    return $size;
  }

  private function countFiles($dir)
  {
    $count = 0;

    foreach (scandir($dir) as $file) {
      if ($file === '.' || $file === '..') {
        continue;
      }

      $path = $dir . DIRECTORY_SEPARATOR . $file;
      if (is_file($path)) {
        $count++;
      } elseif (is_dir($path)) {
        $count += $this->countFiles($path);
      }
    }
    return $count;
  }

  private function clearCache($dir)
  {
    File::cleanDirectory($dir);
  }

  private function humanFilesize($bytes, $decimals = 2)
  {
    $size = ['B', 'KB', 'MB', 'GB', 'TB'];

    if ($bytes == 0) {
      return '0 B';
    }

    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf(
      "%.{$decimals}f",
      $bytes / pow(1024, $factor)
    ) . ' ' . $size[$factor];
  }
}
