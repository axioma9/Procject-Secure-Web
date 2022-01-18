<?php

use App\Http\Controllers\rangkitpc\RangkitPcController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// ======================================= Rangkit Pc ====================================================
// ======================================= Builder Route =======================================
Route::get('/rangkitpc/builder', function () {
    return view('rangkitPc.builder', [
        "title" => "PC Builder"
    ]);
});
// ======================================= Add/Remove =======================================
Route::post('/rangkitpc/add', [RangkitPcController::class, 'builderAdd'])->middleware('auth')->middleware('verified');
Route::post('/rangkitpc/remove/{type}', [RangkitPcController::class, 'remove'])->middleware('auth')->middleware('verified');


// ======================================= Checkout =======================================
Route::get('/rangkitpc/checkout', function () {
    return view('rangkitPc.checkout', [
        "title" => "Checkout"
    ]);
})->middleware('auth')->middleware('verified');
Route::post('/rangkitpc/checkout', [RangkitPcController::class, 'checkOut'])->middleware('auth')->middleware('verified')->name('checkout');


// ======================================= Browse Route =======================================
Route::get('/rangkitpc/browse', [RangkitPcController::class, 'browse']);
Route::get('/rangkitpc/browse/{type}', [RangkitPcController::class, 'browseType']);


// ======================================= Product Route =======================================
Route::get('/rangkitpc/product/{id}', [RangkitPcController::class, 'product']);
Route::post('/rangkitpc/product/{id}', [RangkitPcController::class, 'add']);

// ======================================= Admin Only ==========================================
Route::get('/rangkitpc/adminonly', function () {
    return view('rangkitPc.adminOnly', [
        "title" => "Admin Only"
    ]);
})->middleware('auth')->middleware('verified')->middleware('admin');

//Middleware meng interupt koneksi untuk mengecek apakah user yang ingin mengakses page tersebut
//sudah memenuhi atau belum ketentuan tertentu, seperti apakah sudah terlogin atau belum, email sudah
//terverify atau belum
//middleware('auth')    hanya user yang sudah terdaftar dan login yang dapat mengakses page tersebut
//middleware('guest')   hanya user yang belum terdaftar yang dapat mengakses page tersebut
//middleware('verified')    hanya user yang sudah mengverify email yang dapat mengakses page tersebut
//middleware('admin')   hanya user dengan is_admin = 1 yang dapat mengakses page tersebut

//Middleware berguna untuk mengecek keadaan user sekarang tanpa mengecek secara manual di controller
//dimana biasanya kita menggunakan if (isadmin) $admin = true pada controller untuk set $admin
//dengan middleware kita tidak perlu mengeset suatu variable untuk menandakan seorang user sebagai admin
//kita hanya mengecek lalu melanjutkan ke halaman tersebut.

// untuk melihat apa yang dilakukan untuk tiap middleware bisa di liat di
// App\Http\Kernel.php dan pada folder middleware
require __DIR__.'/auth.php';
