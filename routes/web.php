<?php
//Cache::flush();

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//URL::forceScheme('https');

Route::get('/', function () {
  return view('welcome');
});

Route::group(['prefix' => 'adomin', 'middleware' => 'auth'], function () {

  Route::get('ok', function () {
    return 'Oki';
  });

  Route::get('', function () {
    return 'Ajouter "/ok" à l\'URL';
  });

});


Route::get('salut', function () {
  return 'Salut les gens ! (GA)';
});

// Fonctionne   http://laravel/salut/slug-marc-1
/*
Route::get('salut/slug-{name}-{id}', function ($slug, $id) {
  return ('Slug: ' . ucfirst($slug) . '<br>Id: ' . $id );
});
Maintenant, essai sans slug dans la route
*/
Route::get('salut/{slug}-{id}', ['as' => 'salut', function ($slug, $id) {
  //  return ('Lien: /salut/' . $slug . '-' . $id );

  // Comme route nommée avec as:
  return ('Lien: ' . route('salut', ['slug' => 'le-lien-est-' . $slug, 'id' => $id]));

}])->where('slug', '[a-z0-9\-]+')->where('id', '[0-9]+');


Route::get('salut/{name}', 'HelloController@hello')->name('hello');


// Là où j'en suis... (Lionel)
//Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController',]);


// Ajouter $route = Route::get('... pour la route à tester
//dd($route);

// Ds console: php artisan route:list
// as => nom de la route

// Autre que get: post, put, delete

Route::get('test1', function () {
  //    return 'Je suis une page de test'; // Retourne une chaîne
  //    return [1,2,3]; // Retourne du JSON
  //  return response('un test', 206)->header('Content-Type', 'text/plain'); // Retourne un code partiel
  return view('vue1');
})->name('test');

// Différentes façons d'envoyer un paramètre à une vue

Route::get('article/{n}', function ($n) {
  //  return view('documents/article')->with('numero', $n);
  //  return view('documents/article', ['numero' => $n]);
  return view('documents/article')->withNumero($n);
})->where('n', '[0-9]+');


Route::get('facture/{n}', function ($n) {
  return view('documents/facture')->withNumero($n);
})->where('n', '[0-9]+');

Route::get('posts', 'PostController@index')->name('posts.index');
Route::post('posts', 'PostController@store');