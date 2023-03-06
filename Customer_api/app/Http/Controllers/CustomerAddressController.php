<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerAddressController extends Controller
{
    public function index()
    {
        $customer_address = CustomerAddress::all();

        return response()->json([
            'data' => $customer_address
        ], 200);
    }

    public function show($id)
    {
        $customer_address = CustomerAddress::findOrFail($id);

        if (!$customer_address) {
            return response()->json(['message' => 'Customer address not found'], 404);
        }

       return response()->json(['message' => $customer_address], 200);

    }

    public function create(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $address_id = $request->input('address_id');

        $customer = Customer::findOrFail($customer_id);
        $address = Address::findOrFail($address_id);

        // Tạo mới liên kết khách hàng và địa chỉ trong bảng customer_address
        $customer_address = CustomerAddress::create([
            'customer_id' => $customer_id,
            'address_id' => $address_id
        ]);

        return response()->json($customer_address, 201);
    }


    public function destroy($id)
    {
        $customer_address = CustomerAddress::findOrFail($id)->delete();
        return response()->json(['message' => $customer_address,
            'data' => 'Deleted successfully'],204);
    }
}
