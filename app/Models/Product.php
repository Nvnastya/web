<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        "name",
        "price",
        "description",
        "is_gift",
        "category_id"
    ];

    protected $casts = [
        "price" => "double",
        "is_gift" => "bool",
    ];
}
