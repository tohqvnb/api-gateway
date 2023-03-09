<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index() {
        $product = Product::all();
        return response()->json(['data' => $product]);
    }

    public function create(Request $request)
    {
        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_code = $request->product_code;
        $product->status = $request->status;
        $product->discount = $request->discount;
        $product->slug = $request->slug;
        $product->featured = $request->featured;
        $product->available = $request->available;
        $product->product_image = $request->product_image;
        $product->is_physical = $request->is_physical;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->starts_at = $request->starts_at;
        $product->ends_at = $request->ends_at;

        $product->save();

        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json(['data' => $product]);
    }

//    public function update(Request $request, $id)
//    {
//        $product = Product::find($id);
//
//        if (!$product) {
//            return response()->json(['message' => 'Product not found'], 404);
//        }
//
//        $this->validate($request, [
//            'name' => 'required|unique:products'. $product->id,
//            'description' => 'required',
//            'price' => 'required|numeric',
//            'product_code' => 'required',
//            'status' => 'required',
//            'discount' => 'required|float',
//            'slug' => 'required',
//            'featured' => 'required',
//            'available' => 'required',
//            'product_image' => 'required',
//            'is_physical' => 'required',
//            'size' => 'required|integer',
//            'color' => 'required',
//            'brand_id' => 'required|integer',
//            'supplier_id' => 'required|integer',
//            'starts_at' => 'required',
//            'end_at' => 'required'
//        ]);
//
//        $product->name = $request->name;
//        $product->description = $request->description;
//        $product->price = $request->price;
//        $product->product_code = $request->product_code;
//        $product->status = $request->status;
//        $product->discount = $request->discount;
//        $product->slug = $request->slug;
//        $product->featured = $request->featured;
//        $product->available = $request->available;
//        $product->product_image = $request->product_image;
//        $product->is_physical = $request->is_physical;
//        $product->size = $request->size;
//        $product->color = $request->color;
//        $product->brand_id = $request->brand_id;
//        $product->supplier_id = $request->supplier_id;
//        $product->starts_at = $request->starts_at;
//        $product->ends_at = $request->ends_at;
//        $product->save();
//
//
//
//        return response()->json(['data' => $product]);
//    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->product_code = $request->product_code;
            $product->status = $request->status;
            $product->discount = $request->discount;
            $product->slug = $request->slug;
            $product->featured = $request->featured;
            $product->available = $request->available;
            $product->product_image = $request->product_image;
            $product->is_physical = $request->is_physical;
            $product->size = $request->size;
            $product->color = $request->color;
            $product->brand_id = $request->brand_id;
            $product->supplier_id = $request->supplier_id;
            $product->starts_at = $request->starts_at;
            $product->ends_at = $request->ends_at;

            $product->save();

            return response()->json($product, 200);
        } else {
            return response()->json(['message' => "Updated product failed"], 400);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['data' => 'Product deleted successfully']);

    }
}

