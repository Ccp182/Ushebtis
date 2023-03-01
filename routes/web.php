<?php

use App\Http\Controllers\InfomessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Infomessage;
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





Route::get('/getInfoMessage', [InfomessageController::class, 'getInfo']);
Route::get('/getInfoMessage/{country}', [InfomessageController::class, 'getInfoCountry']);
Route::get('/getInfoMessage/{country}/{app}', [InfomessageController::class, 'getInfoApp']);



Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('infomessages', InfomessageController::class);
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', LoginController::class)->name('login');
    Route::post('login', [LoginController::class, 'login']);
    //Route::get('register', RegisterController::class)->name('register');
    //Route::post('register', [RegisterController::class, 'register']);
});

Route::get('/', function () {
    return redirect()->route('login');
});

