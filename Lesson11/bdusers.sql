-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 05 2017 г., 16:39
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bdusers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Group_users`
--

CREATE TABLE `Group_users` (
  `groups` varchar(255) NOT NULL,
  `length_cours` int(3) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Group_users`
--

INSERT INTO `Group_users` (`groups`, `length_cours`, `level`) VALUES
('PHP', 5, 5),
('JavaScript', 6, 4),
('HTML', 3, 4),
('CSS', 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` char(255) NOT NULL,
  `phon` char(20) NOT NULL,
  `groups` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phon`, `groups`) VALUES
(1, 'Gopak', 'ghds@dffdf.op', '+38(056) 1231456', 'PHP'),
(2, 'Doro', 'kot@gml.oo', '+38(056) 123 456 89', 'JavaScript'),
(3, 'lapa', 'potop@gmae.ua', '067 59 123 48', 'HTML'),
(4, 'Жорик', 'bottle@gmae.ua', '099 59 123 48', 'html'),
(5, 'Петро', 'ejdbn@gmae.ua', '099 458 023 55', 'CSS'),
(9, 'Михалыч', 'micha@mail.ru', '07465489875', 'php'),
(10, 'ДИмДимыч', 'dfcha@mail.ru', '074654891585', 'JavaScript'),
(11, 'Джуниор', 'jula@mail.ru', '063 456 79 12', 'CSS');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Group_users`
--
ALTER TABLE `Group_users`
  ADD PRIMARY KEY (`groups`);

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
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
