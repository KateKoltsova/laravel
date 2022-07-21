@extends('tasks.start')
@if (\Illuminate\Support\Facades\Route::currentRouteName()!=='task.destroy')
@section('content')
    @yield('head')
    @yield('parameters')
    <br>
    <button class="btn btn-outline-success">
        <a href="{{route('task.edit', ['task' => $task->id])}}" style="text-decoration: none; color: black">
            Edit this Task
        </a>
    </button>
    <br>
    <form method="post" action="{{route('task.destroy', ['task' => $task->id])}}">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-danger">Delete this Task</button>
    </form>
@endsection
@else
@section('content')
    <h3>TaskController destroy task "{{$task->title}}"!</h3>
@endsection
@endif
