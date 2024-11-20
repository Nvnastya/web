<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

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
