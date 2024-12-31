<?php

use App\Http\Controllers\Dashboards\Teacher\DashboardTeacherController;
use App\Http\Controllers\Dashboards\Teacher\OnlineMeetingController;
use App\Http\Controllers\Dashboards\Teacher\ProfileController;
use App\Http\Controllers\Dashboards\Teacher\QuestionController;
use App\Http\Controllers\Dashboards\Teacher\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| TEACHER Routes
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth:teacher' ]
    ], function(){
        Route::get('/teacher/dashboard', [DashboardTeacherController::class , 'index']);



        Route::get('/MySections', [DashboardTeacherController::class , 'showSections']);


        Route::get('/subjectDetails/{id}', [DashboardTeacherController::class , 'subjectDetails'])->name('subjectDetails');
        Route::get('/MyStudents/{id}', [DashboardTeacherController::class , 'showStudents'])->name('MyStudents');
        Route::post('/attendance', [DashboardTeacherController::class , 'attendance']);
        Route::get('/attendance_report', [DashboardTeacherController::class , 'attendanceReport']);
        Route::post('/attendance_report', [DashboardTeacherController::class , 'attendanceSearch']);

        Route::resource('Quizzes', QuizController::class);
        Route::get('/studentsQuizzes/{id}', [QuizController::class , 'studentsQuizzes'])->name('studentsQuizzes');
        Route::post('/repeatQuiz', [QuizController::class , 'repeatQuiz'])->name('repeatQuiz');

        Route::resource('Questions', QuestionController::class);

        Route::resource('Online_meetings' , OnlineMeetingController::class);

        Route::get('/Teacher_profile', [ProfileController::class , 'index']);
        Route::post('/update_teacher_profile', [ProfileController::class , 'update']);
});
