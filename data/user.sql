-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 10 2020 г., 14:16
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
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `login_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `password_user` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `login_user`, `name_user`, `password_user`) VALUES
(1, 'admin', 'Administrator', '$2y$10$MWv7Rn511utYmfEDZCa3hOVth3nPLsNPoCQujnMZK1eqyIuBFu7yS'),
(2, 'vadim', 'Vadim', '$2y$10$r.62mCcjNY2BZXYiPw0vI.JzMssFFpI9HsCXgS60F8jPvs0iwYsha'),
(3, 'hero', 'Hero', '$2y$10$32If1v1j.lYCABuvKbTsbuM9KqdlcKKwDhgX2mVvb5XDNKgtcXAZS'),
(4, 'redo', 'redo', '$2y$10$q.RXrM84eBjEJdjCBSFJ7u8SokVzcyPyd6NsJvKU3NwvvCDDzIfnO'),
(5, 'michese', 'michese', '$2y$10$dePaVM2NuOE58/bpJEDK1OzLGWKfkODhUEgeNh2NKQyOcp8ZYrEke'),
(7, 'type', 'Ваня', '$2y$10$7uvHTqSnlA.uKXdc.dzn1Ozlg.0GDdnudSas5l7Pf.f4Y8mvqAwMW');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
