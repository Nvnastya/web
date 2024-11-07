<?php

namespace App\Http\Controllers;



class ProductController extends Controller
{
    public function list()
    {
        return [
            [
                "id"=> 1,
                "name"=> "Body cream",
                "price"=> 234,
            ],
            [
                "id"=> 2,
                "name"=> "Shower gel",
                "price"=> 1256,
            ],
        ];
    }

    public function info($id)
    {
        return [
            "id"=> $id,
            "name"=> "Body cream",
            "price"=> 234,
        ];
    }
}