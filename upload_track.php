<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
$user_id = $user['id'];

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title']);
    $file = $_FILES['track'];

    $allowed = ['mp3', 'aac', 'wav'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        $message = "Недопустимый формат! Только mp3, wav, aac.";
    } elseif ($file['error'] !== 0) {
        $message = "Ошибка загрузки файла.";
    } else {

        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }

        $newName = uniqid("track_") . "." . $ext;
        $uploadPath = "uploads/" . $newName;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {


            $sql = "INSERT INTO tracks (user_id, title, file_path) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $user_id, $title, $uploadPath);

            if ($stmt->execute()) {
                $message = "Трек успешно загружен!";
            } else {
                $message = "Ошибка базы данных.";
            }
        } else {
            $message = "Не удалось сохранить файл.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Загрузка трека</title>
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/upload_track.css">
</head>

<body>

    <div class="upload-container">

        <h2>Загрузить трек</h2>

        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Название трека" required>
            <input type="file" name="track" required>
            <button type="submit">Загрузить</button>
        </form>

        <p class="message"><?= $message ?></p>

        <a href="profile.php" class="back-btn">Назад</a>
    </div>

</body>

</html>