-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 31 2018 г., 13:48
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hotspot`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id` int(8) NOT NULL,
  `field_id` int(8) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contacts` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time_begin` time(6) NOT NULL,
  `time_end` time(6) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id`, `field_id`, `name`, `contacts`, `date`, `time_begin`, `time_end`, `active`) VALUES
(1, 1, 'Azamat', '+77076179250', '2018-07-21', '20:00:00.000000', '22:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(8) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Алматы'),
(2, 'Астана');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(8) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `city` int(4) NOT NULL,
  `district` int(4) NOT NULL,
  `address` varchar(512) NOT NULL,
  `lon` varchar(1000) NOT NULL,
  `lat` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `field_count` int(2) NOT NULL,
  `descr` varchar(5000) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `password`, `city`, `district`, `address`, `lon`, `lat`, `phone`, `field_count`, `descr`, `active`) VALUES
(1, 'Жайлау', 'yerbolat.beisenbek@gmail.com', '123', 1, 2, 'Рымжанова 104, угол улицы Симашко', '1', '1', '+77076179250', 1, 'asd', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `coverage`
--

CREATE TABLE `coverage` (
  `id` int(8) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `coverage`
--

INSERT INTO `coverage` (`id`, `name`) VALUES
(1, 'Искусственная трава'),
(2, 'Паркет'),
(3, 'Прорезинное'),
(4, 'Трава');

-- --------------------------------------------------------

--
-- Структура таблицы `districts`
--

CREATE TABLE `districts` (
  `id` int(8) NOT NULL,
  `name` varchar(128) NOT NULL,
  `city_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `districts`
--

INSERT INTO `districts` (`id`, `name`, `city_id`) VALUES
(1, 'Алатауский район', 1),
(2, 'Алмалинский район', 1),
(3, 'Ауэзовский район', 1),
(4, 'Бостандыкский район', 1),
(5, 'Жетысуский район', 1),
(6, 'Медеуский район', 1),
(7, 'Наурызбайский район', 1),
(8, 'Турксибский район', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `fields`
--

CREATE TABLE `fields` (
  `id` int(8) NOT NULL,
  `type_id` int(2) NOT NULL,
  `coverage_id` int(2) NOT NULL,
  `company_id` int(8) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `fields`
--

INSERT INTO `fields` (`id`, `type_id`, `coverage_id`, `company_id`, `active`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(8) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `field_id` int(8) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `url`, `field_id`, `active`) VALUES
(1, '1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(8) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Крытое'),
(2, 'Открытое');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `coverage`
--
ALTER TABLE `coverage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `coverage`
--
ALTER TABLE `coverage`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
