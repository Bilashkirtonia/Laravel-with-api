<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::ApiResource('student-classes', 'App\Http\Controllers\StudentClassController');
Route::ApiResource('student-subject', 'App\Http\Controllers\SubjectController');
Route::ApiResource('student-section', 'App\Http\Controllers\SectionController2');
Route::ApiResource('student', 'App\Http\Controllers\StudentController');

Route::group([
    'prefix' => 'auth'
    ], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});