<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = "cart_items";

    protected $fillable = [
        "cart_id",
        "product_id",
        "quantity",
        "sum",
    ];

    protected $casts = [
        "sum" => "double",
    ];
}
