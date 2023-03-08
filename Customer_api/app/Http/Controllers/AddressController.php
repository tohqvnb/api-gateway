<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::all();

        return response()->json([
            'status' => true,
            'data' => $address
        ]);
    }


    public function create(Request $request)
    {
        $address = Address::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $address
        ]);
    }


    public function show($id)
    {
        $address = Address::findOrFail($id);
        if(!$address) {
            return response()->json([
                'message' => 'Address not available',
            ], 401  );
        }

        return response()->json(['data' => $address]);
    }


    public function update(Request $request, $id)
    {
        $address = Address::find($id);


        if (!$address) {
            return response()->json([
                'message' => 'Address not found'
            ], 404);
        }

        $address->update($request->all());
        return response()->json([
            'status' => true,
            'data' => $address
        ], 200);
    }


    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted'
        ]);
    }
}
