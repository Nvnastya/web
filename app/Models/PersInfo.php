<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PersInfo extends Model
{
    protected $table = "pers_infos";

    protected $fillable = [
        "user_id",
        "FIO",
        "phone",
        "address",
    ];

    protected $casts = [
        "sum" => "double",
    ];
}
