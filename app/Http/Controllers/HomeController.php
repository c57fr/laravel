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
         ->except(['test']);
  }


  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {

    return view('home');
  }


  public function test() {

//    $users = User::with('roles')->get();
    $users = User::all();

//    dd($users[0]->name);
//    dd($users[1]->name);
    dd($users[0]);

    //
    //    foreach ($users as $user) {
    //      echo '<strong>' . $user->name . '<br></strong>';
    //      foreach ($user->roles as $role) {
    //        echo '<li>' . $role->name . '</li>';
    //      }
    //    }
    return 'Holly';
  }
}
