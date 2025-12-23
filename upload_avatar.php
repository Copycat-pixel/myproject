<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    die("Нет доступа");
}

$userId = $_SESSION['user_id'];

if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== 0) {
    die("Ошибка загрузки файла");
}

$allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
$fileType = mime_content_type($_FILES['avatar']['tmp_name']);

if (!in_array($fileType, $allowedTypes)) {
    die("Недопустимый формат файла");
}

$maxSize = 2 * 1024 * 1024; // 2 МБ
if ($_FILES['avatar']['size'] > $maxSize) {
    die("Файл слишком большой");
}

$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
$fileName = 'avatar_' . $userId . '_' . time() . '.' . $extension;
$uploadDir = 'uploads/avatars/';
$filePath = $uploadDir . $fileName;

if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $filePath)) {
    die("Не удалось сохранить файл");
}

// обновляем путь в БД
$stmt = $conn->prepare("UPDATE users SET avatar = ? WHERE id = ?");
$stmt->bind_param("si", $filePath, $userId);
$stmt->execute();

header("Location: profile.php");
exit;
