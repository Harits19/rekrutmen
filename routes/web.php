<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\TestController;
use App\Models\Rekrutmen;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/a', function () {
//     return view('homepage.homepage');
// });

// Route::get('beranda', function () {
// 	return view('admin.beranda');
// });

Route::get('/', [BerandaController::class, 'index']);
Route::get('/detail/{id}', [BerandaController::class, 'detail']);
Route::get('/form/{id}', [BerandaController::class, 'form']);
Route::post('/store', [BerandaController::class, 'store']);
Route::get('/konfirmasi/{kode}', [BerandaController::class, 'konfirmasi']);
Route::get('/word', [BerandaController::class, 'word']);
Route::get('/search', [BerandaController::class, 'search']);


// Route::resource('rekrutmen', RekrutmenController::class);





// Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard']);
    
    Route::resource('rekrutmen', RekrutmenController::class);
    
    Route::resource('pendaftar', PendaftarController::class)->except([
        'destroy'
    ]);
    Route::get('pendaftar/{id}/destroy', [PendaftarController::class, 'destroy']);
    Route::get('pendaftar/list/{id}', [PendaftarController::class, 'list']);
    Route::post('pendaftar/list/{id}/pemberitahuan', [PendaftarController::class, 'pemberitahuan']);
    Route::post('pendaftar/list/{id}/pemberitahuan/kirim', [PendaftarController::class, 'kirim']);
    Route::get('pendaftar/list/{id}/unduh', [PendaftarController::class, 'unduh']);
    // Route::post('kirim', [PendaftarController::class, 'kirim']);
    

    // Route::get('rekrutmen/edit/{id}', [RekrutmenController::class, 'edit']);

    // Route::get('rekrutmen/hapus/{id}', [RekrutmenController::class, 'destroy']);

    Route::get('dynamic', [AdminController::class, 'dynamic']);


    // Route::get('pendaftar', [AdminController::class, 'pendaftar']);
    // Route::get('pendaftar/list/{id}', [AdminController::class, 'list']);
    // Route::get('pendaftar/list/{id}/pemberitahuan', [AdminController::class, 'pemberitahuan']);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('masuk', function () {
//     return view('masuk');
// });

// Route::get('/send_email', [EmailController::class, 'send_email']);


// Route::get('/enqueue', [JobController::class, 'enqueue']);


// Route::get('/homepage', [HomepageController::class, 'index']);
// Route::get('/detail/{id}', [HomepageController::class, 'detail']);
// Route::get('/form/{id}', [HomepageController::class, 'form']);
// Route::post('/store_data', [HomepageController::class, 'store_data']);

// Route::get('form', function () {
// 	return view('homepage.form_pendaftaran');
// });

// Route::get('/json', [FormController::class, 'json']);
// Route::post('/store-json', [FormController::class, 'store_json']);

// Route::get('/dynamic', [FormController::class, 'dynamic']);
// Route::post('/store-dynamic', [FormController::class, 'store_dynamic'])->name('store-dynamic');;

// Route::get('/form_view', [FormController::class, 'form_view']);



// Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
// dengan midleware
// Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', [AdminController::class, 'dashboard']);

// Route::get('/admin/form', [AdminController::class, 'create_form']);

// Route::post('/admin/form/store', [AdminController::class, 'store_form']);
// Route::post('/admin/send', [AdminController::class, 'send_message']);

// Route::post('/store-json', [AdminController::class, 'store_json']);
