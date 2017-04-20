<?php

namespace App\Http\Controllers;

class HelloController extends Controller {

  public function hello($name) {
    //    return view('hello', ['name' => ucfirst($name)]);
        return view('hello', ['name' => ucfirst($name)]);
//    return $this->
  }

}