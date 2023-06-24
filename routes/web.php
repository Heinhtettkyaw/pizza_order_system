<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

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
Route::redirect('/', 'loginPage');
Route::get('/loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
ROute::get('/registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');

//category



Route::middleware(['auth'])->group(function () {


    //dashboard
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    //admin

    Route::middleware(['admin_auth'])->group(function () {
          //categoryList
    Route::group(['prefix'=>'category'],function(){
        Route::get('list',[CategoryController::class,'list'])->name('category#list');
        Route::get('createNewCategory',[CategoryController::class,'createPage'])->name('category#createPage');
        Route::post('create',[CategoryController::class,'create'])->name('category#create');
        Route::get('delete/{id}',[CategoryCOntroller::class,'delete'])->name('category#delete');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
        Route::post('update',[CategoryController::class,'update'])->name('category#update');
    });

    //admin account
        Route::prefix('admin')->group(function(){
            Route::get('password/change',[AuthController::class,'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('change/password',[AuthController::class,'changePassword'])->name('admin#changePassword');
        });

    });


    //user
    //home
   Route::group(['prefix'=>'user','middleware'=>'user_auth'],function(){
        Route::get('home',function(){
            return view('User.home');
        })->name('user#home');
   });


});
