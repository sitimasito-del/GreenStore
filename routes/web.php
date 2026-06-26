<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MountainController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;


//
// ================= HOME =================
//

Route::get('/', [

    MountainController::class,
    'dashboard'

]);

//
// ================= DASHBOARD =================
//

Route::get('/dashboard', [

    MountainController::class,
    'dashboard'

])->name('dashboard');

Route::get('/user/dashboard', [

    MountainController::class,
    'dashboard'

]);

Route::get('/mountain/{id}', [

    MountainController::class,
    'detail'

]);

//
// ================= AUTH =================
//

Route::get('/login', [

    AuthController::class,
    'login'

]);

Route::post('/login', [

    AuthController::class,
    'authLogin'

]);

Route::get('/register', [

    AuthController::class,
    'register'

]);

Route::post('/register/store', [

    AuthController::class,
    'storeRegister'

]);

Route::get('/logout', [

    AuthController::class,
    'logout'

]);

Route::get('/profile', [

    AuthController::class,
    'profile'

]);

//
// ================= LAPORAN =================
//

Route::get('/laporan/create/{id}', [

    LaporanController::class,
    'create'

]);

Route::post('/laporan/store', [

    LaporanController::class,
    'store'

]);

Route::get('/riwayat', [

    LaporanController::class,
    'riwayat'

]);

Route::delete('/laporan/hapus/{id}', [

    LaporanController::class,
    'destroy'

]);

//
// ================= ADMIN =================
//

// DASHBOARD ADMIN PUSAT

Route::get('/admin/dashboard', [

    AdminController::class,
    'dashboard'

]);

// ADMIN GUNUNG

Route::get('/admin/laporans', [

    AdminController::class,
    'laporans'

]);

// DAFTAR GUNUNG

Route::get('/admin/mountains', [

    AdminController::class,
    'mountains'

]);

// TAMBAH GUNUNG

Route::get('/admin/mountains/create', [

    AdminController::class,
    'createMountain'

]);

Route::post('/admin/mountains/store', [

    AdminController::class,
    'storeMountain'

]);

// EDIT GUNUNG

Route::get('/admin/mountain/edit/{id}', [

    AdminController::class,
    'editMountain'

]);

Route::post('/admin/mountain/update/{id}', [

    AdminController::class,
    'updateMountain'

]);

Route::delete('/admin/mountain/delete/{id}', [

    AdminController::class,
    'destroyMountain'

]);

// UPDATE STATUS LAPORAN

Route::post('/admin/laporan/update-status/{id}', [

    AdminController::class,
    'updateStatus'

]);
// ================= ARTIKEL =================

Route::get('/artikel', [
    ArticleController::class,
    'index'
])->name('artikel.index');

Route::get('/artikel/baca/{id}', [
    ArticleController::class,
    'read'
])->name('artikel.read');

Route::get('/admin/articles', [
    AdminController::class,
    'articles'
]);

Route::get('/admin/articles-create', [
    AdminController::class,
    'createArticle'
]);

Route::post('/admin/articles-store', [
    AdminController::class,
    'storeArticle'
]);
Route::delete('/admin/articles-delete/{id}', [

    AdminController::class,
    'deleteArticle'

]);
Route::get('/admin/articles-edit/{id}', [

    AdminController::class,
    'editArticle'

]);

Route::post('/admin/articles-update/{id}', [

    AdminController::class,
    'updateArticle'

]);
Route::get('/tesedit', function () {
    return 'EDIT BERHASIL';
});

// ================= PRODUK USER =================

Route::get('/products', [ProductController::class, 'publicIndex']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/cart', [ProductController::class, 'cart']);

Route::post('/cart/add/{id}', [ProductController::class, 'addToCart']);

Route::post('/cart/update/{id}', [ProductController::class, 'updateCart']);

Route::delete('/cart/remove/{id}', [ProductController::class, 'removeFromCart']);

Route::post('/cart/checkout-whatsapp', [ProductController::class, 'checkoutWhatsapp']);

// ================= MARKET =================

Route::get('/admin/products', [ProductController::class, 'index']);

Route::get('/admin/products/create', [ProductController::class, 'create']);

Route::post('/admin/products/store', [ProductController::class, 'store']);

Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit']);

Route::post('/admin/products/update/{id}', [ProductController::class, 'update']);

Route::post('/admin/products/add-stock/{id}', [ProductController::class, 'addStock']);

Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy']);
