<?php

use Illuminate\Database\Seeder;

class n0UsersTableSeeder extends Seeder {

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
        'email'      => 'admin@admin.la',
        'password'   => bcrypt('pw'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ],
      [
        'name'       => 'Gc7',
        'email'      => 'g7@admin.la',
        'password'   => bcrypt('pw'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ],
      [
        'name'       => 'Lio',
        'email'      => 'lio@admin.la',
        'password'   => bcrypt('pw'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]
    ];
    DB::table('users')
      ->insert($users);
  }
}
