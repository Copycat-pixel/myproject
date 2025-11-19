<?php
session_start();
include 'includes/db.php';

$user = $_SESSION['user'] ?? null;

$sql = "SELECT tracks.id, tracks.title, tracks.file_path, users.username 
        FROM tracks 
        JOIN users ON tracks.user_id = users.id
        ORDER BY tracks.id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Каталог треков</title>
    <link rel="stylesheet" href="assets/css/catalog.css">
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


    <div class="catalog-container">

        <h2>Каталог треков</h2>

        <div class="tracks-grid">

            <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="track-card">
                <div class="track-img"></div>

                <div class="track-info">
                    <h3><?= $row['title'] ?></h3>
                    <p>Исполнитель: <b><?= $row['username'] ?></b></p>

                    <audio controls>
                        <source src="<?= $row['file_path'] ?>" type="audio/mpeg">
                    </audio>
                </div>
            </div>
            <?php endwhile; ?>

            <?php else: ?>
            <p class="empty">Пока нет загруженных треков.</p>
            <?php endif; ?>

        </div>

    </div>

</body>

</html>