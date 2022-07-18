<?php
namespace App\Http\Controllers;

use App\Models\Artisan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArtisanRequest;
use App\Http\Requests\UpdateArtisanRequest;
use Illuminate\Support\Str;


class ArtisanController extends Controller
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
            'artisans' => Artisan::where('id', '>', -1)
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
    public function store(StoreArtisanRequest $request)
    {
        $validated = $request->validated();

        $artisan = new Artisan;

        $artisan->name = $validated['name'] ?? null;
		$artisan->email = $validated['email'] ?? null;
		$artisan->password = $validated['password'] ?? null;
		$artisan->phone = $validated['phone'] ?? null;
		$artisan->country = $validated['country'] ?? null;
		$artisan->city = $validated['city'] ?? null;
		$artisan->postal_code = $validated['postal_code'] ?? null;
		$artisan->address = $validated['address'] ?? null;
		$artisan->is_active = $validated['is_active'] ?? null;
		$artisan->img_url = $validated['img_url'] ?? null;
		$artisan->api_token = $validated['api_token'] ?? null;
		
        $artisan->save();

        $data = [
            'success'       => true,
            'artisan'   => $artisan
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function show(Artisan $artisan)
    {
        $data = [
            'success' => true,
            'artisan' => $artisan
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function edit(Artisan $artisan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtisanRequest $request, Artisan $artisan)
    {
        $validated = $request->validated();

        $artisan->name = $validated['name'] ?? null;
		$artisan->email = $validated['email'] ?? null;
		$artisan->password = $validated['password'] ?? null;
		$artisan->phone = $validated['phone'] ?? null;
		$artisan->country = $validated['country'] ?? null;
		$artisan->city = $validated['city'] ?? null;
		$artisan->postal_code = $validated['postal_code'] ?? null;
		$artisan->address = $validated['address'] ?? null;
		$artisan->is_active = $validated['is_active'] ?? null;
		$artisan->img_url = $validated['img_url'] ?? null;
		$artisan->api_token = $validated['api_token'] ?? null;
		
        $artisan->save();

        $data = [
            'success'       => true,
            'artisan'   => $artisan
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artisan  $artisan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artisan $artisan)
    {   
        $artisan->delete();

        $data = [
            'success' => true,
            'artisan' => $artisan
        ];

        return response()->json($data);
    }
}