<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    public function orders(){

        return $this->hasMany('App\Order');
    }
}
