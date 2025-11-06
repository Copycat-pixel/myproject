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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Вход</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Почта" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Войти</button>
    </form>
    <p><?= $message ?></p>
</body>
</html>
