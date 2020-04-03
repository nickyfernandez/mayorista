<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    //
    public $table = 'locals';
    public $primaryKey = 'id_local';
    public $guarded = [];
}
