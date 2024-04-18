<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketsController;
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

//admin functions
Route::post('/add', [FlightsController::class, 'add']);
Route::post('/delete', [FlightsController::class, 'delete']);
Route::put('/update/{id}', [FlightsController::class, 'update']);

Route::post('/tickets', [TicketsController::class, 'store']);
Route::get('/tickets', [TicketsController::class, 'index']);

Route::resource('flights', FlightsController::class);

Route::get('/search', [FlightsController::class, 'search']);
Route::get('/show/{id}', [FlightsController::class, 'show']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'users']);
    
});


// Route::middleware('auth:sanctum')->get('/flights', 'FlightsController@index');
