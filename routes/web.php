<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginRedirectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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


// bb
Route::middleware(['auth','role:Admin'])->get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::middleware(['auth','role:Student'])->get('/student/dashboard',[StudentController::class,'index'])->name('student.dashboard');
Route::middleware(['auth','role:Teacher'])->get('/teacher/dashboard',[TeacherController::class,'index'])->name('teacher.dashboard');
// auth = user must be logged in
// role:Admin = user must have that role
// Routes will be blocked if the user doesn't have that role

Route::get('/redirect-after-login',[LoginRedirectController::class,'redirect'])->middleware('auth')->name('login.redirect');

Route::resource('class-rooms',App\Http\Controllers\ClassRoomController::class);



Route::middleware('auth','role:Admin')->group(function(){
Route::resource('students',App\Http\Controllers\StudentController::class);
});

























// Route::get('/admin/dashboard',[AdminController::class,'index'])->middleware('auth')->name('admin.dashboard');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
