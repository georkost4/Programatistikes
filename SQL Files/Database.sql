-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 11 Ιαν 2016 στις 03:33:47
-- Έκδοση διακομιστή: 5.6.26
-- Έκδοση PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `store`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `funds`
--

CREATE TABLE IF NOT EXISTS `funds` (
  `id` bigint(100) NOT NULL,
  `balance` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `funds`
--

INSERT INTO `funds` (`id`, `balance`) VALUES
(1, 119),
(3, 3);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `sub_category` varchar(30) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`product_id`, `name`, `stock`, `value`, `category`, `sub_category`, `image_path`, `description`) VALUES
(35, 'BIOGRA OROS 40 ', 19, 40, 'lipasmata', 'biologika', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451071720biologi_lipa.jpg', 'Biogra Oros lipasma.'),
(36, 'Î’ÎŸÎ¡Î‘ÎšÎ‘Î£ ', 20, 12, 'lipasmata', 'organika', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451138509Screenshot_1.png', 'ÎŸ Î’ÏŒÏÎ±ÎºÎ±Ï‚ ÎµÎ¯Î½Î±Î¹ Î»Î¯Ï€Î±ÏƒÎ¼Î± Î²ÏÎ±Î´ÎµÎ¯Î±Ï‚ Î±Ï€Î¿Î´Î­ÏƒÎ¼ÎµÏ…ÏƒÎ·Ï‚ ÎºÎ±Î¹ ÎµÏ†Î±ÏÎ¼ÏŒÎ¶ÎµÏ„Î±Î¹ ÏƒÏ€Î±ÏÏ„ÏŒÏ‚.'),
(37, 'Î˜Î•Î™ÎªÎšÎŸÎ£ ', 35, 9, 'lipasmata', 'xomata', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451138737Screenshot_2.png', 'Î˜Î•Î™ÎªÎšÎŸÎ£ Î£Î™Î”Î—Î¡ÎŸÎ£ (FeSO4.X H2O) /Kgr Î˜Î•Î™ÎªÎšÎŸÎ£ Î£Î™Î”Î—Î¡ÎŸÎ£ ÎœÎŸÎÎŸÎ«Î”Î¡Î™ÎšÎŸÎ£ ÎšÎŸÎšÎšÎ©Î”Î—Î£ Î£Î¥ÎÎ˜Î•Î£Î—: FeSO4 : 91% Fe2+ : 30% (Î¥Î´Î±Ï„Î¿Î´Î¹Î±Î»Ï…Ï„ÏŒÏ‚) Î£Î¬ÎºÎ¿Ï‚ 25 Kgr'),
(38, 'Snake Out Spray', 44, 6, 'apothitika', 'fidia', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451139117Screenshot_3.png', 'Î‘Î½Ï„Î±Î»Î»Î±ÎºÏ„Î¹ÎºÎ® Î±Ï€Ï‰Î¸Î·Ï„Î¹ÎºÎ® ÏƒÎºÏŒÎ½Î· Î³Î¹Î± Ï†Î¯Î´Î¹Î±. ÎœÎ— Î¤ÎŸÎžÎ™ÎšÎŸ '),
(39, 'Snake Out Î£ÎºÏ', 59, 15, 'apothitika', 'fidia', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451139195Screenshot_4.png', 'Î‘Î½Ï„Î±Î»Î»Î±ÎºÏ„Î¹ÎºÎ® Î±Ï€Ï‰Î¸Î·Ï„Î¹ÎºÎ® ÏƒÎºÏŒÎ½Î· Î³Î¹Î± Ï†Î¯Î´Î¹Î±. ÎœÎ— Î¤ÎŸÎžÎ™ÎšÎŸ '),
(40, 'Î“Î±Ï„Î¿Ï€Î±Î³Î', 38, 8, 'apothitika', 'gates', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451139383Screenshot_5.png', 'Î Î±Î³Î¯Î´Î± ÏƒÏÎ»Î»Î·ÏˆÎ·Ï‚ Î³Î¬Ï„Î±Ï‚ ÎºÎ±Î¹ Î¬Î»Î»Ï‰Î½ Î¼Î¹ÎºÏÏŒÏƒÏ‰Î¼Ï‰Î½ Î¶ÏŽÏ‰Î½ ÏŒÏ€Ï‰Ï‚ ÎºÎ¿Ï…Î½Î¬Î²Î¹Î± ÎºÎ±Î¹ ÎºÎ¿Ï…Î½Î­Î»Î¹Î±.'),
(42, 'Î’ÎµÎ»ÏŒÎ½ÎµÏ‚ Î±Ï€ÏŽÎ¸Î·ÏƒÎ·Ï‚ Ï€ÎµÏÎ¹ÏƒÏ„ÎµÏÎ¹ÏŽÎ½ 1 Î¼Î­Ï„ÏÎ¿Ï…', 45, 32, 'apothitika', 'poulia', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451139690Screenshot_6.png', 'Î— ÏƒÏ…ÏƒÎºÎµÏ…Î® ÎµÎ¯Î½Î±Î¹ Î±Î½Î¿Î¾ÎµÎ¯Î´Ï‰Ï„Î·, ÎµÏÎºÎ¿Î»Î· ÏƒÏ„Î·Î½ Ï„Î¿Ï€Î¿Î¸Î­Ï„Î·ÏƒÎ· ÎºÎ±Î¹ Î±Ï€Î¿Ï„ÎµÎ»ÎµÎ¯Ï„Î±Î¹ Î±Ï€ÏŒ 80 Î±ÎºÎ¯Î´ÎµÏ‚ Î¼Î®ÎºÎ¿Ï…Ï‚ 10cm.'),
(43, 'Î£Î±Î»Î¹Î³ÎºÎ±ÏÎ¿Ï€Î±Î³Î¯Î´Î± Snail trap', 45, 21, 'apothitika', 'pagides', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451139841Screenshot_7.png', 'Î”Î¹Î±Î¹ÏÎ¿ÏÎ¼ÎµÎ½Î· ÏƒÎµ Î´ÏÎ¿ Î¼Î­ÏÎ·. Î¤Î¿ ÎºÎ¬Ï„Ï‰ Î¼Î­ÏÎ¿Ï‚ Î¼Ï€Î±Î¯Î½ÎµÎ¹ Î¼Î­ÏƒÎ± ÏƒÏ„Î¿ Ï‡ÏŽÎ¼Î± Î¯ÏƒÎ± â€“ Î¯ÏƒÎ± Î¼Îµ Ï„Î·Î½ ÎµÏ€Î¹Ï†Î¬Î½ÎµÎ¹Î¬ Ï„Î¿Ï…. '),
(44, 'ÎœÏ…ÎºÎ·Ï„Î¿ÎºÏ„ÏŒÎ½Î¿ Î£Ï€ÏÎµÎ¹ 200ml MATACARCOMAS', 19, 4, 'ygeionomika', 'entomoktona', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451140285Screenshot_8.png', 'Î¤Î¿ Matacarcomas ÎµÎ¯Î½Î±Î¹ Î¼Ï…ÎºÎ·Ï„Î¿ÎºÏ„ÏŒÎ½Î¿ Î¸ÎµÏÎ±Ï€ÎµÏ…Ï„Î¹ÎºÏŒ ÎºÎ±Î¹ Ï€ÏÎ¿ÏƒÏ„Î±Ï„ÎµÏ…Ï„Î¹ÎºÏŒ Ï„Î¿Ï… Î¾ÏÎ»Î¿Ï… Î±Ï€ÏŒ Ï„Î¿ ÏƒÎ±ÏÎ¬ÎºÎ¹. Î•Ï†Î±ÏÎ¼ÏŒÎ¶ÎµÏ„Î±Î¹ ÎµÏÎºÎ¿Î»Î± Î´Î¹ÎµÎ¹ÏƒÎ´ÏÎ¿Î½Ï„Î±Ï‚ ÏƒÏ„Î¿ Î¾ÏÎ»Î¿ ÎºÎ±Î¹ Ï€ÏÎ¿ÏƒÏ†Î­ÏÎµÎ¹ Î±Ï€Î¿Ï„ÎµÎ»ÎµÏƒÎ¼Î±Ï„Î¹ÎºÎ® Ï†ÏÎ¿Î½Ï„Î¯Î´Î'),
(45, 'ÎšÏ…ÏÏ„ÏŒ Î ÏÎ¹ÏŒÎ½Î¹ ÎºÎ»Î±Î´Î­Î¼Î±Ï„Î¿Ï‚ Bellota Î¼Îµ Î¸Î®ÎºÎ·', 45, 12, 'ergaleia', 'kladeftiria', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451140819Screenshot_9.png', ' ÎšÏ…ÏÏ„ÏŒ Î ÏÎ¹ÏŒÎ½Î¹ ÎºÎ»Î±Î´Î­Î¼Î±Ï„Î¿Ï‚ Î¥ÏˆÎ·Î»Î®Ï‚ Î±Ï€ÏŒÎ´Î¿ÏƒÎ·Ï‚ Ï„Î·Ï‚ Bellota'),
(46, 'Î”ÎŸÎ§Î•Î™Î‘ INOX Î›Î‘Î”Î™ÎŸÎ¥ EN 200', 34, 12, 'ergaleia', 'doxeia', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451140945Screenshot_10.png', 'ÎŒÎ»Î± Ï„Î± Î´Î¿Ï‡ÎµÎ¯Î± Î™ÎÎŸÎ§ Î»Î±Î´Î¹Î¿Ï Ï„Î·Ï‚ ÏƒÎµÎ¹ÏÎ¬Ï‚ EN200 ÎµÎ¯Î½Î±Î¹ Î±Ï€ÏŒ Î±Î½Î¿Î¾ÎµÎ¯Î´Ï‰Ï„Î¿ Ï‡Î¬Î»Ï…Î²Î± 18/10 AISI304 Ï„Î± Î¿Ï€Î¿Î¯Î± Î¼Ï€Î¿ÏÎ¿ÏÎ½ Î½Î± Ï‡ÏÎ·ÏƒÎ¹Î¼Î¿Ï€Î¿Î¹Î·Î¸Î¿ÏÎ½ Î³Î¹Î± Ï„Î·Î½ Î±Ï€Î¿Î¸Î®ÎºÎµÏ…ÏƒÎ· Ï„ÏÎ¿Ï†Î¯Î¼Ï‰Î½.'),
(47, 'Î ÏÎ¹ÏŒÎ½Î¹ ÎžÏÎ»Î¿Ï… 10"', 10, 25, 'ergaleia', 'prionia', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451141070Screenshot_11.png', 'ÎœÎµ Î›Î±ÏƒÏ„Î¹Ï‡Î­Î½Î¹Î± Î›Î±Î²Î® Rolson'),
(48, 'Î§ÎŸÎ¡Î¤ÎŸÎšÎŸÎ Î¤Î™ÎšÎŸ  EFCO EL 8091', 25, 45, 'khpos', 'xartokoptika', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451141363Screenshot_12.png', 'Î—Î›Î•ÎšÎ¤Î¡Î™ÎšÎŸ Î§ÎŸÎ¡Î¤ÎŸÎšÎŸÎ Î¤Î™ÎšÎŸ'),
(49, 'Î§ÎŸÎ¡Î¤ÎŸÎšÎŸÎ Î¤Î™ÎšÎŸ MTD ET 250', 7, 100, 'khpos', 'xartokoptika', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451141603Screenshot_13.png', 'Î§ÎŸÎ¡Î¤ÎŸÎšÎŸÎ Î¤Î™ÎšÎŸ Î—Î›Î•ÎšÎ¤Î¡Î™ÎšÎŸ '),
(50, 'Î¨Î‘Î›Î™Î”Î™ ÎœÎ ÎŸÎ¡ÎÎ¤ÎŸÎ¥Î¡Î‘Î£', 5, 41, 'khpos', 'psalidia', 'http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/products_uploaded_images/1451141709Screenshot_14.png', 'ECHO HCA-265ES Î¤Î—Î›Î•Î£ÎšÎŸÎ Î™ÎšÎŸ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(12) NOT NULL,
  `last_name` varchar(24) NOT NULL,
  `age` varchar(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `age`, `username`, `password`) VALUES
(1, 'Maria', 'Karagiannh', '12', 'user1', 'user1'),
(2, 'Gewrgios', 'Abramopoulos', '25', 'admin', 'admin'),
(3, 'Katerina', 'Papadopoulou', '29', 'user2', 'user2'),
(4, 'Grhgorios', 'Rhgas', '23', 'user3', 'user3');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `funds`
--
ALTER TABLE `funds`
  ADD UNIQUE KEY `id` (`id`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
