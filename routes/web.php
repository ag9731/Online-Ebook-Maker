<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\NovalController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProductuController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PenController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);
    
});
Route::resource('products', ProductController::class);
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('movies', MovieController::class);

Route::resource('novals', NovalController::class);

Route::resource('publications', PublicationController::class);

//Route::resource('email', EmailController@index::class); 
//Route::post('email', EmailController@send::class,); 
 
Route::get(
    '/email',
    [EmailController::class, 'index'])->name('email');

Route::get(
        '/products',
        [ProductController::class, 'view'])->name('products/view');
    

Route::post('/email/send', [EmailController::class, 'send'])->name('email/send'); 
Route::resource('productss', ProductsController::class);
Route::resource('productsu', ProductuController::class);
Route::resource('pens', PenController::class);
Route::resource('products', ProductController::class);
Route::get('/view','\App\Http\Controllers\ProductController@view')->name('products.view');