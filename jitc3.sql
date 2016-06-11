-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2016 at 06:42 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jitc3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kd_admin` char(4) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `nama_admin`, `username`, `password`, `foto`) VALUES
('A001', 'admin', 'admin', 'admin', 'admin.jpg'),
('A002', 'rojib', 'rojib', 'fauzi', 'rojib.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `kd_berita` char(4) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kd_admin` char(4) NOT NULL,
  `kd_kategoriberita` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`kd_berita`, `judul`, `tanggal`, `isi`, `gambar`, `kd_admin`, `kd_kategoriberita`) VALUES
('B002', 'hahah', '2016-05-25', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'B002-admin.jpg', 'admi', 'T001'),
('B003', 'lagi men', '2016-05-25', 'dsadasdsa', 'B003-rojib.jpg', 'roji', 'T001');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kd_guru` char(4) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `agama` enum('islam','protestan','katolik','hindu','budha','konghucu') NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `status_aktif` enum('aktif','tidak') NOT NULL,
  `status` enum('PNS','honorer') NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kd_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `foto`, `agama`, `pendidikan`, `status_aktif`, `status`, `password`) VALUES
('G001', '333', 'wakwak', 'L', 'sadsadas', '2016-05-27', 'dsaxsaxsa', '321321321', '.jpg', 'islam', 'sadsadas', 'aktif', 'PNS', 'tata'),
('G002', '22', 'rara', 'P', 'sadsa', '2016-05-19', 'xsaxasx', '312321', '22.jpg', 'islam', 'dasdsadsa', 'aktif', 'PNS', 'tata'),
('G003', '123', 'rojib fauzi2', 'P', 'Yogyakarta', '2016-05-31', 'dwqdswq', '085728585150', '123.jpg', 'budha', 'dsadas', 'tidak', 'PNS', 'tata');

-- --------------------------------------------------------

--
-- Table structure for table `gurumapel`
--

CREATE TABLE `gurumapel` (
  `kd_gurumapel` char(4) NOT NULL,
  `kd_guru` char(4) NOT NULL,
  `kd_mapel` char(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kd_tahun` char(4) NOT NULL,
  `kd_kelas` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gurumapel`
--

INSERT INTO `gurumapel` (`kd_gurumapel`, `kd_guru`, `kd_mapel`, `keterangan`, `kd_tahun`, `kd_kelas`) VALUES
('L002', 'G001', 'M001', 'juoss', 'T002', 'K001');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` char(4) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nama_jurusan`, `keterangan`) VALUES
('J001', 'fisika', 'dsadsa'),
('J002', 'Biologi', 'keren');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriberita`
--

CREATE TABLE `kategoriberita` (
  `kd_kategoriberita` char(4) NOT NULL,
  `jenis_berita` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriberita`
--

INSERT INTO `kategoriberita` (`kd_kategoriberita`, `jenis_berita`) VALUES
('T001', 'kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `kategorinilai`
--

CREATE TABLE `kategorinilai` (
  `kd_kategorinilai` char(4) NOT NULL,
  `jenis_nilai` varchar(150) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorinilai`
--

INSERT INTO `kategorinilai` (`kd_kategorinilai`, `jenis_nilai`, `keterangan`) VALUES
('K001', 'UAS', 'mantav');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` char(4) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `kd_jurusan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nama_kelas`, `tingkat`, `kd_jurusan`) VALUES
('K001', 'IPS', '3', 'J001'),
('K002', 'IPA 2', '3', 'J002');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kd_mapel` char(4) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `kd_jurusan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kd_mapel`, `mapel`, `kd_jurusan`) VALUES
('M001', 'Matematika', 'J001');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` char(5) NOT NULL,
  `kd_siswa` char(4) NOT NULL,
  `kd_kategorinilai` char(4) NOT NULL,
  `kd_gurumapel` char(4) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `kd_siswa`, `kd_kategorinilai`, `kd_gurumapel`, `semester`, `nilai`) VALUES
('1', 'S001', 'K001', 'L002', 'ganjil', 34);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `kd_profil` char(4) NOT NULL,
  `profil` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`kd_profil`, `profil`, `keterangan`) VALUES
('P001', 'Sejarah', '<p>Sejarah singkat : SMK Negeri Tepus berdiri pada tanggal 14 Juli 2009, &nbsp;beberapa tokoh desa Tepus sepakat untuk mengusulkan kepada pemerintah Gunungkidul untuk mendirikan SMK, &nbsp; menindak lanjuti hal tersebut maka pada tanggal tersebut di atas didirikanlah SMK N Tepus. Angkatan 1 SMK N Tepus belum memiliki gedung sehingga harus meminjam gedung SMP N 1 Tepus. Sejak berdiri SMK Negeri Tepus selalu mengalami perkembangan dan pembukaan jurusan baru, &nbsp;diantaranya: Teknik Otomotif, Teknik Elektronika dan Administrasi Perkantoran.Berikut daftar Kepala Sekolah sejak berdiri hingga sekarang:</p>\r\n\r\n<ol>\r\n	<li>Plt. Sugiyanto, MM.</li>\r\n	<li>Bpk. Drs. Ris Riyadi, M. Acc</li>\r\n	<li>Ibu Dra. Musidah, MM. Pd.</li>\r\n</ol>\r\n'),
('P002', 'Visi & Misi', '<p><strong>Visi </strong></p>\r\n\r\n<p>Membangun sumberdaya manusia yang disiplin, terampil, berbudi pekerti yang baik dan bertaqwa kepada Tuhan Yang Maha Esa.</p>\r\n\r\n<p><strong>Misi</strong></p>\r\n\r\n<p>Melaksanakan pembelajaran yang efektif Menerapkan budaya industry di sekolah Mengoptimalkan sumberdaya sekolah Membentuk manusia yang beretika dan berbudi pekerti yang luhur</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kd_siswa` char(4) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `agama` enum('islam','protestan','katolik','hindu','budha','konghucu') NOT NULL,
  `kd_jurusan` char(4) NOT NULL,
  `status` enum('aktif','lulus','keluar') NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kd_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `foto`, `agama`, `kd_jurusan`, `status`, `password`) VALUES
