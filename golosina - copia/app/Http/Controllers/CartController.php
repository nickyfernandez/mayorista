<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Cart;
use App\Product;
use App\Category;
use App\Local;

class CartController extends Controller
{
    //

    public function listado(){
  // $productousuario = Carrito::where("user_id",Auth::user()->id);
  // $listaproductos = $productousuario::paginate(5);
  $productos = Cart::all();
  $vac = compact('productos');
  return view('cart', $vac);
  }


  public function add(Request $req){


    if ($req["usuario"]==0){
      return redirect("/login");
    }else{

      $reglas = [
        "avatar" => "file",
      ];

      $mensajes = [
        "file" => "El archivo no es una imagen",
      ];

      $this->validate($req, $reglas, $mensajes);
      $productonuevo = new Cart();
      $productonuevo->id_user = $req["usuario"];
      $productonuevo->id_product = $req["id"];
      $productonuevo->price = $req["price"];
      $productonuevo->quantity = $req["quantity"];

      $detalle = Product::find($req["id"]);
      $productonuevo->avatar = $detalle->avatar;


      $productonuevo->save();

      $url = url()->previous();

      return redirect($url);

      // return javascript:history.go(-1);

      // return back()->withInput();

      // Redirect::back()

      // return redirect("javascript:history.go(-1)");

      // <a href="{{ route('clientes', array('cliente' => $cliente->id, 'page' => Input::get('page'))) }}">&laquo; Volver</a>
      // return redirect("/")->with('nombreproducto', $nombreproducto);
    }

  }



  public function cancel($id){

    $compra = Cart::find($id);
    $compra->deleteit = 1;

    $compra->save();

    return redirect("/carrito");
  }


  // public function pedido(){
  //
  //   $productos = Cart::all();
  //
  //   foreach ($productos as $producto) {
  //     if ($producto->id_user == (Auth::user()->id)) {
  //       if ($producto->deleteit == 1) {
  //         continue;
  //       }
  //       if ($producto->buyit == 1) {
  //         continue;
  //       }
  //
  //
  //       $productonuevo = new Pedido();
  //       $productonuevo->id_user = $req["usuario"];
  //       $productonuevo->id_product = $req["id"];
  //       $productonuevo->price = $req["price"];
  //       $productonuevo->quantity = $req["quantity"];
  //
  //
  //     }
  //
  //   }
  //
  //   return view('cart', $vac);
  // }
  //



}
