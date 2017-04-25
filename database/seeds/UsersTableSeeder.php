<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    DB::table('users')
      ->delete();

    $users = [
      [
        'name'       => 'admin',
        'email'      => 'admin@admin.laravel',
        'password'   => bcrypt('secret'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]
    ];
    DB::table('users')
      ->insert($users);
  }
}
