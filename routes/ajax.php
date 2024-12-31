<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth:web,teacher' ] , function(){
    Route::get('/Get_Classrooms/{id}', [AjaxController::class , 'Get_Classrooms']);
    Route::get('/Get_Sections/{id}', [AjaxController::class , 'Get_Sections']);
});