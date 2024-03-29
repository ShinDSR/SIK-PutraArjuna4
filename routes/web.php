<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomFacilityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Room Facility
    Route::get('/room_facilities', [RoomFacilityController::class, 'index'])->name('room_facilities.index');
    Route::get('/room_facilities/create', [RoomFacilityController::class, 'create'])->name('room_facilities.create');
    Route::post('/room_facilities', [RoomFacilityController::class, 'store'])->name('room_facilities.store');
    Route::get('/room_facilities/{roomFacility}/edit', [RoomFacilityController::class, 'edit'])->name('room_facilities.edit');
    Route::patch('/room_facilities/{roomFacility}', [RoomFacilityController::class, 'update'])->name('room_facilities.update');
    Route::delete('/room_facilities/{roomFacility}', [RoomFacilityController::class, 'destroy'])->name('room_facilities.destroy');
    
});

require __DIR__.'/auth.php';
