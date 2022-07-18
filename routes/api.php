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
Route::post('artisans', [ArtisanController::class, 'store']);
Route::get('artisans/{artisan}', [ArtisanController::class, 'show']);
Route::put('artisans/{artisan}', [ArtisanController::class, 'update']);
Route::delete('artisans/{artisan}', [ArtisanController::class, 'destroy']);

Route::get('souscriptionpacks', [SouscriptionPackController::class, 'index']);
Route::post('souscriptionpacks', [SouscriptionPackController::class, 'store']);
Route::get('souscriptionpacks/{souscriptionpack}', [SouscriptionPackController::class, 'show']);
Route::put('souscriptionpacks/{souscriptionpack}', [SouscriptionPackController::class, 'update']);
Route::delete('souscriptionpacks/{souscriptionpack}', [SouscriptionPackController::class, 'destroy']);

Route::get('souscriptions', [SouscriptionController::class, 'index']);
Route::post('souscriptions', [SouscriptionController::class, 'store']);
Route::get('souscriptions/{souscription}', [SouscriptionController::class, 'show']);
Route::put('souscriptions/{souscription}', [SouscriptionController::class, 'update']);
Route::delete('souscriptions/{souscription}', [SouscriptionController::class, 'destroy']);

Route::get('clients', [ClientController::class, 'index']);
Route::post('clients', [ClientController::class, 'store']);
Route::get('clients/{client}', [ClientController::class, 'show']);
Route::put('clients/{client}', [ClientController::class, 'update']);
Route::delete('clients/{client}', [ClientController::class, 'destroy']);

Route::get('categorys', [CategoryController::class, 'index']);
Route::post('categorys', [CategoryController::class, 'store']);
Route::get('categorys/{category}', [CategoryController::class, 'show']);
Route::put('categorys/{category}', [CategoryController::class, 'update']);
Route::delete('categorys/{category}', [CategoryController::class, 'destroy']);

Route::get('articles', [ArticleController::class, 'index']);
Route::post('articles', [ArticleController::class, 'store']);
Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::put('articles/{article}', [ArticleController::class, 'update']);
Route::delete('articles/{article}', [ArticleController::class, 'destroy']);

Route::get('orders', [OrderController::class, 'index']);
Route::post('orders', [OrderController::class, 'store']);
Route::get('orders/{order}', [OrderController::class, 'show']);
Route::put('orders/{order}', [OrderController::class, 'update']);
Route::delete('orders/{order}', [OrderController::class, 'destroy']);

Route::get('passwordforgottens', [PasswordForgottenController::class, 'index']);
Route::post('passwordforgottens', [PasswordForgottenController::class, 'store']);
Route::get('passwordforgottens/{passwordforgotten}', [PasswordForgottenController::class, 'show']);
Route::put('passwordforgottens/{passwordforgotten}', [PasswordForgottenController::class, 'update']);
Route::delete('passwordforgottens/{passwordforgotten}', [PasswordForgottenController::class, 'destroy']);

Route::get('admins', [AdminController::class, 'index']);
Route::post('admins', [AdminController::class, 'store']);
Route::get('admins/{admin}', [AdminController::class, 'show']);
Route::put('admins/{admin}', [AdminController::class, 'update']);
Route::delete('admins/{admin}', [AdminController::class, 'destroy']);

Route::get('pages', [PageController::class, 'index']);
Route::post('pages', [PageController::class, 'store']);
Route::get('pages/{page}', [PageController::class, 'show']);
Route::put('pages/{page}', [PageController::class, 'update']);
Route::delete('pages/{page}', [PageController::class, 'destroy']);

Route::get('quotes', [QuoteController::class, 'index']);
Route::post('quotes', [QuoteController::class, 'store']);
Route::get('quotes/{quote}', [QuoteController::class, 'show']);
Route::put('quotes/{quote}', [QuoteController::class, 'update']);
Route::delete('quotes/{quote}', [QuoteController::class, 'destroy']);

Route::get('boostpacks', [BoostPackController::class, 'index']);
Route::post('boostpacks', [BoostPackController::class, 'store']);
Route::get('boostpacks/{boostpack}', [BoostPackController::class, 'show']);
Route::put('boostpacks/{boostpack}', [BoostPackController::class, 'update']);
Route::delete('boostpacks/{boostpack}', [BoostPackController::class, 'destroy']);

Route::get('boosts', [BoostController::class, 'index']);
Route::post('boosts', [BoostController::class, 'store']);
Route::get('boosts/{boost}', [BoostController::class, 'show']);
Route::put('boosts/{boost}', [BoostController::class, 'update']);
Route::delete('boosts/{boost}', [BoostController::class, 'destroy']);

Route::get('reviewss', [ReviewsController::class, 'index']);
Route::post('reviewss', [ReviewsController::class, 'store']);
Route::get('reviewss/{reviews}', [ReviewsController::class, 'show']);
Route::put('reviewss/{reviews}', [ReviewsController::class, 'update']);
Route::delete('reviewss/{reviews}', [ReviewsController::class, 'destroy']);


