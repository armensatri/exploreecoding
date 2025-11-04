<?php

namespace Database\Seeders\Programming;

use App\Models\Programming\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  public function run(): void
  {
    $posts = [
      [
        'user_id' => 1,
        'status_id' => 1,
        'playlist_id' => 1,
        'sp' => 1,
        'title' => 'Belajar Programming Dasar',
        'slug' => 'belajar-programming-dasar',

        'excerpt' => 'Kamu masih bertanya-tanya kan, apa itu programming? Simpel saja, programming adalah sebuah proses untuk membuat program di komputer. Program yang dibuat bisa berupa software, website, aplikasi android, dsb.',

        'content' => 'amu masih bertanya-tanya kan, apa itu programming? Simpel saja, programming adalah sebuah proses untuk membuat program di komputer. Program yang dibuat bisa berupa software, website, aplikasi android, dsb.

        Lalu, mulai dari manakah agar kamu bisa memulai programming? Untuk membuat program tentunya ada beberapa tahapan. Mulai dari tulis menulis, menguji, merevisi, dan mengevaluasi, serta mengujinya lagi sampai program tersebut benar-benar jadi dan sesuai dengan apa yang diinginkan.

        Jadi, programming adalah suatu proses atau kegiatan menulis dan menguji (pemrograman) agar program dapat dibuat, dan hasilnya sesuai apa yang diinginkan.

        Bagaimana, sudah mulai paham kan apa itu programming?',
      ]
    ];

    foreach ($posts as $post) {
      Post::create($post);
    }
  }
}
