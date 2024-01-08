@extends('layouts.app')

@section('content')
    <div id="app">
        <head-menu></head-menu>

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Task Details</h2>

        <div id='add-transaction-form' class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full mx-4">

                <div class="mb-4 flex items-center">
                    <label class="text-gray-600 font-semibold mr-2"><b>ID:</b></label>
                    <span class="text-gray-800">&nbsp;{{ $task->id }}</span>
                </div>

                <div class="mb-4 flex items-center">
                    <label class="text-gray-600 font-semibold mr-2"><b>Title:</b></label>
                    <span class="text-gray-800">&nbsp;{{ $task->title }}</span>
                </div>

                <div class="mb-4 flex items-center">
                    <label class="text-gray-600 font-semibold mr-2"><b>Description:</b></label>
                    <span class="text-gray-800">&nbsp;{{ $task->description }}</span>
                </div>

                <div class="mb-4 flex items-center">
                    <label class="text-gray-600 font-semibold mr-2"><b>Status:</b></label>
                    <span class="text-gray-800">&nbsp;{{ $task->completed ? 'Completed' : ' Incomplete' }}</span>
                </div>
                
            </div>
        </div>
        <br>
        <br>
        <a href="/" class="text-blue-500 hover:underline">Back to Task List</a>

    </div>
@endsection
