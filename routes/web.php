<?php
namespace App\Http\Controllers;

use App\Http\Controllers\DbConController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\Post;
use App\Http\Controllers\SsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\Post AS P;
use App\Http\Controllers\Product AS Pr;

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
    return view('welcome');
});

//Posts
// Route::group(['namespace' => 'Post'], function() {

    Route::get('/posts', P\IndexController::class)->name('post.index');

    Route::get('/posts/create', P\CreateController::class)->name('post.create');

    Route::get('/posts/{post}/edit', P\EditController::class)->name('post.edit');
    Route::patch('/posts/{post}', P\UpdateController::class)->name('post.update');
    Route::delete('/posts/{post}', P\DestroyController::class)->name('post.destroy');
    Route::post('/posts', P\StoreController::class)->name('post.store');
    Route::get('/posts/{post}', P\ShowController::class)->name('post.show');

// });

//Products
Route::get('/shop', Pr\IndexController::class)->name('product.index');
Route::get('/product/create', Pr\CreateController::class)->name('product.create');
Route::post('/shop', Pr\StoreController::class)->name('product.store');
Route::delete('/product/{product}', Pr\DestroyController::class)->name('product.destroy');
Route::get('/product/{product}', Pr\ShowController::class)->name('product.show');
Route::get('/product/{product}/edit', Pr\EditController::class)->name('product.edit');
Route::patch('/product/{product}', Pr\UpdateController::class)->name('product.update');


// Route::get('/posts/firstOrCreate', [PostController::class, 'firstOrCreate']);
// Route::get('/posts/updateOrCreate', [PostController::class, 'updateOrCreate']);

Route::get('/love', [MyPlaceController::class, 'index']);

Route::get('/cities', [CityController::class, 'index']);

Route::get('/ss', [SsController::class, 'ssfirst']);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');



