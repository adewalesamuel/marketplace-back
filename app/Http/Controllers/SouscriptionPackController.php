<?php
namespace App\Http\Controllers;

use App\Models\SouscriptionPack;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSouscriptionPackRequest;
use App\Http\Requests\UpdateSouscriptionPackRequest;
use Illuminate\Support\Str;


class SouscriptionPackController extends Controller
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
            'souscriptionpacks' => SouscriptionPack::where('id', '>', -1)
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
    public function store(StoreSouscriptionPackRequest $request)
    {
        $validated = $request->validated();

        $souscriptionpack = new SouscriptionPack;

        $souscriptionpack->name = $validated['name'] ?? null;
		$souscriptionpack->description = $validated['description'] ?? null;
		$souscriptionpack->price = $validated['price'] ?? null;
		$souscriptionpack->discount = $validated['discount'] ?? null;
		$souscriptionpack->attributes = $validated['attributes'] ?? null;
		$souscriptionpack->period = $validated['period'] ?? null;
		$souscriptionpack->address = $validated['address'] ?? null;
		$souscriptionpack->img_url = $validated['img_url'] ?? null;
		
        $souscriptionpack->save();

        $data = [
            'success'       => true,
            'souscriptionpack'   => $souscriptionpack
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SouscriptionPack  $souscriptionpack
     * @return \Illuminate\Http\Response
     */
    public function show(SouscriptionPack $souscriptionpack)
    {
        $data = [
            'success' => true,
            'souscriptionpack' => $souscriptionpack
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SouscriptionPack  $souscriptionpack
     * @return \Illuminate\Http\Response
     */
    public function edit(SouscriptionPack $souscriptionpack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SouscriptionPack  $souscriptionpack
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSouscriptionPackRequest $request, SouscriptionPack $souscriptionpack)
    {
        $validated = $request->validated();

        $souscriptionpack->name = $validated['name'] ?? null;
		$souscriptionpack->description = $validated['description'] ?? null;
		$souscriptionpack->price = $validated['price'] ?? null;
		$souscriptionpack->discount = $validated['discount'] ?? null;
		$souscriptionpack->attributes = $validated['attributes'] ?? null;
		$souscriptionpack->period = $validated['period'] ?? null;
		$souscriptionpack->address = $validated['address'] ?? null;
		$souscriptionpack->img_url = $validated['img_url'] ?? null;
		
        $souscriptionpack->save();

        $data = [
            'success'       => true,
            'souscriptionpack'   => $souscriptionpack
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SouscriptionPack  $souscriptionpack
     * @return \Illuminate\Http\Response
     */
    public function destroy(SouscriptionPack $souscriptionpack)
    {   
        $souscriptionpack->delete();

        $data = [
            'success' => true,
            'souscriptionpack' => $souscriptionpack
        ];

        return response()->json($data);
    }
}