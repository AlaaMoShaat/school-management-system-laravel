<?php

use App\Http\Controllers\Dashboards\Student\DashboardStudentController;
use App\Http\Controllers\Dashboards\Student\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| STUDENT Routes
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth:student' ]
    ], function(){
        Route::get('/student/dashboard', [DashboardStudentController::class , 'index'])->name('stddash');
        Route::get('/subject/content/{id}', [DashboardStudentController::class , 'showContent'])->name('showContent');
        Route::get('/questions/quiz/{id}', [DashboardStudentController::class , 'showQuestions'])->name('showQuestions');

        Route::get('/Student_profile', [ProfileController::class , 'index']);
        Route::post('/update_student_profile', [ProfileController::class , 'update']);
});