-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Okt 2017 pada 20.05
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `superkidz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`id_blog` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL,
  `video` varchar(250) NOT NULL,
  `header` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
`id_gender` tinyint(4) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gender`
--

INSERT INTO `gender` (`id_gender`, `nama`) VALUES
(1, 'Laki - Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_blog`
--

CREATE TABLE IF NOT EXISTS `kategori_blog` (
`id_kategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `id_blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontributor`
--

CREATE TABLE IF NOT EXISTS `kontributor` (
  `username` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `id_gender` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `relawan`
--

CREATE TABLE IF NOT EXISTS `relawan` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `id_gender` tinyint(4) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relawan`
--

INSERT INTO `relawan` (`username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `id_gender`, `pekerjaan`, `email`, `telepon`) VALUES
('kaka', 'rezi apriliansyah', 'asas', '2017-09-24', 'asas', 1, 'sas', 'reziapriliansyah@gmail.com', '09218');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id_role` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'Admin'),
(2, 'Relawan'),
(3, 'Kontributor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `id_role`, `last_login`) VALUES
('apranta', '202cb962ac59075b964b07152d234b70', 1, '2017-10-04 21:52:57'),
('kaka', 'e10adc3949ba59abbe56e057f20f883e', 2, '2017-10-04 22:28:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`id_blog`), ADD KEY `id_kategori` (`id_kategori`,`id_user`), ADD KEY `id_kategori_2` (`id_kategori`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
 ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `kategori_blog`
--
ALTER TABLE `kategori_blog`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`), ADD UNIQUE KEY `id_user` (`id_user`), ADD KEY `id_user_2` (`id_user`), ADD KEY `id_blog` (`id_blog`);

--
-- Indexes for table `kontributor`
--
ALTER TABLE `kontributor`
 ADD KEY `username` (`username`,`id_gender`), ADD KEY `username_2` (`username`), ADD KEY `id_gender` (`id_gender`);

--
-- Indexes for table `relawan`
--
ALTER TABLE `relawan`
 ADD KEY `id_gender` (`id_gender`), ADD KEY `id_gender_2` (`id_gender`), ADD KEY `username` (`username`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`), ADD KEY `username` (`username`), ADD KEY `id_role` (`id_role`), ADD KEY `id_role_2` (`id_role`), ADD KEY `id_role_3` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
MODIFY `id_gender` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_blog`
--
ALTER TABLE `kategori_blog`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blog`
--
ALTER TABLE `blog`
ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_blog` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id_blog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kontributor`
--
ALTER TABLE `kontributor`
ADD CONSTRAINT `kontributor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `kontributor_ibfk_2` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id_gender`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `relawan`
--
ALTER TABLE `relawan`
ADD CONSTRAINT `relawan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `relawan_ibfk_2` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id_gender`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
