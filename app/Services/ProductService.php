<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductService
{
    public function getProducts()
    {
        return Product::query()
        ->get();
    }

    public function getProductById($id)
    {
        $model = Product::query()
            ->where("id", $id)
            ->first();
        if ($model === null){
            throw new NotFoundHttpException('Товар не найден.');

        }
        return $model;
    }

    public function getProductsgift()
    {
        return Product::query()
            ->where("is_gift", true)
            ->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(int $id, array $data): Product
    {
        $product = $this->getProductById($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool
    {
        $product = $this->getProductById($id);
        return $product->delete();
    }
}