<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductStock;

class ProductStockController extends Controller
{
    public function index()
    {
        $stocks = ProductStock::all();

        return response()->json([
            'data' => $stocks
        ]);
    }

    public function show($id)
    {
        $stock = ProductStock::find($id);

        if (!$stock) {
            return response()->json([
                'message' => 'Stock not found'
            ], 404);
        }

        return response()->json([
            'data' => $stock
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'sku' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
        ]);

        $stock = ProductStock::create([
            'product_id' => $request->input('product_id'),
            'sku' => $request->input('sku'),
            'price' => $request->input('price'),
            'qty' => $request->input('qty')
        ]);

        return response()->json([
            'data' => $stock
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $stock = ProductStock::find($id);

        if (!$stock) {
            return response()->json([
                'message' => 'Stock not found'
            ], 404);
        }

        $this->validate($request, [
            'product_id' => 'exists:products,id',
            'sku' => '',
            'price' => 'numeric',
            'qty' => 'integer',
        ]);

        $stock->product_id = $request->input('product_id', $stock->product_id);
        $stock->sku = $request->input('sku', $stock->sku);
        $stock->price = $request->input('price', $stock->price);
        $stock->qty = $request->input('qty', $stock->qty);

        $stock->save();

        return response()->json([
            'data' => $stock
        ]);
    }

    public function delete($id)
    {
        $stock = ProductStock::find($id);

        if (!$stock) {
            return response()->json([
                'message' => 'Stock not found'
            ], 404);
        }

        $stock->delete();

        return response()->json([
            'message' => 'Stock deleted'
        ]);
    }
}
