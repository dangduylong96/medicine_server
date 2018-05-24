<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='order';
    public function fk_user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function fk_order_detail()
    {
        return $this->hasOne('App\OrderDetail','order_id','id');
    }
}
