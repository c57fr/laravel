<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

  public function role_users() {

    return $this->belongsToMany('App\RoleUser');
  }
}
