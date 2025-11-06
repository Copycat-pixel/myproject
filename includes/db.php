<?php
$host = '127.0.1.28';
$user = 'root';
$pass = '';
$dbname = 'music_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>