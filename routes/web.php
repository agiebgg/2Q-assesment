<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


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

Route::get('/', function () {
     return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home.index');

})->name('home');


Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [Controllers\UserController::class, 'index'])->name('user.index');
Route::post('/user/store', [Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/create', [Controllers\UserController::class, 'create'])->name('user.create');
Route::get('/user/show/{id}', [Controllers\UserController::class, 'show'])->name('user.show');
Route::post('user/update', [Controllers\UserController::class, 'update']);
Route::delete('/user/destroy/{id}', [Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit/{id}', [Controllers\UserController::class, 'edit'])->name('user.edit');


Route::get('/company', [Controllers\CompanyController::class, 'index'])->name('company.index');
Route::post('/company/store', [Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('/company/create', [Controllers\CompanyController::class, 'create'])->name('company.create');
Route::get('/company/show/{id}', [Controllers\CompanyController::class, 'show'])->name('company.show');
Route::post('company/update', [Controllers\CompanyController::class, 'update']);
Route::delete('/company/destroy/{id}', [Controllers\CompanyController::class, 'destroy'])->name('company.destroy');
Route::get('/company/edit/{id}', [Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::get('/companies/data', [Controllers\CompanyController::class, 'data'])->name('company.data');



