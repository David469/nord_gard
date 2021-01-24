-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2021 г., 20:43
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nordgard_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advantages`
--

CREATE TABLE `advantages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `advantages`
--

INSERT INTO `advantages` (`id`, `title`, `text`, `image`) VALUES
(1, 'Расположение', 'Близость к городу и хорошее транспортное сообщение дают возможность жить за городом и работать в СПб.', 'icons/mark.png'),
(2, 'В окружении леса', 'Близость к Неве, развитая инфраструктура, лес, озера красивая природа создадут комфорт вашей жизни.', 'icons/trees.png'),
(3, 'РЖД', 'Электрички в сторону «Мга», «Кириши», «Будогощь» остановка «Павлово на Неве».', 'icons/train.png'),
(4, 'На автомобиле', '27 км от кольцевой по Ленинградскому шоссе.', 'icons/car.png'),
(5, 'Удобство для жизни', 'Уютный поселок - всего 70 участков. На территории имеется пляж и волейбольная площадка.', 'icons/home.png');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(1, 'images/lake.png'),
(2, 'images/image_2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `id_number`, `message`) VALUES
(1, 7, 'Please add administration tools');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `image`) VALUES
(1, 'В Бразилии потерпел крушение самолет с футболистами на борту', 'В Бразилии в авиакатастрофе погиб президент клуба четвертого бразильского дивизиона \"Пальмас\" Лукас Мейер.\r\nОб этом сообщает издание Globo.\r\nСамолет упал недалеко от бразильского Порту-Насиунал. При крушении погибли шесть человек.\r\nНа борту, помимо Мейера и пилота, находились четыре футболиста – Лукас Пракседес, Гильерме Ноэ, Рануле и Маркусу Молинари.', 'images/plane.jpg'),
(2, 'Министерство экономического развития РСО-Алания информирует', 'Министерство экономического развития РСО-Алания информирует, что в период с 12 по 13 октября 2017 года в г. Екатеринбурге состоится XXVI заседание Российско-Итальянской Рабочей', 'images/news.png');

-- --------------------------------------------------------

--
-- Структура таблицы `numbers`
--

CREATE TABLE `numbers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `numbers`
--

INSERT INTO `numbers` (`id`, `name`, `number`) VALUES
(1, 'David', '9-999-999-99-99'),
(2, 'George', '*-***-***-**-**'),
(3, 'Lisa', '1-111-111-11-11'),
(7, 'Logan Paul', '*-***-***-**-**');

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `price_per_hundred` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `area`, `price`, `price_per_hundred`, `description`, `image`) VALUES
(1, '12 соток', 4250000, 160000, 'Близость к Неве, развитая инфраструктура, лес, озера красивая природа создадут комфорт вашей жизни.', 'images/card.png'),
(2, '21 сотка', 5150000, 180000, 'Далёкость от Невы, совсем не развитая инфраструктура, степь, засуха, близость к перерабатывающему заводу создадут комфорт вашей жизни.', 'images/view.png'),
(3, '5 соток', 17000000, 50000, 'Озеро', 'images/lake.png');

-- --------------------------------------------------------

--
-- Структура таблицы `offers_pluses`
--

CREATE TABLE `offers_pluses` (
  `id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `offers_pluses`
--

INSERT INTO `offers_pluses` (`id`, `offer_id`, `name`) VALUES
(1, 1, 'Электричество'),
(2, 1, 'Газификация'),
(3, 1, 'Два озера'),
(4, 1, 'Волейбольная площадка'),
(5, 2, 'Электричество'),
(6, 2, 'Озеро'),
(7, 2, 'Тренажёрный зал'),
(8, 2, 'Лес'),
(9, 3, 'Плюс №1'),
(10, 3, 'Плюс №2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advantages`
--
ALTER TABLE `advantages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_number` (`id_number`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `numbers`
--
ALTER TABLE `numbers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offers_pluses`
--
ALTER TABLE `offers_pluses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advantages`
--
ALTER TABLE `advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `numbers`
--
ALTER TABLE `numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `offers_pluses`
--
ALTER TABLE `offers_pluses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `numbers` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `offers_pluses`
--
ALTER TABLE `offers_pluses`
  ADD CONSTRAINT `offers_pluses_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
