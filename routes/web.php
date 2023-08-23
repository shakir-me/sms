<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('login/store', [AuthController::class, 'Loginstore'])->name('login.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});

// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// });

//admin route
Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/admin/list', [AdminController::class, 'list'])->name('admin.admin.list');
    Route::get('admin/admin/add', [AdminController::class, 'add'])->name('admin.admin.add');
    Route::post('admin/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update'])->name('admin.admin.edit');
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.admin.delete');


});

//teacher route
Route::group(['middleware'=>'teacher'],function(){
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard'])->name('teacher.dashboard');


});

//student route
Route::group(['middleware'=>'student'],function(){
    Route::get('student/dashboard', [DashboardController::class, 'dashboard'])->name('student.dashboard');
});
//parent route
Route::group(['middleware'=>'parent'],function(){
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard'])->name('parent.dashboard');
});
