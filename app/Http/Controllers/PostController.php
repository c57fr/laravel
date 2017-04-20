<?php

namespace App\Http\Controllers;

class PostController extends Controller {

  public function index() {

    $posts = Post::all();
    return view('posts/index', ['posts' => $posts]);

  }

}