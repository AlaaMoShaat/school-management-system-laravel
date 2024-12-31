<?php

use App\Http\Controllers\Dashboards\Parent\DashboardParentController;
use App\Http\Controllers\Dashboards\Parent\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| PARENT Routes
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth:parent' ]
    ], function(){

        Route::get('/parent/dashboard', [DashboardParentController::class , 'index'])->name('parentdash');
        Route::get('/MySons', [DashboardParentController::class , 'showStudents'])->name('MySons');
        Route::get('/sonQuizzes/{id}', [DashboardParentController::class , 'showQuizzes'])->name('sonQuizzes');
        Route::get('/sonsFees', [DashboardParentController::class , 'fees'])->name('sonsFees');
        Route::get('/sonsReceipts/{id}', [DashboardParentController::class , 'receipts'])->name('sonsReceipts');

        Route::get('/Parents_profile', [ProfileController::class , 'index']);
        Route::post('/update_parents_profile', [ProfileController::class , 'update']);
});