<?php

use Vip\Crud\Http\Controllers\CrudController;

Route::group(['middleware' => 'web'], function () {
    Route::get('vip/index', [CrudController::class, 'index'])->name('index');
    Route::get('vip/create', [CrudController::class, 'create'])->name('create');
    Route::post('vip/create', [CrudController::class, 'store'])->name('store');
});