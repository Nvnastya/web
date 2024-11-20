<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryService
{
    public function getCategories()
    {
        return Category::query()
        ->get();
    }

    public function getCategoryById($id)
    {
        $model = Category::query()
            ->where("id", $id)
            ->first();
        if ($model === null){
            throw new NotFoundHttpException('Товар не найден.');

        }
        return $model;
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data): Category
    {
        $category = $this->getCategoryById($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id): bool
    {
        $category = $this->getCategoryById($id);
        return $category->delete();
    }
}