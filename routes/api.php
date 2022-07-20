<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\SouscriptionPackController;
use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasswordForgottenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\BoostPackController;
use App\Http\Controllers\BoostController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\Auth\ApiAdminAuthController;
use App\Http\Controllers\Auth\ApiArtisanAuthController;
use App\Http\Controllers\Auth\ApiClientAuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('artisans', [ArtisanController::class, 'index']);
Route::get('artisans/{artisan}', [ArtisanController::class, 'show']);

Route::get('souscriptionpacks', [SouscriptionPackController::class, 'index']);
Route::get('souscriptionpacks/{souscriptionpack}', [SouscriptionPackController::class, 'show']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::get('categories/{slug}/artisans', [CategoryController::class, 'artisans']);
Route::get('categories/{slug}/articles', [CategoryController::class, 'articles']);

Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{article}', [ArticleController::class, 'show']);

Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{order}', [OrderController::class, 'show']);

Route::post('passwordforgottens', [PasswordForgottenController::class, 'store']);

Route::get('pages/{page}', [PageController::class, 'show']);

Route::get('boost_packs', [BoostPackController::class, 'index']);
Route::get('boost_packs/{boostpack}', [BoostPackController::class, 'show']);

Route::get('reviewss', [ReviewsController::class, 'index']);
Route::get('reviewss/{reviews}', [ReviewsController::class, 'show']);

Route::prefix('client')->group(function(){
    Route::post('/login', [ApiClientAuthController::class, 'login']);
    
    Route::middleware('auth.api_token:clients')->group(function () {
        //Client routes
        Route::post('/logout', [ApiClientAuthController::class, 'logout']);

        Route::get('/orders', [ClientController::class, 'orders']);
        Route::post('/orders', [ClientController::class, 'storeOrder']);
    });
});

Route::prefix('artisan')->group(function(){
    Route::post('/login', [ApiArtisanAuthController::class, 'login']);

    Route::middleware('auth.api_token:artisans')->group(function () {
        //Artisans routes
        Route::post('/logout', [ApiArtisanAuthController::class, 'logout']);

        Route::post('/pages', [ArtisanController::class, 'storePage']);
        Route::put('/pages/{page}', [ArtisanController::class, 'updatePage']);

        Route::post('/articles', [ArtisanController::class, 'storeArticle']);
        Route::put('/articles/{article}', [ArtisanController::class, 'updateArticle']);
        Route::delete('/articles/{article}', [ArtisanController::class, 'destroyArticle']);

        Route::get('souscriptions', [SouscriptionController::class, 'index']);
        Route::get('souscriptions/{souscription}', [SouscriptionController::class, 'show']);

        Route::get('quotes', [QuoteController::class, 'index']);
        Route::get('quotes/{quote}', [QuoteController::class, 'show']);
    });
});

Route::prefix('admin')->group(function(){
    Route::post('/login', [ApiAdminAuthController::class, 'login']);

    Route::middleware('auth.api_token:admins')->group(function () {
        Route::post('/logout', [ApiAdminAuthController::class, 'logout']);

        Route::post('/artisans', [ArtisanController::class, 'store']);
        Route::put('/artisans/{artisan}', [ArtisanController::class, 'update']);
        Route::delete('/artisans/{artisan}', [ArtisanController::class, 'destroy']);
        
        Route::post('/souscriptionpacks', [SouscriptionPackController::class, 'store']);
        Route::put('/souscriptionpacks/{souscriptionpack}', [SouscriptionPackController::class, 'update']);
        Route::delete('/souscriptionpacks/{souscriptionpack}', [SouscriptionPackController::class, 'destroy']);
    
        Route::post('/souscriptions', [SouscriptionController::class, 'store']);
        Route::put('/souscriptions/{souscription}', [SouscriptionController::class, 'update']);
        Route::delete('/souscriptions/{souscription}', [SouscriptionController::class, 'destroy']);
        
        Route::get('clients', [ClientController::class, 'index']);
        Route::get('clients/{client}', [ClientController::class, 'show']);
        Route::post('/clients', [ClientController::class, 'store']);
        Route::put('/clients/{client}', [ClientController::class, 'update']);
        Route::delete('/clients/{client}', [ClientController::class, 'destroy']);
    
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::put('/categories/{category}', [CategoryController::class, 'update']);
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    
        Route::post('/articles', [ArticleController::class, 'store']);
        Route::put('/articles/{article}', [ArticleController::class, 'update']);
        Route::delete('/articles/{article}', [ArticleController::class, 'destroy']);
    
        Route::post('/orders', [OrderController::class, 'store']);
        Route::put('/orders/{order}', [OrderController::class, 'update']);
        Route::delete('/orders/{order}', [OrderController::class, 'destroy']);
        
        Route::get('/admins', [AdminController::class, 'index']);
        Route::post('/admins', [AdminController::class, 'store']);
        Route::get('/admins/{admin}', [AdminController::class, 'show']);
        Route::put('/admins/{admin}', [AdminController::class, 'update']);
        Route::delete('/admins/{admin}', [AdminController::class, 'destroy']);
        
        Route::get('pages', [PageController::class, 'index']);
        Route::post('/pages', [PageController::class, 'store']);
        Route::put('/pages/{page}', [PageController::class, 'update']);
        Route::delete('/pages/{page}', [PageController::class, 'destroy']);
    
        Route::post('/quotes', [QuoteController::class, 'store']);
        Route::put('/quotes/{quote}', [QuoteController::class, 'update']);
        Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy']);
    
        Route::post('/boost_packs', [BoostPackController::class, 'store']);
        Route::put('/boost_packs/{boostpack}', [BoostPackController::class, 'update']);
        Route::delete('/boost_packs/{boostpack}', [BoostPackController::class, 'destroy']);
    
        Route::get('/boosts', [BoostController::class, 'index']);
        Route::post('/boosts', [BoostController::class, 'store']);
        Route::get('/boosts/{boost}', [BoostController::class, 'show']);
        Route::put('/boosts/{boost}', [BoostController::class, 'update']);
        Route::delete('/boosts/{boost}', [BoostController::class, 'destroy']);
    
        Route::post('/reviewss', [ReviewsController::class, 'store']);
        Route::put('/reviewss/{reviews}', [ReviewsController::class, 'update']);
        Route::delete('/reviewss/{reviews}', [ReviewsController::class, 'destroy']);
    });
});




