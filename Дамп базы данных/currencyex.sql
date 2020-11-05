-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 05 2020 г., 17:01
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `currencyex`
--

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int(11) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL,
  `amount` float NOT NULL,
  `fromCurrency` varchar(255) NOT NULL,
  `toCurrency` varchar(255) NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `datetime`, `amount`, `fromCurrency`, `toCurrency`, `result`) VALUES
(4, '2020-11-04 19:56:31', 100, 'UAH', 'UAH', 100),
(5, '2020-11-04 19:56:50', 100.586, 'UAH', 'UAH', 100.586),
(6, '2020-11-04 20:09:40', 100, 'UAH', 'UAH', 100),
(7, '2020-11-04 20:09:47', 100, 'UAH', 'UAH', 100),
(8, '2020-11-04 20:09:55', 100.586, 'UAH', 'UAH', 100.586),
(9, '2020-11-05 10:24:18', 100, 'AUD', 'UAH', 2040.42),
(10, '2020-11-05 11:37:51', 100, 'DKK', 'UAH', 448.86),
(11, '2020-11-05 17:30:22', 100, 'UAH', 'UAH', 100);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
