<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('beranda', function () {
	return view('beranda');
});

Route::get('homepage', function () {
	return view('homepage.homepage');
});

Route::get('masuk', function () {
	return view('masuk');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


use App\Http\Controllers\EmailController;

Route::get('/send_email', [EmailController::class, 'send_email']);

use App\Http\Controllers\JobController;

Route::get('/enqueue', [JobController::class, 'enqueue']);
