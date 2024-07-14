-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 02:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara_key`
--

CREATE TABLE `acara_key` (
  `id` int(11) NOT NULL,
  `key` varchar(32) NOT NULL,
  `jadwal_acara_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acara_key`
--

INSERT INTO `acara_key` (`id`, `key`, `jadwal_acara_id`) VALUES
(7, '?7????n?	??D(?PEگ)q??$?#L', 8),
(8, 'U	?(Sf?^h$RBJyge???H?b?P#N/?\"?', 9),
(10, 'q????c??B??ul$ian?N_Qu?dX????v', 11),
(11, '?8??2?/?u#%?25<tܝ1H?0??ɞ?X?`', 12);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `asal_kota` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `two_step_auth` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `tanggal_lahir`, `gender`, `asal_kota`, `no_hp`, `email`, `password`, `two_step_auth`) VALUES
(5, '0gUCFPcnO4iVBLgVnzIDc9WqEmu/gi69mBt2ZKXGVc3dC2oRKD5m7x43GY4g', '7r6r4S/HyqGqAJzenJPx8TnNOsQvkhICpXW0WA06BrJc0Pam/x/WOMxleKad26i9KOU=', 'gUqrJgsLfnIwMUts18euxQatm7sZ5eqzPxqvlsrjWK5ILdQdeS6wdincPnzJSV73UQ==', 'B/G76rHlEG7JCUQe7Wa9rnuHDQAueinWkG8YMQo70H4fUAPhCWvuOPLzoET03ESO', 'zYgajj7q7rYdOOfSIU2AiZw4lMvDgopVKy2F2kRKiGTWMl3XmKcmB8oR04n5IEEV5rklhQ==', 's160422011@student.ubaya.ac.id', '+gzNgo5ww2eGMH3U8gBlhWpv5fnHCmmojAmUCUaWH4egtX1FIWDUiZUkzRF3/WcjU+kTuQ==', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_key`
--

CREATE TABLE `admin_key` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `key` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_key`
--

INSERT INTO `admin_key` (`id`, `admin_id`, `key`) VALUES
(1, 5, ':?eN%???0R?y?k8\r?x?0t??JȚ??ᇸ');

-- --------------------------------------------------------

--
-- Table structure for table `artis`
--

CREATE TABLE `artis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `asal_kota` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `two_step_auth` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artis`
--

INSERT INTO `artis` (`id`, `nama`, `tanggal_lahir`, `gender`, `asal_kota`, `no_hp`, `email`, `password`, `manager_id`, `two_step_auth`) VALUES
(51, 'pK1GJoAPko+rekXo6xd9nYfOE0rD2i2C4IuOwG/bTisEEmQJokR63+kEJsNn', 'aHHtup4u08NKoGf0HY2qjc8w+dF0xB+fKWuRaS3dcEOdwTzpJw7JyS6XRBHrv53L8L8=', 'hw6HJnlO/A96j/+xqY6N+DQWNonUUjV2oUm//5QxThPNmpdWC9CNpwpcyS8Y7WVeKA==', 'sWW4rqTqd+T7A3KrvdZWbI7eGf99yJZJV8/oKgp6dygV7lTlc1qhDaAYNfdpeLPp', 'VPYgLYiAENlnNP9iVjN10inNYKq3OKAUO+WXGwRzX0sIb2ASWWT0JyRie/iNWBaR44hPfg==', 'willyhimav@gmail.com', 'pMAeykfMAWVkZmuri9YsTP458WGiE8bQHkcnYVJN+hgphzZ1ikWBauzEI6GzVsRA6Fpz8g==', 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `artis_key`
--

CREATE TABLE `artis_key` (
  `id` int(11) NOT NULL,
  `artis_id` int(11) DEFAULT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artis_key`
--

INSERT INTO `artis_key` (`id`, `artis_id`, `key`) VALUES
(57, 51, 'w?1?C<aAT??9??(?p???????It??');

-- --------------------------------------------------------

--
-- Table structure for table `detail_acara`
--

CREATE TABLE `detail_acara` (
  `jadwal_acara_id` int(11) NOT NULL,
  `artis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_acara`
--

INSERT INTO `detail_acara` (`jadwal_acara_id`, `artis_id`) VALUES
(8, 51),
(11, 51),
(12, 51);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_acara`
--

CREATE TABLE `jadwal_acara` (
  `id` int(11) NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
  `tanggal_waktu` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `jenis_acara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal_acara`
--

INSERT INTO `jadwal_acara` (`id`, `nama_acara`, `tanggal_waktu`, `lokasi`, `jenis_acara`) VALUES
(8, '/YhenwwZqAi6LflsNGYouimcb7wJdyNJVPrfdym4joF/aEAcaH5ofFZ+tTP/+kCTmHW5t3Zc5Q==', '0olA0ftIiAqDBSDSazKkPVo1/XYaxaKMK4acIiJl/7rHGBJX3IpLY8pmOQkLmbtOKCA=', 'H55bjRRjhj4vz2Z4hy75ihfFzIlIlGtL47fPfjMs6Qo8hhi1V1wzWD/9pjKm8QyQ9HkQhQ==', '2UHJy4yeyFElSTZlEZB+bW/HATDOWNHZWAwqL+4WvOC8lm4Yr/6FyLdOE0M='),
(9, 'iu1weWPk1dvE0A8iDu5ODoQo4vwaI58W9a+SrpqZAnKUe/g8dyJ6q3PrK5Igfm+E6xJKiP9QQKEUkA==', 'GDNopdFJaeXojjIO1foZPIgq70pBN6CqcxrmMCXlds1H5qSlnkgi13v69jxBq/lLy+g=', 'gciT2YfbDMlKPsmv0cnY2qjWDIjEWTxi7MVeG7IuDDQ+DAOHT3L/BcePRpFw2eXC5QO1wf4=', 'BxhV8arFFAyNvzJT6LFWjaNLjHCpNu35p5aCkmPcdYrvccjW7da8OGc+o7oglHzWXQ=='),
(11, 'RxBEumzuzLCzxu86R+iqKhbnIHIqOe7EAaXS9vyb8yW4WxQCuX+KNfREPJxPuholmr395tnkoN9ctiaqg5m5', 'sY7N3Hw2Cmcu44+U0LOIddjdblAeH7T+6ar88iFDte8Qpjzcmzx/dpJ9AQqj2OStt5Q=', 't962sjXa0b1D0yp0YLEe4HcQLtRBrIcnwG/B3pe15ECZBB9wrdoCt0y/SoYUx3s=', 'lil/Vq4OGPp2+wZoV80oTW1e+Nvf6aCH4n+pcXqk1FvsN/uCyOGd7A8iN9WMkv+LIA=='),
(12, '74KXbRK6ONjT1qbuau2LO3qxLfzd2EJoQ5BICilntWenqArFI/Bltlnf2yw7oHEAvfC7EGc=', '1gGqJohUd4GmzfOquaWr5UC/Z8X7FsQRDsapiS9WC/g6wjq2ut2m7sUG+DfcYqz43GA=', '2UYfQB2CxKsXM8ryHz93bavqAejlihom+JROTGxKDlPIAvYLveI5UgW9h9t7p59s', 'EBP9oqIqbKQ853BWIlXe/3XTtWb6/hqUuFsCDaMjd4Pj6csE2YVrY9jXsl7IERktnw==');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `id` int(11) NOT NULL,
  `tanggal_awal` varchar(255) NOT NULL,
  `tanggal_akhir` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `artis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`id`, `tanggal_awal`, `tanggal_akhir`, `deskripsi`, `manager_id`, `artis_id`) VALUES
(12, '9P/bsJzDInWdcYaRdzlKfYwRIlzL6pwZg5HYGkW1iHb162RohTELRFvoCirX9YNarZo=', 'zQDFuGzhjxRPOuDzvYRDMTNjR2tsAYfw78U3bkkbz/aDcaZt5kXfc2X0mSbwSB03YXc=', 'phYVUwD/G9XRBQfvfHNZPYjiZKlxi1rLsG2QpwWEWVc/mlUW9RxSdDzij51rVxCmVq8eh0x+eF4=', 21, 51);

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_key`
--

CREATE TABLE `kontrak_key` (
  `id` int(11) NOT NULL,
  `kontrak_id` int(11) DEFAULT NULL,
  `key` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontrak_key`
--

INSERT INTO `kontrak_key` (`id`, `kontrak_id`, `key`) VALUES
(12, 12, 'e0X?????;#????z?S???_rhu~');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `asal_kota` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `two_step_auth` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `nama`, `tanggal_lahir`, `gender`, `asal_kota`, `no_hp`, `email`, `password`, `admin_id`, `two_step_auth`) VALUES
(21, '3XHkCd1GRWtCdWeJUGTyW3n5NRVD4+A4x7/XSe9QxdheeRgSx54Bpudj8Z9w2FJC', '0GSMeY2iPRbMfk5RtJYRkuEI09YDgXY8C8OGTm+s8rmiIhFR7n/daiP+WitG2Glm9pM=', 'WIlofVB6rjhLXFrH6N4LnXE8kZwCfGZuOfjY9wS88DG+MaSnOPJynoUb82TWMhtNZw==', '8TjIQ65iXwawQdpUEGgwQ+zt2t/pWrfZAUL1xR/j2nlVW11ln1oaUsAMgOnC0vkh', 'EOgfrVlz2y8FPobV5faZTZZF4UMJFKV7PlfpNkY/AWXjw57bc0NVYJuoJmCgsE/E0L57vw==', 'willyhiman@gmail.com', '3L9knEz5MVVGnSqHNUMzzaU6cTAZsb6PRXohl0M4G+2TDKqHR+gtpZvbqTw2w6vi/BY+HA==', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager_key`
--

CREATE TABLE `manager_key` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `key` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager_key`
--

INSERT INTO `manager_key` (`id`, `manager_id`, `key`) VALUES
(20, 21, '?S?t?/?p????H?????9?|??p?');

-- --------------------------------------------------------

--
-- Table structure for table `otp_key`
--

CREATE TABLE `otp_key` (
  `id` int(11) NOT NULL,
  `key` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otp_key`
--

INSERT INTO `otp_key` (`id`, `key`) VALUES
(1, '???[??????b??m\\	OD?`ު???IH');

-- --------------------------------------------------------

--
-- Table structure for table `token_key`
--

CREATE TABLE `token_key` (
  `id` int(11) NOT NULL,
  `key` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token_key`
--

INSERT INTO `token_key` (`id`, `key`) VALUES
(1, '|+f?U??ḯ???&???ŋԀf??v????#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara_key`
--
ALTER TABLE `acara_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_acara_key_jadwal_acara1_idx` (`jadwal_acara_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_key`
--
ALTER TABLE `admin_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artisKey_copy1_admin1_idx` (`admin_id`);

--
-- Indexes for table `artis`
--
ALTER TABLE `artis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artis_manager1_idx` (`manager_id`);

--
-- Indexes for table `artis_key`
--
ALTER TABLE `artis_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artisKey_artis1_idx` (`artis_id`);

--
-- Indexes for table `detail_acara`
--
ALTER TABLE `detail_acara`
  ADD PRIMARY KEY (`jadwal_acara_id`,`artis_id`),
  ADD KEY `fk_jadwal_acara_has_artis_artis1_idx` (`artis_id`),
  ADD KEY `fk_jadwal_acara_has_artis_jadwal_acara1_idx` (`jadwal_acara_id`);

--
-- Indexes for table `jadwal_acara`
--
ALTER TABLE `jadwal_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kontrak_manager1_idx` (`manager_id`),
  ADD KEY `fk_kontrak_artis1_idx` (`artis_id`);

--
-- Indexes for table `kontrak_key`
--
ALTER TABLE `kontrak_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kontrak_key_kontrak1_idx` (`kontrak_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_manager_admin1_idx` (`admin_id`);

--
-- Indexes for table `manager_key`
--
ALTER TABLE `manager_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_managerKey_manager1_idx` (`manager_id`);

--
-- Indexes for table `otp_key`
--
ALTER TABLE `otp_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_key`
--
ALTER TABLE `token_key`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara_key`
--
ALTER TABLE `acara_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_key`
--
ALTER TABLE `admin_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artis`
--
ALTER TABLE `artis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `artis_key`
--
ALTER TABLE `artis_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `jadwal_acara`
--
ALTER TABLE `jadwal_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kontrak_key`
--
ALTER TABLE `kontrak_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `manager_key`
--
ALTER TABLE `manager_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `otp_key`
--
ALTER TABLE `otp_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `token_key`
--
ALTER TABLE `token_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acara_key`
--
ALTER TABLE `acara_key`
  ADD CONSTRAINT `fk_acara_key_jadwal_acara1` FOREIGN KEY (`jadwal_acara_id`) REFERENCES `jadwal_acara` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `admin_key`
--
ALTER TABLE `admin_key`
  ADD CONSTRAINT `fk_artisKey_copy1_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `artis`
--
ALTER TABLE `artis`
  ADD CONSTRAINT `fk_artis_manager1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `artis_key`
--
ALTER TABLE `artis_key`
  ADD CONSTRAINT `fk_artisKey_artis1` FOREIGN KEY (`artis_id`) REFERENCES `artis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_acara`
--
ALTER TABLE `detail_acara`
  ADD CONSTRAINT `fk_jadwal_acara_has_artis_artis1` FOREIGN KEY (`artis_id`) REFERENCES `artis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_acara_has_artis_jadwal_acara1` FOREIGN KEY (`jadwal_acara_id`) REFERENCES `jadwal_acara` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `fk_kontrak_artis1` FOREIGN KEY (`artis_id`) REFERENCES `artis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kontrak_manager1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kontrak_key`
--
ALTER TABLE `kontrak_key`
  ADD CONSTRAINT `fk_kontrak_key_kontrak1` FOREIGN KEY (`kontrak_id`) REFERENCES `kontrak` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `fk_manager_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `manager_key`
--
ALTER TABLE `manager_key`
  ADD CONSTRAINT `fk_managerKey_manager1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
