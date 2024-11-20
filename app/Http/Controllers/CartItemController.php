<?php

namespace App\Http\Controllers;
use App\Models\CartItem;

use App\Services\CartItemService;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function list(CartItemService $service)
    {
        return $service->getCartItems();
    }

    public function info($id, CartItemService $service)
    {
        return $service->getCartItemById($id);
    }

    public function create(Request $request, CartItemService $service)
    {
        $fields = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'sum' => 'required|numeric|min:0',
        ]);

        return $service->create($fields);
    }

    public function update(Request $request, $id, CartItemService $service)
    {
        $fields = $request->validate([
            'cart_id' => 'sometimes|integer|exists:carts,id',
            'product_id' => 'sometimes|integer|exists:products,id',
            'quantity' => 'sometimes|integer|min:1',
            'sum' => 'sometimes|numeric|min:0',
        ]);

        return $service->update($id, $fields);
    }

    public function delete($id, CartItemService $service)
    {
        $service->delete($id);
        return response()->json(['message' => 'Элемент корзины удален']);
    }
}

