
@extends('layouts.app')

@section('content')
    <div id="app">
        <add-task :task={{ json_encode($task) }}>
        </add-task>
    </div>
    <div>
    </div>
@endsection