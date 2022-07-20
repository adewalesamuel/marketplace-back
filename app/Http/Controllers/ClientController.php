<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Support\Str;
use App\Http\Auth;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'success' => true,
            'clients' => Client::where('id', '>', -1)
            ->orderBy('created_at', 'desc')->get()
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();

        $client = new Client;

        $client->name = $validated['name'] ?? null;
		$client->email = $validated['email'] ?? null;
		$client->password = $validated['password'] ?? null;
		$client->phone = $validated['phone'] ?? null;
		$client->country = $validated['country'] ?? null;
		$client->city = $validated['city'] ?? null;
		$client->address = $validated['address'] ?? null;
		$client->is_active = $validated['is_active'] ?? null;
		$client->img_url = $validated['img_url'] ?? null;
        $client->api_token = Str::random(60);
		
        $client->save();

        $data = [
            'success'       => true,
            'client'   => $client
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $data = [
            'success' => true,
            'client' => $client
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $validated = $request->validated();

        $client->name = $validated['name'] ?? null;
		$client->email = $validated['email'] ?? null;
		$client->password = $validated['password'] ?? null;
		$client->phone = $validated['phone'] ?? null;
		$client->country = $validated['country'] ?? null;
		$client->city = $validated['city'] ?? null;
		$client->address = $validated['address'] ?? null;
		$client->is_active = $validated['is_active'] ?? null;
		$client->img_url = $validated['img_url'] ?? null;
		
        $client->save();

        $data = [
            'success'       => true,
            'client'   => $client
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {   
        $client->delete();

        $data = [
            'success' => true,
            'client' => $client
        ];

        return response()->json($data);
    }

    public function orders(Request $request) {
        $user = Auth::getUser($request, Auth::CLIENT);
        $order = Order::where('client_id', $user->id)
        ->with(['article'])->paginate(env('PAGINATE'));

        $data = [
            "success" => true,
            "order" => $order
        ];

        return response()->json($data);
    }

    public function storeOrder(StoreOrderRequest $request) {
        $validated = $request->validated();
        $user = Auth::getUser($request, Auth::CLIENT);
        $order = new Order;

        $order->article_id = $validated['article_id'] ?? null;
		$order->client_id = $user->id ?? null;
		$order->quantity = $validated['quantity'] ?? null;
		$order->price = $validated['price'] ?? null;
		$order->payment_method = $validated['payment_method'] ?? null;
		
        $order->save();

        $data = [
            'success' => true,
            'order'   => $order
        ];
        
        return response()->json($data);
    }
}