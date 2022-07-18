<?php
namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use Illuminate\Support\Str;


class QuoteController extends Controller
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
            'quotes' => Quote::where('id', '>', -1)
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
    public function store(StoreQuoteRequest $request)
    {
        $validated = $request->validated();

        $quote = new Quote;

        $quote->artisan_id = $validated['artisan_id'] ?? null;
		$quote->message = $validated['message'] ?? null;
		$quote->client_email = $validated['client_email'] ?? null;
		
        $quote->save();

        $data = [
            'success'       => true,
            'quote'   => $quote
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        $data = [
            'success' => true,
            'quote' => $quote
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $validated = $request->validated();

        $quote->artisan_id = $validated['artisan_id'] ?? null;
		$quote->message = $validated['message'] ?? null;
		$quote->client_email = $validated['client_email'] ?? null;
		
        $quote->save();

        $data = [
            'success'       => true,
            'quote'   => $quote
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {   
        $quote->delete();

        $data = [
            'success' => true,
            'quote' => $quote
        ];

        return response()->json($data);
    }
}