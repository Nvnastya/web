<?php

namespace App\Http\Controllers;

use App\Models\Product;



class ProductController extends Controller
{
    public function list()
    {
        return Product::query()
            ->get();
    }

    
    public function gift()
    {
        return Product::query()
            ->where("is_gift", true)
            ->get();
    }

    public function info($id)
    {
        return Product::query()
            ->where("id", $id)
            ->first();
    }

}