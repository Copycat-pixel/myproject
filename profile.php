<?php
session_start();
include 'includes/db.php';
include 'includes/functions.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
$username = $user['username'];
$email = $user['email'];
$user_id = $user['id'];
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
    <div class="header">
        <div class="container">
            <div class="header-line">
                <div class="header-logo">
                    <img src="/assets/images/heaader-logo.png" alt="">
                </div>
                <div class="header-textlogo">
                    <a href="index.php">
                        Shikofy
                    </a>
                </div>
                <div class="nav">
                    <a class="nav-item" href="/catalog.php">Каталог</a>
                    <a class="nav-item" href="/users.php">Пользователи</a>
                    <a class="nav-item" href="/profile.php">Мой профиль</a>
                </div>

                <div class="button-header"><a href="/login.php">Вход/Регистрация</a></div>
            </div>
        </div>
    </div>

    <div class="profile-container">

        <div class="profile-header">
            <img src="/assets/images/default-avatar.png" class="avatar">
            <h2><?= $username ?></h2>
            <p class="email"><?= $email ?></p>

            <a href="upload_track.php" class="upload-btn">Загрузить трек</a>
        </div>

        <div class="tracks-block">
            <h3>Мои треки</h3>

            <div class="tracks-list">
                <?php
                $user_id = $user['id'];
                $sql = "SELECT * FROM tracks WHERE user_id = ? ORDER BY created_at DESC";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 0) {
                    echo "<p class='placeholder'>У вас пока нет загруженных треков.</p>";
                } else {
                    while ($track = $result->fetch_assoc()) {
                        echo "
                            <div class='track-item'>
                                <div class='track-title'>{$track['title']}</div>
                                <audio controls>
                                    <source src='{$track['file_path']}' type='audio/mpeg'>
                                </audio>
                            </div>";
                    }
                }
                ?>
            </div>
        </div>

    </div>

</body>

</html>