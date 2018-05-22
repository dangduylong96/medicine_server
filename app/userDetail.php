<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table='user_detail';
    public function fk_user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }
}
