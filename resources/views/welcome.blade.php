
@extends('layouts.app')

@section('content')

    <div id="app">
        <task-list :tasks='@json($tasks)'>
        </task-list>
    </div>
@endsection