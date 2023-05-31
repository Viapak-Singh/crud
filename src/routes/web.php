<?php

use Vip\Crud\Http\Controllers\CrudController;

Route::group(['middleware' => 'web'], function () {
    Route::get('records/index', [CrudController::class, 'index'])->name('index');
    Route::get('record/create', [CrudController::class, 'create'])->name('create');
    Route::post('record/create', [CrudController::class, 'store'])->name('store');
    Route::get('record/edit/{id}', [CrudController::class, 'edit'])->name('record.edit');
    Route::put('record/update/{id}', [CrudController::class, 'update'])->name('record.update');
    Route::delete('record/delete/{id}', [CrudController::class, 'destroy'])->name('record.destroy');
});