-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 21 2016 г., 11:51
-- Версия сервера: 10.0.17-MariaDB
-- Версия PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `proje`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(20) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `readbook` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `bookname`, `category`, `description`, `picture`, `readbook`) VALUES
(1, 'Pride and Prejudice', 'Drama', '"It is a truth universally acknowledged, that a single man in possession of a good fortune must be in want of a wife."\r\n\r\nSo begins Pride and Prejudice, 
  Jane Austen''s witty comedy of manners--one of the most popular novels of all time--that features 
  splendidly civilized sparring between the proud Mr. Darcy and the prejudiced Elizabeth Bennet as 
  they play out their spirited courtship in a series of eighteenth-century drawing-room intrigues.', 
  'images/prod1.gif', 'http://www.publicbookshelf.com/romance/pride-prejudice/single-man-1'),

(2, 'Hamlet', 'Drama', 'Visually engages readers by placing the original dialogue on the left-hand side of the page, and a modern prose interpretations on the right. As a result, it is easy for readers to cross reference as they move through the play and finally "get" Shakespeare.', 'images/hamlet/h.jpg', 'http://www.online-literature.com/shakespeare/hamlet/2'),
(3, 'Great Gatsby', 'Drama', 'This love story is set in the 1920s - a period of jazz and decadence. 
  Jay Gatsby, a poor army officer falls for Daisy, who marries a rich man while Jay is overseas. 
  After the war, Jay becomes a multi-millionaire focusing on making money, throwing parties and enticing 
  Daisy to return to his life.', 'images/gatsby/gt.gif', 'https://ebooks.adelaide.edu.au/f/fitzgerald/f_scott/gatsby'),
(4, 'A Clash of Kings', 'Fantasy', 'The second book in the "A Song of Ice and Fire" trilogy. Sansa Stark 
  is trapped in marriage to the feeble Lannister boy, child of incest, who is King Joffrey. In the North the
   Starks prepare for battle with the Lannisters.', 'images/prod2.gif', 'http://2novels.com/a-clash-of-kings/page-1-1032602.html'),
(5, 'Harry Potter', 'Fantasy', 'In Harry Potter and the Goblet of Fire, J.K. Rowling offers up equal parts danger and delight--and any number of dragons, house-elves, and death-defying challenges. Now 14, her orphan hero has only two more weeks with his Muggle relatives before returning to Hogwarts School of Witchcraft and Wizardry.', 'images/harry/u.jpg', 'http://hnovels.com/harry-potter-and-the-goblet-of-fire/chapter-1-the-riddle-house-67742.html'),
(6, 'A Game of Thones', 'Fantasy', 'The first volume in the "A Song of Ice and Fire" trilogy which tells of the treachery, greed and war threatening the Seven Kingdoms south of the Wall. In a world scarred by battle and catastrophe, it describes the deeds of a people locked in conflict and the legacy they will leave their children.', 'images/game/g.jpg', 'http://www.rednovels.net/fantasticfiction/u6215.html'),
(7, 'A Great and Terrible Beauty', 'Mystery', 'A Victorian boarding school story, a Gothic mansion mystery, a gossipy romp about a clique of girlfriends, and a dark other-worldly fantasy–jumble them all together and you have this complicated and unusual first novel.', 'images/beauty/g.jpg', 'http://www.onlinebook4u.com/youngadult/AGreatandTerribleBeauty/index_10.html'),
(8, 'The Adventures of Sherlock Holmes', 'Mystery', 'Complete in nine handsome volumes, each with an introduction by a Doyle scholar, a chronology, a selected bibliography, and explanatory notes, the Oxford Sherlock Holmes series offers a definitive collection of the famous detectives adventures. No home library is complete without it.', 'images/sherlok/s.jpg', 'http://www.pagebypagebooks.com/Arthur_Conan_Doyle/The_Adventures_of_Sherlock_Holmes/ADVENTURE_I_A_SC'),
(9, 'Code da Vinci', 'Mystery', 'An ingenious code hidden in the works of Leonardo da Vinci. A desperate race through the cathedrals and castles of Europe. An astonishing truth concealed for centuries . . . unveiled at last.', 'images/vinci/c.jpg', 'http://freenovelonline.com/the-da-vinci-code/acknowledgments-66122.html');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `email`, `city`, `password`, `admin`) VALUES
(1, 'nazerke', 'nazerke', 'yergali', 'nazerke.yergali@ce.sdu.edu.kz', 'kzo', 'bc0dd8b1bbe5312e90d27e524b45fe26', 1),
(4, 'test', 'test', 'test', 'test@mail.ru', 'test', '098f6bcd4621d373cade4e832627b4f6', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;