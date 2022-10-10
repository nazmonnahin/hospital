<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/appointment',[HomeController::class,'appointment']); 

Route::get('/myappointment',[HomeController::class,'myappointment']); 

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']); 

Route::get('/show_appoinment',[AdminController::class,'show_appoinment']);

Route::get('/approved/{id}',[AdminController::class,'approved']);

Route::get('/cancel/{id}',[AdminController::class,'cancel']);

Route::get('/all_doctors',[AdminController::class,'all_doctors']); 

Route::get('/delete_doctor/{id}',[AdminController::class,'delete_doctor']);

Route::get('/editdoctor/{id}',[AdminController::class,'editdoctor']); 

Route::post('/update/{id}',[AdminController::class,'update']);
