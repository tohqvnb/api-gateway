<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $product_category = ProductCategory::all();
        return response()->json(array('product_category' => $product_category));
    }
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($validatedData['product_id']);
        $category = Category::findOrFail($validatedData['category_id']);

        $productCategory = new ProductCategory([
            'product_id' => $product->id,
            'category_id' => $category->id,
        ]);

        $productCategory->save();

        return response()->json([
            'message' => 'Product category created successfully'
        ], 201);
    }
}
