<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[WebsiteController::class,'register'])->name('register');
Route::post('/register',[WebsiteController::class,'register_post'])->name('register');


Route::prefix('website')->name('website.')->group(function(){
Route::get('/',[WebsiteController::class,'index']);
Route::post('/contact',[WebsiteController::class,'contact'])->name('contact');
Route::get('/profile',[WebsiteController::class,'profile'])->name('profile');

});
