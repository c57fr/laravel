<?php

namespace App\Http\Controllers;

use \App\Post;
use App\Http\Requests\PostRequest;

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

  public function edit($id) {

    $post = Post::find($id);
    return view('posts/edit', ['post' => $post]);
  }

  public function update(PostRequest $request, $id) {

    $post = Post::find($id);
    $post->update($request->only('name', 'content'));
    return redirect()->route('posts.index');
  }

}