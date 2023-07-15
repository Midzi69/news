-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 11:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `email`, `password`, `date`, `country`, `state`, `gender`) VALUES
(1, 'milos', 'milostordai@gmail.com', '123456', '0000-00-00', '', '', ''),
(6, 'Milos Tordai', 'milostordai@gmail.com', '123456', '2005-01-02', 'Serbia', '', 'Male'),
(8, 'tosa', 'tosa@tnnw.bfth', '1234576', '2023-07-11', '1', '1', 'Male'),
(9, 'Milos Tordai', 'milostordai@gmail.com', '1234567', '2023-07-02', '1', '1', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `des`) VALUES
(11, 'Weather', 'Politics'),
(12, 'People', 'People'),
(17, 'Web Development', 'Web Development'),
(18, 'Cars', 'Cars'),
(19, 'Technology', 'Technology'),
(20, 'Politics', 'Politics'),
(21, 'Health', 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`) VALUES
(2, 'Milos', 'Test Comment');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Serbia'),
(2, 'Croatia'),
(3, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `category` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`, `category`, `thumbnail`) VALUES
(8, 'Wasm: 5 things developers should be tracking', 'As browser-based WebAssembly (Wasm) gains interest as a back-end technology, developers are moving from “Hmm, that sounds interesting” to “Let’s see what Wasm can really do beyond browsers, video gaming, and content streaming.”\r\n\r\nAt the same time, Wasm itself is starting to morph and shift. All of this makes it a good time to take another look at WebAssembly technology. As you evaluate Wasm for new uses, here are five things you should be keeping in mind.\r\n\r\nInterface\r\nWasm was originally designed for the browser, and without a system interface to improve its overall security stance. The authors of the original web-focused Wasm didn’t want applications to be able to request resources, in much the same way that Java applets are restrained within a browser.', '2023-07-19', 'Web Development', 'R2.jpg'),
(9, 'Lamborghini has sold its last fully gas-powered supercar', 'Lamborghini CEO Stephan Winkelmann told the German newspaper Welt on Wednesday that the brand has sold out its remaining production run of fully gas-powered models, per Reuters. \n\nFrom here on out, all new Lambos sold will be electrified in some manner. First up will be plug-in hybrid replacements for the Aventador and Huracan supercars and a plug-in hybrid Urus SUV. Later this decade, Lamborghini plans to launch its first all-electric vehicle. ', '2023-07-25', 'Cars', 'R.jpg'),
(10, 'A political survivor, Dutch PM Mark Rutte may seek fifth term', 'AMSTERDAM (Reuters) - Dutch Prime Minister Mark Rutte, who announced the sudden collapse of his fourth government on Friday due to splits over migration policy, is interested in seeking a fifth term but could face the toughest elections of his career.\r\n\r\nLast August, Rutte, 56, became the longest-serving prime minister in Dutch history, a testament to his political stamina and survival skills honed over a 12-year tenure.', '2023-07-20', 'Politics', 'R3.jpg'),
(11, 'Health Experts Reveal the Benefits of Eating Durian', 'Durian is rich in dietary fibers essential for gut health and may help control appetite.\r\nDurian is packed with important antioxidants vitamins and minerals, as vitamin C, manganese.\r\nManganese in Durian may help control blood sugar levels.\r\nBenefits by Luciana M. Cherubin\r\nBachelor in Nutrition · 5 years of experience · Argentina\r\nDurian reduces cancer risk. It is high in antioxidants, which may neutralize cancer-promoting free radicals.\r\nDurian lowers blood sugar. Durian has a lower glycemic index than many others tropical fruits.', '2023-07-08', 'Health', 'AA1dzvBX.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(100) NOT NULL,
  `country_id` int(100) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state`) VALUES
(1, 1, 'Vojvodina'),
(2, 1, 'Centralna Srbija'),
(3, 1, 'Zapadna Srbija'),
(4, 2, 'Slavonija'),
(5, 2, 'Dalmacija'),
(6, 2, 'Lika'),
(7, 3, 'Alabama'),
(8, 3, 'Nevada'),
(9, 3, 'California'),
(10, 3, 'Florida');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
