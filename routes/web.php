<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route utama - langsung ke beranda
Route::get('/', function () {
    return redirect()->route('beranda');
})->name('welcome');

//Beranda
Route::get('/beranda', [BerandaController::class, 'beranda'])->name('beranda');

//Produk
Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
Route::get('/detail_produk', [ProdukController::class, 'detail_produk'])->name('detail_produk');

//Keranjang
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');

//Checkout - Bisa dilakukan dengan atau tanpa login
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])
    ->name('checkout.process');


//Auth (Login, Register, Logout, Profil)
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'register'])->name('login'); // ← TAMBAH INI
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('auth.register'); // ← hapus .submit
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('auth.login'); // ← hapus .submit juga
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

// Profil - Protected by auth
Route::middleware('auth')->group(function () {
    Route::get('/profil', [AuthController::class, 'profil'])->name('profil');
});

//Form & Kontak
Route::get('/form', [FormController::class, 'form'])->name('form');
Route::get('/kontak', [FormController::class, 'kontak'])->name('kontak');

//admin - Protected by auth + admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/admin/pesanan', [AdminController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/admin/pesanan/{id}', [AdminController::class, 'detailPesanan'])->name('admin.pesanan.detail');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/produk/{id}', [AdminController::class, 'getProduct'])->name('admin.produk.get');

    // Admin CRUD Routes
    Route::post('/admin/produk', [AdminController::class, 'storeProduct'])->name('admin.produk.store');
    Route::put('/admin/produk/{id}', [AdminController::class, 'updateProduct'])->name('admin.produk.update');
    Route::delete('/admin/produk/{id}', [AdminController::class, 'deleteProduct'])->name('admin.produk.delete');
    Route::put('/admin/pesanan/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.pesanan.status');
    Route::delete('/admin/pesanan/{id}', [AdminController::class, 'deleteOrder'])->name('admin.pesanan.delete');
    Route::delete('/admin/pesanan/detail/{id}', [AdminController::class, 'deleteOrderDetail'])->name('admin.pesanan.detail.delete');
    Route::get('/admin/users/{id}', [AdminController::class, 'getUser'])->name('admin.users.get');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});
