-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 21 2022 г., 00:02
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `meeting_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db`
--

CREATE TABLE `db` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `title` varchar(255) NOT NULL,
  `address_lat` varchar(64) DEFAULT NULL,
  `address_lng` varchar(64) DEFAULT NULL,
  `country` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `db`
--

INSERT INTO `db` (`id`, `date`, `time`, `title`, `address_lat`, `address_lng`, `country`) VALUES
(19, '2022-06-15', '22:57:00', 'db_test', '', '', 'Indonesia'),
(20, '2022-06-08', '00:48:00', 'title 28', '', '', 'Azerbaijan'),
(22, '2022-06-07', '04:08:00', 'Rico', '-43.23187841880635', '-43.23187841880635', 'Austria'),
(23, '2022-06-08', '01:06:00', 'shkiper', '-16.90999325167905', '-16.90999325167905', 'Madagascar'),
(24, '2022-06-28', '04:11:00', 'pingvin', '-84.98943207526612', '-84.98943207526612', 'Antarctica'),
(25, '2022-06-07', '05:12:00', 'title 55', '', '', 'Azerbaijan'),
(26, '2022-06-15', '06:40:00', 'create', '47.81567639246261', '47.81567639246261', 'Azerbaijan'),
(27, '2022-06-07', '20:08:00', 'New Meeting 6666', '55a', '55a', 'Eritrea'),
(34, '2022-06-10', '17:28:00', 'TITLE 1', '55', '55', 'Angola'),
(37, '2022-06-22', '18:09:00', 'Title', '33', '33', 'Aruba'),
(38, '2022-06-07', '20:12:00', 'Title 5', '47.772318593581204', '47.772318593581204', 'Australia'),
(39, '2022-06-07', '18:12:00', '1111', '47.817062852381135', '47.817062852381135', 'Azerbaijan'),
(40, '2022-06-08', '19:14:00', 't3', '47.80230611844071', '35.129525756835946', 'Bahrain'),
(41, '2022-06-16', '18:17:00', 'title for vid 2', '', '', 'Antigua and Barbuda'),
(42, '2022-06-16', '21:31:00', 'Title 101', '11', '11', 'Antarctica'),
(43, '2022-06-16', '18:35:00', 'Title 222', '44', '44', 'Viet Nam'),
(44, '2022-06-09', '17:35:00', 'Title too 111', '22', '-3.6', 'Andorra'),
(45, '2022-06-07', '17:37:00', 'tttt', '22', '22', 'Austria'),
(46, '2022-06-08', '18:41:00', 'Titile for t', '', '', 'Australia'),
(47, '2022-06-23', '21:45:00', 'title too t@', '37', '15', 'Åland Islands');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `db`
--
ALTER TABLE `db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `db`
--
ALTER TABLE `db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
