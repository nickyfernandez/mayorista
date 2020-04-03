<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table = 'products';
    public $primaryKey = 'id';
    public $guarded = [];



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
}
