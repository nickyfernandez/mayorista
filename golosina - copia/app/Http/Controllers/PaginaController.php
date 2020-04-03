<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Product;

class PaginaController extends Controller
{
    //


    public function index(){
      return view('index');

    }

    public function faq(){
      return view('faq');

    }
    public function listado(){

      return view('shop');

    }

    public function perfil(){

      return view('perfil');

    }

    public function register(){
      return view('register');
    }

    public function login(){
      return view('login');
    }

    public function detail($id){

      $detalle = Product::find($id);

      $vac = compact('detalle');

      return view('detail', $vac );
    }


}
