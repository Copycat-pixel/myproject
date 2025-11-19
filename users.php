<?php
session_start();
include 'includes/db.php';

// Загружаем всех пользователей
$sql = "SELECT id, username, email, avatar FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Пользователи</title>
    <link rel="stylesheet" href="assets/css/users.css">
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

    <div class="users-container">
        <h1 class="title">Пользователи</h1>

        <div class="users-list">
            <?php if ($result->num_rows > 0): ?>
            <?php while ($user = $result->fetch_assoc()): ?>
            <div class="user-card">
                <?php
                        $avatar = $user['avatar'];

                        if (!$avatar) {
                            $avatar = '/assets/images/default-avatar.png';
                        } else {
                            if (str_starts_with($avatar, 'assets/') || str_starts_with($avatar, '/assets/')) {
                                $avatar = '/' . ltrim($avatar, '/');
                            } else {
                                $avatar = '/uploads/avatars/' . $avatar;
                            }
                        }
                        ?>
                <img src="<?= htmlspecialchars($avatar) ?>" class="user-avatar">

                <div class="user-info">
                    <h3><?php echo htmlspecialchars($user['username']); ?></h3>
                    <p><?php echo htmlspecialchars($user['email']); ?></p>
                </div>

                <a href="musician.php?id=<?php echo $user['id']; ?>" class="profile-btn">Открыть профиль</a>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <p class="empty">Пользователей пока нет.</p>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>