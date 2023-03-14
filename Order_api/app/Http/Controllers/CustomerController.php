<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


/**
 * Summary of CustomerController
 */
class CustomerController extends Controller
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
        $response = $this->client->get('http://127.0.0.1:8000/api/v1/customers/');
        $users = json_decode($response->getBody(), true);

        return response()->json($users);
    }

    public function show($id)
    {
        $response = $this->client->get('http://127.0.0.1:8000/api/v1/customers/' . $id);
        $user = json_decode($response->getBody(), true);

        return response()->json($user);
    }
}
