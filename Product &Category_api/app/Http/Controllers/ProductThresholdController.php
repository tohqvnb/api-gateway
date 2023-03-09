<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductThreshold;

class ProductThresholdController extends Controller
{
    public function index()
    {
        $productThresholds = ProductThreshold::all();
        return response()->json(['product_thresholds' => $productThresholds]);
    }

    public function show($id)
    {
        $productThreshold = ProductThreshold::findOrFail($id);
        return response()->json(['product_threshold' => $productThreshold]);
    }

    public function create(Request $request)
    {
        $data = ($request->all());

        $productPrice = new ProductThreshold();
        $productPrice->product_id = $data['product_id'];
        $productPrice->minimun_quantity = $data['minimun_quantity'];
        $productPrice->maximun_quantity = $data['maximun_quantity'];
        $productPrice->supplier_id = $data['supplier_id'];
        $productPrice->save();

        return response()->json(['product_threshold' => $productPrice], 201);
    }

    public function update(Request $request, $id)
    {
        $productThreshold = ProductThreshold::findOrFail($id);
        $productThreshold->update($request->all());
        return response()->json(['product_threshold' => $productThreshold]);
    }

    public function delete($id)
    {
        $productThreshold = ProductThreshold::findOrFail($id);
        $productThreshold->delete();
        return response()->json(null, 204);
    }
}
