<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

  public function users() {

    $this->belongsToMany('App\User');
  }


  function role_users() {

    $this->hasMany('App\RoleUser');
  }
}
