<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;

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
   return view('welcome');
});


//client-contact
Route::post('/message/sent',[ContactController::class,'storeMessage'])->name('store.message');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


    //service-section
    Route::resource('services',ServiceController::class);
    Route::get('/services/status/{service}',[ServiceController::class, 'status'])->name('services.status');



    //contact
    Route::get('/inbox',[ContactController::class,'inbox'])->name('inbox');
    Route::get('/message-show/{id}',[ContactController::class,'show'])->name('message.show');
    Route::post('/message-destroy',[ContactController::class,'destroy'])->name('message.destroy');



    Route::get('/add-user',[UserController::class,'addUser'])->name('add.user');
    Route::get('/manage-user',[UserController::class,'manageUser'])->name('manage.user');
    Route::post('/new-user',[UserController::class,'saveUser'])->name('new.user');
    Route::get('/user-edit/{id}',[UserController::class,'editUser'])->name('user.edit');
    Route::post('/user-delete',[UserController::class,'deleteUser'])->name('user.delete');
    Route::post('/update-user',[UserController::class,'updateUser'])->name('update.user');

   
});

