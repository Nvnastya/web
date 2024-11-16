<?php

namespace App\Http\Controllers;
use App\Models\CartItem;

use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function list()
    {
        return CartItem::query()
            ->get();
    }

    public function info($id)
    {
        return CartItem::query()
            ->where("id", $id)
            ->first();
    }
}
