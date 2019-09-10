-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 06:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(47, 'africa'),
(48, 'europe'),
(49, 'America'),
(51, 'asia'),
(53, 'australia');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 10, 'Edwin Diaz', 'edwindiaz@edwindiaz.com', 'This just an exemple content, thank you', 'approve', '2019-03-19'),
(2, 7, 'mmmm', 'dagana.mounir@gmail.com', 'dcdcd', 'approve', '2019-08-27'),
(5, 7, 'regergerg', 'dagana.mounir@gmail.com', 'zegzegzegzeg', 'approve', '2019-08-27'),
(6, 7, 'zegezeg', 'dagana.mounir@gmail.com', 'zeggezgezgeezgzegzeg', 'approve', '2019-08-27'),
(7, 7, 'fezzefzef', 'mandmshop2018@gmail.com', 'zefezfzefzfe', 'approve', '2019-08-27'),
(8, 7, 'youness l9adoss', 'mandmshop2018@gmail.com', 'ezfzefzefze', 'approve', '2019-08-27'),
(9, 7, 'youness l9adoss', 'mandmshop2018@gmail.com', 'ezfzefzefze', 'approve', '2019-08-27'),
(10, 7, 'youness l9adoss', 'mandmshop2018@gmail.com', 'ezfzefzefze', 'unaprove', '2019-08-27'),
(11, 7, 'youness l9adoss', 'mandmshop2018@gmail.com', 'ezfzefzefze', 'unaprove', '2019-08-27'),
(12, 7, 'youness l9adoss', 'mandmshop2018@gmail.com', 'ezfzefzefze', 'approve', '2019-08-27'),
(16, 8, 'sdfdsf', 'mandmshop2018@gmail.com', 'wooooooooooooooooow', 'approve', '2019-08-30'),
(17, 8, 'sdfdsf', 'mandmshop2018@gmail.com', 'wooooooooooooooooow', 'approve', '2019-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(21, 49, 'peru, machu picchu', 'Mounir Dagana', '2019-09-02', '1558063596965.jpg', '<p>Machu Picchu Machu Pikchu is a 15th-century Inca citadel, located in the Eastern Cordillera of southern Peru, on a 2,430-metre (7,970 ft) mountain ridge. It is located in the Cusco Region, Urubamba Province, Machupicchu District, above the Sacred Valley, which is 80 kilometres (50 mi) northwest of Cuzco and through which the Urubamba River flows, cutting through the Cordillera and creating a canyon with a tropical mountain climate.</p>', 'peru, america', 0, 'published', 4),
(25, 51, 'abu dhabi', 'Mounir Dagana', '2019-09-02', 'Abu-Dhabi-skyline_16c24a05731_large.jpg', 'mfnoeitoettnelnet ergiperngpier ergpinerg eroignelrng', 'abudhabi, asia', 0, 'published', 2),
(26, 47, 'turkey, istanbul', 'Mounir Dagana', '2019-09-02', '640px-Istanbul2010.jpg', 'Istanbul Turkish: Ä°stanbul (About this soundlisten)), formerly known as Byzantium and Constantinople, is the most populous city in Turkey and the country\\\'s economic, cultural and historic center. Istanbul is a transcontinental city in Eurasia, straddling the Bosporus strait (which separates Europe and Asia) between the Sea of Marmara and the Black Sea. Its commercial and historical center lies on the European side and about a third of its population lives in suburbs on the Asian side of the Bosporus.[13] With a total population of around 15 million residents in its metropolitan area,[3] Istanbul is one of the world\\\'s most populous cities, ranking as the world\\\'s fourth largest city proper and the largest European city. The city is the administrative center of the Istanbul Metropolitan Municipality (coterminous with Istanbul Province).', 'php, javascript', 0, 'published', 1),
(30, 47, 'Canggu, Bali', 'youness rahmanni', '2019-09-02', 'Nusa-Penida-Beach-Bali-image-by-JourneyEra.jpg', '<p>Canggu is a coastal village and 10 km beach on the south coast of Bali, Indonesia. It lies approximately 10 kilometers north of Kuta, and presents a much more relaxing atmosphere of dining, cultural and beach activities. The main Canggu streets are Jalan Batu Bolong, Jalan Padang Linjong, Jalan Batu Mejan and Jalan Tanah Barak. Along Jalan Batu Bolong you find the temple of the dead, Pura Merajapati, and the Pipitan Cemetery. Along the beach there are two main temples, Pura Batu Bolong and Pura Batu Mejan, which are both hundreds of years old and were initiated for building by Dang Hyang Nirartha. The Canggu area used to have scenic views of paddy fields and coconut groves but current rapid developments are quickly replacing these traditional views with private villas.</p>', 'asia, beach, fun', 0, 'published', 1),
(33, 53, 'Australia Sydney', 'Travis Scott', '2019-09-02', 'Sydney-Australia.jpg', 'Sydney is the state capital of New South Wales and the most populous city in Australia and Oceania. Located on Australia\'s east coast, the metropolis surrounds Port Jackson and extends about 70 km (43.5 mi) on its periphery towards the Blue Mountains to the west, Hawkesbury to the north, the Royal National Park to the south and Macarthur to the south-west. Sydney is made up of 658 suburbs, 40 local government areas and 15 contiguous regions. Residents of the city are known as \"Sydneysiders\".As of June 2017, Sydney\'s estimated metropolitan population was 5,230,330 and is home to approximately 65% of the state\'s population.', 'sydeny, australia, country', 0, 'published', 1),
(34, 49, 'peru, machu picchu', 'Mounir Dagana', '2019-09-02', '1558063596965.jpg', '<p>Machu Picchu Machu Pikchu is a 15th-century Inca citadel, located in the Eastern Cordillera of southern Peru, on a 2,430-metre (7,970 ft) mountain ridge. It is located in the Cusco Region, Urubamba Province, Machupicchu District, above the Sacred Valley, which is 80 kilometres (50 mi) northwest of Cuzco and through which the Urubamba River flows, cutting through the Cordillera and creating a canyon with a tropical mountain climate.</p>', 'peru, america', 0, 'published', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(31, 'mounir', '$1$hbZRCD2R$rEAts4fLtGIzFtpRSIyLT/', '', '', 'mounir.dagana@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
