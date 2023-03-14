<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AddressController extends Controller
{
    private $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function index(Request $request)
    {
        $response = $this->client->get('http://127.0.0.1:8000/api/v1/addresses/');
        $address = json_decode($response->getBody(), true);

        return response()->json($address);
    }

    public function show($id)
    {
        $response = $this->client->get('http://127.0.0.1:8000/api/v1/addresses/' . $id);
        $address = json_decode($response->getBody(), true);

        return response()->json($address);
    }
}
