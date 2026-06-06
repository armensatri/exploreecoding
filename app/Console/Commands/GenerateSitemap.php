<?php

namespace App\Console\Commands;

use App\Models\Programming\Path;
use App\Models\Programming\Playlist;
use App\Models\Programming\Post;
use App\Models\Programming\Roadmap;
use App\Models\Tipscoding\Category;
use App\Models\Tipscoding\Tipscoding;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

#[Signature('generate:sitemap')]
#[Description('Generate the sitemap for the website')]
class GenerateSitemap extends Command
{
  public function handle(): int
  {
    $sitemap = Sitemap::create();

    // Home
    $sitemap->add(
      Url::create(route('home'))
    );

    Path::query()
      ->select(['id', 'url', 'updated_at'])
      ->chunkById(100, function ($paths) use ($sitemap) {
        foreach ($paths as $path) {
          $sitemap->add(
            Url::create(route('paths.show', $path->url))
              ->setLastModificationDate($path->updated_at)
          );
        }
      });

    Roadmap::query()
      ->select(['id', 'url', 'updated_at'])
      ->chunkById(100, function ($roadmaps) use ($sitemap) {
        foreach ($roadmaps as $roadmap) {
          $sitemap->add(
            Url::create(route('roadmaps.show', $roadmap->url))
              ->setLastModificationDate($roadmap->updated_at)
          );
        }
      });

    Playlist::query()
      ->select(['id', 'url', 'updated_at'])
      ->chunkById(100, function ($playlists) use ($sitemap) {
        foreach ($playlists as $playlist) {
          $sitemap->add(
            Url::create(route('playlists.show', $playlist->url))
              ->setLastModificationDate($playlist->updated_at)
          );
        }
      });

    Post::query()
      ->select(['id', 'url', 'updated_at'])
      ->chunkById(100, function ($posts) use ($sitemap) {
        foreach ($posts as $post) {
          $sitemap->add(
            Url::create(route('posts.show', $post->url))
              ->setLastModificationDate($post->updated_at)
          );
        }
      });

    Tipscoding::query()
      ->select(['id', 'url', 'updated_at'])
      ->chunkById(100, function ($tipscodings) use ($sitemap) {
        foreach ($tipscodings as $tipscoding) {
          $sitemap->add(
            Url::create(route('tipscodings.show', $tipscoding->url))
              ->setLastModificationDate($tipscoding->updated_at)
          );
        }
      });

    Category::query()
      ->select(['id', 'url', 'updated_at'])
      ->chunkById(100, function ($categories) use ($sitemap) {
        foreach ($categories as $category) {
          $sitemap->add(
            Url::create(route('categories.show', $category->url))
              ->setLastModificationDate($category->updated_at)
          );
        }
      });

    $sitemap->writeToFile(
      public_path('sitemap.xml')
    );

    $this->info('Sitemap generated successfully.');

    return self::SUCCESS;
  }
}
