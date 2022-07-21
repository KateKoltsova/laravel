@extends('tasks.start')
@section('content')
    TaskController index display a listing of the tasks:
    <ul>
        @foreach ($tasks as $task)
            <li>{{$task->title}}
                <button class="btn btn-outline-success">
                    <a href="{{route('task.show', ['task' => $task->id])}}" style="text-decoration: none; color: black">
                        Show this Task
                    </a>
                </button>
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary">
        <a href="{{route('task.create')}}" style="text-decoration: none; color: black">
            Create new Task
        </a>
    </button>
@endsection
