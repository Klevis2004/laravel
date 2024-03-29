<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogContoller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\KreuController;
use App\Http\Controllers\OtherController;
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

Route::get('/', [BlogContoller::class, 'index'])->name('welcome');
Route::get('/kreu', [BlogContoller::class, 'kreu'])->name('kreu');
Route::get('book/{id}', [BlogContoller::class, 'show'])->name('show');
Route::get('register/book', [BlogContoller::class, 'create'])->name('register');
Route::post('store', [BlogContoller::class, 'store'])->name('store');
Route::get('book/{id}/edit', [BlogContoller::class, 'edit'])->name('edit');
Route::put('book/{id}', [BlogContoller::class, 'update'])->name('update');
Route::get('book/{id}/delete', [BlogContoller::class, 'destroy'])->name('delete');


Route::get('shop', [CategoriesController::class, 'index'])->name('cat.index');
Route::get('category/{id}', [CategoriesController::class, 'show'])->name('cat.show');
Route::get('create/category', [CategoriesController::class, 'create'])->name('cat.create');
Route::match(['get', 'post'], 'categoryb', [CategoriesController::class, 'store'])->name('category');
Route::get('category/{id}/delete', [CategoriesController::class, 'destroy'])->name('cat.delete');


Route::get('login', [AuthController::class, 'login'])->name('login');   
Route::get('register', [AuthController::class, 'register'])->name('users.register');   
Route::post('register', [AuthController::class, 'store'])->name('users.store');   
Route::get('index', [AuthController::class, 'authenticate'])->name('login.index');
Route::post('', [AuthController::class, 'logout'])->name('logout.index');
Route::get('user/profile/edit', [AuthController::class, 'edit'])->name('users.edit');
Route::put('user/profile/update', [AuthController::class, 'update'])->name('users.update');

Route::get('contact', [OtherController::class, 'index'])->name('contact');
Route::get('users', [OtherController::class, 'users'])->name('cntr.user');
Route::post('contact/store', [OtherController::class, 'store'])->name('contact.store');
Route::put('makeadmin/{id}', [OtherController::class, 'makeadmin'])->name('makeadmin');
Route::put('removeadmin/{id}', [OtherController::class, 'removeadmin'])->name('removeadmin');
Route::get('users/{id}/delete', [OtherController::class, 'destroy'])->name('user.delete');
Route::get('admin/index', [OtherController::class, 'home'])->name('dashboard');
Route::get('admin/messages', [OtherController::class, 'message'])->name('messages');
Route::put('message/{id}', [OtherController::class, 'read'])->name('read');
Route::get('single/message/{id}', [OtherController::class, 'single'])->name('single');
Route::get('sales/book', [OtherController::class, 'sale'])->name('sale');
Route::get('rent/book', [OtherController::class, 'rent'])->name('rent');
Route::get('shop/now/{id}', [OtherController::class, 'salenow'])->name('salenow');
Route::post('/sales/{id}', [OtherController::class, 'salepost'])->name('salepost');
Route::post('static/sales/{id}', [OtherController::class, 'static_sale'])->name('static_sale');
Route::get('sales/{id}/delete', [OtherController::class, 'delete_sale'])->name('sale.delete');
Route::get('staticsales/{id}/delete', [OtherController::class, 'delete_staticsales'])->name('delete_staticsales');
Route::put('sale/{id}', [OtherController::class, 'dorezimi'])->name('dorezimi');
Route::put('dorezimi/{id}', [OtherController::class, 'sale_dorezimi'])->name('sale_dorezimi');
Route::get('historiku/', [OtherController::class, 'historiku'])->name('historiku');
Route::get('financa/', [OtherController::class, 'financa'])->name('financa');


Route::get('/getBookInfo/{saleId}', [OtherController::class, 'getBookInfo']);
Route::get('/getUsersInfo/{userId}', [OtherController::class, 'getUsersInfo']);

