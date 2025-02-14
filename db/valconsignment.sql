-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2024 pada 13.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valconsignment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `access_name` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `access`
--

INSERT INTO `access` (`id`, `access_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` char(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `access` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `tlp`, `access`, `created_at`, `updated_at`) VALUES
(1, 'galih', '$2y$10$ciDIiOs3xudcenAxJsT97u/PBNzgTml5vox0FwbpSN5oY7L7oHz6i', '089913212345', 1, '2024-11-05 13:51:47', '2024-11-05 13:51:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `invoice` varchar(10) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `invoice` varchar(10) NOT NULL,
  `akun` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_product`
--

CREATE TABLE `jenis_product` (
  `id` int(11) NOT NULL,
  `jenis_product` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_product`
--

INSERT INTO `jenis_product` (`id`, `jenis_product`) VALUES
(1, 'akun'),
(2, 'topup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `jenis_product` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `deskripsi1` text DEFAULT NULL,
  `deskripsi2` text DEFAULT NULL,
  `deskripsi3` text DEFAULT NULL,
  `deskripsi4` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `jenis_product`, `nama`, `harga`, `gambar`, `available`, `deskripsi1`, `deskripsi2`, `deskripsi3`, `deskripsi4`, `created_at`, `updated_at`) VALUES
(3, 1, 'TK086767', '1.2jt', '1730725329_adf311684af24214d20a.jpg', 1, 'Skins:\nVCT x PRX Capsule Bundle\nVCT x PRX Classic\nGlitchpop Frenzy\nMagepunk Ghost\nIon Sheriff\nForsaken Spectre\nIon Phantom\nReaver Phantom\nRuination Phantom\nSentinels of Light Vandal\nReaver Vandal\nMagepunk Marshal\nReaver Operator\nOrigin Operator\nRGX 11z Pro Firefly\nBlade of The Ruined King (Ruination)\nCatrina', 'Other Info:\r\nBattlepass Skin:\r\nK/tac bundle\r\nVelocity bundle\r\nBattlepass:\r\neps 2 act 2, eps 3 act 1, eps 3 act 2, eps 4 act 1\r\nRank &amp; Lvl: Silver 3, level 289\r\nPeak Rank: Plat 3\r\nSisa VP: 307\r\nSisa Kingdom Credits: 4184\r\nSisa RP: 300\r\nAgent: Unlock All\r\nRegion: Singapore\r\nKondisi: Email Verif\r\nTake FE: NO\r\nPremiere: UNVERIF\r\nChange Nick: Unready', '', '', '2024-11-04 13:02:09', '2024-11-04 13:02:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access` (`access`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice` (`invoice`),
  ADD KEY `product` (`product`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice`),
  ADD KEY `akun` (`akun`);

--
-- Indeks untuk tabel `jenis_product`
--
ALTER TABLE `jenis_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_product` (`jenis_product`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `akun` (`akun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_product`
--
ALTER TABLE `jenis_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
