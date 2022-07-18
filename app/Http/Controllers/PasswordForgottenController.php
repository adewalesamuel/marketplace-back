<?php
namespace App\Http\Controllers;

use App\Models\PasswordForgotten;
use Illuminate\Http\Request;
use App\Http\Requests\StorePasswordForgottenRequest;
use App\Http\Requests\UpdatePasswordForgottenRequest;
use Illuminate\Support\Str;


class PasswordForgottenController extends Controller
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
            'passwordforgottens' => PasswordForgotten::where('id', '>', -1)
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
    public function store(StorePasswordForgottenRequest $request)
    {
        $validated = $request->validated();

        $passwordforgotten = new PasswordForgotten;

        $passwordforgotten->user_email = $validated['user_email'] ?? null;
		$passwordforgotten->user_type = $validated['user_type'] ?? null;
		$passwordforgotten->token = $validated['token'] ?? null;
		$passwordforgotten->has_been_used = $validated['has_been_used'] ?? null;
		
        $passwordforgotten->save();

        $data = [
            'success'       => true,
            'passwordforgotten'   => $passwordforgotten
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasswordForgotten  $passwordforgotten
     * @return \Illuminate\Http\Response
     */
    public function show(PasswordForgotten $passwordforgotten)
    {
        $data = [
            'success' => true,
            'passwordforgotten' => $passwordforgotten
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasswordForgotten  $passwordforgotten
     * @return \Illuminate\Http\Response
     */
    public function edit(PasswordForgotten $passwordforgotten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasswordForgotten  $passwordforgotten
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePasswordForgottenRequest $request, PasswordForgotten $passwordforgotten)
    {
        $validated = $request->validated();

        $passwordforgotten->user_email = $validated['user_email'] ?? null;
		$passwordforgotten->user_type = $validated['user_type'] ?? null;
		$passwordforgotten->token = $validated['token'] ?? null;
		$passwordforgotten->has_been_used = $validated['has_been_used'] ?? null;
		
        $passwordforgotten->save();

        $data = [
            'success'       => true,
            'passwordforgotten'   => $passwordforgotten
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasswordForgotten  $passwordforgotten
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasswordForgotten $passwordforgotten)
    {   
        $passwordforgotten->delete();

        $data = [
            'success' => true,
            'passwordforgotten' => $passwordforgotten
        ];

        return response()->json($data);
    }
}