<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;


/**
 * Маршрут сетки(Главная страница).
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Ресурсный маршрут для просмотра, создания, редактирования отдела.
 */
Route::resource('/department', DepartmentController::class, ['parameters' => ['department' => 'id',]]);

/**
 * Ресурсный маршрут для просмотра, создания, редактирования сотрудников.
 */
Route::resource('/staff', StaffController::class, ['parameters' => ['staff' => 'id']]);
