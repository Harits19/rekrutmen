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

use App\Http\Controllers\HomepageController;

Route::get('/homepage', [HomepageController::class, 'index']);
Route::get('/detail/{id}', [HomepageController::class, 'detail']);
Route::get('/form/{id}', [HomepageController::class, 'form']);

// Route::get('form', function () {
// 	return view('homepage.form_pendaftaran');
// });
use App\Http\Controllers\FormController;

Route::get('/json', [FormController::class, 'json']);
Route::post('/store-json', [FormController::class, 'store_json']);

Route::get('/dynamic', [FormController::class, 'dynamic']);
Route::post('/store-dynamic', [FormController::class, 'store_dynamic'])->name('store-dynamic');;

Route::get('/form_view', [FormController::class, 'form_view']);


