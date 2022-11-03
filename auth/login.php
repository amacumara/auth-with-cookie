<?php

if (!empty($_COOKIE)) {
    require __DIR__ . '/auth.php';
    if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        if (checkAuth($_COOKIE['login'], $_COOKIE['password'])) {
            header('Location: /auth/index.php');
        }
    }
}

    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        header('Location: /auth/index.php');
    } else {
        $error = 'Ошибка авторизации';
    }
?>

<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
<?php if (isset($error)): ?>
    <span style="color: red;">
    <?= $error ?>
</span>
<?php endif; ?>
<form action="/auth/login.php" method="post">
    <label for="login">Имя пользователя: </label><input type="text" name="login" id="login">
    <br>
    <label for="password">Пароль: </label><input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Войти">
</form>
</body>
</html>