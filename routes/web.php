<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginRedirectController;
use App\Http\Controllers\DashboardController;
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
Route::middleware(['auth','role:Student'])->get('/student/dashboard',[StudentController::class,'dashboard'])->name('student.dashboard');
Route::middleware(['auth','role:Teacher'])->get('/dashboard/teacher',[DashboardController::class,'teacherDashboard'])->name('teacher.dashboard');
// auth = user must be logged in
// role:Admin = user must have that role
// Routes will be blocked if the user doesn't have that role

Route::get('/redirect-after-login',[LoginRedirectController::class,'redirect'])->middleware('auth')->name('login.redirect');


// ✅ Accessible to both Admins and Teachers (via permission)
Route::middleware(['auth', 'can:view student list'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
   
});
Route::middleware('auth','role:Admin')->group(function(){
Route::resource('students',App\Http\Controllers\StudentController::class)->except('index','show');
Route::resource('teachers', App\Http\Controllers\TeacherController::class);
Route::resource('subjects', App\Http\Controllers\SubjectController::class);
Route::resource('class-rooms',App\Http\Controllers\ClassRoomController::class);
});

 Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show')->middleware('auth','can:view student list');


// Route::get('/admin/dashboard',[AdminController::class,'index'])->middleware('auth')->name('admin.dashboard');



// Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Route::get('/teacher/dashboard', [DashboardController::class, 'index'])->name('teacher.dashboard');
// Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

