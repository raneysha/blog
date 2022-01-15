<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Models\User;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Categories',
        "collection" => Category::with([ 'posts'])->latest()->get()
    ]);
});
route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'title' => $category->name,
        'posts' => $category->posts->load('category', 'user'),
        'category' => $category->name,
        'header1'=> "Halaman Category $category->name"
    ]);
} );
Route::get('/authors/{user:username}', function(User $user){
    return view('posts', [
        'title' => $user->name,
        'posts' => $user->posts->load('category', 'user'),
        'header1'=> "Halaman User: $user->name"
    ]);
} );
Route::get('/login', function () {
    return view('login');
})->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');