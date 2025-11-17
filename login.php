<?php
session_start();
include 'includes/db.php';
include 'includes/functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (loginUser($conn, $email, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $message = "Неверный логин или пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
    <div class="auth-container">
        <h2>Вход</h2>

        <form method="POST">
            <input type="email" name="email" placeholder="Почта" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Войти</button>
        </form>

        <p class="message"><?= $message ?></p>

        <p>Нет аккаунта? <a href="register.php">Регистрация</a></p>
    </div>
</body>

</html>