<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        return Order::query()
            ->get();
    }

    public function info($id)
    {
        return Order::query()
            ->where("id", $id)
            ->first();
    }
}
