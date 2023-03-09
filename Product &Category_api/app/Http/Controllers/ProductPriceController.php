<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPrice;

class ProductPriceController extends Controller
{
    public function create(Request $request)
    {
        // Lấy dữ liệu từ yêu cầu
        $data = $request->all();

        // Tạo mới ProductPrice
        $productPrice = new ProductPrice();
        $productPrice->price = $data['price'];
        $productPrice->min_qty = $data['min_qty'];
        $productPrice->max_qty = $data['max_qty'];
        $productPrice->product_id = $data['product_id'];
        $productPrice->save();

        // Trả về response
        return response()->json([
            'message' => 'ProductPrice created successfully',
            'data' => $productPrice
        ]);
    }

    public function get($id)
    {
        // Lấy ProductPrice theo ID
        $productPrice = ProductPrice::find($id);

        // Kiểm tra xem ProductPrice có tồn tại hay không
        if (!$productPrice) {
            return response()->json([
                'message' => 'ProductPrice not found'
            ], 404);
        }

        // Trả về response
        return response()->json([
            'data' => $productPrice
        ]);
    }

    public function update(Request $request, $id)
    {
        // Lấy dữ liệu từ yêu cầu
        $data = $request->all();

        // Lấy ProductPrice theo ID
        $productPrice = ProductPrice::find($id);

        // Kiểm tra xem ProductPrice có tồn tại hay không
        if (!$productPrice) {
            return response()->json([
                'message' => 'ProductPrice not found'
            ], 404);
        }

        // Cập nhật ProductPrice
        $productPrice->price = $data['price'];
        $productPrice->min_qty = $data['min_qty'];
        $productPrice->max_qty = $data['max_qty'];
        $productPrice->product_id = $data['product_id'];
        $productPrice->save();

        // Trả về response
        return response()->json([
            'message' => 'ProductPrice updated successfully',
            'data' => $productPrice
        ]);
    }

    public function delete($id)
    {
        // Lấy ProductPrice theo ID
        $productPrice = ProductPrice::find($id);

        // Kiểm tra xem ProductPrice có tồn tại hay không
        if (!$productPrice) {
            return response()->json([
                'message' => 'ProductPrice not found'
            ], 404);
        }

        // Xóa ProductPrice
        $productPrice->delete();

        // Trả về response
        return response()->json([
            'message' => 'ProductPrice deleted successfully'
        ]);
    }
}
