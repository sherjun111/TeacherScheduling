<?php

use Illuminate\Support\Facades\Route;

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

route::View('/sample-page','sample-page');
route::View('/sample-auth','sample-auth');
Route::post('/student/enroll/add-subject', [EnrollmentController::class, 'addSubject'])->name('student.enroll.add-subject');
Route::post('/student/enroll/update', [EnrollController::class, 'updateProduct'])->name('student.enroll.update-product');
Route::get('/admin/students', [AdminController::class, 'viewStudents'])->name('admin.students.view');
Route::post('/student/enroll/add-subject', [StudentEnrollmentController::class, 'addSubject'])->name('student.enroll.add-subject');
Route::post('/student/enroll/save-enrollment', [EnrollController::class, 'saveEnrollment'])->name('student.enroll.save-enrollment');
