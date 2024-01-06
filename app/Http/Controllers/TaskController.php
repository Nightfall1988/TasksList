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

    public function addNewTask() {
        return view('addtask', ['task' => null]);
    }

    public function saveTask(Request $request) {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = false;
        $task->save();
        return redirect('/');
    }

    public function completeTask(string $taskId) {
        $task = Task::find($taskId);
        $task->completed = true;
        $task->save();
        return redirect('/');
    }

    public function deleteTask($taskId) {
        Task::where('id',$taskId)->delete();
    }

    public function editTask($id) {
        $task = Task::find(['id' => $id])->first();
        return view('edittask', ['task' => $task]);
    }

    public function editSaveTask(Request $request) {
        $task = Task::find(['id' => $request->taskId]);
        return view('addtask', ['taskToEdit' => $task]);
    }
}
