<?php

namespace App\Http\Controllers;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function list_data(Request $request) {
        $input = $request->all();

        $users = auth()->user();
        $users = json_decode(json_encode($users), true);

        $query = book::get();
        $response = [
            'status' => 200,
            'message' => 'OK',
            'data' => $query->toArray(),
        ];

        return response()->json($response, $response['status']);
    }


}
