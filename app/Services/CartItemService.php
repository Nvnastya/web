<?php

namespace App\Services;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartItemService
{
    public function getCartItems()
    {
        return CartItem::query()
        ->get();
    }

    public function getCartItemById($id)
    {
        $model = CartItem::query()
            ->where("id", $id)
            ->first();
        if ($model === null){
            throw new NotFoundHttpException('Товар не найден.');

        }
        return $model;
    }

    public function create(array $data)
    {
        return CartItem::create($data);
    }

    public function update(int $id, array $data): CartItem
    {
        $cartItem = $this->getCartItemById($id);
        $cartItem->update($data);
        return $cartItem;
    }

    public function delete(int $id): bool
    {
        $cartItem = $this->getCartItemById($id);
        return $cartItem->delete();
    }
}