<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ApiArtisanAuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only("email", "password");
    
        if (!Auth::guard('admin')->once($credentials)) {
            $data = [
                'error' => true,
                'message' => "Mail ou mot de passe incorrect"
            ];

            return response()->json($data, 404);
        }

        $artisan = Artisan::where('email', $credentials['email'])->first();

        $data = [
            "success" => true,
            "artisan" => $artisan
        ];

        return response()->json($data);

    }

    public function logout(Request $request) {
        $token = explode(" ", $request->header('Authorization'))[1];
        $artisan = Artisan::where('api_token', $token)->first();

        if (!$artisan) {
            $data = [
                "error" => true,
                "message" => "Une erreure est survenue"
            ];

            return response()->json($data, 500);
        }

        $artisan->api_token = Str::random(60);

        $artisan->save();

        $data = [
            "success" => true,
        ];

        return response()->json($data, 200);
    }
    
}
