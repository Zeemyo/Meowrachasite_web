<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KucingController;
use App\Http\Controllers\AdopsiController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Webhook\MidtransWebhookController;
use App\Http\Controllers\DashboardController;
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




Auth::routes();


Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function () {

    Route::get('/dashboard', function () {
        return view('/admin/dashboard');
    });

    Route::get('/kucing', function () {
        return view('/admin/kucing');
    });

    Route::get('/konsultasi', function () {
        return view('/admin/konsultasi');
    });

    Route::get('/penitipan', function () {
        return view('/admin/penitipan');
    });

    Route::get('/adopsi', function () {
        return view('/admin/adopsi');
    });

    Route::resource('/post', 'PostController');

    Route::resource('/kategori', 'KategoriController');

    Route::resource('/kucing', 'KucingController');

    Route::resource('/adopsi', 'AdopsiController');

    Route::resource('/konsultasi', 'KonsultasiController');

    Route::resource('/penitipan', 'PenitipanController');

    Route::resource('/penitipan/transaksi', 'TransaksiController');

    Route::resource('/users', 'UserController');

    // Route::get('/transaksi', [TransaksiController::class, 'index']);



    Route::get('/transaksi/{id_penitipan}',  [TransaksiController::class, 'show']);


    Route::put('penitipan/approve/{status}', [PenitipanController::class, 'approve']);
});

// Webhook
Route::post('/webhook', [MidtransWebhookController::class, 'index']);

route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [ArtikelController::class, 'index']);
Route::get('/{slug}', [ArtikelController::class, 'artikel']);
Route::get('/artikel-kategori/{slug}', [ArtikelController::class, 'kategori']);
Route::get('/artikel/konsultasi', [ArtikelController::class, 'konsultasi']);
Route::get('/artikel/adopsi', [ArtikelController::class, 'adopsi']);
Route::get('/artikel/artikel', [ArtikelController::class, 'artikel']);
