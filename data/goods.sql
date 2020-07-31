-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 31 2020 г., 15:22
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `trialdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_goods` int NOT NULL,
  `name_goods` varchar(255) NOT NULL,
  `description_goods` varchar(1024) NOT NULL,
  `price_goods` float NOT NULL,
  `src_goods` varchar(255) NOT NULL,
  `src_small_goods` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_goods`, `name_goods`, `description_goods`, `price_goods`, `src_goods`, `src_small_goods`) VALUES
(1, '5.45\" Смартфон Black Fox B6 Fox 8 ГБ', '[4x1.3 ГГц, 1 ГБ, 2 SIM, IPS, 960x480, камера 5 Мп, 3G, 4G, GPS, FM, 2000 мА*ч]', 4499, '../img/goods/big/smart1_big.jpg', '../img/goods/small/smart1.jpg'),
(2, '5.5\" Смартфон Alcatel 1A (2020) 16 ГБ', '[4x1.3 ГГц, 1 ГБ, 2 SIM, IPS, 1440x720, камера 5 Мп, 3G, 4G, GPS, FM, 3000 мА*ч]', 4999, '../img/goods/big/smart2_big.jpg', '../img/goods/small/smart2.jpg'),
(3, '5.45\" Смартфон bright & quick BQ-5508L Next LTE 8 ГБ', '[4x1.3 ГГц, 1 ГБ, 2 SIM, IPS, 960x480, камера 8 Мп, 3G, 4G, GPS, FM, 2500 мА*ч]', 5199, '../img/goods/big/smart3_big.jpg', '../img/goods/small/smart3.jpg'),
(4, '5.5\" Смартфон Texet TM-5584 8 ГБ', '[4x1.3 ГГц, 1 ГБ, 2 SIM, IPS, 960x480, камера 8+0.3 Мп, 3G, 4G, NFC, GPS, 2850 мА*ч]', 5599, '../img/goods/big/smart4_big.jpg', '../img/goods/small/smart4.jpg'),
(5, '5.45\" Смартфон Honor 7S 16 ГБ', '[4x1.5 ГГц, 1 ГБ, 2 SIM, IPS, 1440x720, камера 8 Мп, 3G, 4G, GPS, 3020 мА*ч]', 5999, '../img/goods/big/smart5_big.jpg', '../img/goods/small/smart5.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_goods`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_goods` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
