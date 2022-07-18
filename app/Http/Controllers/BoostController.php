<?php
namespace App\Http\Controllers;

use App\Models\Boost;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBoostRequest;
use App\Http\Requests\UpdateBoostRequest;
use Illuminate\Support\Str;


class BoostController extends Controller
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
            'boosts' => Boost::where('id', '>', -1)
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
    public function store(StoreBoostRequest $request)
    {
        $validated = $request->validated();

        $boost = new Boost;

        $boost->boost_pack_id = $validated['boost_pack_id'] ?? null;
		$boost->artisan_id = $validated['artisan_id'] ?? null;
		$boost->payment_status = $validated['payment_status'] ?? null;
		$boost->payment_method = $validated['payment_method'] ?? null;
		
        $boost->save();

        $data = [
            'success'       => true,
            'boost'   => $boost
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function show(Boost $boost)
    {
        $data = [
            'success' => true,
            'boost' => $boost
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function edit(Boost $boost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoostRequest $request, Boost $boost)
    {
        $validated = $request->validated();

        $boost->boost_pack_id = $validated['boost_pack_id'] ?? null;
		$boost->artisan_id = $validated['artisan_id'] ?? null;
		$boost->payment_status = $validated['payment_status'] ?? null;
		$boost->payment_method = $validated['payment_method'] ?? null;
		
        $boost->save();

        $data = [
            'success'       => true,
            'boost'   => $boost
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boost  $boost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boost $boost)
    {   
        $boost->delete();

        $data = [
            'success' => true,
            'boost' => $boost
        ];

        return response()->json($data);
    }
}