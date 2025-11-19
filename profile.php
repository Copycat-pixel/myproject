<?php
session_start();
include 'includes/db.php';
include 'includes/functions.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Получаем данные пользователя
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="profile-container">

        <div class="profile-header">
            <img src="assets/img/default_user.png" class="avatar">
            <h2><?= $username ?></h2>
            <p class="email"><?= $email ?></p>

            <a href="upload_track.php" class="upload-btn">Загрузить трек</a>
        </div>

        <div class="tracks-block">
            <h3>Мои треки</h3>

            <div class="tracks-list">
                <!-- Пока заглушка -->
                <p class="placeholder">У вас пока нет загруженных треков.</p>
            </div>
        </div>

    </div>

</body>

</html>