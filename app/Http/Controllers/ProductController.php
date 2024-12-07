<?php

namespace App\Http\Controllers;
use App\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function list(ProductService $service)
    {
        return $service->getProducts();
    }

    
    public function gift(ProductService $service)
    {
        return $service->getProductsgift();
    }

    public function info($id, ProductService $service)
    {
        return $service->getProductById($id);
    }

    public function create(Request $request, ProductService $service)
    {
        $fields = $request->validate([
            'name' => 'required|string|min:5', 
            'image_url' => 'nullable|url',
            'price'=> 'required|numeric',
            'description' => 'nullable|string',
            'is_gift' => 'required|boolean', 
            'category_id' => 'required|exists:categories,id', 
        ]);

        return $service->create($fields);
    }

    public function update(Request $request, $id, ProductService $service)
    {
        $fields = $request->validate([
            'name' => 'sometimes|string|min:3|max:255',
            'image_url' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'description' => 'sometimes|string|max:500',
            'is_gift' => 'sometimes|boolean',
            'category_id' => 'sometimes|exists:categories,id',
        ]);

        return $service->update($id, $fields);
    }

    public function delete($id, ProductService $service)
    {
        $service->delete($id);
        return response()->json(['message' => 'Продукт удалён']);
    }
}