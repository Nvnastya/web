<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = [
        "name",
        "user_id",
        "total",
    ];

    protected $casts = [
        "total" => "double",
    ];
}
