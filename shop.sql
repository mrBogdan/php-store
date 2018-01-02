-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 02 2018 г., 17:12
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Gold tree', 1, 1),
(2, 'Green Tree', 2, 1),
(3, 'Red Tree', 3, 1),
(4, 'Bush', 4, 1),
(5, 'Grass', 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `goods_id`, `user_id`, `date`, `comment`) VALUES
(10, 28, 1, '2017-12-08 19:20:25', 'Bogdam'),
(11, 8, 1, '2017-12-08 20:03:42', 'g');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Name 1', 1, 1, 50, 1, 'GreenWay', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate repellendus dolorem, laborum non illum voluptate vitae quibusdam impedit aperiam placeat minus ratione mollitia. Unde quas beatae expedita, maiores dolores eligendi.', 1, 1, 1),
(2, 'Name 2', 2, 2, 66, 1, 'GreeWorld', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim doloremque sunt nesciunt porro mollitia, odio dicta architecto excepturi deserunt. Ipsam libero, consequuntur quae molestias vitae quas, asperiores quibusdam beatae pariatur?', 0, 1, 1),
(3, 'Name 3', 2, 3, 55, 1, 'ClearUniverse', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates explicabo deleniti voluptatum error. Sit necessitatibus omnis, temporibus harum dolorem nisi nostrum, laudantium repudiandae sunt aliquid voluptatem libero hic aperiam.', 0, 0, 1),
(4, 'Name 4', 1, 4, 33, 1, 'Optimism', 'Lorem is cool descr', 0, 0, 1),
(5, 'Name 5', 1, 5, 334, 1, 'FoIA', 'Lorem is cool descr', 0, 0, 1),
(6, 'Name 6', 2, 6, 1232, 1, 'TreeCompany', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates explicabo deleniti voluptatum error. Sit necessitatibus omnis, temporibus harum dolorem nisi nostrum, laudantium repudiandae sunt aliquid voluptatem libero hic aperiam.', 1, 1, 1),
(7, 'Name 7', 2, 7, 1231, 1, 'Jaw', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates explicabo deleniti voluptatum error. Sit necessitatibus omnis, temporibus harum dolorem nisi nostrum, laudantium repudiandae sunt aliquid voluptatem libero hic aperiam.', 1, 1, 1),
(8, 'Name 8', 1, 8, 12323, 1, 'Grac', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa voluptates explicabo deleniti voluptatum error. Sit necessitatibus omnis, temporibus harum dolorem nisi nostrum, laudantium repudiandae sunt aliquid voluptatem libero hic aperiam.', 1, 0, 1),
(9, 'Name 9', 1, 9, 12, 1, 'UkrainePollicy', 'GG', 0, 0, 1),
(10, 'Name 10', 1, 10, 1221, 1, 'GG', 'lorem21', 0, 1, 1),
(11, 'Name 11', 1, 11, 1221, 1, 'GG', 'lorem21', 0, 1, 1),
(12, 'Name 12', 2, 12, 1221, 1, 'GG', 'lorem21', 1, 1, 1),
(13, 'Name 13', 1, 13, 1221, 1, 'GG', 'lorem21', 0, 0, 1),
(14, 'Name 14', 1, 14, 1221, 1, 'GG', 'lorem21', 0, 0, 1),
(15, 'Name 15', 3, 15, 1221, 1, 'GG', 'lorem21', 0, 0, 1),
(16, 'Name 16', 1, 16, 1221, 1, 'GG', 'lorem21', 1, 1, 1),
(17, 'Name 17', 1, 17, 1221, 1, 'GG', 'lorem21', 0, 0, 1),
(18, 'Name 18', 2, 18, 1221, 1, 'GG', 'lorem21', 0, 0, 1),
(21, 'Name 19', 1, 123, 1234, 1, 'gg', 'sad', 1, 0, 1),
(22, 'Name 20', 1, 12, 12, 1, '1231', '123', 1, 1, 1),
(23, 'Name 21', 3, 12, 12, 1, '1231', '123', 1, 1, 1),
(24, 'Name 22', 1, 12345, 123, 1, 'google', 'best tree', 1, 1, 1),
(25, 'Name 23', 1, 1234, 12, 1, '121', '1212', 1, 0, 1),
(26, 'Name 24', 3, 123, 123, 1, '2321', '123123', 1, 0, 1),
(27, 'Name 25', 1, 123, 123, 1, '2321', '123123', 1, 0, 1),
(28, 'Name 26', 1, 1000, 322, 1, 'Bogdan Inc.', 'Lorem', 0, 0, 1),
(29, 'Kashtan', 1, 123, 100, 1, 'GreenPeace', 'Gree tree', 1, 0, 1),
(30, 'Test Item', 1, 888, 12, 1, 'Google', 'best', 1, 1, 1),
(31, 'grass', 5, 1234, 123, 1, 'Golder grass', 'best grass', 1, 0, 1),
(32, 'Bush', 4, 15, 12, 1, 'Bush', 'just bush', 1, 0, 1),
(33, 'Gold treee', 1, 123124, 599.99, 1, 'gti', 'tree', 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(1, 'Bogdan', '8(213) 123-2131', 'im waiting for it', 1, '2017-12-13 08:23:58', '{\"33\":2,\"32\":2}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `verify` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `role`, `verify`) VALUES
(1, 'Bogdan', 'Babitskiy', 'bogdan@mail.ru', '25d55ad283aa400af464c76d713c07ad', 'admin', 1),
(2, 'Bogdan', 'NoName', 'bogdan1@mail.ru', '25d55ad283aa400af464c76d713c07ad', 'user', 0),
(3, 'Bogdan', 'NoSerName', 'bogdan2@mail.ru', '25d55ad283aa400af464c76d713c07ad', 'user', 0),
(4, 'Bogdan', 'Babitskiy', 'test@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_nav`
--

CREATE TABLE `user_nav` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `sort_order` tinyint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_nav`
--

INSERT INTO `user_nav` (`id`, `name`, `icon`, `sort_order`, `status`) VALUES
(1, 'My page', '<i class=\"fa fa-home\" aria-hidden=\"true\"></i>', 1, 1),
(2, 'Message', '<i class=\"fa fa-comments\" aria-hidden=\"true\"></i>', 2, 0),
(3, 'Edit', '<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>', 3, 1),
(4, 'My orders', '<i class=\"fa fa-book\" aria-hidden=\"true\"></i>', 2, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_id` (`goods_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_nav`
--
ALTER TABLE `user_nav`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user_nav`
--
ALTER TABLE `user_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
