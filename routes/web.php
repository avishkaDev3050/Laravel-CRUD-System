<?php

use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\ManageEmployee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin', [AdminLogin::class, 'GoToHome'])->name('ADRout');
Route::get('/register', [ManageEmployee::class, 'register'])->name('register');
Route::post('/store', [ManageEmployee::class, 'store'])->name('store');
Route::get('/{emp_id}', [ManageEmployee::class, 'edit'])->name('edit');
Route::put('/{emp_id}', [ManageEmployee::class, 'update'])->name('update');
Route::get('/delete/{emp_id}', [ManageEmployee::class, 'delete'])->name('delete');
