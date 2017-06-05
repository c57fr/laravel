<?php

use Illuminate\Database\Seeder;

class TutoBestMomoTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    DB::table('roles')
      ->insert([

                 ['name' => 'role1'],
                 ['name' => 'role2'],

               ]);


    DB::table('tags')
      ->insert([

                 ['name' => 'tag1'],
                 ['name' => 'tag2'],
                 ['name' => 'tag3'],

               ]);

    DB::table('role_user')
      ->insert([

                 [
                   'user_id' => 1,
                   'role_id' => 1
                 ],
                 [
                   'user_id' => 1,
                   'role_id' => 2
                 ],
                 [
                   'user_id' => 2,
                   'role_id' => 1
                 ],
                 [
                   'user_id' => 3,
                   'role_id' => 2
                 ],

               ]);

    DB::table('role_user_tag')
      ->insert([

                 [
                   'role_user_id' => 1,
                   'tag_id'       => 1
                 ],
                 [
                   'role_user_id' => 1,
                   'tag_id'       => 2
                 ],
                 [
                   'role_user_id' => 2,
                   'tag_id'       => 2
                 ],
                 [
                   'role_user_id' => 2,
                   'tag_id'       => 3
                 ],
                 [
                   'role_user_id' => 3,
                   'tag_id'       => 1
                 ],
                 [
                   'role_user_id' => 3,
                   'tag_id'       => 2
                 ],
                 [
                   'role_user_id' => 4,
                   'tag_id'       => 1
                 ],
                 [
                   'role_user_id' => 4,
                   'tag_id'       => 2
                 ],
                 [
                   'role_user_id' => 4,
                   'tag_id'       => 3
                 ],

               ]);
  }
}
