<?php
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EventController;
use App\Http\Controllers\ClanController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PdfController;
use BaconQrCode\Renderer\Color\Rgb;

Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');

// Clans

Route::get('/clans', [ClanController::class, 'index']);
Route::get('/clans/create', [ClanController::class, 'create'])->middleware('auth');
Route::get('/clans/{id}', [ClanController::class, 'show']);
Route::post('/clans/store', [ClanController::class, 'store']);
Route::delete('/clans/{id}', [ClanController::class, 'destroy'])->middleware('auth');
Route::get('/clans/edit/{id}', [ClanController::class, 'edit'])->middleware('auth');
Route::put('/clans/update/{id}', [ClanController::class, 'update'])->middleware('auth');
Route::get('/clans/user/dashboard', [ClanController::class, 'dashboard'])->middleware('auth');

// PDF

Route::get('/events/user/pdf', [PdfController::class, 'events'])->middleware('auth');
Route::get('/clans/user/pdf', [PdfController::class, 'clans'])->middleware('auth');

// Games

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/create', [GameController::class, 'create'])->middleware('auth');
Route::get('/games/{id}', [GameController::class, 'show']);
Route::post('/games/store', [GameController::class, 'store']);
Route::delete('/games/{id}', [GameController::class, 'destroy'])->middleware('auth');
Route::get('/games/edit/{id}', [GameController::class, 'edit'])->middleware('auth');
Route::put('/games/update/{id}', [GameController::class, 'update'])->middleware('auth');
Route::get('/games/user/dashboard', [GameController::class, 'dashboard'])->middleware('auth');