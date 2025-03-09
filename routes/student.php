<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\EnrollController;

Route::prefix('student')->name('student.')->group(function(){

    Route::middleware(['guest:student','PreventBackHistory'])->group(function(){
        Route::controller(StudentController::class)->group(function(){
           Route::get('/login','login')->name('login');
           Route::post('/login-handler','loginHandler')->name('login-handler');
           Route::get('/register','register')->name('register');
           Route::post('/create','createStudent')->name('create');
           Route::get('/account/verify/{token}','verifyAccount')->name('verify');
           Route::get('/register-success','registerSuccess')->name('register-success');
           Route::get('/forgot-password','forgotPassword')->name('forgot-password');
           Route::post('/send-password-reset-link','sendPasswordResetLink')->name('send-password-reset-link');
           Route::get('/password/reset/{token}','showResetForm')->name('reset-password');
           Route::post('/reset-password-handler','resetPasswordHandler')->name('reset-password-handler');
        });
    });
    Route::middleware(['auth:student','PreventBackHistory'])->group(function(){
        Route::controller(StudentController::class)->group(function(){
           Route::get('/','home')->name('home');
           Route::post('/logout','logoutHandler')->name('logout');
           Route::get('/profile','profileView')->name('profile');
           Route::post('/change-profile-picture','changeProfilePicture')->name('change-profile-picture');
           Route::get('/shop-settings','shopSettings')->name('shop-settings');
           Route::post('/shop-setup','shopSetup')->name('shop-setup');
        });

        Route::prefix('enroll')->name('enroll.')->group(function(){
            Route::controller(EnrollController::class)->group(function(){
               Route::get('/all','allProducts')->name('all-products');
               Route::get('/add','addProduct')->name('add-product');
               Route::get('/get-product-category','getProductCategory')->name('get-product-category');
               Route::post('/create','createProduct')->name('create-product');
               Route::get('/edit','editProduct')->name('edit-product');
               Route::post('/enroll','enrollSubject')->name('enroll-subject');
               Route::post('/save-enrollment', 'saveEnrollment')->name('save-enrollment');

            });
        });
    });

});