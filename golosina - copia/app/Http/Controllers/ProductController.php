<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Local;

class ProductController extends Controller{
    //
    public function listado(){

      $productos = Product::paginate(16);

      $vac = compact('productos');

      return view('shop', $vac);

    }

    public function seenew(){
      $categorias = Category::all();
      $vac = compact('categorias');
      $locales = Local::all();
      $vac2 = compact('locales');
      return view('new', $vac,$vac2 );
      // return view('new');
    }

    public function create(Request $req){

      $reglas = [
        "avatar" => "file",
      ];

      $mensajes = [
        "file" => "El archivo no es una imagen",
      ];

      $this->validate($req, $reglas, $mensajes);


      $productonuevo = new Product();
      $productonuevo->name = $req["title"];
      $productonuevo->stock = $req["stock"];
      $productonuevo->price = $req["price"];
      $productonuevo->id_category = $req["category_id"];
      $productonuevo->id_local = $req["local_id"];
      if ($req["avatar"]){
        $ruta = $req->file("avatar")->store("public");
        $nombre = basename($ruta);
        // recorta el nombre del archivo
        $productonuevo->avatar = $nombre;
      }
      $productonuevo->save();
      // return redirect("/productos");
      return redirect("/");
    }


    public function detail($id){

      $detalle = Product::find($id);

      $vac = compact('detalle');

      return view('detail', $vac );
    }

    public function edit1($id){

      $detalle = Product::find($id);

      $vac = compact('detalle');

      return view('edit', $vac );
    }


    public function edit2($id,Request $req){
      $detalle = Product::find($id);
      $detalle->name = $req["title"];
      // $detalle->stock = $req["stock"];
      // $detalle->price = $req["price"];
      // $detalle->id_category = $req["category_id"];
      // $detalle->id_local = $req["local_id"];



          if ($req["avatar"]){
            if ($detalle->avatar != null) {
                unlink(storage_path('app/public/'.$detalle->avatar));
            }

                $ruta = $req->file("avatar")->store("public");
                $nombre = basename($ruta);
                // recorta el nombre del archivo
                $detalle->avatar = $nombre;
          }

      $detalle->save();
      // return redirect("/productos");
      return redirect("/editar/$id");
      // return view('edit');

    }

    public function delete(Request $req){
      $id = $req["id"];

      $candy = Product::find($id);
      // dd($candy->avatar);
      unlink(storage_path('app/public/'.$candy->avatar));
      // Storage::disk('public')->delete($candy->avatar);
      // Storage::delete($candy->avatar);
      $candy->delete();

      // return redirect("/productos");
      return redirect("/");

    }


}
