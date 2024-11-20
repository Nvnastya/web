<?php

namespace App\Http\Controllers;
use App\Models\Order;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(OrderService $service)
    {
        return $service->getOrders();
    }

    public function info($id, OrderService $service)
    {
        return $service->getOrderById($id);
    }

    public function create(Request $request, OrderService $service)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'cart_id' => 'required|exists:carts,id',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,paid,shipped,delivered',
        ]);

        return $service->create($fields);
    }

    public function update(Request $request, $id, OrderService $service)
    {
        $fields = $request->validate([
            'user_id' => 'sometimes|integer|exists:users,id',
            'cart_id' => 'sometimes|integer|exists:carts,id',
            'total_amount' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|string|max:255',
        ]);

        return $service->update($id, $fields);
    }

    public function delete($id, OrderService $service)
    {
        $service->delete($id);
        return response()->json(['message' => 'Заказ удалён']);
    }
}

