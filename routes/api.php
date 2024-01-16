<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Public routes
// Route::get('/flights', [FlightsController::class, 'index']);
// Route::get('/flights', [FlightsController::class, 'show']);

// Route::post('/flights', [FlightsController::class, 'store']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('flights', FlightsController::class);

//Route::get('/search/{origin}', [FlightsController::class, 'search']);
Route::get('/searchTest', [FlightsController::class, 'searchFromOrigin']);
Route::get('/search', [FlightsController::class, 'search']);
//Route::get('/flights/searchRoute/{origin}/{destination}', [FlightsController::class, 'searchRoute']);
//Route::get('/user', [AuthController::class, 'userInfo']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'users']);
    
});


// Route::middleware('auth:sanctum')->get('/flights', 'FlightsController@index');
