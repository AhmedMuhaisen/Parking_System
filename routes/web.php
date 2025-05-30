<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[WebsiteController::class,'register'])->name('register');
Route::post('/register',[WebsiteController::class,'register_post'])->name('register');

Route::get('/login',[WebsiteController::class,'login'])->name('login');
Route::post('/login',[WebsiteController::class,'login_post'])->name('login');




Route::prefix('website')->name('website.')->group(function(){
Route::get('/',[WebsiteController::class,'index']);
Route::post('/contact',[WebsiteController::class,'contact'])->name('contact');
Route::get('/profile',[WebsiteController::class,'profile'])->name('profile');
Route::post('/edit_personal/{$id}',[WebsiteController::class,'edit_personal_post'])->name('edit_personal');
Route::post('/edit_vehicle/{$id}',[WebsiteController::class,'edit_vehicle_post'])->name('edit_vehicle');
Route::post('/edit_guest/{$id}',[WebsiteController::class,'edit_guest_post'])->name('edit_guest');
Route::post('/edit_testimonial/{$id}',[WebsiteController::class,'edit_testimonial_post'])->name('edit_testimonial');
});
