<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model {

  public function user() {

    $this->belongsTo('App\User');
  }


  public function role() {

    $this->belongsTo('App\Role');
  }


  public function tags() {

    $this->belongsToMany('App\Tag');
  }

}
