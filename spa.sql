-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 04 2020 г., 16:53
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `spa`
--

-- --------------------------------------------------------

--
-- Структура таблицы `decision`
--

CREATE TABLE `decision` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `decision`
--

INSERT INTO `decision` (`id`, `title`) VALUES
(1, 'Постанова'),
(2, 'Рішення'),
(3, 'Ухвала'),
(4, 'Окрема ухвала'),
(5, 'Окрема думка судді'),
(6, 'Роз\'яснення'),
(7, 'Постанова Пленуму'),
(8, 'Iнформацiйнi листи'),
(9, 'Вісник'),
(10, 'Правовой висновок'),
(11, 'Узагальнення судової практики'),
(12, 'Документ'),
(13, 'Окрема думка'),
(14, 'Висновки'),
(15, 'Вирок'),
(16, 'Дайджест');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `decision_id` int(10) UNSIGNED NOT NULL,
  `justice_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id`, `decision_id`, `justice_id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(4, 6, 3, 'Document 4', 'text...', '2020-03-03 13:40:46', NULL),
(5, 1, 5, 'document100', 'text...', '2020-03-04 08:04:07', NULL),
(6, 2, 2, 'Document5', '<h1 style=\"text-align:center\"><u><em><strong>Document5</strong></em></u></h1>\r\n\r\n<p>DQWDQWDQWDQWDQWDQWDQDQDQWD</p>\r\n', '2020-03-04 08:26:08', NULL),
(7, 16, 6, 'document50', '<h1 style=\"text-align:center\"><span class=\"marker\"><strong>asdasdasdasdas</strong></span></h1>\r\n', '2020-03-04 11:11:39', NULL),
(8, 3, 2, 'Document55', '<p>wfwefwefwfwef</p>\r\n', '2020-03-04 11:13:47', NULL),
(10, 3, 3, 'qweqw', '<p>qweqweqw</p>\r\n', '2020-03-04 11:55:17', '2020-03-04 15:10:42'),
(11, 3, 6, 'Document45', '<p>Document45</p>\r\n\r\n<p>qwfd12e12212&nbsp;</p>\r\n', '2020-03-04 11:56:15', '2020-03-04 16:49:42');

-- --------------------------------------------------------

--
-- Структура таблицы `justice`
--

CREATE TABLE `justice` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `justice`
--

INSERT INTO `justice` (`id`, `title`) VALUES
(1, 'ЦПК'),
(2, 'ГПК'),
(3, 'КПК'),
(4, 'КАС'),
(5, 'КУпАП'),
(6, 'Другие');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'user1', 'user1@gmail.com', '$2y$10$FwJaATf83nkSN0cr5HSfMOWs4KuNBD7dmWFp1dYB1tHW9iHEmFy2a', 'user'),
(2, 'user2', 'user2@gmail.com', '$2y$10$XgrytHmKzTVThdOpIrm0N.d.8TOACkIrj.4YX6MCiqGLkfMnOHyQO', 'user'),
(3, 'admin', 'admin@gmail.com', '$2y$10$97VEy/tZMsOskTjfU/d.w.B5OTZHtc..DXTmj0rj4GLICB2zCO/qy', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `decision`
--
ALTER TABLE `decision`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `justice`
--
ALTER TABLE `justice`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `decision`
--
ALTER TABLE `decision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `justice`
--
ALTER TABLE `justice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
