-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 07:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `scenarist` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `production` varchar(100) NOT NULL,
  `actors` varchar(200) NOT NULL,
  `year` varchar(100) NOT NULL,
  `picture` varchar(250) NOT NULL,
  `duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `genre`, `scenarist`, `director`, `production`, `actors`, `year`, `picture`, `duration`) VALUES
(1, 'Wonder Woman', 'When a pilot crashes and tells of conflict in the outside world, Diana, an Amazonian warrior in training, leaves home to fight a war, discovering her full powers and true destiny.', 'Action, Adventure, Fantasy', 'Zack Snyder, Allan Heinberg, Geoff Johns, Jason Fuchs', 'Patty Jenkins', 'DC Films, RatPac Entertainment, Atlas Entertainment, Cruel and Unusual Films, Tencent Pictures, Wand', 'Gal Gadot, Chris Pine, Robin Wright, Danny Huston, David Thewlis, Connie Nielsen, Elena Anaya', '2017', 'wonder-woman.jpg', '113min'),
(2, 'Split', 'Three girls are kidnapped by a man with a diagnosed 23 distinct personalities. They must try to escape before the apparent emergence of a frightful new 24th.', 'Horror, Thriller', 'M. Night Shyamalan', 'M. Night Shyamalan', 'Blinding Edge Pictures, Blumhouse Productions', 'James McAvoy, Anya Taylor-Joy, Betty Buckley', '2016', 'split.jpg', '117min'),
(3, 'Shutter Island', 'In 1954, a U.S. Marshal investigates the disappearance of a murderer who escaped from a hospital for the criminally insane.', 'Mystery, Thriller ', 'Dennis Lehane', 'Martin Scorsese', 'Phoenix Pictures, Sikelia Productions, Appian Way Productions', 'Leonardo DiCaprio, Mark Ruffalo, Ben Kingsley, Michelle Williams, Emily Mortimer, Patricia Clarkson, Max von Sydow', '2010', 'shutter-island.jpg', '138min'),
(4, 'Soul', 'After landing the gig of a lifetime, a New York jazz pianist suddenly finds himself trapped in a strange land between Earth and the afterlife.', 'Animation, Adventure, Comedy ', 'Pete Docter, Mike Jones, Kemp Powers', 'Pete Docter', 'Walt Disney Pictures, Pixar Animation Studios', 'Jamie Foxx, Tina Fey, Graham Norton, Rachel House, Alice Braga, Richard Ayoade, Phylicia Rashad, Donnell Rawlings, Questlove, Angela Bassett', '2020', 'soul.jpg', '100min'),
(5, 'Tenet', 'Armed with only one word, Tenet, and fighting for the survival of the entire world, a Protagonist journeys through a twilight world of international espionage on a mission that will unfold in something beyond real time.', 'Action, Sci-Fi, Thriller ', 'Christopher Nolan', 'Christopher Nolan', 'Warner Bros. Pictures Syncopy', 'John David Washington, Robert Pattinson, Elizabeth Debicki, Dimple Kapadia, Michael Caine, Kenneth Branagh', '2020', 'tenet.jpg', '150min'),
(6, 'Karate Kid', 'A martial arts master agrees to teach karate to a bullied teenager.', 'Action, Drama, Family', 'Robert Mark Kamen', 'John G. Avildsen', 'Delphi II Productions, Jerry Weintraub Productions', 'Ralph Macchio, Pat Morita, Elisabeth Shue', '1984', 'karate-kid.jpg', '126min'),
(7, 'Home Alone 2: Lost in New York', 'One year after Kevin McCallister was left home alone and had to defeat a pair of bumbling burglars, he accidentally finds himself stranded in New York City - and the same criminals are not far behind.', 'Adventure, Comedy, Crime ', 'John Hughes', 'Chris Columbus', 'Hughes Entertainment', 'Macaulay Culkin, Joe Pesci, Daniel Stern', '1992', 'home-alone2.jpg', '120min'),
(8, 'Side Effects', 'A young woman\'s world unravels when a drug prescribed by her psychiatrist has unexpected side effects.', 'Crime, Drama, Mystery', 'Scott Z. Burns', 'Steven Soderbergh', 'Endgame Entertainment, FilmNation Entertainment, Di Bonaventura Pictures', 'Rooney Mara, Channing Tatum, Jude Law ', '2013', 'side-effects.jpg', '106min'),
(9, 'Avengers: Endgame', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos actions and restore balance to the universe.', 'Action, Adventure, Drama ', 'Christopher Markus, Stephen McFeely', 'Anthony Russo, Joe Russo', 'Marvel Studios', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', '2019', 'avengers-endgame.jpg', '181min'),
(10, 'Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'Crime, Drama', 'Quentin Tarantino, Roger Avary', 'Quentin Tarantino', 'Miramax Films', 'John Travolta, Uma Thurman, Samuel L. Jackson', '1994', 'pulp-fiction.jpg', '154min'),
(11, 'Harry Potter and the Deathly Hallows: Part 1', 'As Harry, Ron, and Hermione race against time and evil to destroy the Horcruxes, they uncover the existence of the three most powerful objects in the wizarding world: the Deathly Hallows.', 'Adventure, Family, Fantasy ', 'Steve Kloves, J.K. Rowling', 'David Yates', 'Warner Bros.', 'Daniel Radcliffe, Emma Watson, Rupert Grint', '2010', 'harry-potter-2010.jpg', '146min'),
(12, 'Blended', 'After a bad blind date, a man and woman find themselves stuck together at a resort for families, where their attraction grows as their respective kids benefit from the burgeoning relationship.', 'Comedy, Romance', 'Ivan Menchell, Clare Sera', 'Frank Coraci', 'Happy Madison Productions, Gulfstream Pictures, RatPac-Dune Entertainment', 'Adam Sandler, Drew Barrymore, Wendi McLendon-Covey', '2014', 'blended.jpg', '117min'),
(13, 'The Wolf of Wall Street', 'Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government.', 'Crime, Drama', 'Terence Winter, Jordan Belfort', 'Martin Scorsese', 'Red Granite Pictures, Appian Way Productions, Sikelia Productions, EMJAG Productions', 'Leonardo DiCaprio, Jonah Hill, Margot Robbie', '2013', 'wolf-wall-street.jpg', '180min');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
