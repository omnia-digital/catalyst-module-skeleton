<?php

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

namespace OmniaDigital\Catalyst\SkeletonModule\Http\Livewire;

Route::name('skeleton.')->prefix('skeleton')->group(function () {
    Route::get('/skeleton/{form}', Home::class)->name('form');
});
