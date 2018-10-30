<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function categoria(){
        $this->belongsTo('App\Categoria', 'id_categoria');
    }
}
