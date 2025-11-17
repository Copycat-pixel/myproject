<?php
session_start();
include 'includes/db.php';
include 'includes/functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (registerUser($conn, $username, $email, $password)) {
        $message = "Регистрация успешна! <a href='login.php'>Войти</a>";
    } else {
        $message = "Ошибка: возможно, такой пользователь уже существует.";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
    <div class="auth-container">
        <h2>Регистрация</h2>

        <form method="POST">
            <input type="text" name="username" placeholder="Имя пользователя" required>
            <input type="email" name="email" placeholder="Почта" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Зарегистрироваться</button>
        </form>

        <p class="message"><?= $message ?></p>

        <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
    </div>
</body>

</html>