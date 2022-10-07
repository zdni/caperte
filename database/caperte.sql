-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Okt 2022 pada 00.49
-- Versi server: 8.0.30-0ubuntu0.22.04.1
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caperte`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel`
--

CREATE TABLE `fuel` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `seq` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `fuel`
--

INSERT INTO `fuel` (`id`, `nama`, `seq`) VALUES
(2, 'Solar', 1),
(3, 'Dexlite', 1),
(4, 'Pertalite', 1),
(5, 'Pertamax 98', 1),
(6, 'Pertamax Turbo', 1),
(8, 'Pertamax Racing', 1),
(9, 'Pertamina Dex', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Uadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `station`
--

CREATE TABLE `station` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `longi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lat` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'station.jpg',
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `station`
--

INSERT INTO `station` (`id`, `nama`, `alamat`, `longi`, `lat`, `image`, `user_id`) VALUES
(1, 'SPBU Tapak Kuda', 'Korumba, Kec. Mandonga, Kota Kendari, Sulawesi Tenggara 93231                                            ', '122.5239608', '-3.9766688', 'station.jpg', 6),
(2, 'SPBU Pertamina 74-931.08', 'Jalan Mayjen. Sutoyo, Tipulu, Kendari Barat, Tipulu, Kendari Barat, Tipulu, Kec. Kendari Bar., Kota Kendari, Sulawesi Tenggara 93873', '122.5462973', '-3.9748536', 'station.jpg', 0),
(3, 'SPBU TERATAI KENDARI', 'Watu-Watu, Kec. Kendari Bar., Kota Kendari, Sulawesi Tenggara 93121', '122.5464131', '-3.9742289', 'station.jpg', 0),
(4, 'SPBU Martandu', 'Kambu, Kec. Kambu, Kota Kendari, Sulawesi Tenggara 93231', '122.5357394', '-3.9946375', 'station.jpg', 0),
(5, 'SPBU Anggoya', 'Jl.Banwula Sinapoy, AnggoyaKendari,, Matabubu, Kec. Poasia, Kota Kendari, Sulawesi Tenggara 93231', '122.5563937', '-3.9941393', 'station.jpg', 0),
(6, 'SPBU Baruga', 'Baruga, Kec. Baruga, Kota Kendari, Sulawesi Tenggara 93116', '122.5020771', '-4.0292163', 'station.jpg', 0),
(7, 'SPBU Bonggoeya', 'Bonggoeya, Kec. Wua-Wua, Kota Kendari, Sulawesi Tenggara 93117', '122.498574', '-4.0059933', 'station.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `id` int NOT NULL,
  `station_id` int NOT NULL,
  `fuel_id` int NOT NULL,
  `harga` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`id`, `station_id`, `fuel_id`, `harga`, `status`) VALUES
(3, 1, 2, 6800, 1),
(4, 1, 3, 17800, 1),
(5, 1, 9, 18100, 1),
(6, 1, 4, 10000, 1),
(7, 1, 6, 14950, 1),
(8, 1, 5, 13900, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `image`, `role_id`) VALUES
(1, 'admin', 'Administrator', '$2y$10$uGSBRKsWu2Xv0.xCmtNxPe52W2f10pLAqdlyK4o4WVbshywCmvaOe', 'admin.png', 1),
(6, 'admtapakkuda', 'Admin SPBU Tapak Kuda', '$2y$10$RyiYTNdcdutFcNp5fTB1RuNZ4Sv6Fqe26.tYUV3o83SbV1AsAGume', 'admin.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_id` (`fuel_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `station`
--
ALTER TABLE `station`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`fuel_id`) REFERENCES `fuel` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `station` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
