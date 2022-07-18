<?php
namespace App\Http\Controllers;

use App\Models\BoostPack;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBoostPackRequest;
use App\Http\Requests\UpdateBoostPackRequest;
use Illuminate\Support\Str;


class BoostPackController extends Controller
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
            'boostpacks' => BoostPack::where('id', '>', -1)
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
    public function store(StoreBoostPackRequest $request)
    {
        $validated = $request->validated();

        $boostpack = new BoostPack;

        $boostpack->name = $validated['name'] ?? null;
		$boostpack->description = $validated['description'] ?? null;
		$boostpack->price = $validated['price'] ?? null;
		$boostpack->discount = $validated['discount'] ?? null;
		$boostpack->img_url = $validated['img_url'] ?? null;
		$boostpack->period = $validated['period'] ?? null;
		
        $boostpack->save();

        $data = [
            'success'       => true,
            'boostpack'   => $boostpack
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoostPack  $boostpack
     * @return \Illuminate\Http\Response
     */
    public function show(BoostPack $boostpack)
    {
        $data = [
            'success' => true,
            'boostpack' => $boostpack
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoostPack  $boostpack
     * @return \Illuminate\Http\Response
     */
    public function edit(BoostPack $boostpack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoostPack  $boostpack
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoostPackRequest $request, BoostPack $boostpack)
    {
        $validated = $request->validated();

        $boostpack->name = $validated['name'] ?? null;
		$boostpack->description = $validated['description'] ?? null;
		$boostpack->price = $validated['price'] ?? null;
		$boostpack->discount = $validated['discount'] ?? null;
		$boostpack->img_url = $validated['img_url'] ?? null;
		$boostpack->period = $validated['period'] ?? null;
		
        $boostpack->save();

        $data = [
            'success'       => true,
            'boostpack'   => $boostpack
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoostPack  $boostpack
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoostPack $boostpack)
    {   
        $boostpack->delete();

        $data = [
            'success' => true,
            'boostpack' => $boostpack
        ];

        return response()->json($data);
    }
}