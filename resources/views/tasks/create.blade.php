@extends('tasks.form')

@section('header')
    <h1>Header of Creating Task Page</h1>
    <br>
@endsection

@section('form_name')
    <h3>Form for creating new task</h3>
    <br>
@endsection

@section('form_action') "{{route('task.store')}}" @endsection
@section('form_method') @method('POST') @endsection
@section('form_submit') Create @endsection
