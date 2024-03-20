<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'revalidate_back_history'], function (){

    Route::group(['middleware' => 'custom_guest'], function () {
        Route::get('/',[UserController::class, 'Index'])->name('index');
    
        Route::get('/register',[UserController::class, 'NewRegister'])->name('register');
        
        Route::POST('/login',[UserController::class, 'Login'])->name('login');

        
        
        //add more Routes here
        });
    
        Route::group(['middleware' => 'custom_auth'], function () {
            Route::get('/view',[UserController::class, 'ViewData'])->name('view');
            Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('custom_auth');
            
            //add more Routes here
        });
    
       
        Route::POST('/store-data',[UserController::class, 'StoreData'])->name('store-data');
        Route::POST('/store-data1',[UserController::class, 'StoreData1'])->name('store-data1');
        

});

Route::get('request/{id}',[UserController::class, 'SendFriendRequest'])->name('request');
Route::get('delete/{id}',[UserController::class, 'DeleteFriendRequest'])->name('delete');