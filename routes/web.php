<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MyParentController;
use App\Http\Controllers\PaymentStudentController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReceiptStudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', [HomeController::class, 'index'])->name('selection');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        // Route::get('/', function()
        // {
        //     return view('dashboard');
        // });

        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        Route::resource('users', UserController::class);

        Route::resource('grades', GradeController::class);

        Route::resource('classrooms', ClassroomController::class);
        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');

        Route::resource('sections', SectionController::class);
        Route::get('/classes/{id}', [SectionController::class, 'getclasses']);

        Route::view('add_parent', 'livewire.show_Form')->name('add_parent');
        Route::resource('my_parents', MyParentController::class);

        Route::resource('teachers', TeacherController::class);

        Route::resource('students', StudentController::class);
        Route::get('/student_attachments/{id}', [StudentController::class, 'StudentAttachments'])->name('student_attachments');
        Route::post('upload_attachments', [StudentController::class, 'UploadAttachments'])->name('upload_attachments');
        Route::get('download_attachment/{studentname}/{filename}', [StudentController::class, 'DownloadAttachment'])->name('download_attachment');
        Route::delete('delete_attachment', [StudentController::class, 'DeleteAttachment'])->name('delete_attachment');

        Route::resource('promotions', PromotionController::class);

        Route::get('/indexGraduation', [GraduationController::class, 'indexGraduation'])->name('indexGraduation');
        Route::get('/createGraduation', [GraduationController::class, 'createGraduation'])->name('createGraduation');
        Route::post('/graduation', [GraduationController::class, 'graduation'])->name('graduation');
        Route::post('/returnStudent/{id}', [GraduationController::class, 'returnStudent'])->name('returnStudent');
        Route::post('/deleteStudent/{id}', [GraduationController::class, 'deleteStudent'])->name('deleteStudent');

        Route::resource('fees', FeeController::class);

        Route::resource('fee_invoices', FeeInvoiceController::class);

        Route::resource('receipt_students', ReceiptStudentController::class);

        Route::resource('processing_fees', ProcessingFeeController::class);

        Route::resource('payment_students', PaymentStudentController::class);

        Route::resource('subjects', SubjectController::class);
        Route::get('/getTeachers/{id}', [SubjectController::class, 'getTeachers']);

        Route::resource('library', LibraryController::class);
        Route::get('download_file/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');

        Route::resource('settings', SettingController::class);
    }
);
