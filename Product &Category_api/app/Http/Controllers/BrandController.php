<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        return response()->json($brand);
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->input('name');
        $brand->logo = $request->input('logo');
        $brand->serial = $request->input('serial');
        $brand->slug = $request->input('slug');
        $brand->save();
        return response()->json($brand);
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $brand->logo = $request->input('logo');
        $brand->serial = $request->input('serial');
        $brand->slug = $request->input('slug');
        $brand->save();
        return response()->json($brand);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return response()->json('Brand removed successfully');
    }
}
