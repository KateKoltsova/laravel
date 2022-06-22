<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('home', [HomeController::class, 'sayHello'])->name('home');

Route::prefix('user')->group(function() {
    Route::post('/auth', [UserController::class, 'authorization'])->name('user.auth');
    Route::post('/register', [UserController::class, 'registration'])->name('user.register');
    Route::get('/info/{login}/{message?}', [UserController::class, 'showUser'])->name('user.info');
    Route::delete('/delete', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/view', [UserController::class, 'view'])->name('user.view');
});

Route::resource('task', TaskController::class);
