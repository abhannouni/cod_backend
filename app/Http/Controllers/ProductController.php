<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create(Request $request)
    {
        $data = $request->only(['name', 'description', 'price', 'image', 'category_id']);
        $this->productService->createProduct($data);

        return response()->json(['message' => 'Product created']);
    }

    public function browse(Request $request)
    {
        $filters = $request->only(['category']);
        $sortBy = $request->input('sortBy', 'name');
        $products = $this->productService->getAllProducts($filters, $sortBy);

        return response()->json($products);
    }
}
