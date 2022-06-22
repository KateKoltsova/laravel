<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo route('task.store')?>" method="post">
    <?php echo csrf_field() ?>
    Task
    <br>
    <input type="text" name="task">
    <br>
    <br>
    Description
    <br>
    <textarea name="description"></textarea>
    <br>
    <br>
    <button type="submit">Create</button>
</form>
</body>
</html>
