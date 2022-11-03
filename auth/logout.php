<?php
require __DIR__ . '/auth.php';
$login = getUserLogin();

if (!empty($_COOKIE)) {
    setcookie('login', $login, -10, '/');
    setcookie('password', $password, -10, '/');
    header('Location: /auth/index.php');
}

?>


