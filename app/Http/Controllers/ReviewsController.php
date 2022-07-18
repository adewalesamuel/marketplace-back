<?php
namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewsRequest;
use App\Http\Requests\UpdateReviewsRequest;
use Illuminate\Support\Str;


class ReviewsController extends Controller
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
            'reviewss' => Reviews::where('id', '>', -1)
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
    public function store(StoreReviewsRequest $request)
    {
        $validated = $request->validated();

        $reviews = new Reviews;

        $reviews->client_id = $validated['client_id'] ?? null;
		$reviews->artisan_id = $validated['artisan_id'] ?? null;
		$reviews->message = $validated['message'] ?? null;
		$reviews->score = $validated['score'] ?? null;
		
        $reviews->save();

        $data = [
            'success'       => true,
            'reviews'   => $reviews
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        $data = [
            'success' => true,
            'reviews' => $reviews
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewsRequest $request, Reviews $reviews)
    {
        $validated = $request->validated();

        $reviews->client_id = $validated['client_id'] ?? null;
		$reviews->artisan_id = $validated['artisan_id'] ?? null;
		$reviews->message = $validated['message'] ?? null;
		$reviews->score = $validated['score'] ?? null;
		
        $reviews->save();

        $data = [
            'success'       => true,
            'reviews'   => $reviews
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviews $reviews)
    {   
        $reviews->delete();

        $data = [
            'success' => true,
            'reviews' => $reviews
        ];

        return response()->json($data);
    }
}