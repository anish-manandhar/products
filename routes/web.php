<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('dashboard/category', CategoryController::class);
Route::resource('dashboard/subcategory', SubCategoryController::class);
Route::resource('dashboard/product', ProductController::class);

Route::post('/get_subcategories', [ProductController::class, 'get_subcategories'])->name('get_subcategories');

