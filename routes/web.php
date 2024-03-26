<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataClientController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface;

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






Route::get('/', [DashboardController::class, 'welcome']);
Route::get('/service', [DashboardController::class, 'service']);
Route::get('/gallery', [DashboardController::class, 'gallery']);
Route::get('/tentang', [DashboardController::class, 'tentang']);

Route::get('/properti/{category}', [PropertiController::class, 'category'])->name('category');
Route::get('/properti/detail/{id}', [PropertiController::class, 'detailProperti'])->name('properti.detail');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

//Client(InterfaceUser)
Route::get('/daftar', [DataClientController::class, 'daftar'])->name('daftar')->middleware('guest');
Route::post('/store-daftar', [DataClientController::class, 'storeDaftar'])->name('daftar.store');

//Dashboard User need auth
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/pesanan/{id}', [TransaksiController::class, 'pesanan'])->name('pesanan')->middleware('auth');
Route::post('/pesanan-store/{id}', [TransaksiController::class, 'pesananStore'])->name('pesanan.store');
Route::get('/upbukti-pesanan/{id}', [TransaksiController::class, 'upBuktiPesanan'])->name('upbuktipesanan');
Route::post('/upbukti-pesanan-store/{id}', [TransaksiController::class, 'upBuktiPesananStore'])->name('upbuktipesanan.store');
Route::get('/detail-pesanan/{id}', [TransaksiController::class, 'detailPesanan'])->name('pesanan.detail');

Route::get('/booking-admin', [TransaksiController::class, 'bookingAdmin']);



//Admin
Route::get('/admin', function () {
    return view('admin.index');
});

//Perumahan 
Route::get('/perumahan', [PropertiController::class, 'perumahan'])->name('perumahan');
Route::get('/perumahan/add', [PropertiController::class, 'addPerumahan'])->name('perumahan.add');
Route::post('/store-perumahan', [PropertiController::class, 'storePerumahan'])->name('perumahan.store');

Route::get('/perumahan/edit{id}', [PropertiController::class, 'editPerumahan'])->name('perumahan.edit');
Route::put('/perumahan/update/{id}', [PropertiController::class, 'updatePerumahan'])->name('perumahan.update');
Route::delete('/perumahan/delete/{id}', [PropertiController::class, 'deletePerumahan'])->name('perumahan.delete');

//Rumah
Route::get('/rumah', [PropertiController::class, 'rumah'])->name('rumah');
Route::get('/rumah/add', [PropertiController::class, 'addRumah'])->name('rumah.add');
Route::post('/store-rumah', [PropertiController::class, 'storeRumah'])->name('rumah.store');

Route::get('/rumah/edit/{id}', [PropertiController::class, 'editRumah'])->name('rumah.edit');
Route::put('/rumah/update/{id}', [PropertiController::class, 'updateRumah'])->name('rumah.update');
Route::delete('/rumah/delete/{id}', [PropertiController::class, 'deleteRumah'])->name('rumah.delete');

//Client(InterfaceAdmin)
Route::get('/client', [DataClientController::class, 'index'])->name('index');
Route::get('/client/add', [DataClientController::class, 'create'])->name('client.add');
Route::post('/store', [DataClientController::class, 'store'])->name('client.store');

Route::get('/client/edit/{id}', [DataClientController::class, 'edit'])->name('client.edit');
Route::put('/client/update/{id}', [DataClientController::class, 'update'])->name('client.update');
Route::delete('/client/delete/{id}', [DataClientController::class, 'delete'])->name('client.delete');

//Pesanan Admin
Route::get('/pesanan-admin', [TransaksiController::class, 'pesananAdmin'])->name('pesanan.admin');

Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan');
Route::post('/laporan-download', [TransaksiController::class, 'laporanDownload'])->name('laporan.download');


