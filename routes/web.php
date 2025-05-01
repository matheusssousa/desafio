<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('perfil', [UserController::class, 'index'])->name('perfil');
    Route::post('perfil/info', [UserController::class, 'accountInfo'])->name('perfil.info');
    Route::post('perfil/senha', [UserController::class, 'password'])->name('perfil.senha');
    Route::post('perfil/deletar', [UserController::class, 'delete'])->name('perfil.deletar');

    Route::post('registros/restore/{id}', [RegistroController::class, 'restore'])->name('registros.restore');
    Route::delete('registros/forceDelete/{id}', [RegistroController::class, 'forceDelete'])->name('registros.forceDelete');
    Route::get('registros/download/{id}', [RegistroController::class, 'download'])->name('registros.download');
    Route::resource('registros', RegistroController::class);
});
