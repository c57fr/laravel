<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

  public $fillable = ['name',
                      'content',
                      'category_id'];

  public function category() {
    return $this->belongsTo(Category::class);
  }
}