('S001', '55555', 'haha', 'L', 'dsadas', '2016-06-30', 'dsadas', '3424324', '55555.jpg', 'islam', 'J001', 'aktif', 'tata'),
('S002', '222', 'fasa', 'P', 'dsadasd', '0000-00-00', 'dsadsadsa', '085728585150', '222.jpg', 'katolik', 'J001', 'lulus', 'tata'),
('S003', '4444', 'oop', 'P', 'sadsa', '2016-05-25', 'ewqewq', '085728585150', '4444.jpg', 'budha', 'J001', 'keluar', 'tata'),
('S004', '22', 'wawa', 'L', 'dsadas', '0000-00-00', 'adasda', '085728585150', '22.jpg', 'islam', 'J001', 'keluar', 'tata');

-- --------------------------------------------------------

--
-- Table structure for table `siswakelas`
--

CREATE TABLE `siswakelas` (
  `kd_siswakelas` int(11) NOT NULL,
  `kd_wali` char(4) NOT NULL,
  `kd_siswa` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswakelas`
--

INSERT INTO `siswakelas` (`kd_siswakelas`, `kd_wali`, `kd_siswa`) VALUES
(1, 'W001', 'S002'),
(2, 'W002', 'S002'),
(3, 'W002', 'S002'),
(4, 'W002', 'S002');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `kd_tahun` char(4) NOT NULL,
  `tahun` char(9) NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`kd_tahun`, `tahun`, `mulai`, `akhir`) VALUES
('T002', '2002', '2016-05-26', '2016-05-31'),
('T003', '2005', '2016-05-24', '2016-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `kd_wali` char(4) NOT NULL,
  `kd_guru` char(4) NOT NULL,
  `kd_tahun` char(4) NOT NULL,
  `kd_kelas` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`kd_wali`, `kd_guru`, `kd_tahun`, `kd_kelas`) VALUES
('W001', 'G003', 'T002', 'K001'),
('W002', 'G002', 'T003', 'K002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kd_berita`),
  ADD KEY `kd_admin` (`kd_admin`),
  ADD KEY `kd_kategoriberita` (`kd_kategoriberita`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kd_guru`);

--
-- Indexes for table `gurumapel`
--
ALTER TABLE `gurumapel`
  ADD PRIMARY KEY (`kd_gurumapel`),
  ADD KEY `kd_guru` (`kd_guru`),
  ADD KEY `kd_mapel` (`kd_mapel`),
  ADD KEY `kd_tahun` (`kd_tahun`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `kategoriberita`
--
ALTER TABLE `kategoriberita`
  ADD PRIMARY KEY (`kd_kategoriberita`);

--
-- Indexes for table `kategorinilai`
--
ALTER TABLE `kategorinilai`
  ADD PRIMARY KEY (`kd_kategorinilai`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kd_mapel`),
  ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `kd_siswa` (`kd_siswa`),
  ADD KEY `kd_kategorinilai` (`kd_kategorinilai`),
  ADD KEY `kd_gurumapel` (`kd_gurumapel`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`kd_profil`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kd_siswa`),
  ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indexes for table `siswakelas`
--
ALTER TABLE `siswakelas`
  ADD PRIMARY KEY (`kd_siswakelas`),
  ADD KEY `kd_wali` (`kd_wali`),
  ADD KEY `kd_siswa` (`kd_siswa`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`kd_tahun`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`kd_wali`),
  ADD KEY `kd_guru` (`kd_guru`),
  ADD KEY `kd_tahun` (`kd_tahun`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswakelas`
--
ALTER TABLE `siswakelas`
  MODIFY `kd_siswakelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`kd_kategoriberita`) REFERENCES `kategoriberita` (`kd_kategoriberita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gurumapel`
--
ALTER TABLE `gurumapel`
  ADD CONSTRAINT `gurumapel_ibfk_1` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gurumapel_ibfk_2` FOREIGN KEY (`kd_tahun`) REFERENCES `tahun` (`kd_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gurumapel_ibfk_3` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gurumapel_ibfk_4` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kd_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_siswa`) REFERENCES `siswa` (`kd_siswa`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kd_kategorinilai`) REFERENCES `kategorinilai` (`kd_kategorinilai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kd_gurumapel`) REFERENCES `gurumapel` (`kd_gurumapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswakelas`
--
ALTER TABLE `siswakelas`
  ADD CONSTRAINT `siswakelas_ibfk_1` FOREIGN KEY (`kd_siswa`) REFERENCES `siswa` (`kd_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswakelas_ibfk_2` FOREIGN KEY (`kd_wali`) REFERENCES `wali` (`kd_wali`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `wali_ibfk_1` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wali_ibfk_2` FOREIGN KEY (`kd_tahun`) REFERENCES `tahun` (`kd_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wali_ibfk_3` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
