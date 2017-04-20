<?php

namespace App\Http\Controllers;

use \App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

  public function index() {

    $posts = Post::all();
    // Equivaut à: $posts = (new Post())->newQuery()->get(['*']);
    return view('posts/index', ['posts' => $posts]);
  }

  public function store(Request $request) {

    Post::create($request->only('name', 'content'));
    return redirect()->route('posts.index');
  }

}