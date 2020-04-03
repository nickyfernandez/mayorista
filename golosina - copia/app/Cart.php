<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $table = 'carts';
  public $primaryKey = 'id_cart';
  public $guarded = [];



  public function getProductName(): string{
    if($this->id_product){
      $product = Product::find($this->id_product);
      return $product->name;
    }
    return "Sin Nombre";
  }
  public function getProductDescripcion(): string{
    if($this->id_product){
      $product = Product::find($this->id_product);
      return $product->descripcion;
    }
    return "Sin Nombre";
  }





}
