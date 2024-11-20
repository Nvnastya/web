<?php

namespace App\Http\Controllers;
use App\Services\CategoryService;
use App\Models\CartItem;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(CategoryService $service)
    {
        return $service->getCategories();
    }

    public function info($id, CategoryService $service)
    {
        return $service->getCategoryById($id);
    }

    public function create(Request $request, CategoryService $service)
    {
        $fields = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        return $service->create($fields);
    }

    public function update(Request $request, $id, CategoryService $service)
    {
        $fields = $request->validate([
            'name' => 'sometimes|string|min:3|max:255',
            'description' => 'sometimes|string|max:500',
        ]);

        return $service->update($id, $fields);
    }

    public function delete($id, CategoryService $service)
    {
        $service->delete($id);
        return response()->json(['message' => 'Категория удалена']);
    }
}
