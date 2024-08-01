<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\BookController as BController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('books.index');
// });

Route::get('/', LoginController::class . '@login')->name('home');
Route::get('/search', MovieController::class . '@search')->name('search');

Route::get('/movies',                        [MovieController::class, 'index'])->name('movie.index');
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/movie/create',                  [MovieController::class, 'formInsert'])->name('movie.create');
    Route::post('/movie/create',                 [MovieController::class, 'create'])->name('movie.store');
    Route::get('/movie/edit/{movie}',             [MovieController::class, 'edit'])->name('movie.edit');
    Route::put('/movie/edit/{movie}',             [MovieController::class, 'update'])->name('movie.update');
    Route::delete('/movie/delete/{movie}',        [MovieController::class, 'delete'])->name('movie.destroy');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('postRegister');

Route::get('/infor', [LoginController::class, 'infor'])->name('user.infor');
Route::put('/infor-{user}', [LoginController::class, 'update'])->name('user.update');

Route::get('/list', [LoginController::class, 'list'])->name('user.list');
Route::get('/admin/update/{user}', [LoginController::class, 'adminEdit'])->name('admin.edit');
Route::put('/admin/update/{user}', [LoginController::class, 'adminUpdate'])->name('admin.update');
