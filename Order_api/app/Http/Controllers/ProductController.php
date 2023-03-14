<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class ProductController extends Controller
{
    private $client;

    /**
     * Summary of __construct
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index(Request $request)
    {
        $response = $this->client->get('http://127.0.0.1:8002/api/products');
        $users = json_decode($response->getBody(), true);

        return response()->json($users);
    }

    public function show($id)
    {
        $response = $this->client->get('http://127.0.0.1:8002/api/products/' . $id);
        $user = json_decode($response->getBody(), true);

        return response()->json($user);
    }
}
