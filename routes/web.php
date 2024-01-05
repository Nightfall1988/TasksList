<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'getAllTasks']);
Route::get('/add-new-task', [TaskController::class, 'addNewTask']);
Route::post('/add-new-task', [TaskController::class, 'saveTask']);
Route::post('/complete-task/{id}', [TaskController::class, 'completeTask']);
Route::post('/delete-task/{id}', [TaskController::class, 'deleteTask']);
