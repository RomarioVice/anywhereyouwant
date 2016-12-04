-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 03 2016 г., 14:44
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `anywhereyouwant`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ac_pic` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `email`, `password`, `ac_pic`) VALUES
(10, 'RomarioVice', 'RomarioBrio@gmail.com', '$2y$10$2mBg63t2pQUff.E9JOcaSuupoyUbg2xoijjleVFaSqFJn1AZTSdo.', ''),
(11, 'SomeAnotherAdmin', 'AdminCheckCheck@mail.ru', '$2y$10$iy.i1VCAhExbNavaTJnobujRyP9YP9jyH6w3KFvyAnpP43gMhmjN2', '');

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE `main` (
  `content` text NOT NULL,
  `id_cont` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main`
--

INSERT INTO `main` (`content`, `id_cont`) VALUES
('<p>Пассажирские перевозки на комфортабельных автобусах из Донецка и др. городов: Питер, Москва, В.Новгород, Тверь, Н.Новгород, Брянск, Тула, Орел, Курск, Белгород, Краснодар, Волгоргад, Саратов, Самара, Пенза, Таганрог, Ростов, Липецк, Рязань, Тамбов, Воронеж, Анапа, Новороссийск, Геленджик, Лазаревское, Сочи, Адлер, Керчь, Симферополь, Евпатория, Судак, Алушта, Ялта, Севастополь, Киев.<p>', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(6) NOT NULL COMMENT 'идентификатор новости',
  `nDate` date NOT NULL COMMENT 'Дата публикации новости',
  `title` varchar(255) NOT NULL COMMENT 'оглавление статьи',
  `pic` text NOT NULL,
  `text` text NOT NULL COMMENT 'текст статьи',
  `fullTxt` text NOT NULL COMMENT 'Полный текст новости'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица новостей ресурса';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `nDate`, `title`, `pic`, `text`, `fullTxt`) VALUES
(1, '2016-09-01', 'Добро пожаловать, дорогой Гость!', 'img/slider/s1.jpg', 'Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com,\r\n                    где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.', 'Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com,\r\n                    где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.'),
(3, '2016-09-30', 'TitleCheck2', 'img/slider/s2.jpg', 'Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете', 'Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.\r\nДоброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно. Доброе время суток, дорогой Гость. Вас приветствует ресурс anywhereyouwant.com, где вы можете просмотреть информацию о пассажирских рейсах из ДНР в Россию и обратно.'),
(5, '2016-10-22', 'Минуточку внимания!', 'img/slider/s3.jpg', 'ДОНЕЦК - БЕЛГОРОД \r\n(через Богучар, Россошь, Алексеевка, Новый Оскол, Короча, Губкин, Старый Оскол) \r\nпо четным числам 15:00 Дворец Бракосочетания ул. Постышева; \r\n- Макеевка маг. "Папирус" 15:20; \r\nБогучар, Россошь - 1300 руб., \r\nАлексеевка, Новый Оскол, Короча ...', 'ДОНЕЦК - БЕЛГОРОД \r\n(через Богучар, Россошь, Алексеевка, Новый Оскол, Короча, Губкин, Старый Оскол) \r\nпо четным числам 15:00 Дворец Бракосочетания ул. Постышева; \r\n- Макеевка маг. "Папирус" 15:20; \r\nБогучар, Россошь - 1300 руб., \r\nАлексеевка, Новый Оскол, Короча - 1500 руб.,\r\nБелгород - 1600 руб.,\r\nСтарый Оскол - 1900 руб.; \r\nдетям до 5 лет скидка - 50 % ; \r\n1 сумка входит в стоимость; \r\n в дороге ≈ 18 часов; \r\nКПП " Изварино" \r\nАвтобусы: MAN (50 мест)\r\n\r\n Все вопросы и бронирование мест \r\n +38 050 565 44 50 (+viber); +38 063 795 76 95; 071 301 65 08 \r\nhttps://vk.com/perevozki_dnr_rossiya \r\nhttps://ok.ru/group52624225927358');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `surname_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otc_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `places_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_ord` datetime DEFAULT NULL,
  `date_t_ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `surname_ord`, `name_ord`, `otc_ord`, `places_ord`, `phone_ord`, `destination_ord`, `departure_ord`, `date_ord`, `date_t_ord`) VALUES
