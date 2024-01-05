
@extends('layouts.app')

@section('content')
    <div id="app">
        <div id="wrapper">
            <div class="m-10 w-60 flex justify-center">
                <head-menu></head-menu>
            </div>
            <br>
            <br>
            <add-task :task={{ json_encode($task) }}>
            </add-task>
        </div>
    </div>
@endsection