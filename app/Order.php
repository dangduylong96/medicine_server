<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';
    public function fk_product()
    {
        return $this->belongsTo('App\Product','id_product','id');
    }
}
