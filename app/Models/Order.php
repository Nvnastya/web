<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "cart_items";

    protected $fillable = [
        "user_id",
        "cart_id",
        "total_amount",
        "status",
    ];

    protected $casts = [
        "total_amount" => "double",
    ];
}
