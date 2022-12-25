<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\StationFacilityController;
use App\Http\Controllers\TrainStationController;

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [AuthenticatedSessionController::class, 'adminLogin'])->name('admin.login');
Route::get('admin-train/login', [AuthenticatedSessionController::class, 'adminTrainLogin'])->name('admin-train.login');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    // Route::get('/', function () {
    //     return view('auth/login');
    // });

    Route::middleware('adminTrain')->prefix('admin-train')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('users', [UserController::class, 'index'])->name('users.index');

        Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('train', TrainController::class);
        Route::resource('station', StationController::class)->only(['index', 'show']);
        Route::resource('trainStation', TrainStationController::class);
    });


    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('users', [UserController::class, 'index'])->name('users.index');

        Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('train', TrainController::class)->only(['index']);
        Route::resource('station', StationController::class);
        Route::resource('stationFacility', StationFacilityController::class);
        Route::resource('trainStation', TrainStationController::class);
    });
});
