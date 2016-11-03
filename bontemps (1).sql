-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 22 okt 2016 om 15:16
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bontemps`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `links`
--

INSERT INTO `links` (`id`, `title`, `link`) VALUES
(1, 'Reserveren', 'reserveren'),
(2, 'Bestel menu', 'bestel-menu'),
(3, 'Overzicht / Zoeken', 'overzicht');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_09_10_160236_links', 1),
('2016_09_15_150125_tbl_customers', 1),
('2016_09_15_150157_tbl_menus', 1),
('2016_09_15_150157_tbl_orderlists', 1),
('2016_09_15_150205_tbl_tables', 1),
('2016_09_15_150218_tbl_reservations', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `address`, `city`, `email`, `phone_number`) VALUES
(2, 'Moeder', 'Evertsenstraat 14', 'Hendrik-Ido-Ambacht', 'info@boerenlandwinkelrijsoord.nl', '0786820080'),
(3, 'pake', 'Evertsenstraat 14', 'Hendrik-Ido-Ambacht', 'arend-jan93@hotmail.com', '0646818121'),
(4, 'zusje', 'Evertsenstraat 14', 'Hendrik-Ido-Ambacht', 'arend-jan93@hotmail.com', '0646818121'),
(5, 'arend-jan', 'Evertsenstraat 14', 'Hendrik-Ido-Ambacht', '28413@hoornbeeck.nl', '567483902'),
(6, 'rtcyv', 'ubi', 'yvubi', 'noyvub', 'ioui'),
(7, 'rtcyv', 'ubi', 'yvubi', 'noyvub', 'ioui'),
(8, 'ctyvubino', 'bunijomp,', 'ubinom', 'buniom', 'bnijmok'),
(9, 'rtyubnio', 'buni', 'vybun', 'bni', 'buni'),
(10, 'rtyubnio', 'buni', 'vybun', 'bni', 'buni'),
(11, 'safubno', 'ytubinmo', 'ubin', 'mubinom', 'inom'),
(12, 'tyubinmo', 'bunimk,', 'ubnimo,', 'inmo,l;.', 'nimo,pl'),
(13, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(14, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(15, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(16, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(17, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(18, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(19, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(20, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(21, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(22, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(23, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(24, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(25, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(26, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(27, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(28, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(29, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(30, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(31, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(32, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(33, 'Piet', 'Evertsenstraat 16', 'Hendrik-Ido-Ambacht', 'piet@plaaggeest.nl', '0634567889'),
(34, 'test', 'e', 'h', 'arend-jan93@hotmail.com', '0646818121'),
(35, 'test2', 'Evertsenstraat 14', 'Hendrik-Ido-Ambacht', 'arend-jan93@hotmail.com', '0646818121');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_orderlists`
--

CREATE TABLE `tbl_orderlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `visible` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_orderlists`
--

INSERT INTO `tbl_orderlists` (`id`, `order_name`, `description`, `price`, `visible`, `created_at`, `updated_at`) VALUES
(1, 'Pannenkoeken menu''s', 'pannenkoek met spek, kaas, ui of kaas ui', '12,50', '1', '2016-10-03 12:57:52', '2016-10-04 19:31:11'),
(3, 'Pizza''s', '1. Perfect Pepperoni \r\n2. Margharita\r\n3. Shoarma\r\n4. Chicken Supreme\r\n5. Hawaii\r\n6. gorganzola', '9,50', '1', '2016-10-03 13:53:46', '2016-10-05 08:24:11'),
(4, 'Snack', 'Friet, Frikandel, Berenklauw, kroket', '6,50', '1', '2016-10-03 19:55:02', '2016-10-03 19:55:02'),
(5, 'soup', 'Tomaten, asperge, kip', '4,50', '1', '2016-10-05 08:25:43', '2016-10-05 08:25:43'),
(6, 'Warme hap', 'Zuurkool, jus, worst, Mosterd, Spekjes\r\nStampot, Jus, Uitjes', '15,95', '1', '2016-10-05 18:44:53', '2016-10-05 18:44:53'),
(7, 'pgoing 2', 'test', '1,00', '1', '2016-10-05 20:46:05', '2016-10-05 20:46:05');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `reservation_id`, `menu_id`) VALUES
(1, '1', '1'),
(2, '2', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(100) NOT NULL,
  `productnaam` varchar(55) NOT NULL,
  `prijs` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `productnaam`, `prijs`) VALUES
(1, 'koffie', '1,25'),
(2, 'thee', '1,00'),
(3, 'thee', '1,00'),
(4, 'sinas', '1,00'),
(5, 'thee', '1,00'),
(6, 'cola', '1,00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_reservations`
--

CREATE TABLE `tbl_reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `customers_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `table_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `table_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reservation_time` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `x_people` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `x_drinks` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_reservations`
--

INSERT INTO `tbl_reservations` (`id`, `customers_id`, `table_id`, `table_date_time`, `reservation_time`, `x_people`, `x_drinks`) VALUES
(2, '2', '4', '2016-09-30 10:15:00', '2', '2', 0),
(3, '3', '6', '2016-09-30 10:00:00', '2', '2', 0),
(4, '2', '1', '2016-10-05 12:30:00', '2', '4', 0),
(5, '5', '1', '2016-09-30 10:15:00', '2', '21', 0),
(6, '10', '1', '2016-09-30 06:00:00', '2', '1', 0),
(7, '11', '1', '2016-09-30 06:00:00', '2', '1', 0),
(8, '12', '1', '2016-09-30 06:00:00', '2', '1', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_tables`
--

CREATE TABLE `tbl_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_tables`
--

INSERT INTO `tbl_tables` (`id`, `description`, `visible`) VALUES
(1, 'dit is tafel 1', '1'),
(2, 'dit is tafel 2', '1'),
(3, 'Tafel achter aan zicht op de haven', '1');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `links_link_unique` (`link`);

--
-- Indexen voor tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_orderlists`
--
ALTER TABLE `tbl_orderlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_tables`
--
ALTER TABLE `tbl_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT voor een tabel `tbl_orderlists`
--
ALTER TABLE `tbl_orderlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `tbl_tables`
--
ALTER TABLE `tbl_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
