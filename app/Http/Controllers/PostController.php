<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;

//use MongoDB\BSON\Regex;

class PostController extends Controller {

  public function index() {

    $posts = DB::table('posts as p')
               ->select('p.*', 'c.name as cat')
               ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
               ->get();

    \Debugbar::info($posts);
    return view('posts/index', ['posts' => $posts]);

  }

  public function store(PostRequest $request) {

    Post::create($request->only('name', 'content'));
    return redirect()->route('posts.index');

  }

  public function edit(Post $post) {

    return view('posts/edit', ['post' => $post]);

  }

  public function update(PostRequest $request, Post $post) {

    $post->update($request->only('name', 'content'));
    return redirect()->route('posts.index');

  }

  public function tests() {

    //    $posts = POST::with('category')->get();


    //    $t = DB::table('posts')->where('content', 'like', '%email%')->value('name');
    // select `name` from `posts` where `content` like '%email%' limit 1

    //    $t = DB::table('posts')->pluck('content');
    // select `content` from `posts`

    //    $t = DB::table('posts')->pluck('content', 'name');
    // select `content`, `name` from `posts`

    /*
    DB::table('posts')->orderBy('id', 'desc')->chunk(100, function ($ps) {
      foreach ($ps as $p) echo $p->name . ' : ' . $p->content . '<br>';
      return false;
    });
    */
    // => select * from `posts` order by `id` desc limit 100 offset 0


    // Aggregates: count(), max, min, avg, and sum
    //     $t = DB::table('posts')->where('content', 'like', '%email%')->avg('category_id');
    // => select avg(`category_id`) as aggregate from `posts` where `content` like '%email%'


    //      $t = DB::table('posts')->select('name', 'created_at as création')->get();
    // => select `name`, `created_at` as `création` from `posts`
    // Aussi avec distinc
    // $t = DB::table('posts')->distinct()->select('name', 'created_at as création')->get();

    //  Ajout sur une instance
    //    $query = DB::table('posts')->distinct()->select('created_at as création');
    //    $t     = $query->addSelect('name')->get();

    // Group By
    // $t = DB::table('posts')->select(DB::raw('count(*), category_id'))->where('category_id', 2)->groupBy('category_id')->get();
    // $t = DB::table('posts')->select(DB::raw('count(*), category_id'))->groupBy('category_id')->get();


    //    $t = DB::table('posts')
    //           ->select('category_id', DB::raw('count(category_id) as Nombre'))
    //           ->groupBy('category_id')
    //           ->get();

    //    $t = DB::table('posts')
    //           ->select('category_id', DB::raw('count(category_id) as Nombre'))
    //           ->groupBy('category_id')
    //           ->havingRaw('Nombre = 2')
    //           ->get();


    // Jointure
    // $t = DB::table('posts')
    // ->select('posts.name as Sujet', 'categories.name')
    // ->leftJoin('categories', 'categories.id', "=", 'posts.category_id')
    // ->get();


    // Jointure avec alias des tables
    //    $t = DB::table('posts as p')
    //           ->select('p.name as Sujet', 'c.name')
    //           ->leftJoin('categories as c', 'c.id', "=", 'p.category_id')
    //           ->get();

    // Cross Join Clause
    //    $t = DB::table('posts as p')
    //           ->crossJoin('categories as c')
    //           ->get();

    //    $t = DB::table('posts as p')
    //           ->select('p.name as Sujet', 'c.name')
    //           ->join('categories as c', function ($join) {
    //             $join->on('p.category_id', '=', 'c.id')
    //                  ->where('c.id', '=', 2);
    //           })
    //           ->orderBy('p.id', 'desc')
    //           ->limit(1, 2)
    //           ->get();


    // Unions
    //    $first = DB::table('posts as p')
    //               ->select('p.name as Titre', 'p.content as Contenu');
    //
    //    $t = DB::table('posts as p')
    //           ->select('created_at', 'updated_at')
    //           ->union($first)
    //           ->get();


    // Between
    //    $t = DB::table('categories')
    //           ->whereBetween('id', [2,4])
    //           ->get();

    /*
        // Exemple d'usage de when'

        $category = 3;

        $t = DB::table('posts')
               ->select('name')
               ->when($category == 2, function ($query) use ($category) {
                 return $query->where('category_id', $category);
               })
               ->get();

        $t[] = DB::table('posts')
                 ->select('name')
                 ->where('category_id', $category)
                 ->get();
    */

    // Double closure pour définir par exemple tri par défaut
    //    $sortBy = 'id'; // null ou '' / id, name,etc...
    //    $order  = 'asc'; // null ou asc
    //    $t      = DB::table('posts')
    //                ->select('name', 'content', 'created_at')
    //                ->when($sortBy, function ($query, $order) use ($sortBy, $order) {
    //                  return $query->orderBy($sortBy, $order);
    //                }, function ($query, $order) {
    //                  return $query->orderBy('name', $order);
    //                })
    //                ->get();

    //INSERTION
    //    DB::table('users')
    //      ->truncate();

    //    $t = DB::table('users')
    //           ->insertGetId([
    //                           'email'    => 'john@example.com',
    //                           'name'     => 'Lionel',
    //                           'password' => '123'
    //                         ]);


    /*
        // UPDATE
        DB::table('users')
          ->where('id', 1)
          ->update(['email' => 456]);
    */


    // INCREMENT - DECREMENT
    //    DB::table('users')
    //      ->where('id', 1)
    //      ->increment('password', 100);


    /*
        // DELETE
        DB::table('users')
          ->where('password', '>', 1000)
          ->delete();
    */

    /*
        // TRUNCATE
        DB::table('users')
          ->truncate();
    */


    // $t = DB::table('users')->where('passsword', '>', 100)->sharedLock()->get(); // Bloque accès lecture + écriture le tps de l'opération
    //    $t = DB::table('users')//           ->where('password', '>', 1000)
    //           ->lockForUpdate()
    //           ->get(); // Bloque accès écriture le tps de l'opération


    $t = DB::table('users')//           ->where('password', '>', 1000)
           ->lockForUpdate()
           ->paginate(3);
    //           ->get(); // Bloque accès écriture le tps de l'opération


    //    $t = 777;
    //    echo 'Nom: ' . $t->name;
    \debug($t);

    $maVar = $t;

    //    \Debugbar::info($posts);
    //    \Debugbar::disable();
    return view('posts/tests', [
      //      'posts' => $posts,
      'elements'  => $maVar,
      'paginator' => $t
    ]);

  }
}

/*
Rappel concernant Debugbar

\Debugbar::info($object);
\Debugbar::error('Error!');
\Debugbar::warning('Watch out…');
\Debugbar::addMessage('Another message', 'mylabel');
*/