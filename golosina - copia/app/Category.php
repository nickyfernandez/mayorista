<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $table = 'categorys';
    public $primaryKey = 'id_category';
    public $guarded = [];


    public function getCategorieAll(): string{


        $categorias = Category::all();


        return $categorias;
      }

      





}
