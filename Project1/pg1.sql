-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 12:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pg1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '72b609cc2e3aaeca70366506c927a942cda998cefbe92d1306452dfad32c9c3b');

-- --------------------------------------------------------

--
-- Table structure for table `pgpedia`
--

CREATE TABLE `pgpedia` (
  `id` int(11) NOT NULL,
  `gambar` varchar(1024) COLLATE utf8_bin NOT NULL,
  `nama_lokal` varchar(1024) COLLATE utf8_bin NOT NULL,
  `nama_latin` varchar(1024) COLLATE utf8_bin NOT NULL,
  `deskripsi` varchar(1024) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pgpedia`
--

INSERT INTO `pgpedia` (`id`, `gambar`, `nama_lokal`, `nama_latin`, `deskripsi`) VALUES
(1, 'IMGPG1.jpg', 'Trembesi', 'Samanea saman', 'Pohon Trembesi dengan nama latin (Samanea saman) merupakan jenis pohon yang memiliki kemampuan menyerap karbon dioksida dari udara yang sangat besar. Trambesi mampu menyerap karbondioksida mencapai 28.488,39 kg/tahun. Pohon Trembesi memiliki julukan sebagai pohon hujan (Rain Tree) atau ki hujan karena memiliki kemampuan untuk menyerap air tanah yang kuat, sehingga tajuknya sering meneteskan air.\r\nTrembesi termasuk pohon yang cepat tumbuh dan menyebar baik di negara tropis maupun sub tropis. Trembesi merupakan tanaman asli yang berasal dari Amerika tropis seperti Meksiko, Venezuela, Peru dan Brazil, namun dapat tumbuh di berbagai daerah tropis dan subtropis. Jenis trembesi ini memerlukan drainasi yang baik, namun masih toleran terhadap tanah yang tergenang air dalam waktu pendek.\r\nTrembesi mempunyai banyak manfaat bagi lingkungan. Batang pohon dapat digunakan sebagai bahan kayu untuk korek api, serasah daunnya dapat menyerap kandungan nitrogen, menurunkan konsentrasi aluminium dalam tanah, dan meningkatkan pH '),
(2, 'IMGPG2.jpg', 'Buah Merah Bawean', ' ', 'Buah merah merupakan buah khas Pulau Bawean yang berbentuk bulat, memiliki bulu halus, dan berwarna merah jika sudah matang atau tua. Buah merah memiliki tekstur daging yang lembut dan bau yang khas. Sampai saat ini, buah merah tidak memiliki nama, jenisnya berbeda dengan buah merah asal Papua.\r\nBuah merah ini juga disebut sebagai buah surga. Buah ini memiliki rasa yang berbeda dengan buah-buahan lainnya yang terasa lebih lezat dan gurih. Mantan Gubernur Jawa Timur, Almarhum Basofi Sudirman menjadi pencetus nama Buah surga asal Pulau Bawean setelah menikmati kenikmatan dan kelezatan dari Buah Merah Ketika melakukan kunjungan kerja ke Pulau Bawean.\r\nTanaman ini memiliki keistimewaan yaitu pohon buah merah hanya tumbuh dan berbuah di Pulau Bawean. Terdapat 2 jenis buah merah yaitu buah merah biasa dan mentega. Yang membedakan keduanya adalah warna dan tekstur daging buah. Buah merah biasa berwarna merah dan daging yang lembut. Sedangkan buah merah jenis mentega berwarna agak kuning dan tekstur daging yang lebih'),
(3, 'IMGPG3.jpg', 'Asam Jawa', 'Tamarindus indica L.', 'Pohon Asam Jawa (Tamarindus indica L.) termasuk dalam anggota dicotyledonous dan famili Leguminosae (Fabaceae). Habitat asal tanaman asam jawa adalah daerah tropis atau subtropis. Pohon Asam Jawa mampu hidup lama bahkan antara 60-200 tahun. Tumbuhan ini biasanya tumbuh pada dataran rendah dan menjadi pohon yang ditanam di pinggir jalan sebagai pohon pelindung (Rini & Putri, 2014).\r\nTanaman Asam Jawa berasal dari Afrika, namun kemudian berkembang di India, Sudan, Pakistan, Spanyol, Meksiko dan juga Indonesia. Provinsi di Indonesia yang memiliki tanaman Asam Jawa seperti Jawa Barat, Jawa Tengah, Jawa Timur, Sumatra Utara, Kalimantan Barat, Sulawesi Selatan, dan Bali.\r\nPohon Tamarindus indica L mampu bertahan terhadap angin yang kencang. Pohon ini berwarna hijau sepanjang tahun, tingginya dapat mencapai 25- 30 meter dan diameternya dapat mencapai lebih dari 2 meter. Tanaman pohon asam ini tidak memerlukan pemeliharaan khusus dan tahan terhadap kondisi kering sehingga disebut die hard.'),
(4, 'IMGPG4.jpg', 'Pohon Siwalan', 'Borassus flabellifer', 'Siwalan (Borassus flabellifer) atau yang biasa dikenal pohon Lontar merupakan jenis palma penghasil nira yang potensial di Indonesia. Tanaman ini cenderung dapat bertahan hidup pada lahan yang kritis. Habitat ideal untuk tumbuh Siwalan adalah didataran kering dan terbuka dengan ketinggian 0-500 mdpl. Persebaran siwalan di Indonesia dapat dijumpai pada wilayah pantai seperti Jawa Timur (Lamongan, Gresik dan Tuban), Jawa Tengah, Madura, Bali, NTT, NTB, Maluku Tenggara dan Sulawesi Selatan.\r\nTinggi pohon siwalan dapat mencapai 30 meter dengan bentuk batang yang lurus dan kekar. Daun tumbuh bergerombol di pucuk, helaian daun berbentuk kipas dengan diameter pertumbuhan sampai dengan 150 cm dan bertangkai panjang 90- 120 cm. Bunga jantan tersusun dalam suatu rangkaian berbentuk bulir-bulir panjang (20-45 cm) dengan diameter 2-3 cm. \r\nPohon Siwalan disebut sebagai tanaman serbaguna, karena memiliki banyak manfaat. Akar tanaman dapat dimanfaatkan sebagai bahan bakar, pupuk dan obat tradisional. Batang pohon yang tua ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pgpedia`
--
ALTER TABLE `pgpedia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pgpedia`
--
ALTER TABLE `pgpedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
