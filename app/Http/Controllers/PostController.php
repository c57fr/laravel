<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use \App\Post;

class PostController extends Controller {

  public function index() {

    $posts = Post::orderBy('name')->get();
    // Equivaut à: $posts = (new Post())->newQuery()->get(['*']);
    return view('posts/index', ['posts' => $posts]);
  }

  public function store(PostRequest $request) {

    Post::create($request->only('name', 'content'));
    return redirect()->route('posts.index');
  }

}