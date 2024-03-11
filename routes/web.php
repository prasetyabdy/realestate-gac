<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataClientController;
use App\Http\Controllers\PropertiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/properti', [PropertiController::class, 'properti'])->name('properti');
Route::get('/properti/detail/{id}', [PropertiController::class, 'detailProperti'])->name('properti.detail');


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);


//Dashboard User
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


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


//Client(InterfaceAdmin)
Route::get('/client', [DataClientController::class, 'index'])->name('index');
Route::get('/client/add', [DataClientController::class, 'create'])->name('client.add');
Route::post('/store', [DataClientController::class, 'store'])->name('client.store');

Route::get('/client/edit/{id}', [DataClientController::class, 'edit'])->name('client.edit');
Route::put('/client/update/{id}', [DataClientController::class, 'update'])->name('client.update');
Route::delete('/client/delete/{id}', [DataClientController::class, 'delete'])->name('client.delete');

//Client(InterfaceUser)
Route::get('/daftar', [DataClientController::class, 'daftar'])->name('daftar')->middleware('guest');
Route::post('/store-daftar', [DataClientController::class, 'storeDaftar'])->name('daftar.store');
