-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 07:41 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movietracker`
--
CREATE DATABASE IF NOT EXISTS `movietracker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `movietracker`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(72) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `imdbId` varchar(10) NOT NULL,
  `json` json NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`imdbId`, `json`) VALUES
('tt2527336', '{"DVD": "27 Mar 2018", "Plot": "Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.", "Type": "movie", "Year": "2017", "Genre": "Action, Adventure, Fantasy", "Rated": "PG-13", "Title": "Star Wars: The Last Jedi", "Actors": "Mark Hamill, Carrie Fisher, Adam Driver, Daisy Ridley", "Awards": "Nominated for 4 Oscars. Another 5 wins & 47 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMjQ1MzcxNjg4N15BMl5BanBnXkFtZTgwNzgwMjY4MzI@._V1_SX300.jpg", "Writer": "Rian Johnson, George Lucas (based on characters created by)", "imdbID": "tt2527336", "Country": "USA", "Ratings": [{"Value": "7.4/10", "Source": "Internet Movie Database"}, {"Value": "91%", "Source": "Rotten Tomatoes"}, {"Value": "85/100", "Source": "Metacritic"}], "Runtime": "152 min", "Website": "http://www.starwars.com/the-last-jedi/", "Director": "Rian Johnson", "Language": "English", "Released": "15 Dec 2017", "Response": "True", "BoxOffice": "$619,117,636", "Metascore": "85", "imdbVotes": "339,810", "Production": "Walt Disney Pictures", "imdbRating": "7.4"}'),
('tt3748528', '{"DVD": "04 Apr 2017", "Plot": "The daughter of an Imperial scientist joins the Rebel Alliance in a risky move to steal the Death Star plans.", "Type": "movie", "Year": "2016", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "Rogue One: A Star Wars Story", "Actors": "Felicity Jones, Diego Luna, Alan Tudyk, Donnie Yen", "Awards": "Nominated for 2 Oscars. Another 23 wins & 78 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMjEwMzMxODIzOV5BMl5BanBnXkFtZTgwNzg3OTAzMDI@._V1_SX300.jpg", "Writer": "Chris Weitz (screenplay by), Tony Gilroy (screenplay by), John Knoll (story by), Gary Whitta (story by), George Lucas (based on characters created by)", "imdbID": "tt3748528", "Country": "USA", "Ratings": [{"Value": "7.8/10", "Source": "Internet Movie Database"}, {"Value": "85%", "Source": "Rotten Tomatoes"}, {"Value": "65/100", "Source": "Metacritic"}], "Runtime": "133 min", "Website": "http://www.starwars.com/", "Director": "Gareth Edwards", "Language": "English", "Released": "16 Dec 2016", "Response": "True", "BoxOffice": "$532,171,696", "Metascore": "65", "imdbVotes": "413,891", "Production": "Walt Disney Pictures", "imdbRating": "7.8"}'),
('tt1365519', '{"DVD": "N/A", "Plot": "Lara Croft, the fiercely independent daughter of a missing adventurer, must push herself beyond her limits when she finds herself on the island where her father disappeared.", "Type": "movie", "Year": "2018", "Genre": "Action, Adventure", "Rated": "PG-13", "Title": "Tomb Raider", "Actors": "Alicia Vikander, Dominic West, Walton Goggins, Daniel Wu", "Awards": "N/A", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BOTY4NDcyZGQtYmVlNy00ODgwLTljYTMtYzQ2OTE3NDhjODMwXkEyXkFqcGdeQXVyNzYzODM3Mzg@._V1_SX300.jpg", "Writer": "Geneva Robertson-Dworet (screenplay by), Alastair Siddons (screenplay by), Evan Daugherty (story by), Geneva Robertson-Dworet (story by)", "imdbID": "tt1365519", "Country": "UK, USA", "Ratings": [{"Value": "7.5/10", "Source": "Internet Movie Database"}], "Runtime": "118 min", "Website": "http://www.tombraidermovie.com/", "Director": "Roar Uthaug", "Language": "English", "Released": "16 Mar 2018", "Response": "True", "BoxOffice": "N/A", "Metascore": "N/A", "imdbVotes": "2,897", "Production": "Warner Bros. Pictures", "imdbRating": "7.5"}'),
('tt2250912', '{"DVD": "17 Oct 2017", "Plot": "Peter Parker balances his life as an ordinary high school student in Queens with his superhero alter-ego Spider-Man, and finds himself on the trail of a new menace prowling the skies of New York City.", "Type": "movie", "Year": "2017", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "Spider-Man: Homecoming", "Actors": "Tom Holland, Michael Keaton, Robert Downey Jr., Marisa Tomei", "Awards": "3 wins & 10 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BNTk4ODQ1MzgzNl5BMl5BanBnXkFtZTgwMTMyMzM4MTI@._V1_SX300.jpg", "Writer": "Jonathan Goldstein (screenplay by), John Francis Daley (screenplay by), Jon Watts (screenplay by), Christopher Ford (screenplay by), Chris McKenna (screenplay by), Erik Sommers (screenplay by), Jonathan Goldstein (screen story by), John Francis Daley (screen story by), Stan Lee (based on the Marvel comic book by), Steve Ditko (based on the Marvel comic book by), Joe Simon (character created by: Captain America), Jack Kirby (character created by: Captain America)", "imdbID": "tt2250912", "Country": "USA", "Ratings": [{"Value": "7.5/10", "Source": "Internet Movie Database"}, {"Value": "92%", "Source": "Rotten Tomatoes"}, {"Value": "73/100", "Source": "Metacritic"}], "Runtime": "133 min", "Website": "http://www.sonypictures.com/movies/spidermanhomecoming/", "Director": "Jon Watts", "Language": "English, Spanish", "Released": "07 Jul 2017", "Response": "True", "BoxOffice": "$334,166,825", "Metascore": "73", "imdbVotes": "293,876", "Production": "Sony Pictures", "imdbRating": "7.5"}'),
('tt0848228', '{"DVD": "25 Sep 2012", "Plot": "Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.", "Type": "movie", "Year": "2012", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "The Avengers", "Actors": "Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth", "Awards": "Nominated for 1 Oscar. Another 38 wins & 79 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMTk2NTI1MTU4N15BMl5BanBnXkFtZTcwODg0OTY0Nw@@._V1_SX300.jpg", "Writer": "Joss Whedon (screenplay), Zak Penn (story), Joss Whedon (story)", "imdbID": "tt0848228", "Country": "USA", "Ratings": [{"Value": "8.1/10", "Source": "Internet Movie Database"}, {"Value": "92%", "Source": "Rotten Tomatoes"}, {"Value": "69/100", "Source": "Metacritic"}], "Runtime": "143 min", "Website": "http://marvel.com/avengers_movie", "Director": "Joss Whedon", "Language": "English, Russian, Hindi", "Released": "04 May 2012", "Response": "True", "BoxOffice": "$623,279,547", "Metascore": "69", "imdbVotes": "1,091,051", "Production": "Walt Disney Pictures", "imdbRating": "8.1"}'),
('tt2395427', '{"DVD": "02 Oct 2015", "Plot": "When Tony Stark and Bruce Banner try to jump-start a dormant peacekeeping program called Ultron, things go horribly wrong and it\'s up to Earth\'s mightiest heroes to stop the villainous Ultron from enacting his terrible plan.", "Type": "movie", "Year": "2015", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "Avengers: Age of Ultron", "Actors": "Robert Downey Jr., Chris Hemsworth, Mark Ruffalo, Chris Evans", "Awards": "7 wins & 45 nominations.", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BMTM4OGJmNWMtOTM4Ni00NTE3LTg3MDItZmQxYjc4N2JhNmUxXkEyXkFqcGdeQXVyNTgzMDMzMTg@._V1_SX300.jpg", "Writer": "Joss Whedon, Stan Lee (based on the Marvel comics by), Jack Kirby (based on the Marvel comics by), Joe Simon (character created by: Captain America), Jack Kirby (character created by: Captain America), Jim Starlin (character created by: Thanos)", "imdbID": "tt2395427", "Country": "USA", "Ratings": [{"Value": "7.4/10", "Source": "Internet Movie Database"}, {"Value": "75%", "Source": "Rotten Tomatoes"}, {"Value": "66/100", "Source": "Metacritic"}], "Runtime": "141 min", "Website": "http://marvel.com/avengers", "Director": "Joss Whedon", "Language": "English", "Released": "01 May 2015", "Response": "True", "BoxOffice": "$429,113,729", "Metascore": "66", "imdbVotes": "563,491", "Production": "Walt Disney Pictures", "imdbRating": "7.4"}'),
('tt0111161', '{"DVD": "27 Jan 1998", "Plot": "Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.", "Type": "movie", "Year": "1994", "Genre": "Crime, Drama", "Rated": "R", "Title": "The Shawshank Redemption", "Actors": "Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler", "Awards": "Nominated for 7 Oscars. Another 19 wins & 29 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg", "Writer": "Stephen King (short story \\"Rita Hayworth and Shawshank Redemption\\"), Frank Darabont (screenplay)", "imdbID": "tt0111161", "Country": "USA", "Ratings": [{"Value": "9.3/10", "Source": "Internet Movie Database"}, {"Value": "91%", "Source": "Rotten Tomatoes"}, {"Value": "80/100", "Source": "Metacritic"}], "Runtime": "142 min", "Website": "N/A", "Director": "Frank Darabont", "Language": "English", "Released": "14 Oct 1994", "Response": "True", "BoxOffice": "N/A", "Metascore": "80", "imdbVotes": "1,929,977", "Production": "Columbia Pictures", "imdbRating": "9.3"}'),
('tt0468569', '{"DVD": "09 Dec 2008", "Plot": "When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham, the Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.", "Type": "movie", "Year": "2008", "Genre": "Action, Crime, Thriller", "Rated": "PG-13", "Title": "The Dark Knight", "Actors": "Christian Bale, Heath Ledger, Aaron Eckhart, Michael Caine", "Awards": "Won 2 Oscars. Another 151 wins & 154 nominations.", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg", "Writer": "Jonathan Nolan (screenplay), Christopher Nolan (screenplay), Christopher Nolan (story), David S. Goyer (story), Bob Kane (characters)", "imdbID": "tt0468569", "Country": "USA, UK", "Ratings": [{"Value": "9.0/10", "Source": "Internet Movie Database"}, {"Value": "94%", "Source": "Rotten Tomatoes"}, {"Value": "82/100", "Source": "Metacritic"}], "Runtime": "152 min", "Website": "http://thedarkknight.warnerbros.com/", "Director": "Christopher Nolan", "Language": "English, Mandarin", "Released": "18 Jul 2008", "Response": "True", "BoxOffice": "$533,316,061", "Metascore": "82", "imdbVotes": "1,896,843", "Production": "Warner Bros. Pictures/Legendary", "imdbRating": "9.0"}'),
('tt1345836', '{"DVD": "03 Dec 2012", "Plot": "Eight years after the Joker\'s reign of anarchy, Batman, with the help of the enigmatic Catwoman, is forced from his exile to save Gotham City, now on the edge of total annihilation, from the brutal guerrilla terrorist Bane.", "Type": "movie", "Year": "2012", "Genre": "Action, Thriller", "Rated": "PG-13", "Title": "The Dark Knight Rises", "Actors": "Christian Bale, Gary Oldman, Tom Hardy, Joseph Gordon-Levitt", "Awards": "Nominated for 1 BAFTA Film Award. Another 38 wins & 101 nominations.", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BMTk4ODQzNDY3Ml5BMl5BanBnXkFtZTcwODA0NTM4Nw@@._V1_SX300.jpg", "Writer": "Jonathan Nolan (screenplay), Christopher Nolan (screenplay), Christopher Nolan (story), David S. Goyer (story), Bob Kane (characters)", "imdbID": "tt1345836", "Country": "UK, USA", "Ratings": [{"Value": "8.4/10", "Source": "Internet Movie Database"}, {"Value": "87%", "Source": "Rotten Tomatoes"}, {"Value": "78/100", "Source": "Metacritic"}], "Runtime": "164 min", "Website": "http://www.thedarkknightrises.com/", "Director": "Christopher Nolan", "Language": "English, Arabic", "Released": "20 Jul 2012", "Response": "True", "BoxOffice": "$448,130,642", "Metascore": "78", "imdbVotes": "1,288,631", "Production": "Warner Bros. Pictures", "imdbRating": "8.4"}');

