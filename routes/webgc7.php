<?php

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

Route::get('/', function () {
  return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

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


Route::get('salut/{name}', function ($name) {
  return ('Salut, ' . ucfirst($name) . ' !');
});


// Là où j'en suis... (Lionel)
//Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController',]);


// Ajouter $route = Route::get('... pour la route à tester
//dd($route);

// Ds console: php artisan route:list
// as => nom de la route

// Autre que get: post, put, delete
