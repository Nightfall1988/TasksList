<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Get homepage
     *
     * @return view
     */
    public function getHome() {
        return view('welcome');
    }

    /**
     * Get paginated list of tasks
     *
     * @return response
     */
    public function getTasks() {
        $tasks = Task::paginate(10);
        return response()->json($tasks);
    }

    /**
     * Get task profile by task ID
     *
     * @param string $taskId
     * @return view
     */
    function getProfile(string $taskId) {
        $task = Task::find(['id', $taskId])->first();
        return view('profile', ['task' => $task]);
    }


    /**
     * Get form to add a new task
     *
     * @return void
     */
    public function addNewTask() {
        return view('addtask', ['task' => null]);
    }

    /**
     * Save new task
     *
     * @param Request $request
     * @return void
     */
    public function saveTask(Request $request) {

        try {
            $request->validate([
                'title' => 'required|max:200',
                'description' => 'required|max:200',
            ]);
    
            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->completed = false;
            $task->save();
    
            return redirect('/');
        } catch (ValidationException $e) {
            dd('glop glop');
            return redirect()->back()->with('error', 'Task is too long, make sure title and description does not exceed 200 digits.');
        } catch (\Exception $e) {
            // Handle other exceptions, if needed
            return redirect()->back()->with('error', 'An error occurred while saving the task.');
        }
    }

    /**
     * Change task status to "Completed"
     *
     * @param string $taskId
     * @return void
     */
    public function completeTask(string $taskId) {
        $task = Task::find($taskId);
        $task->completed = true;
        $task->save();
        return redirect('/');
    }

    /**
     * Delete task by task ID
     *
     * @param string $taskId
     * @return void
     */
    public function deleteTask(string $taskId) {
        Task::where('id', $taskId)->delete();
    }

    /**
     * Edit existing task by task ID
     *
     * @param string $id
     * @return void
     */
    public function editTask(string $id) {
        $task = Task::find(['id' => $id])->first();
        return view('edittask', ['task' => $task]);
    }

    /**
     * Save edited existing task
     *
     * @param Request $request
     * @return void
     */
    public function editSaveTask(Request $request) {
        $task = Task::find(['id' => $request->id])->first();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
    }
}
