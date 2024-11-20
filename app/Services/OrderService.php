<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderService
{
    public function getOrders()
    {
        return Order::query()
        ->get();
    }

    public function getOrderById($id)
    {
        $model = Order::query()
            ->where("id", $id)
            ->first();
        if ($model === null){
            throw new NotFoundHttpException('Товар не найден.');

        }
        return $model;
    }

    public function create(array $data)
    {
        return Order::create($data);
    }

    public function update(int $id, array $data): Order
    {
        $order = $this->getOrderById($id);
        $order->update($data);
        return $order;
    }

    public function delete(int $id): bool
    {
        $order = $this->getOrderById($id);
        return $order->delete();
    }
}