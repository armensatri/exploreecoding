<?php

namespace Database\Seeders\Programming;

use Illuminate\Database\Seeder;
use App\Models\Programming\Playlist;

class PlaylistSeeder extends Seeder
{
  public function run(): void
  {
    $playlists = [
      // ROADMAP GETSTRATED INTRODUCTION
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 1,
        'spl' => 1,
        'name' => 'Intro Getstarted',
        'slug' => 'intro-getstarted',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP ALGORITMA INTRODUCTION
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 2,
        'spl' => 1,
        'name' => 'Intro Algoritma',
        'slug' => 'intro-algoritma',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP PROGRAMMING FUNDAMENTAL
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 3,
        'spl' => 1,
        'name' => 'Intro Programming Fundamental',
        'slug' => 'intro-programming-fundamental',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 3,
        'spl' => 2,
        'name' => 'Language Sintax',
        'slug' => 'language-sintax',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP STRUKTUR DATA INTRODUCTION
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 4,
        'spl' => 1,
        'name' => 'Intro Struktur Data',
        'slug' => 'intro-struktur-data',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP STRUKTUR DATA BASIC
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 5,
        'spl' => 1,
        'name' => 'Intro Struktur Data Basic',
        'slug' => 'intro-struktur-data-basic',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 5,
        'spl' => 2,
        'name' => 'Array',
        'slug' => 'array',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP PEMOGRAMAN INTRODUCTION
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 6,
        'spl' => 1,
        'name' => 'Intro Pemograman',
        'slug' => 'intro-pemograman',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP PENGENALAN PEMOGRAMAN
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 7,
        'spl' => 1,
        'name' => 'Intro Pengenalan Pemograman',
        'slug' => 'intro-pengenalan pemograman',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP FRONTEND INTRODUCTION
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 8,
        'spl' => 1,
        'name' => 'Intro Frontend',
        'slug' => 'intro-frontend',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],

      // ROADMAP INTERNET
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 9,
        'spl' => 1,
        'name' => 'Intro Internet',
        'slug' => 'intro-internet',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],
      [
        'status_id' => mt_rand(1, 3),
        'roadmap_id' => 9,
        'spl' => 2,
        'name' => 'HTTP & HTTPS',
        'slug' => 'http-&-https',
        'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, beatae! A quisquam consequuntur et voluptatem'
      ],
    ];

    foreach ($playlists as $playlist) {
      Playlist::create($playlist);
    }
  }
}
