<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function list()
    {
        return Cart::query()
            ->get();
    }

    public function info($id)
    {
        return Cart::query()
            ->where("id", $id)
            ->first();
    }
}
