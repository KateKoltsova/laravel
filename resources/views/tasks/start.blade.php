<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
@section('header')
    <h1>Header of Tasks pages</h1>
    <br>
@show
</div>

<div class="container">
    @yield('content')


<br>
<br>

@if(\Illuminate\Support\Facades\Route::currentRouteName()!=='task.index')
    <button class="btn btn-primary"><a href="{{route('task.index')}}" style="text-decoration: none; color: black">Show Task list</a></button>
@endif
</div>

</body>
</html>
