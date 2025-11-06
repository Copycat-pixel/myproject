<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Добро пожаловать, <?= htmlspecialchars($user['username']) ?>!</h2>
    <a href="logout.php">Выйти</a>
</body>
</html>
