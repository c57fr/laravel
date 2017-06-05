<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTagTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {

    Schema::create('role_user_tag', function (Blueprint $table) {

      $table->increments('id');
      $table->integer('role_user_id')
            ->unsigned();
      $table->integer('tag_id')
            ->unsigned();
      $table->timestamps();
    });
  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {

    Schema::dropIfExists('role_user_tag');
  }
}
