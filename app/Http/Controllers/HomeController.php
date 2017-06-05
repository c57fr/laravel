<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {

    $this->middleware('auth')
         ->except([
                    'test',
                    'manyToMany'
                  ]);
  }


  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {

    return view('home');
  }


  public function manyToMany() {

    $users = User::with('roles')
                 ->get();
    //    $users = User::all();

    //    dd($users[0]->name);
    //    dd($users[1]->name);
    //            dd($users);

    //
    foreach ($users as $user) {
      echo '<strong>' . $user->name . '<br></strong>';
      foreach ($user->roles as $role) {
        echo '<li>' . $role->name . '</li>';
      }
    }

    echo '<hr>';

    // ToDoLi Requete via table pivot
    echo ' Cf. 2ème requete: http://laravel.sillo.org/many-to-many-to-many/';
    // $users = User::with('roles','role_user')->get();
    // $users = \App\User::with('role_users.role', 'role_users.tags')
    //               ->get();
    // dd($users);
    /*
        foreach ($users as $user) {
          echo '<strong>' . $user->name . '<br></strong>';
          foreach ($user->role_users as $role_user) {
            echo $role_user->role->name . ' :<br>';
            foreach ($role_user->tags as $tag) {
              echo '<li>' . $tag->name . '</li>';
            }
          }
          echo '<br>';
        }
        */
    return '<hr>Holly';
  }


  public function test() {

    return 'Test prêt.';
  }
}
