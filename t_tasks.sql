-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 24 2016 г., 01:14
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `t_tasks`
--

CREATE TABLE `t_tasks` (
  `task_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `t_tasks`
--

INSERT INTO `t_tasks` (`task_id`, `name`, `email`, `content`, `image`, `status`) VALUES
(30, 'Sdfdf Dfgdgdg', 'xcvzxvczxc@sdfsfdsdf.com', 'zsd fasdf asfasdf asdfasd fas dfasdf asdfa  sfgs fas dfasdf asdfa sdfasf asd fsadagfs dgfs g2435252 sfgs ', '30.jpg', 0),
(31, 'Psdfsdg Ppsadfsd', 'sdfgasg@zfgadsfgasf.com', 'sadf asdg asd asdfasdf asdf fas dfasdf asdfa sdfasf asd fsadagfs dgf sfgs ', '31.jpg', 1),
(32, 'Ssdfasdfasdf Dasdfasdf ', 'aszxcasdasas@asdfasfdas.com', 'fas dfasdf asdfa sdfasf asd fsadagfs dgfs g2435252 sfgs  fas dfasdf asdfa sdfasf asd fsadagfs dgfs g2435252 sfgs fas dfasdf asdfa sdfasf asd fsadagfs dgfs g2435252 sfgs fas dfasdf asdfa sdfasf asd fsadagfs dgfs g2435252 sfgs ', '32.jpg', 0),
(33, 'Ssdf Esgasdq', 'rasgfsdfgsfd@adfafsadf.com', 'fga sdfgsdfg sdfg sdfgsdf hgsdh sdhdghdfghd fh d fghdfgh dfh dfgfga sdfgsdfg sdfg sdfgsdf hgsdh sdhdghdfghd fh d fghdfgh dfh dfgfga sdfgsdfg sdfg sdfgsdf hgsdh sdhdghdfghd fh d fghd fgh dfh dfgfga sdfgsdfg sdfg sdfgsdf hgsdh sdhdghdfg fga sdfgs', '33.jpg', 1),
(34, 'Ssdfasdfasdfa Rdasdf ', 'asdfasfd@adasdffasfd.com', 'asdfasdf asdfasdf asdf agfa sdgasdfhga asdfasdf asdfasdf asdf agfa sdgasdfhga asdfasdf asdfasdf asdf agfa sdgasdfhga', '34.jpg', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `t_tasks`
--
ALTER TABLE `t_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `t_tasks`
--
ALTER TABLE `t_tasks`
  MODIFY `task_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
