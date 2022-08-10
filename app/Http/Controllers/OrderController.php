<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Str;


class OrderController extends Controller
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
            'orders' => Order::where('id', '>', -1)
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
    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();

        $order = new Order;

        $order->article_id = $validated['article_id'] ?? null;
		$order->client_id = $validated['client_id'] ?? null;
		$order->quantity = $validated['quantity'] ?? null;
		$order->price = $validated['price'] ?? null;
		$order->payment_status = $validated['payment_status'] ?? null;
		$order->payment_method = $validated['payment_method'] ?? null;
		$order->shipping_place = $validated['shipping_place'] ?? null;
		$order->additionnal_informations = $validated['additionnal_informations'] ?? null;
		
        $order->save();

        $data = [
            'success'       => true,
            'order'   => $order
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $data = [
            'success' => true,
            'order' => $order
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $validated = $request->validated();

        $order->article_id = $validated['article_id'] ?? null;
		$order->client_id = $validated['client_id'] ?? null;
		$order->quantity = $validated['quantity'] ?? null;
		$order->price = $validated['price'] ?? null;
		$order->payment_status = $validated['payment_status'] ?? null;
		$order->payment_method = $validated['payment_method'] ?? null;
        $order->shipping_place = $validated['shipping_place'] ?? null;
		$order->additionnal_informations = $validated['additionnal_informations'] ?? null;
		
        $order->save();

        $data = [
            'success'       => true,
            'order'   => $order
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {   
        $order->delete();

        $data = [
            'success' => true,
            'order' => $order
        ];

        return response()->json($data);
    }
}