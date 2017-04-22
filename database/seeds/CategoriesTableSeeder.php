<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    $categories = [['name' => 'Catégorie 1'],
                   ['name' => 'Catégorie 2']];

//    DB::table('categories')->insert($categories);
    Category::insert($categories);
  }
}
