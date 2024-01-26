<?php

use App\Http\Controllers\BlogContoller;
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

Route::get('/', [BlogContoller::class , 'index'])->name('welcome');
Route::get('book/{id}', [BlogContoller::class, 'show'])->name('show');
Route::get('register', [BlogContoller::class, 'create'])->name('register');
Route::post('store', [BlogContoller::class, 'store'])->name('store');

