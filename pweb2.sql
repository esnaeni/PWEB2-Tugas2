-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2024 at 08:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `guidance`
--

CREATE TABLE `guidance` (
  `id_guidance` int NOT NULL,
  `id_student` int NOT NULL,
  `problem` text NOT NULL,
  `solution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guidance`
--

INSERT INTO `guidance` (`id_guidance`, `id_student`, `problem`, `solution`) VALUES
(201, 301, 'Sering kali menghadapi kesulitan dalam beradaptasi dengan lingkungan kampus dan kehidupan sosial yang baru.', 'Bergabung dengan organisasi mahasiswa atau kegiatan ekstrakurikuler untuk memperluas jaringan sosial dan merasa lebih terlibat di kampus. Jangan ragu untuk bertanya atau mencari bantuan dari teman, senior, atau dosen jika menghadapi kesulitan dalam beradaptasi.'),
(202, 302, 'Kesulitan dalam menyelesaikan tugas atau proyek tepat waktu, terutama jika tugas tersebut kompleks.', 'Bagi tugas atau proyek besar menjadi bagian-bagian yang lebih kecil dan atur jadwal untuk menyelesaikan setiap bagian. Tetapkan target harian atau mingguan untuk menyelesaikan bagian-bagian tugas dan pantau kemajuan secara rutin.'),
(340, 3, 'Kesulitan dalam memahami materi kuliah atau memerlukan bantuan tambahan di luar jam kuliah.', 'Manfaatkan buku referensi, video tutorial online, atau sumber daya lain yang tersedia untuk memperdalam pemahaman materi. Ikut serta dalam kelompok studi atau diskusi dengan teman sekelas untuk membahas dan memahami materi lebih baik.'),
(673, 2, 'Kesulitan dalam mengatur waktu antara kuliah, tugas, dan aktivitas pribadi, yang mengakibatkan stres dan penurunan kualitas akademik.', 'Identifikasi tugas dan deadline yang penting, dan prioritaskan penyelesaiannya sesuai dengan urgensi dan tingkat kesulitan.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_student` int NOT NULL,
  `id_class` int NOT NULL,
  `student_number` char(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `id_user` int NOT NULL,
  `signature` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_student`, `id_class`, `student_number`, `name`, `phone_number`, `address`, `id_user`, `signature`) VALUES
(2, 3, '23012', 'Andriani', '08823214567', 'Jl. Kemuning', 148, '90'),
(3, 2, '2302079', 'Yaya', '088279654321', 'Jl. Betet', 590, '56'),
(301, 2, '301002', 'Jhon', '08821234567', 'Jl. Jalan', 123, '88'),
(302, 4, '2311063', 'Zidan', '083896350642', 'Jl. Laut Winong', 426, '43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guidance`
--
ALTER TABLE `guidance`
  ADD PRIMARY KEY (`id_guidance`),
  ADD KEY `relasi` (`id_student`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guidance`
--
ALTER TABLE `guidance`
  MODIFY `id_guidance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=674;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guidance`
--
ALTER TABLE `guidance`
  ADD CONSTRAINT `relasi` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
