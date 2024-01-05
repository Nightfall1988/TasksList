<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAllTasks() {
        $tasks = Task::all();
        return view('welcome', ['tasks' => $tasks]);
    }
}
