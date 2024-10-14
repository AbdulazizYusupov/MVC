-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 11 2024 г., 06:11
-- Версия сервера: 8.0.39
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `janr`
--

CREATE TABLE `janr` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `janr`
--

INSERT INTO `janr` (`id`, `name`) VALUES
(2, 'roman'),
(3, 'sher'),
(4, 'hikoya'),
(5, 'drama'),
(6, 'komediya');

-- --------------------------------------------------------

--
-- Структура таблицы `kitob`
--

CREATE TABLE `kitob` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `muallif_id` int NOT NULL,
  `janr_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `kitob`
--

INSERT INTO `kitob` (`id`, `name`, `text`, `muallif_id`, `janr_id`) VALUES
(2, 'Farxod va Shirin', ' eronlik xalqlar adabiyotlarida anʼanaviy mazmunga ega boʻlgan va bir necha ijodkorlar tomonidan qalamga olingan ishqiy qissa', 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `muallif`
--

CREATE TABLE `muallif` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `muallif`
--

INSERT INTO `muallif` (`id`, `name`) VALUES
(1, 'Alisher Navoiy'),
(3, 'Shekspir'),
(4, 'Pushkin'),
(5, 'Zahiriddin Bobur');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `janr`
--
ALTER TABLE `janr`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kitob`
--
ALTER TABLE `kitob`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `muallif`
--
ALTER TABLE `muallif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `janr`
--
ALTER TABLE `janr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `kitob`
--
ALTER TABLE `kitob`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `muallif`
--
ALTER TABLE `muallif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
