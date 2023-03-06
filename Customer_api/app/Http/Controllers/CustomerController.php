<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class CustomerController extends Controller
{

    public function index()
    {
        $customer = Customer::all();

        return response()->json([
            'status' => true,
            'data' => $customer
        ]);
    }


    public function create(Request $request)
    {
        $customer = Customer::create($request->all());
        return response()->json(array(
            'status' => true,
            'data' => $customer
            ));
    }


    public function show($id)
    {
        $customer  = Customer::find($id);
        return response()->json([
           'status' => true,
           'data' => $customer
        ]);
    }


    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json([
                'message' => 'Customer not found'
            ], 404);
        }

        $customer->update($request->all());
        return response()->json(array(
            'status' => true,
            'data' => $customer
        ), 200);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json([
                'message' => 'Customer not found'
            ], 404);
        }

        $customer->delete();

        return response()->json([
            'status' => true,
            'message' => 'Delete customer successfully!'
            ]);
    }
}
