<?php

use App\Http\Controllers\BarangMasukController;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProdukkController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukGaleriController;
use App\Http\Controllers\ProdukKategoriController;

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

//DomPDF

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::middleware(['admin'])->group(function () {
            Route::resource('kategori', ProdukKategoriController::class);
            Route::resource('barangmasuk', BarangMasukController::class);
            Route::resource('produk', ProdukkController::class);
            Route::resource('produk.galeri', ProdukGaleriController::class)->shallow()->only([
                'index', 'create', 'store', 'destroy'
            ]);
            Route::resource('transaksi', TransaksiController::class)->only([
                'index', 'show', 'edit', 'update'
            ]);
            Route::resource('user', UserController::class)->only([
                'index', 'edit', 'update', 'destroy'
            ]);
            
            Route::get('/print_all', [LaporanController::class, 'printAllReport'])->name('print.all.report');
            Route::get('/print_user/{id}', [LaporanController::class, 'printUserReport']);
        });
    });
});

