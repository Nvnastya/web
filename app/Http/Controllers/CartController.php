<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function list(CartService $service)
    {
        return $service->getCarts();
    }

    public function info($id, CartService $service)
    {
        return $service->getCartById($id);
    }

    public function create(Request $request, CartService $service)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
        ]);

        return $service->create($fields);
    }

    public function update(Request $request, $id, CartService $service)
    {
        $fields = $request->validate([
            'user_id' => 'sometimes|integer|exists:users,id',
            'total' => 'sometimes|numeric|min:0',
        ]);

        return $service->update($id, $fields);
    }

    public function delete($id, CartService $service)
    {
        $service->delete($id);
        return response()->json(['message' => 'Корзина удалена']);
    }
}

