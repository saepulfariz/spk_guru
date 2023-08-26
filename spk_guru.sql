-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2023 pada 06.32
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
-- Database: `spk_guru`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `group_guru`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `group_guru` (
`nama` varchar(128)
,`nik` varchar(128)
,`nilai` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `nilai_guru`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `nilai_guru` (
`id` int(11)
,`nama` varchar(128)
,`nik` varchar(128)
,`kode` varchar(100)
,`nama_alternatif` varchar(128)
,`keterangan` varchar(256)
,`nilai_sub_alternatif` float
,`bagi_100` double
,`bobot` float
,`nilai` double(19,2)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama_alternatif` varchar(128) NOT NULL,
  `attribute` varchar(128) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id`, `kode`, `nama_alternatif`, `attribute`, `bobot`) VALUES
(1, 'C01', 'PENGALAMAN KERJA', 'benefit', 0.3),
(2, 'C02', 'PENDIDIKAN', 'benefit', 0.25),
(3, 'C03', 'USIA', 'benefit', 0.1),
(4, 'C04', 'TES SKILL', 'benefit', 0.2),
(5, 'C05', 'WAWANCARA', 'benefit', 0.15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `ttl` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `nik`, `nama`, `jk`, `agama`, `pendidikan`, `ttl`, `alamat`, `status`) VALUES
(1, '2018001', 'Arya', 'Perempuan', 'ISLAM', 'D3', 'Jakarta, 11 Maret 1988', 'BATAM', 'PROGRESS'),
(2, '82929', 'jaaa', 'LAKI-LAKI', 'ISLAM', 'D3', 'subang, 2023-08-16', 'subang', 'PROSESS'),
(3, '2029191', 'akau', 'PEREMPUAN', 'HINDU', 'akak', 'bandung, 02 Aug 2023', 'oka', 'PROSESS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_sub_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`id`, `id_guru`, `id_alternatif`, `id_sub_alternatif`, `nilai`) VALUES
(1, 1, 1, 4, 0),
(2, 1, 2, 8, 10),
(3, 1, 3, 10, 20),
(4, 1, 4, 15, 10),
(5, 1, 5, 20, 20),
(16, 3, 1, 3, 0),
(17, 3, 2, 7, 0),
(18, 3, 3, 10, 0),
(19, 3, 4, 15, 0),
(20, 3, 5, 17, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Kepala Sekolah'),
(3, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_alternatif`
--

CREATE TABLE `tb_sub_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sub_alternatif`
--

INSERT INTO `tb_sub_alternatif` (`id`, `id_alternatif`, `keterangan`, `nilai`) VALUES
(1, 1, '<1 TAHUN', 25),
(2, 1, '1 - 3 TAHUN', 50),
(3, 1, '3 - 5 TAHUN', 75),
(4, 1, '> 5 TAHUN', 100),
(5, 2, 'SMA', 25),
(6, 2, 'D3', 50),
(7, 2, 'S1', 75),
(8, 2, 'S2', 100),
(9, 3, '19 - 22 TAHUN', 25),
(10, 3, '23 - 26 TAHUN', 50),
(11, 3, '27 - 30 TAHUN', 75),
(12, 3, '30 - 35 TAHUN', 100),
(13, 4, 'CUKUP', 25),
(14, 4, 'CUKUP BAIK', 50),
(15, 4, 'BAIK', 75),
(16, 4, 'SANGAT BAIK', 100),
(17, 5, 'CUKUP', 25),
(18, 5, 'CUKUP BAIK', 50),
(19, 5, 'BAIK', 75),
(20, 5, 'SANGAT BAIK', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama_lengkap`, `id_role`) VALUES
(1, 'admin', '$2y$10$aWrSWYJb45G1EyEVG5HhC.y.4jamlGGc1DFw1RWyCx2VcCdr83Kle', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur untuk view `group_guru`
--
DROP TABLE IF EXISTS `group_guru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `group_guru`  AS SELECT `tb_guru`.`nama` AS `nama`, `tb_guru`.`nik` AS `nik`, sum(round(`tb_sub_alternatif`.`nilai` / 100 * `tb_alternatif`.`bobot`,2)) AS `nilai` FROM (((`tb_rel_alternatif` left join `tb_sub_alternatif` on(`tb_rel_alternatif`.`id_sub_alternatif` = `tb_sub_alternatif`.`id`)) left join `tb_guru` on(`tb_rel_alternatif`.`id_guru` = `tb_guru`.`id`)) left join `tb_alternatif` on(`tb_rel_alternatif`.`id_alternatif` = `tb_alternatif`.`id`)) GROUP BY `tb_rel_alternatif`.`id_guru` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `nilai_guru`
--
DROP TABLE IF EXISTS `nilai_guru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nilai_guru`  AS SELECT `tb_rel_alternatif`.`id` AS `id`, `tb_guru`.`nama` AS `nama`, `tb_guru`.`nik` AS `nik`, `tb_alternatif`.`kode` AS `kode`, `tb_alternatif`.`nama_alternatif` AS `nama_alternatif`, `tb_sub_alternatif`.`keterangan` AS `keterangan`, `tb_sub_alternatif`.`nilai` AS `nilai_sub_alternatif`, `tb_sub_alternatif`.`nilai`/ 100 AS `bagi_100`, `tb_alternatif`.`bobot` AS `bobot`, round(`tb_sub_alternatif`.`nilai` / 100 * `tb_alternatif`.`bobot`,2) AS `nilai` FROM (((`tb_rel_alternatif` left join `tb_sub_alternatif` on(`tb_rel_alternatif`.`id_sub_alternatif` = `tb_sub_alternatif`.`id`)) left join `tb_guru` on(`tb_rel_alternatif`.`id_guru` = `tb_guru`.`id`)) left join `tb_alternatif` on(`tb_rel_alternatif`.`id_alternatif` = `tb_alternatif`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi_guru` (`id_guru`),
  ADD KEY `relasi_alternatif` (`id_alternatif`),
  ADD KEY `relasi_sub_alternatif` (`id_sub_alternatif`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sub_alternatif`
--
ALTER TABLE `tb_sub_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi_alternatif_sub` (`id_alternatif`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relasi_user_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_alternatif`
--
ALTER TABLE `tb_sub_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD CONSTRAINT `relasi_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `tb_alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_guru` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_sub_alternatif` FOREIGN KEY (`id_sub_alternatif`) REFERENCES `tb_sub_alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_sub_alternatif`
--
ALTER TABLE `tb_sub_alternatif`
  ADD CONSTRAINT `relasi_alternatif_sub` FOREIGN KEY (`id_alternatif`) REFERENCES `tb_alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `relasi_user_role` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
