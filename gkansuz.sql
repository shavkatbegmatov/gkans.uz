-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 07 2022 г., 15:05
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
-- База данных: `gkansuz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `person_accounts`
--

CREATE TABLE `person_accounts` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Odamlar jadvali';

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Tovar nomi',
  `category_id` int(11) NOT NULL COMMENT 'Tovar kategoriyasi',
  `cost_id` int(11) NOT NULL COMMENT 'Sotib olingan narxi',
  `manufacturer_id` int(11) NOT NULL COMMENT 'Tovarni ishlab chiqargan kompaniya',
  `seller_shop_id` int(11) NOT NULL COMMENT 'Tovar sotib olingan joy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `seller_shops`
--

CREATE TABLE `seller_shops` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Do''kon nomi',
  `address` varchar(255) NOT NULL COMMENT 'Do''kon manzili',
  `phone` varchar(15) NOT NULL COMMENT 'Do''kon telefon raqami',
  `seller_id` int(11) NOT NULL COMMENT 'Do''kon sotuvchisi IDsi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tovar sotib olingan do''konlar';

-- --------------------------------------------------------

--
-- Структура таблицы `shop_sellers`
--

CREATE TABLE `shop_sellers` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'Biriktirilgan person IDsi',
  `seller_shops_id` int(11) NOT NULL COMMENT 'SOtuvchi ishlaydigan do''kon IDsi',
  `created_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Yaratilgan vaqt',
  `modify_date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'O''zgartirilgan vaqt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Dio''kondagi sotuvchilar jadvali';

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_modify_date` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(15) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `person_accounts`
--
ALTER TABLE `person_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `seller_shops`
--
ALTER TABLE `seller_shops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop_sellers`
--
ALTER TABLE `shop_sellers`
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
-- AUTO_INCREMENT для таблицы `person_accounts`
--
ALTER TABLE `person_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `seller_shops`
--
ALTER TABLE `seller_shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
