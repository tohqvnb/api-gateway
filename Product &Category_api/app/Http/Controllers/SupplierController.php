<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        return response()->json([
            'data' => $suppliers,
        ]);
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);

        return response()->json([
            'data' => $supplier,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:suppliers,email',
            'website' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->contact_name = $request->input('contact_name');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->state = $request->input('state');
        $supplier->country = $request->input('country');
        $supplier->phone_number = $request->input('phone_number');
        $supplier->email = $request->input('email');
        $supplier->website = $request->input('website');
        $supplier->save();

        return response()->json([
            'data' => $supplier,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:suppliers,email,'.$id,
            'website' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->input('name');
        $supplier->contact_name = $request->input('contact_name');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->state = $request->input('state');
        $supplier->country = $request->input('country');
        $supplier->phone_number = $request->input('phone_number');
        $supplier->email = $request->input('email');
        $supplier->website = $request->input('website');
        $supplier->save();

        return response()->json([
            'data' => $supplier,
        ]);
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response(null, 204);
    }
}
