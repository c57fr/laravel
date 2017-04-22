<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    //    $this->load->database();

    $posts = [['name'        => 'Article 1',
               'content'     => 'Rempli / seeder',
               'created_at'  => now(),
               'updated_at'  => now(),
               'category_id' => 1],
              ['name'        => 'Article 2',
               'content'     => ('Exemple d\'email: ' . str_random(5) . '@gmail.com'),
               'created_at'  => now(),
               'updated_at'  => now(),
               'category_id' => 2],
              ['name'        => 'Article 3',
               'content'     => 'Un ch\'ti dernier pour la route',
               'created_at'  => now(),
               'updated_at'  => now(),
               'category_id' => 2]];

    Post::insert($posts);
  }
}
