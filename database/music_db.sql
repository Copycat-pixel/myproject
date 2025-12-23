-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4:3306
-- Время создания: Дек 23 2025 г., 11:55
-- Версия сервера: 8.4.6
-- Версия PHP: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `music_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tracks`
--

CREATE TABLE `tracks` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `description` text,
  `plays` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tracks`
--

INSERT INTO `tracks` (`id`, `user_id`, `title`, `file_path`, `cover`, `description`, `plays`, `created_at`) VALUES
(1, 1, 'Nirvana - Smell Like Teen Spirit', 'uploads/track_694a3b7e99a7d.mp3', NULL, NULL, 0, '2025-12-23 06:49:34');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'assets/img/default-avatar.png',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`) VALUES
(1, 'Николай', 'Syskanovkola@gmail.com', '$2y$10$A999oNhS0zEI3.57wV/miO10JrQsRBR48qxPZvtlkfOsp1CwI0YeK', 'assets/img/default-avatar.png', '2025-12-23 06:47:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tracks_user_id` (`user_id`),
  ADD KEY `idx_tracks_created_at` (`created_at`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `fk_tracks_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
