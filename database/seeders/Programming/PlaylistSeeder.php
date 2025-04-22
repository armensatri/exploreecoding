<?php

namespace Database\Seeders\Programming;

use App\Models\Programming\Playlist;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
  public function run(): void
  {
    $playlists = [
      // ROADMAP 1 GETSTARTED INTRODUCTION
      [
        'roadmap_id' => 1,
        'spl' => 1,
        'name' => 'Intro Getstarted',
        'slug' => '1giig-intro-getstrated',
        'status_id' => 1,
      ],

      // ROADMAP 2 ALGORITMA INTRODUCTION
      [
        'roadmap_id' => 2,
        'spl' => 1,
        'name' => 'Intro Algoritma',
        'slug' => '2aiia-algoritma-introduction',
        'status_id' => 1,
      ],

      // ROADMAP 3 PROGRAMMING FUNDAMENTAL
      [
        'roadmap_id' => 3,
        'spl' => 1,
        'name' => 'Intro Programming Fundamental',
        'slug' => '3pfipf-programming-fundamental',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 3,
        'spl' => 2,
        'name' => 'Language Syntax',
        'slug' => '3pfls-language-syntax',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 3,
        'spl' => 3,
        'name' => 'Control Struktur',
        'slug' => '3pfcs-control-struktur',
        'status_id' => 1,
      ],

      // ROADMAP ID 4 COMPLEXITY
      [
        'roadmap_id' => 4,
        'spl' => 1,
        'name' => 'Intro Complexity',
        'slug' => '4cic-intro-complexity',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 4,
        'spl' => 2,
        'name' => 'Time vs Space Complexity',
        'slug' => '4ctvsc-time-vs-space-complexity',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 4,
        'spl' => 3,
        'name' => 'How To Calculate Complexity',
        'slug' => '4chtcc-how-to-calculate-complexity',
        'status_id' => 1,
      ],

      // ROADMAP ID 5 STRUKTUR DATA INTRODUCTION
      [
        'roadmap_id' => 5,
        'spl' => 1,
        'name' => 'Intro Struktur Data',
        'slug' => '5sdiisd-intro-struktur-data',
        'status_id' => 1,
      ],

      // ROADMAP ID 6 STRUKTUR DATA BASIC
      [
        'roadmap_id' => 6,
        'spl' => 1,
        'name' => 'Intro Struktur Data',
        'slug' => '6sdbisd-intro-struktur-data',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 6,
        'spl' => 2,
        'name' => 'Array',
        'slug' => '6sdba-array',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 6,
        'spl' => 3,
        'name' => 'Linked list Single Dan Double',
        'slug' => '6sdbllsdd-linked-list-single-dan-double',
        'status_id' => 1,
      ],

      // ROADMAP ID 7 STRUKTUR DATA TREE
      [
        'roadmap_id' => 7,
        'spl' => 1,
        'name' => 'Intro Struktur Data Tree',
        'slug' => '7sdtisdt-struktur-data-tree',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 7,
        'spl' => 2,
        'name' => 'Binary Tree',
        'slug' => '7sdtbt-binary-tree',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 7,
        'spl' => 3,
        'name' => 'Binary Search Trees',
        'slug' => '7sdtbst-binary-search-trees',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 7,
        'spl' => 4,
        'name' => 'AVL Trees',
        'slug' => '7sdtat-avl-trees',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 7,
        'spl' => 5,
        'name' => 'B Trees',
        'slug' => '7sdtbt-b-trees',
        'status_id' => 1,
      ],

      // ROADMAP ID 8 PEMOGRAMAN INTRODUCTION
      [
        'roadmap_id' => 8,
        'spl' => 1,
        'name' => 'Intro Pemograman',
        'slug' => '8piip-intro-pemograman',
        'status_id' => 1,
      ],

      // ROADMAP ID 9 PENGENALAN PEMOGRAMAN
      [
        'roadmap_id' => 9,
        'spl' => 1,
        'name' => 'Intro Pengenalan Pemograman',
        'slug' => '9ppipp-intro-pengenalan-pemograman',
        'status_id' => 1,
      ],

      // ROADMAP ID 10 JALUR PEMOGRAMAN
      [
        'roadmap_id' => 10,
        'spl' => 1,
        'name' => 'Intro Jalur Pemograman',
        'slug' => '10jpijp-intro-jalur-pemograman',
        'status_id' => 1,
      ],

      // ROADMAP ID 11 FRONTEND INTRODUCTION
      [
        'roadmap_id' => 11,
        'spl' => 0,
        'name' => 'Intro Frontend',
        'slug' => '11fiif-intro-frontend',
        'status_id' => 1,
      ],

      // ROADMAP ID 12 INTERNET
      [
        'roadmap_id' => 12,
        'spl' => 1,
        'name' => 'Intro Internet',
        'slug' => '12iii-intro-internet',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 12,
        'spl' => 2,
        'name' => 'Http Dan Https',
        'slug' => '12ihdh-http-dan-https',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 12,
        'spl' => 3,
        'name' => 'Domain Name System',
        'slug' => '12idns-domain-name-system',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 12,
        'spl' => 4,
        'name' => 'Hosting',
        'slug' => '12ih-hosting',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 12,
        'spl' => 5,
        'name' => 'Browser',
        'slug' => '12ib-browser',
        'status_id' => 1,
      ],

      // ROADMAP ID 13 BASIC TOOLS
      [
        'roadmap_id' => 13,
        'spl' => 1,
        'name' => 'Intro Basic Tools',
        'slug' => '13btibt-intro-basic-tools',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 13,
        'spl' => 2,
        'name' => 'Terminal',
        'slug' => '13btt-terminal',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 13,
        'spl' => 3,
        'name' => 'Browser Extention',
        'slug' => '13btbe-browser-extention',
        'status_id' => 1,
      ],

      // ROADMAP ID 14 BACKEND INTRODUCTION
      [
        'roadmap_id' => 14,
        'spl' => 1,
        'name' => 'Intro Backend',
        'slug' => '14biib-intro-backend',
        'status_id' => 1,
      ],

      // ROADMAP ID 15 LEARN A LANGAUGE
      [
        'roadmap_id' => 15,
        'spl' => 1,
        'name' => 'Intro Learn a Language',
        'slug' => '15lalilal-intro-learn-a-language',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 15,
        'spl' => 2,
        'name' => 'PHP',
        'slug' => '15lalp-php',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 15,
        'spl' => 3,
        'name' => 'Javascript',
        'slug' => '15lalj-javascript',
        'status_id' => 1,
      ],

      // ROADMAP ID 16 VERSION CONTROL SYSTEM
      [
        'roadmap_id' => 16,
        'spl' => 1,
        'name' => 'Intro Version Constrol System',
        'slug' => '16vcsivcs-intro-version-control-system',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 16,
        'spl' => 2,
        'name' => 'GIT',
        'slug' => '16vcsg-git',
        'status_id' => 1,
      ],
      [
        'roadmap_id' => 16,
        'spl' => 3,
        'name' => 'Github',
        'slug' => '16vcsg-github',
        'status_id' => 1,
      ],
    ];

    foreach ($playlists as $playlist) {
      Playlist::create($playlist);
    }
  }
}
