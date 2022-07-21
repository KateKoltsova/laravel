@extends('tasks.view')
@section('head') TaskController show task "{{$task->title}}": @endsection
@section('parameters')
<ul>
    <li>Creator: {{$task->user->name}}</li>
    <li>Content: {{$task->content}}</li>
    <li>Status: {{$task->status->name}}</li>
    <li>Created: {{$task->created_at}}</li>
    <li>Updated: {{$task->updated_at}}</li>
</ul>
@endsection
