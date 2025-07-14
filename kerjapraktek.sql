-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2025 at 05:40 PM
-- Server version: 8.4.3
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerjapraktek`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_cp`
--

CREATE TABLE `db_cp` (
  `id` int NOT NULL,
  `nd_inet` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cp_dossier` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_cp`
--

INSERT INTO `db_cp` (`id`, `nd_inet`, `cp_dossier`) VALUES
(345955, '192.167.41.98', '192.167.90.18');

-- --------------------------------------------------------

--
-- Table structure for table `ibooster`
--

CREATE TABLE `ibooster` (
  `no` int NOT NULL,
  `nd_inet` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_embassy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_olt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_ne` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adsl_link_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `line_rate_1` int DEFAULT NULL,
  `snr_1` int DEFAULT NULL,
  `attenuation_1` int DEFAULT NULL,
  `attainable_rate_1` int DEFAULT NULL,
  `line_rate_2` int DEFAULT NULL,
  `snr_2` int DEFAULT NULL,
  `attenuation_2` int DEFAULT NULL,
  `attainable_rate_2` int DEFAULT NULL,
  `onu_link_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `onu_serial_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fiber_length` int DEFAULT NULL,
  `olt_tx` float DEFAULT NULL,
  `olt_rx` float DEFAULT NULL,
  `onu_tx` float DEFAULT NULL,
  `onu_rx` decimal(6,2) DEFAULT NULL,
  `type_onu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `versionid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `traffic_profile_up` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `traffic_profile_down` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `framed_ip_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mac_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_seen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accstarttime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accstoptime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accessiontime` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `up` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `down` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_koneksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nas_ip_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ibooster`
--

INSERT INTO `ibooster` (`no`, `nd_inet`, `ip_embassy`, `type_olt`, `cid`, `ip_ne`, `adsl_link_status`, `line_rate_1`, `snr_1`, `attenuation_1`, `attainable_rate_1`, `line_rate_2`, `snr_2`, `attenuation_2`, `attainable_rate_2`, `onu_link_status`, `onu_serial_number`, `fiber_length`, `olt_tx`, `olt_rx`, `onu_tx`, `onu_rx`, `type_onu`, `versionid`, `traffic_profile_up`, `traffic_profile_down`, `framed_ip_address`, `mac_address`, `last_seen`, `accstarttime`, `accstoptime`, `accessiontime`, `up`, `down`, `status_koneksi`, `nas_ip_address`) VALUES
(1, '141202100116', '172.29.225.37', 'MA5600T', 'GPON03-D4-PKL-2 xpon 0/7/0/4:2.3.200', '172.22.203.48 ', '-', 0, 0, 0, 0, 0, 0, 0, 0, 'ONLINE ', '4857544394E5E69C ', 4821, 3.64, -29.21, 2.77, -21.99, 'HG8245', 'V1R002C00S211', 'UP-11264KB0', 'DOWN-33792KB0 ', '10.253.12.9', 'CCCC814F0E42', '07-01-25 14:22', '07-01-25 14:22', '12:00', '04:00:02', '87.03 MB', '828.10 MB ', 'Start', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_teknisi` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `sektor` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nik`, `nama_teknisi`, `tgl`, `sektor`, `status`) VALUES
(3, '230400100', '', '2025-06-11', 'BREBES', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_order`
--

CREATE TABLE `jenis_order` (
  `id` int NOT NULL,
  `jenis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `point` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_order`
--

INSERT INTO `jenis_order` (`id`, `jenis`, `point`) VALUES
(1, 'REG', 1),
(2, 'SQM', 1),
(3, 'US', 1),
(4, 'INFRA', 1),
(5, 'PRED', 1),
(6, 'BENJAR', 1.5),
(7, 'INDIHOME_AO', 1),
(8, 'INDIHOME_MO', 1),
(9, 'INDIHOME_PDA', 1),
(10, 'INDIHOME_UNSC', 1),
(11, 'INDIBIZ_AO', 1),
(12, 'INDIBIZ_MO', 1),
(13, 'INDIBIZ_PDA', 1),
(14, 'INDIBIZ_UNSC', 1),
(15, 'DATIN_AO', 1),
(16, 'DATIN_MO', 1),
(17, 'DATIN_UNSC', 1),
(18, 'ORBIT_AO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sektor`
--

CREATE TABLE `sektor` (
  `id` int NOT NULL,
  `sektor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sektor`
--

INSERT INTO `sektor` (`id`, `sektor`) VALUES
(6, 'sektor perairan'),
(7, 'sektor perikanan');

-- --------------------------------------------------------

--
-- Table structure for table `seq_close`
--

CREATE TABLE `seq_close` (
  `id` int NOT NULL,
  `segmentasi` varchar(255) NOT NULL,
  `sub_segment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seq_close`
--

INSERT INTO `seq_close` (`id`, `segmentasi`, `sub_segment`) VALUES
(4, 'non', 'segmentasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `no_ticket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reported_date` datetime DEFAULT NULL,
  `closed_date` datetime DEFAULT NULL,
  `nik_teknisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_teknisi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_order` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `segmentasi` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sektor` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`no_ticket`, `service_no`, `reported_date`, `closed_date`, `nik_teknisi`, `nama_teknisi`, `jenis_order`, `segmentasi`, `sektor`, `id`) VALUES
('TCK001', 'SVC123', '2024-06-01 10:00:00', '2024-06-02 15:00:00', 'TEK001', 'Budi Santoso', 'Instalasi', 'Bisnis', 'Jakarta', 13),
('TCK002', 'SVC124', '2024-06-05 09:30:00', '2024-06-06 11:00:00', 'TEK002', 'Siti Aminah', 'Perbaikan', 'Retail', 'Bandung', 14),
('TCK003', 'SVC125', '2024-06-10 14:00:00', '2024-06-11 16:00:00', 'TEK003', 'Andi Wijaya', 'Maintenance', 'Korporat', 'Surabaya', 15);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int NOT NULL,
  `nik_teknisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_teknisi` varchar(100) DEFAULT NULL,
  `sektor` varchar(50) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id`, `nik_teknisi`, `nama_teknisi`, `sektor`, `jenis`, `status`) VALUES
(1, '', 'joko', 'BREBES', 'MAINTENANCE', 'Nonaktif'),
(2, '', 'dasman', 'pmlg', 'MAINTENANCE', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tsel`
--

CREATE TABLE `tsel` (
  `id` int NOT NULL,
  `nd_inet` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ncli_inet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `flag_hvc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `witel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datel_ncx` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cdatel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nd_pots` int DEFAULT NULL,
  `cwitel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `odc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `odp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tsel`
--

INSERT INTO `tsel` (`id`, `nd_inet`, `ncli_inet`, `flag_hvc`, `reg`, `witel`, `datel_ncx`, `sto`, `cdatel`, `nd_pots`, `cwitel`, `odc`, `odp`) VALUES
(2234, '141202100150', '23040099', 'HVC_PLATINUM', '4', 'Telkom PEKALONGAN ', 'PEKALONGAN ', 'PKL', '2703', 285433169, '28', 'PKL-FCX', 'ODP-PKL-FCX/031'),
(2235, '081978658764', '23040082', 'HVS_CLASSIC', '4', 'Telkom Tegal', 'Tegal', 'PKL', '2703', 0, '28', 'PKL-FB', 'ODP-PKL-FB/035');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` int NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `nik`, `email`, `password`, `role_id`, `foto`, `is_active`, `createdAt`, `updatedAt`) VALUES
(1, 'TELKOM TEGAL', '9876543219876543', 'telkomtegal@gmail.com', '$2y$10$6eM1ewRYeMO/iJI4s.A4jen7a4DVi6MQOhU5ZXv38NEoMxfCr9bJ2', 1, 'default.jpg', 1, '2025-06-11 07:02:32', '2025-06-19 05:08:33'),
(2, 'telkom', '0987654321098765', 'telkom1@gmail.com', '$2y$10$ghP3R2ymQ7EZJw536oKYB.1EsUTetIStD5t6.o2H6Dr/WI2p/T.Li', 2, 'default.jpg', 1, '2025-06-17 00:35:41', '2025-06-19 05:08:45'),
(3, 'TELKOM AKSES TEGAL', '0987654321134567', 'telkomakses@gmail.com', '$2y$10$DYq9THZv/I7jzbLPFHNKleGhblwE2YP52vMyihs8A7.uuxBH77ejG', 2, 'default.jpg', 1, '2025-06-18 22:04:09', '2025-06-19 05:08:52'),
(22, 'danang', '3328159211230924', 'danang@gmail.com', '$2y$10$Y1b6uE.Oz6s7HgvlRj46TOIc5rJUX/wqAzwQLEFCPooSGsOfGEyui', 2, 'default.jpg', 1, '2025-06-20 07:35:30', '2025-06-20 07:35:30'),
(23, 'danang', '1234567890123456', 'danang1@gmail.com', '$2y$10$A/U/SOB00jj2BWckrlyoY.g1mqMavMLl67Qy9PlH3Gsdyf.G87Dv2', 2, '686ff4792295d.jpeg', 1, '2025-06-20 07:54:07', '2025-07-10 17:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(4, 'Master Operasional'),
(5, 'Master unspec');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile ', 'user', 'fas fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit ', 1),
(4, 3, 'Menu Management ', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open ', 1),
(7, 1, 'Role', 'Admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 9, 'Data Order', 'order', 'fas fa-fw fa-user', 1),
(9, 4, 'Data Order', 'order', 'fas fa-fw fa-user', 1),
(10, 4, 'Data Segment Close', 'seqclose', 'fas fa-fw fa-user', 1),
(11, 4, 'Data teknisi', 'teknisi', 'fas fa-fw fa-user', 1),
(12, 4, 'Data jadwal operasi', 'jadwal', 'fas fa-fw fa-user', 1),
(13, 5, 'Data sekttor', 'sektor', 'fas fa-fw  fa-user', 1),
(14, 10, 'Data Sto', 'uslis', 'fas fa-fw fa-user', 1),
(15, 5, 'Data Unspec', 'semesta', 'fas fa-fw fa-user', 1),
(16, 5, 'kontak person', 'cp', 'fas fa-fw fa-user', 1),
(17, 5, 'Daftar Tsel', 'tsel', 'fas fa-fw fa-user', 1),
(18, 5, 'monitoring ibooster', 'ibooster', 'fas fa-fw fa-user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uslis`
--

CREATE TABLE `uslis` (
  `id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nonwarranty` int DEFAULT NULL,
  `warranty` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uslis`
--

INSERT INTO `uslis` (`id`, `nama`, `nonwarranty`, `warranty`) VALUES
(14, 'TGL', 2345, 123),
(15, 'slwi', 5679, 123),
(16, 'ART', 6789, 987);

-- --------------------------------------------------------

--
-- Table structure for table `us_saldo_harian`
--

CREATE TABLE `us_saldo_harian` (
  `id` int NOT NULL,
  `nd_inet` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_saldo` enum('NON WARRANTY','WARRANTY') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_pelanggan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `ket_close` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `seg_close` int DEFAULT NULL,
  `subseg_close` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_teknisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_teknisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `us_semesta`
--

CREATE TABLE `us_semesta` (
  `id` int NOT NULL,
  `s_sektor` int NOT NULL,
  `s_node_id_ip` varchar(50) NOT NULL,
  `s_shelf_slot_port_onu` varchar(50) NOT NULL,
  `s_fiber_lenght` varchar(50) NOT NULL,
  `s_sto` int NOT NULL,
  `s_odc` varchar(50) NOT NULL,
  `s_odp` varchar(50) NOT NULL,
  `s_nd_inet` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `us_semesta`
--

INSERT INTO `us_semesta` (`id`, `s_sektor`, `s_node_id_ip`, `s_shelf_slot_port_onu`, `s_fiber_lenght`, `s_sto`, `s_odc`, `s_odp`, `s_nd_inet`) VALUES
(1, 0, '192.172.187.61', '21', '488', 0, '32', '12', '172.168.71.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_cp`
--
ALTER TABLE `db_cp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibooster`
--
ALTER TABLE `ibooster`
  ADD PRIMARY KEY (`no`),
  ADD KEY `idx_nd_inet` (`nd_inet`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seq_close`
--
ALTER TABLE `seq_close`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsel`
--
ALTER TABLE `tsel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uslis`
--
ALTER TABLE `uslis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `us_saldo_harian`
--
ALTER TABLE `us_saldo_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `us_semesta`
--
ALTER TABLE `us_semesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_cp`
--
ALTER TABLE `db_cp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345956;

--
-- AUTO_INCREMENT for table `ibooster`
--
ALTER TABLE `ibooster`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seq_close`
--
ALTER TABLE `seq_close`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tsel`
--
ALTER TABLE `tsel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2237;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `uslis`
--
ALTER TABLE `uslis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `us_saldo_harian`
--
ALTER TABLE `us_saldo_harian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236018;

--
-- AUTO_INCREMENT for table `us_semesta`
--
ALTER TABLE `us_semesta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
