<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::prefix('auth')->group(function () {
    //route hiện view đăng nhập
    Route::get('/signin', [AuthController::class, 'showSigninForm'])->name('auth.showSignin');
    //route xử lý đăng nhập
    Route::post('/signin', [AuthController::class, 'signIn'])->name('auth.signin');
    //route xử lý đăng xuất
    Route::post('/signout', [AuthController::class, 'signOut'])->name('auth.signout');
});
