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
                "price"=> 2234,
            ],
            [
                "id"=> 2,
                "name"=> "Shower gel",
                "price"=> 1256,
            ],
            [
                "id"=> 3,
                "name"=> "Washcloth",
                "price"=> 125,
            ],
            [
                "id"=> 4,
                "name"=> "Perfume",
                "price"=> 11256,
            ],
            [
                "id"=> 5,
                "name"=> "Body oil",
                "price"=> 3256,
            ],
        ];
    }

    public function info($id)
    {
        return [
            "id"=> $id,
            "name"=> "Body cream",
            "price"=> 2234,
        ];
    }
}