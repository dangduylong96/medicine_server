<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';

    public function fk_category()
    {
        return $this->belongsTo('App\Category','id_category','id');
    }
}
