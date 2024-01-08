<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getHome() {
        return view('welcome');
    }

    public function getTasks() {
        $tasks = Task::paginate(10);
        return response()->json($tasks);
    }

    function getProfile($taskId) {
        $task = Task::find(['id', $taskId])->first();
        return view('profile', ['task' => $task]);
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
        $task = Task::find(['id' => $request->id])->first();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
    }
}
