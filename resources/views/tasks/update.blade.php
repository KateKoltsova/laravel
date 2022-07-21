@extends('tasks.view')
@section('head') TaskController update task: @endsection
@section('parameters')
    <ul>
        @if($oldTask->user->name !== $task->user->name)
            <li>Creator: from "{{$oldTask->user->name}}" to "{{$task->user->name}}"</li>
        @endif
        @if ($oldTask->title !== $task->title)
            <li>Title: from "{{$oldTask->title}}" to "{{$task->title}}"</li>
        @endif
        @if($oldTask->content !== $task->content)
            <li>Content: from "{{$oldTask->content}}" to "{{$task->content}}"</li>
        @endif
        @if($oldTask->status->name !== $task->status->name)
            <li>Status: from "{{$oldTask->status->name}}" to "{{$task->status->name}}"</li>
        @endif
        @if($oldTask->updated_at !== $task->updated_at)
            <li>Updated: "{{$task->updated_at}}"</li>
        @endif
    </ul>
@endsection
