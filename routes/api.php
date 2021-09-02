<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::resource("/admins", "App\Http\Controllers\AdminController");
    Route::resource("/employees", "App\Http\Controllers\EmployeeController");
    Route::resource("/ekpis", "App\Http\Controllers\EmployeeKpiController");
    Route::resource("/kpis", "App\Http\Controllers\KpiController");
    Route::resource("/projects", "App\Http\Controllers\ProjectController");
    Route::resource("/pteams", "App\Http\Controllers\ProjectTeamController");
    Route::resource("/roles", "App\Http\Controllers\RoleController");
    Route::resource("/teams", "App\Http\Controllers\TeamController");
});
