<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    const STATUSES = [
        0 => 'новый',
        10 => 'подтвержден',
        20 => 'завершен'
    ];

    protected $fillable = [
        'status',
        'client_email',
        'partner_id',
    ];


    public function partner(){

        return $this->belongsTo('App\Partner');
    }

    public function order_products(){

        return $this->hasMany('App\OrderProduct');
    }

    public function products(){

        return $this->belongsToMany('App\Product','order_products')->withPivot('quantity');
    }

    public function fullPrice(){

        return $this->order_products->sum(function ($product){
            return $product->price * $product->quantity;
        });
    }

    public function productsList(){

        return $this->products;
    }

    public function getStatus(){

        return self::STATUSES[$this->status];
    }
}
