
@extends('layouts.app')

@section('content')

    <div id="app">
        <add-new-task :tasks={{ json_encode($tasks) }}>
        </add-new-task>
        aaa
        <delete-task></delete-task>

    </div>
    <div>
    </div>
@endsection