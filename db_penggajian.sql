-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2020 pada 14.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jam_hadir` time NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `terlambat` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `potongan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_karyawan`, `jam_hadir`, `sakit`, `izin`, `tidak_hadir`, `terlambat`, `total`, `potongan`) VALUES
(2, 5, '07:07:00', 3, 2, 0, '0 menit', '21', '190000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id_auth` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id_auth`, `name`, `email`, `password`, `img`, `role`) VALUES
(1, 'Ryan', 'Ryan@admin.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
(1, 'Teknisi'),
(4, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpjs_kesehatan`
--

CREATE TABLE `bpjs_kesehatan` (
  `id_kesehatan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `perhitungan_dasar` varchar(20) NOT NULL,
  `bpjs_perusahaan` int(20) NOT NULL,
  `bpjs_karyawan` int(20) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bpjs_kesehatan`
--

INSERT INTO `bpjs_kesehatan` (`id_kesehatan`, `id_karyawan`, `perhitungan_dasar`, `bpjs_perusahaan`, `bpjs_karyawan`, `total`) VALUES
(5, 5, '17959000', 718360, 359180, 1077540),
(6, 6, '6450000', 258000, 258000, 516000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpjs_ketenagakerjaan`
--

CREATE TABLE `bpjs_ketenagakerjaan` (
  `id_bpjs` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `perhitungan_dasar` varchar(20) NOT NULL,
  `jht_perusahaan` varchar(20) NOT NULL,
  `jht_karyawan` varchar(20) NOT NULL,
  `jenis_jkk` varchar(20) NOT NULL,
  `jkk` varchar(20) NOT NULL,
  `jkm` varchar(20) NOT NULL,
  `jp_perusahaan` varchar(20) NOT NULL,
  `jp_karyawan` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bpjs_ketenagakerjaan`
--

INSERT INTO `bpjs_ketenagakerjaan` (`id_bpjs`, `id_karyawan`, `perhitungan_dasar`, `jht_perusahaan`, `jht_karyawan`, `jenis_jkk`, `jkk`, `jkm`, `jp_perusahaan`, `jp_karyawan`, `total`) VALUES
(5, 5, '17959000', '664483', '359180', 'JKK 1', '43101.6', '53877', '359180', '179590', '2018591.6'),
(6, 6, '6450000', '238650', '129000', 'JKK 2', '34830', '19350', '129000', '64500', '744330');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(35) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `insentif_penjualan` int(11) NOT NULL,
  `insentif_pengiriman` int(11) NOT NULL,
  `thr` int(11) NOT NULL,
  `insentif_produktivitas_kerja` int(11) NOT NULL,
  `lain_lain` int(11) NOT NULL,
  `gaji_kotor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `id_bagian`, `gaji_pokok`, `uang_makan`, `insentif_penjualan`, `insentif_pengiriman`, `thr`, `insentif_produktivitas_kerja`, `lain_lain`, `gaji_kotor`) VALUES
(3, 'Programmer', 1, 5000000, 50000, 9000, 900000, 12000000, 0, 0, 17959000),
(4, 'A', 4, 3500000, 50000, 100000, 1000000, 1800000, 0, 0, 6450000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(15) NOT NULL,
  `nama_karyawan` varchar(35) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` char(1) NOT NULL,
  `jumlah_keluarga` int(2) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `status_kerja` char(1) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_karyawan`, `nama_karyawan`, `id_jabatan`, `id_bagian`, `alamat`, `tanggal_lahir`, `status`, `jumlah_keluarga`, `telp`, `status_kerja`, `tanggal_masuk`, `email`) VALUES
(5, 1234567890, 'Ryan', 3, 1, 'Majalengka', '2019-09-03', '0', 2, '0893456789', '1', '2020-06-19', 'Ryan.Aprianto77777@gmail.com'),
(6, 123456789, 'Test', 4, 4, 'Maja', '2020-06-10', '1', 4, '087', '1', '2020-06-13', 'Ryan.Apriant777@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `besar_pinjaman` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_lunas` date NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_karyawan`, `besar_pinjaman`, `keterangan`, `tanggal_pinjam`, `tanggal_lunas`, `status`) VALUES
(2, 5, '200000', '', '2020-06-01', '2020-06-13', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `gaji_kotor` int(11) NOT NULL,
  `potongan_absen` int(11) NOT NULL,
  `pinjaman` int(11) NOT NULL,
  `bpjs1` int(11) NOT NULL,
  `bpjs2` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penggajian`
--

INSERT INTO `penggajian` (`id_penggajian`, `id_karyawan`, `gaji_kotor`, `potongan_absen`, `pinjaman`, `bpjs1`, `bpjs2`, `gaji_bersih`) VALUES
(3, 5, 17959000, 190000, 200000, 2018592, 1077540, 14472868);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_absensi`
--

CREATE TABLE `setting_absensi` (
  `id_setting_absensi` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `hari_kerja` int(2) NOT NULL,
  `potongan_telat` varchar(10) NOT NULL,
  `jam_kerja` varchar(5) NOT NULL,
  `tidak_hadir` varchar(20) NOT NULL,
  `izin` varchar(20) NOT NULL,
  `sakit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_absensi`
--

INSERT INTO `setting_absensi` (`id_setting_absensi`, `jam_masuk`, `hari_kerja`, `potongan_telat`, `jam_kerja`, `tidak_hadir`, `izin`, `sakit`) VALUES
(1, '07:30:00', 26, '2000', '480', '100000', '50000', '30000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_jenis_jkk`
--

CREATE TABLE `setting_jenis_jkk` (
  `id_jkk` int(11) NOT NULL,
  `nama_jkk` varchar(50) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_jenis_jkk`
--

INSERT INTO `setting_jenis_jkk` (`id_jkk`, `nama_jkk`, `rate`) VALUES
(1, 'JKK 1', 0.24),
(2, 'JKK 2', 0.54),
(3, 'JKK 3', 0.89),
(4, 'JKK 4', 1.27),
(5, 'JKK 5', 1.74);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_kesehatan`
--

CREATE TABLE `setting_kesehatan` (
  `id_kesehatan` int(11) NOT NULL,
  `bpjs_perusahaan` double NOT NULL,
  `bpjs_karyawan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_kesehatan`
--

INSERT INTO `setting_kesehatan` (`id_kesehatan`, `bpjs_perusahaan`, `bpjs_karyawan`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_ketenagakerjaan`
--

CREATE TABLE `setting_ketenagakerjaan` (
  `id_ketenagakerjaan` int(11) NOT NULL,
  `jht_perusahaan` double NOT NULL,
  `jht_karyawan` double NOT NULL,
  `jkm` double NOT NULL,
  `jp_perusahaan` double NOT NULL,
  `jp_karyawan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting_ketenagakerjaan`
--

INSERT INTO `setting_ketenagakerjaan` (`id_ketenagakerjaan`, `jht_perusahaan`, `jht_karyawan`, `jkm`, `jp_perusahaan`, `jp_karyawan`) VALUES
(1, 3.7, 2, 0.3, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `bpjs_kesehatan`
--
ALTER TABLE `bpjs_kesehatan`
  ADD PRIMARY KEY (`id_kesehatan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `bpjs_ketenagakerjaan`
--
ALTER TABLE `bpjs_ketenagakerjaan`
  ADD PRIMARY KEY (`id_bpjs`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_penggajian`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `setting_absensi`
--
ALTER TABLE `setting_absensi`
  ADD PRIMARY KEY (`id_setting_absensi`);

--
-- Indeks untuk tabel `setting_jenis_jkk`
--
ALTER TABLE `setting_jenis_jkk`
  ADD PRIMARY KEY (`id_jkk`);

--
-- Indeks untuk tabel `setting_kesehatan`
--
ALTER TABLE `setting_kesehatan`
  ADD PRIMARY KEY (`id_kesehatan`);

--
-- Indeks untuk tabel `setting_ketenagakerjaan`
--
ALTER TABLE `setting_ketenagakerjaan`
  ADD PRIMARY KEY (`id_ketenagakerjaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bpjs_kesehatan`
--
ALTER TABLE `bpjs_kesehatan`
  MODIFY `id_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bpjs_ketenagakerjaan`
--
ALTER TABLE `bpjs_ketenagakerjaan`
  MODIFY `id_bpjs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting_absensi`
--
ALTER TABLE `setting_absensi`
  MODIFY `id_setting_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_jenis_jkk`
--
ALTER TABLE `setting_jenis_jkk`
  MODIFY `id_jkk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `setting_kesehatan`
--
ALTER TABLE `setting_kesehatan`
  MODIFY `id_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_ketenagakerjaan`
--
ALTER TABLE `setting_ketenagakerjaan`
  MODIFY `id_ketenagakerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