(2, 'Захонов', 'Кирилл', '', '1', '095 312 87 54', 'Донецк', 'Курск', '2016-11-25 20:16:22', NULL),
(3, 'Макаров', 'Димид', 'Владимирович', '5', '095 321 23 45', 'Орел', 'Донецк', '2016-11-25 20:43:21', NULL),
(4, 'Check', 'check', 'chekch', '3', '09456 ', 'Севастополь', 'Орел', '2016-11-25 20:46:10', NULL),
(5, 'Стаханова', 'Ирина', 'Федоровна', '6', '093 123 43 12', 'Краснодар', 'Донецк', '2016-11-25 20:47:07', NULL),
(6, 'Бубликов', 'Давид', '', '3', '093 123 56 65', 'Симферополь', 'Донецк', '2016-11-26 21:08:58', NULL),
(8, 'Ваинова', 'Ария', 'Митрофановна', '1', '093 943 94 12', 'Севастополь', 'Донецк', '2016-11-26 21:17:36', NULL),
(9, 'Камилова', 'Светлана', '', '2', '0660313210', 'Новгород', 'Донецк', '2016-11-26 21:20:07', NULL),
(10, 'Криповичцкий ', 'Димид', '', '1', '0661239500', 'Орел', 'Донецк', '2016-11-26 21:23:06', NULL),
(11, 'Демиденко', 'Владислав', '', '3', '09967631 32', 'Орел', 'Донецк', '2016-11-26 21:27:16', NULL),
(12, 'Метрафанов', 'Кирилл', '', '2', '093 554 43 12', 'Могилёв', 'Донецк', '2016-11-28 18:51:23', '2016-11-30'),
(13, 'Федосеенко', 'Валира', 'Димидова', '3', '063 321 43 66', 'Севастополь', 'Донецк', '2016-11-28 18:52:34', '2016-12-01'),
(14, 'Утигов', 'Дмитрий', '', '1', '050 0949000', 'Севастополь', 'Донецк', '2016-11-28 18:53:30', '2016-12-08'),
(15, 'Проверка', 'Именно', 'Владимирович', '3', '(093)-212-33-21', 'Орел', 'Донецк', '2016-11-29 16:39:37', '01.12.12'),
(16, 'Примеров', 'Пример', 'Примерович', '56', '(093)-123-45-64', 'Санкт-Петербург', 'Донецк', '2016-11-29 17:51:33', '09.01.17');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id_route` int(6) NOT NULL COMMENT 'идентификатор услуги',
  `departure` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'пункт отправки',
  `destination` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'пункт назначения',
  `cost` int(6) NOT NULL COMMENT 'стоимость',
  `description` text CHARACTER SET cp1251 NOT NULL,
  `g_map` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COMMENT='информация по маршрутам';

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id_route`, `departure`, `destination`, `cost`, `description`, `g_map`) VALUES
(2, 'Донецк', 'Санкт-Петербург', 3400, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus.', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d9587595.779557804!2d26.895728471066864!3d54.078679897122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x40e0909500919a2d%3A0x36335efdc5856f84!2z0JTQvtC90LXRhtC6LCDQlNC-0L3QtdGG0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQo9C60YDQsNC40L3QsA!3m2!1d48.015882999999995!2d37.80285!4m5!1s0x4696378cc74a65ed%3A0x6dc7673fab848eff!2z0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsINCz0L7RgNC-0LQg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsINCg0L7RgdGB0LjRjw!3m2!1d59.934280199999996!2d30.3350986!5e0!3m2!1sru!2sru!4v1480001867959'),
(3, 'Донецк', 'Москва', 1800, '', ''),
(4, 'Донецк', 'Новгород', 3200, '', ''),
(5, 'Донецк', 'Тверь', 3000, '', ''),
(6, 'Донецк', 'Минск', 4500, '', ''),
(7, 'Донецк', 'Могилёв', 4200, '', ''),
(8, 'Донецк', 'Гомель', 3700, '', ''),
(9, 'Донецк', 'Сочи', 2000, '', ''),
(10, 'Донецк', 'Адлер', 2000, '', ''),
(11, 'Донецк', 'Туапсе', 2000, '', ''),
(12, 'Донецк', 'Геленджик', 2000, '', ''),
(13, 'Донецк', 'Севастополь', 2000, '', ''),
(14, 'Донецк', 'Ялта', 1900, '', ''),
(15, 'Донецк', 'Алушта', 1900, '', ''),
(16, 'Донецк', 'Симферополь', 1800, '', ''),
(17, 'Донецк', 'Феодосия', 1800, '', ''),
(18, 'Донецк', 'Керчь', 1800, '', ''),
(19, 'Донецк', 'Анапа', 1650, '', ''),
(20, 'Донецк', 'Краснодар', 1250, '', ''),
(21, 'Донецк', 'Старый Оскол', 1700, '', ''),
(22, 'Донецк', 'Белгород', 1600, '', ''),
(23, 'Донецк', 'Курск', 1700, '', ''),
(24, 'Донецк', 'Брянск', 2100, '', ''),
(25, 'Донецк', 'Орел', 1800, '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id_cont`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_route`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `main`
--
ALTER TABLE `main`
  MODIFY `id_cont` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'идентификатор новости', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id_route` int(6) NOT NULL AUTO_INCREMENT COMMENT 'идентификатор услуги', AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
