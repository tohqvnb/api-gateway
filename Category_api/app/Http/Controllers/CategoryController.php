<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json(['data' => $category]);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json(['data' => $category]);
    }


    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255|unique:categories',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json(['data' => $category], 201);
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return response()->json([
            "message" => "Success update category",
            "data" => $category
        ], 200);
    }

    public function delete ($id)
    {
        $category = Category::findOrFail($id)->delete();
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response('Deleted Successfully', 200);
    }
}
