<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table = 'products';
    public $primaryKey = 'id';
    public $guarded = [];


    public function getCategorieName(): string{

      if($this->id_category){
        $category = Category::find($this->id_category);


        return $category->name;
      }

      return "Sin Categoria";
    }

    public function getLocalName(): string{

      if($this->id_local){
        $local = Local::find($this->id_local);


        return $local->local;
      }

      return "Sin Local";
    }

    public function getCategorieAll(): string{


        $categorias = Category::all();


        return $categorias;
      }





    public function tag(){
      return $this->belongsToMany(Tag::class);
      // return $this->belongsToMany('App\tag','id_tag_product',id_product','id_tag');
    }

    public function category(){
      // return $this->belongTo('App\Tipo','id_kind');
      return $this->belongTo(Category::class);
    }

    public function users(){
      // return $this->belongsToMany("App\User","mi_carrito","candy_id","user_id" );
      return $this->belongsToMany(User::class);
      // hacer table intermeda
    }

    public function local(){
      // return $this->belongTo('App\Tipo','id_kind');
      return $this->belongTo(Local::class);
    }
}
