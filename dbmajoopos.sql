-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2022 pada 01.48
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmajoopos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'hardware'),
(2, 'Software'),
(3, 'Paket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(6) NOT NULL DEFAULT 0,
  `category_id` int(5) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `price`, `category_id`, `image_name`) VALUES
(1, 'Majoo Pro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 500, 1, '6215cc04f0fd3f92f5539f0c694bda70.png'),
(4, 'Majoo Advance', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 500, 1, '585bd3cf6ea2f650833658c9908572cd.png'),
(6, 'Majoo Lifestyle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 500000, 1, 'f9297059d33bb3c631de523cb698cad9.png'),
(7, 'Majoo Dekstop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 50000, 1, '7e54c1b7647c9c9d5eaabb2099b28860.png'),
(8, 'sfsfsd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 500, 1, '89c9759f8b5b9f97c445ce0322246692.png'),
(9, 'fgfgfhhfh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 500000, 2, '51715d7297ff8c67c998fb11a06cd1c5.png'),
(10, 'sdfsdfsjj', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 500, 2, 'f660a27247dd2f346817b44b82666f21.png'),
(11, 'sdfsf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 1000, 2, 'a70b3fdf813c28ee4ba8e5f8a1aa9429.png'),
(12, 'fsfsd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur euismod augue non justo euismod tristique. Nam tincidunt eget eros elementum.', 500000, 2, '083f67d5caffdf372c2679413bab8a39.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Fatkhur Rony', 'admin@gmail.com', '4c619559c95218b33672b92adb21933df87b699b49dabea345baddb7feaed56f');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`product_name`),
  ADD KEY `index` (`category_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
