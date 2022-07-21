@extends('tasks.form')

@section('header')
    <h1>Header of Updating Task Page</h1>
    <br>
@endsection

@section('form_name')
    <h3>Form for Updating new task</h3>
    <br>
@endsection

@section('form_action') "{{route('task.update',['task' => $task->id])}}" @endsection
@section('form_method') @method('PUT') @endsection
@section('form_submit') Update @endsection

