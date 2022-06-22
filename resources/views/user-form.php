<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo route('user.auth')?>" method="post">
    <?php echo csrf_field() ?>
    <h3>Авторизация</h3>
    Логин<input type="text" name="login">
    <input type="submit">
</form>
<hr>
<form action="<?php echo route('user.register')?>" method="post">
    <?php echo csrf_field() ?>
    <h3>Регистрация</h3>
    Логин<input type="text" name="login">
    <input type="submit">
</form>
<hr>
</body>
</html>
