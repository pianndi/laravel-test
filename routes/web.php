<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
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
  return view('home', [
    'title' => 'Home',
  ]);
});
Route::get('/about', function () {
  return view('about', [
    'title' => 'About',
    'name' => 'Piandi',
    'quote' => 'Lorem ipsum',
    'image' => 'profile2.jpg',
  ]);
});

Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])
  ->middleware('guest')
  ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware(
  'guest'
);
Route::post('/register', [RegisterController::class, 'store']);

Route::get(
  '/dashboard',
  fn() => view('dashboard.index', ['title' => 'Dashboard'])
)->middleware('auth');

Route::resource('/dashboard/post', DashboardPostController::class)->middleware(
  'auth'
);
Route::resource('/dashboard/category', AdminCategoryController::class)
  ->except('show')
  ->middleware('admin');