-- --------------------------------------------------------

--
-- Table structure for table `test123`
--

DROP TABLE IF EXISTS `test123`;
CREATE TABLE `test123` (
  `imdbId` varchar(10) NOT NULL,
  `json` json NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testuser`
--

DROP TABLE IF EXISTS `testuser`;
CREATE TABLE `testuser` (
  `imdbId` varchar(10) NOT NULL,
  `json` json NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testuser`
--

INSERT INTO `testuser` (`imdbId`, `json`) VALUES
('tt2527336', '{"DVD": "27 Mar 2018", "Plot": "Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.", "Type": "movie", "Year": "2017", "Genre": "Action, Adventure, Fantasy", "Rated": "PG-13", "Title": "Star Wars: The Last Jedi", "Actors": "Mark Hamill, Carrie Fisher, Adam Driver, Daisy Ridley", "Awards": "Nominated for 4 Oscars. Another 5 wins & 47 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMjQ1MzcxNjg4N15BMl5BanBnXkFtZTgwNzgwMjY4MzI@._V1_SX300.jpg", "Writer": "Rian Johnson, George Lucas (based on characters created by)", "imdbID": "tt2527336", "Country": "USA", "Ratings": [{"Value": "7.4/10", "Source": "Internet Movie Database"}, {"Value": "91%", "Source": "Rotten Tomatoes"}, {"Value": "85/100", "Source": "Metacritic"}], "Runtime": "152 min", "Website": "http://www.starwars.com/the-last-jedi/", "Director": "Rian Johnson", "Language": "English", "Released": "15 Dec 2017", "Response": "True", "BoxOffice": "$619,117,636", "Metascore": "85", "imdbVotes": "339,810", "Production": "Walt Disney Pictures", "imdbRating": "7.4"}'),
('tt3748528', '{"DVD": "04 Apr 2017", "Plot": "The daughter of an Imperial scientist joins the Rebel Alliance in a risky move to steal the Death Star plans.", "Type": "movie", "Year": "2016", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "Rogue One: A Star Wars Story", "Actors": "Felicity Jones, Diego Luna, Alan Tudyk, Donnie Yen", "Awards": "Nominated for 2 Oscars. Another 23 wins & 78 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMjEwMzMxODIzOV5BMl5BanBnXkFtZTgwNzg3OTAzMDI@._V1_SX300.jpg", "Writer": "Chris Weitz (screenplay by), Tony Gilroy (screenplay by), John Knoll (story by), Gary Whitta (story by), George Lucas (based on characters created by)", "imdbID": "tt3748528", "Country": "USA", "Ratings": [{"Value": "7.8/10", "Source": "Internet Movie Database"}, {"Value": "85%", "Source": "Rotten Tomatoes"}, {"Value": "65/100", "Source": "Metacritic"}], "Runtime": "133 min", "Website": "http://www.starwars.com/", "Director": "Gareth Edwards", "Language": "English", "Released": "16 Dec 2016", "Response": "True", "BoxOffice": "$532,171,696", "Metascore": "65", "imdbVotes": "413,891", "Production": "Walt Disney Pictures", "imdbRating": "7.8"}'),
('tt1365519', '{"DVD": "N/A", "Plot": "Lara Croft, the fiercely independent daughter of a missing adventurer, must push herself beyond her limits when she finds herself on the island where her father disappeared.", "Type": "movie", "Year": "2018", "Genre": "Action, Adventure", "Rated": "PG-13", "Title": "Tomb Raider", "Actors": "Alicia Vikander, Dominic West, Walton Goggins, Daniel Wu", "Awards": "N/A", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BOTY4NDcyZGQtYmVlNy00ODgwLTljYTMtYzQ2OTE3NDhjODMwXkEyXkFqcGdeQXVyNzYzODM3Mzg@._V1_SX300.jpg", "Writer": "Geneva Robertson-Dworet (screenplay by), Alastair Siddons (screenplay by), Evan Daugherty (story by), Geneva Robertson-Dworet (story by)", "imdbID": "tt1365519", "Country": "UK, USA", "Ratings": [{"Value": "7.5/10", "Source": "Internet Movie Database"}], "Runtime": "118 min", "Website": "http://www.tombraidermovie.com/", "Director": "Roar Uthaug", "Language": "English", "Released": "16 Mar 2018", "Response": "True", "BoxOffice": "N/A", "Metascore": "N/A", "imdbVotes": "2,897", "Production": "Warner Bros. Pictures", "imdbRating": "7.5"}'),
('tt0076759', '{"DVD": "21 Sep 2004", "Plot": "Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire\'s world-destroying battle-station while also attempting to rescue Princess Leia from the evil Darth Vader.", "Type": "movie", "Year": "1977", "Genre": "Action, Adventure, Fantasy", "Rated": "PG", "Title": "Star Wars: Episode IV - A New Hope", "Actors": "Mark Hamill, Harrison Ford, Carrie Fisher, Peter Cushing", "Awards": "Won 6 Oscars. Another 50 wins & 28 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BNzVlY2MwMjktM2E4OS00Y2Y3LWE3ZjctYzhkZGM3YzA1ZWM2XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg", "Writer": "George Lucas", "imdbID": "tt0076759", "Country": "USA", "Ratings": [{"Value": "8.6/10", "Source": "Internet Movie Database"}, {"Value": "93%", "Source": "Rotten Tomatoes"}, {"Value": "90/100", "Source": "Metacritic"}], "Runtime": "121 min", "Website": "http://www.starwars.com/episode-iv/", "Director": "George Lucas", "Language": "English", "Released": "25 May 1977", "Response": "True", "BoxOffice": "N/A", "Metascore": "90", "imdbVotes": "1,044,414", "Production": "20th Century Fox", "imdbRating": "8.6"}'),
('tt2250912', '{"DVD": "17 Oct 2017", "Plot": "Peter Parker balances his life as an ordinary high school student in Queens with his superhero alter-ego Spider-Man, and finds himself on the trail of a new menace prowling the skies of New York City.", "Type": "movie", "Year": "2017", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "Spider-Man: Homecoming", "Actors": "Tom Holland, Michael Keaton, Robert Downey Jr., Marisa Tomei", "Awards": "3 wins & 10 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BNTk4ODQ1MzgzNl5BMl5BanBnXkFtZTgwMTMyMzM4MTI@._V1_SX300.jpg", "Writer": "Jonathan Goldstein (screenplay by), John Francis Daley (screenplay by), Jon Watts (screenplay by), Christopher Ford (screenplay by), Chris McKenna (screenplay by), Erik Sommers (screenplay by), Jonathan Goldstein (screen story by), John Francis Daley (screen story by), Stan Lee (based on the Marvel comic book by), Steve Ditko (based on the Marvel comic book by), Joe Simon (character created by: Captain America), Jack Kirby (character created by: Captain America)", "imdbID": "tt2250912", "Country": "USA", "Ratings": [{"Value": "7.5/10", "Source": "Internet Movie Database"}, {"Value": "92%", "Source": "Rotten Tomatoes"}, {"Value": "73/100", "Source": "Metacritic"}], "Runtime": "133 min", "Website": "http://www.sonypictures.com/movies/spidermanhomecoming/", "Director": "Jon Watts", "Language": "English, Spanish", "Released": "07 Jul 2017", "Response": "True", "BoxOffice": "$334,166,825", "Metascore": "73", "imdbVotes": "293,876", "Production": "Sony Pictures", "imdbRating": "7.5"}'),
('tt0848228', '{"DVD": "25 Sep 2012", "Plot": "Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.", "Type": "movie", "Year": "2012", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "The Avengers", "Actors": "Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth", "Awards": "Nominated for 1 Oscar. Another 38 wins & 79 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMTk2NTI1MTU4N15BMl5BanBnXkFtZTcwODg0OTY0Nw@@._V1_SX300.jpg", "Writer": "Joss Whedon (screenplay), Zak Penn (story), Joss Whedon (story)", "imdbID": "tt0848228", "Country": "USA", "Ratings": [{"Value": "8.1/10", "Source": "Internet Movie Database"}, {"Value": "92%", "Source": "Rotten Tomatoes"}, {"Value": "69/100", "Source": "Metacritic"}], "Runtime": "143 min", "Website": "http://marvel.com/avengers_movie", "Director": "Joss Whedon", "Language": "English, Russian, Hindi", "Released": "04 May 2012", "Response": "True", "BoxOffice": "$623,279,547", "Metascore": "69", "imdbVotes": "1,091,051", "Production": "Walt Disney Pictures", "imdbRating": "8.1"}'),
('tt2395427', '{"DVD": "02 Oct 2015", "Plot": "When Tony Stark and Bruce Banner try to jump-start a dormant peacekeeping program called Ultron, things go horribly wrong and it\'s up to Earth\'s mightiest heroes to stop the villainous Ultron from enacting his terrible plan.", "Type": "movie", "Year": "2015", "Genre": "Action, Adventure, Sci-Fi", "Rated": "PG-13", "Title": "Avengers: Age of Ultron", "Actors": "Robert Downey Jr., Chris Hemsworth, Mark Ruffalo, Chris Evans", "Awards": "7 wins & 45 nominations.", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BMTM4OGJmNWMtOTM4Ni00NTE3LTg3MDItZmQxYjc4N2JhNmUxXkEyXkFqcGdeQXVyNTgzMDMzMTg@._V1_SX300.jpg", "Writer": "Joss Whedon, Stan Lee (based on the Marvel comics by), Jack Kirby (based on the Marvel comics by), Joe Simon (character created by: Captain America), Jack Kirby (character created by: Captain America), Jim Starlin (character created by: Thanos)", "imdbID": "tt2395427", "Country": "USA", "Ratings": [{"Value": "7.4/10", "Source": "Internet Movie Database"}, {"Value": "75%", "Source": "Rotten Tomatoes"}, {"Value": "66/100", "Source": "Metacritic"}], "Runtime": "141 min", "Website": "http://marvel.com/avengers", "Director": "Joss Whedon", "Language": "English", "Released": "01 May 2015", "Response": "True", "BoxOffice": "$429,113,729", "Metascore": "66", "imdbVotes": "563,491", "Production": "Walt Disney Pictures", "imdbRating": "7.4"}'),
('tt0468569', '{"DVD": "09 Dec 2008", "Plot": "When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham, the Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.", "Type": "movie", "Year": "2008", "Genre": "Action, Crime, Thriller", "Rated": "PG-13", "Title": "The Dark Knight", "Actors": "Christian Bale, Heath Ledger, Aaron Eckhart, Michael Caine", "Awards": "Won 2 Oscars. Another 151 wins & 154 nominations.", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg", "Writer": "Jonathan Nolan (screenplay), Christopher Nolan (screenplay), Christopher Nolan (story), David S. Goyer (story), Bob Kane (characters)", "imdbID": "tt0468569", "Country": "USA, UK", "Ratings": [{"Value": "9.0/10", "Source": "Internet Movie Database"}, {"Value": "94%", "Source": "Rotten Tomatoes"}, {"Value": "82/100", "Source": "Metacritic"}], "Runtime": "152 min", "Website": "http://thedarkknight.warnerbros.com/", "Director": "Christopher Nolan", "Language": "English, Mandarin", "Released": "18 Jul 2008", "Response": "True", "BoxOffice": "$533,316,061", "Metascore": "82", "imdbVotes": "1,896,843", "Production": "Warner Bros. Pictures/Legendary", "imdbRating": "9.0"}'),
('tt1345836', '{"DVD": "03 Dec 2012", "Plot": "Eight years after the Joker\'s reign of anarchy, Batman, with the help of the enigmatic Catwoman, is forced from his exile to save Gotham City, now on the edge of total annihilation, from the brutal guerrilla terrorist Bane.", "Type": "movie", "Year": "2012", "Genre": "Action, Thriller", "Rated": "PG-13", "Title": "The Dark Knight Rises", "Actors": "Christian Bale, Gary Oldman, Tom Hardy, Joseph Gordon-Levitt", "Awards": "Nominated for 1 BAFTA Film Award. Another 38 wins & 101 nominations.", "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BMTk4ODQzNDY3Ml5BMl5BanBnXkFtZTcwODA0NTM4Nw@@._V1_SX300.jpg", "Writer": "Jonathan Nolan (screenplay), Christopher Nolan (screenplay), Christopher Nolan (story), David S. Goyer (story), Bob Kane (characters)", "imdbID": "tt1345836", "Country": "UK, USA", "Ratings": [{"Value": "8.4/10", "Source": "Internet Movie Database"}, {"Value": "87%", "Source": "Rotten Tomatoes"}, {"Value": "78/100", "Source": "Metacritic"}], "Runtime": "164 min", "Website": "http://www.thedarkknightrises.com/", "Director": "Christopher Nolan", "Language": "English, Arabic", "Released": "20 Jul 2012", "Response": "True", "BoxOffice": "$448,130,642", "Metascore": "78", "imdbVotes": "1,288,631", "Production": "Warner Bros. Pictures", "imdbRating": "8.4"}'),
('tt0111161', '{"DVD": "27 Jan 1998", "Plot": "Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.", "Type": "movie", "Year": "1994", "Genre": "Crime, Drama", "Rated": "R", "Title": "The Shawshank Redemption", "Actors": "Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler", "Awards": "Nominated for 7 Oscars. Another 19 wins & 29 nominations.", "Poster": "https://ia.media-imdb.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg", "Writer": "Stephen King (short story \\"Rita Hayworth and Shawshank Redemption\\"), Frank Darabont (screenplay)", "imdbID": "tt0111161", "Country": "USA", "Ratings": [{"Value": "9.3/10", "Source": "Internet Movie Database"}, {"Value": "91%", "Source": "Rotten Tomatoes"}, {"Value": "80/100", "Source": "Metacritic"}], "Runtime": "142 min", "Website": "N/A", "Director": "Frank Darabont", "Language": "English", "Released": "14 Oct 1994", "Response": "True", "BoxOffice": "N/A", "Metascore": "80", "imdbVotes": "1,929,977", "Production": "Columbia Pictures", "imdbRating": "9.3"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`imdbId`);

--
-- Indexes for table `test123`
--
ALTER TABLE `test123`
  ADD PRIMARY KEY (`imdbId`);

--
-- Indexes for table `testuser`
--
ALTER TABLE `testuser`
  ADD PRIMARY KEY (`imdbId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
