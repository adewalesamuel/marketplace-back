<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Str;
use App\Http\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = [
            'success' => true,
            'admins' => Admin::where('id', '>', -1)
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
    public function store(StoreAdminRequest $request)
    {
        $validated = $request->validated();

        $admin = new Admin;

        $admin->name = $validated['name'] ?? null;
		$admin->email = $validated['email'] ?? null;
		$admin->password = $validated['password'] ?? null;
		$admin->role = $validated['role'] ?? null;
		$admin->img_url = $validated['img_url'] ?? null;
        $admin->api_token = Str::random(60);

		
        $admin->save();

        $data = [
            'success'       => true,
            'admin'   => $admin
        ];
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $data = [
            'success' => true,
            'admin' => $admin
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $validated = $request->validated();

        $admin->name = $validated['name'] ?? null;
		$admin->email = $validated['email'] ?? null;
		$admin->password = $validated['password'] ?? null;
		$admin->role = $validated['role'] ?? null;
		$admin->img_url = $validated['img_url'] ?? null;
        $admin->api_token = Str::random(60);
		
        $admin->save();

        $data = [
            'success'       => true,
            'admin'   => $admin
        ];
        
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {   
        $admin->delete();

        $data = [
            'success' => true,
            'admin' => $admin
        ];

        return response()->json($data);
    }
}