<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
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
        "avatar" => "image",
        'name' => ['required', 'string', 'max:100', 'min:3', 'unique:products'],
        'stock' => ['required', 'integer', 'max:10', 'min:0'],
        'price' => ['required', 'numeric', 'min:0', 'max:10'],
      ];

      $mensajes = [
        "image" => "El archivo no es una imagen",
        "required" => "El campo esta vacio",
        "string" => "El campo debe ser un texto",
        "integer" => "El campo debe ser un numero entero",
        "numeric" => "El campo debe ser un numero",
        "min" => "Debe tener mas de :min caracteres",
        "max" => "Maximo de :max caracteres",
        "unique" => "El nombre ya esta en uso",
      ];

      $this->validate($req, $reglas, $mensajes);


      $productonuevo = new Product();
      $productonuevo->name = $req["name"];
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
      return redirect("/productos");

    }




    public function detail($id){




      $detalle = Product::find($id);

      $vac = compact('detalle');

      return view('detail', $vac );
      
    }



    public function edit1($id){

      $detalle = Product::find($id);

      // $vac = compact('detalle');

      $categorias = Category::all();
      // $vac1 = compact('categorias');
      $locales = Local::all();
      // $todos = [ categorias => $categorias,
      // locales => $locales ,
      // ];
      // $vac1 = compact('todos');


      // return view('edit', $vac, $vac1  );
      return view('edit')->with('detalle', $detalle)->with('categorias', $categorias)->with('locales', $locales);
    }




    public function edit2($id,Request $req){
      $detalle = Product::find($id);
      $detalle->name = $req["title"];
      $detalle->stock = $req["stock"];
      $detalle->price = $req["price"];
      $detalle->id_category = $req["category_id"];
      $detalle->id_local = $req["local_id"];



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

      return redirect("/productos");


    }


}
