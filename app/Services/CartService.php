<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartService
{
    public function getCarts()
    {
        return Cart::query()
        ->get();
    }

    public function getCartById($id)
    {
        $model = Cart::query()
            ->where("id", $id)
            ->first();
        if ($model === null){
            throw new NotFoundHttpException('Товар не найден.');

        }
        return $model;
    }

    public function create(array $data)
    {
        return Cart::create($data);
    }

    public function update(int $id, array $data): Cart
    {
        $cart = $this->getCartById($id);
        $cart->update($data);
        return $cart;
    }

    public function delete(int $id): bool
    {
        $cart = $this->getCartById($id);
        return $cart->delete();
    }
}