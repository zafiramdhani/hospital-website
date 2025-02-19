<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);

Route::get('/add_doctor', [AdminController::class, 'adddoctor']);

Route::post('/upload_doctor', [AdminController::class, 'uploaddoctor']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancelappointment']);

Route::get('/show_appointments', [AdminController::class, 'showappointments']);

Route::get('/delete_appointment/{id}', [AdminController::class, 'delete_appointment']);

Route::get('/show_doctors', [AdminController::class, 'showdoctors']);

Route::get('/approve/{id}', [AdminController::class, 'approve']);

Route::get('/refuse/{id}', [AdminController::class, 'refuse']);

Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
