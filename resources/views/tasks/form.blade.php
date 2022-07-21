@extends('tasks.start')
@section('content')
    @yield('form_name')
    <form action=@yield('form_action') method="POST">
        @csrf
        @yield('form_method')
        <label for="creator_id" class="form-label">Creator</label>
        <select name="creator_id" id="creator_id" class="form-control @error('creator_id') is-invalid @enderror">
            @foreach ($users as $user)
                @if(old('creator_id'))
                    @if ($user->id == old('creator_id'))
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @elseif(isset($task->creator_id))
                    @if ($user->id == $task->creator_id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>
        @error('creator_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
               @if (old('title'))
               value="{{old('title')}}"
               @elseif (isset($task->title))
               value="{{$task->title}}"
            @endif
        >
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="content" class="form-label">Content</label>
        @if (old('content'))
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>
        @elseif (isset($task->content))
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{$task->content}}</textarea>
        @else
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror"></textarea>
        @endisset
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="status_id" class="form-label">Status</label>
        <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror">
            @foreach ($statuses as $status)
                @if(old('status_id'))
                    @if ($status->id == old('status_id'))
                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                    @else
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endif
                @elseif(isset($task->status_id))
                    @if ($status->id == $task->status_id)
                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                    @else
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endif
                @else
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endif
            @endforeach
        </select>
        @error('status_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <br>
        <button type="submit" class="btn btn-primary">@yield('form_submit')</button>
    </form>
@endsection
