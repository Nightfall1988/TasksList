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

Route::get('/', [TaskController::class, 'getHome']);
Route::get('/tasks', [TaskController::class, 'getTasks']);
Route::get('/add-new-task', [TaskController::class, 'addNewTask']);
Route::get('/paginate-task-table', [TaskController::class, 'getPaginatedTasks']);
Route::post('/add-new-task', [TaskController::class, 'saveTask']);
Route::get('/edit-new-task/{id}', [TaskController::class, 'editTask']);
Route::post('/edit-save-task', [TaskController::class, 'editSaveTask']);
Route::post('/complete-task/{id}', [TaskController::class, 'completeTask']);
Route::post('/delete-task/{id}', [TaskController::class, 'deleteTask']);
