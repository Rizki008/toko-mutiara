-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2021 pada 18.12
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_mutiara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_chatting`
--

CREATE TABLE `tbl_chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `admin_send` text DEFAULT NULL,
  `pelanggan_send` text DEFAULT NULL,
  `time_chatting` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_chatting`
--

INSERT INTO `tbl_chatting` (`id_chatting`, `id_pelanggan`, `id_user`, `admin_send`, `pelanggan_send`, `time_chatting`) VALUES
(1, 3, NULL, '0', 'selamat malam', '2021-10-07 18:13:40'),
(2, 3, NULL, 'malam', '0', '2021-10-07 18:15:03'),
(3, 3, NULL, '0', 'pesanan saya sudah di proses?', '2021-10-07 18:17:38'),
(4, 3, NULL, 'sudah kak', '0', '2021-10-07 18:17:54'),
(5, 3, NULL, 'dalam proses pengiriman', '0', '2021-10-07 18:18:50'),
(6, 3, NULL, '0', 'baik terimakasih', '2021-10-07 18:33:45'),
(7, 6, NULL, '0', 'hai', '2021-10-07 18:47:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'sembako'),
(2, 'minuman'),
(3, 'sandang'),
(4, 'makanan ringan'),
(5, 'mainan'),
(6, 'roko'),
(7, 'es cream'),
(8, 'Obat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` text DEFAULT NULL,
  `ongkir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_lokasi`, `ongkir`) VALUES
(1, 'Ciawigebang', '2000'),
(2, 'Cibeureum', '10000'),
(3, 'Cibingbin', '12000'),
(4, 'Cidahu', '8000'),
(5, 'Cigandamekar', '8000'),
(6, 'Cigugur', '8000'),
(7, 'Cilebak', '12000'),
(8, 'Cilimus', '10000'),
(9, 'Cimahi', '8000'),
(10, 'Ciniru', '10000'),
(11, 'Cipicung', '1000'),
(12, 'Ciwaru', '2000'),
(13, 'Darma', '7000'),
(14, 'Garawangi', '7000'),
(15, 'Hantara', '10000'),
(16, 'Jalaksana', '2000'),
(17, 'Japara', '7000'),
(18, 'Kadugede', '8000'),
(19, 'Kalimanggis', '3000'),
(20, 'Karangkancana', '7000'),
(21, 'Kramatmulya', '5000'),
(22, 'Kuningan', '7000'),
(23, 'Lebakwangi', '7000'),
(24, 'Luragung', '7000'),
(25, 'Maleber', '7000'),
(26, 'Mandirancan', '9000'),
(27, 'Nusaherang', '8000'),
(28, 'Pancalang', '9000'),
(29, 'Pasawahan', '10000'),
(30, 'Selajambe', '12000'),
(31, 'Sindangagung', '7000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `jenis_kel` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `no_telpon`, `jenis_kel`, `alamat`, `password`, `foto`) VALUES
(1, 'rizki', 'rizki@gmail.com', '085731639595', 'laki-laki', NULL, '12345', NULL),
(2, 'uud', 'uud@gmail.com', '087645279134', 'laki-laki', NULL, '12345', NULL),
(3, 'opik', 'opik@gmail.com', '081275486134', 'laki-laki', NULL, '12345', NULL),
(4, 'junaedi', 'junaedi@gmail.com', '081247513458', 'laki-laki', NULL, '12345', NULL),
(5, 'fajar', 'fajar@gmail.com', '0857421548721', 'laki-laki', NULL, '12345', NULL),
(6, 'aulia', 'aulia@gmail.com', '083452178451', 'perempuan', NULL, '12345', NULL),
(7, 'kartika', 'kartika@gmail.com', '085712451354', 'perempuan', NULL, '12345', NULL),
(8, 'wulandari', 'wulandari@gmail.com', '087132546824', 'perempuan', NULL, '12345', NULL),
(9, 'patimah', 'patimah@gmail.com', '085147965234', 'perempuan', NULL, '12345', NULL),
(10, 'sukron', 'sukron@gmail.com', '085714245632', 'laki-laki', NULL, '12345', NULL),
(11, 'emin', 'emin@gmail.com', '087132457864', 'perempuan', NULL, '12345', NULL),
(12, 'muhyi', 'muhyi@gmail.com', 'asdqweqdasfw', 'laki-laki', NULL, '12345', NULL),
(13, 'heni', 'heni@gmail.com', '081213267921', 'perempuan', NULL, '12345', NULL),
(14, 'contoh', 'contoh@gmail.com', '12345678912', 'laki-laki', NULL, '12345', NULL),
(15, 'jaenal', 'jaenal@gmai.com', '085741234567', 'laki-laki', NULL, '12345', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `product_unit` varchar(10) DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `stock` bigint(20) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `deskripsi`, `gambar`, `berat`, `product_unit`, `diskon`, `stock`, `is_available`) VALUES
(1, 'OISHI MAKADO TMT', 4, '5200', 'Makanan Ringan', '12.jpg', 70, 'GR', NULL, 500, 1),
(2, 'SIMAS PALMIA', 1, '4400', 'Simas bahan untuk membuat bolu', '21.jpg', 200, 'GR', NULL, 496, 1),
(3, 'AGAR SWALL GLOBE MRH 7G', 5, '4400', 'Bahan Untuk membuat agar', '31.jpg', 7, 'GR', NULL, 490, 1),
(4, 'MARLBORO FILT BLACK', 6, '26400', 'Roko Marlboro filter', '410.jpg', 50, 'GR', NULL, 448, 1),
(5, 'BIORE BF RELAX RFL', 3, '22700', 'Sabun Mandi Cair', '51.jpg', 450, 'ML', 0, 147, 1),
(6, 'MITU GANTI PPK WHITE', 3, '20600', 'Popok bayi isi 50', '61.jpg', 250, 'GR', NULL, 499, 1),
(7, 'TROPICANA CHOCO VAN', 2, '4800', 'Es cream segar', '71.png', 65, 'ML', NULL, 496, 1),
(8, 'DOMPET KOSMETIK', 3, '17000', 'Dompet untuk kosmetik', '81.jpg', 5, 'GR', NULL, 498, 1),
(9, 'KOPI K.API MOCHA', 2, '5300', 'Kopi kapal api kemasan saset', '10.jpg', 32, 'GR', NULL, 485, 1),
(10, 'COCA COLA', 2, '4500', 'Minuman segar', '112.jpg', 390, 'ML', NULL, 494, 1),
(11, 'LAYS NORI SEAWEED', 4, '5000', 'Ciki Lays', '121.jpg', 35, 'GR', NULL, 499, 1),
(12, 'POTABEE BBQ SP', 4, '1900', 'Ciki Potato', '13.jpg', 15, 'GR', 0, 498, 1),
(13, 'sandal', 3, '13000', 'Sandal Swalow untuk perempuan', '14.jpg', 50, 'GR', 0, 499, 1),
(14, 'SKM FF KNTL MNS', 4, '6700', 'Susu kenatal manis', '111.jpg', 200, 'GR', NULL, 500, 1),
(15, 'LAURIER DBL CMFRT 8\'P', 3, '4200', 'Pembalut', '16.jpg', 50, 'GR', NULL, 500, 1),
(16, 'DJINGGO', 6, '8200', 'Rokok Djinggo 10 S', '171.jpg', 20, 'GR', 0, 458, 1),
(17, 'ROTI AUCKLAND KOMBINASI', 4, '8000', 'Roti Auckland', '18.jpg', 250, 'GR', NULL, 499, 1),
(18, 'HELLO PANDA STRW', 4, '2600', 'Biskuit helo panda', '19.jpg', 25, 'GR', NULL, 500, 1),
(19, 'REGAL ROL', 4, '17000', 'Biskuit regal', '20.jpg', 250, 'GR', NULL, 500, 1),
(20, 'FAIR & LOVELY FOAM', 3, '2500', 'Untuk melembutkan wajah', '211.jpg', 9, 'GR', 0, 500, 1),
(21, 'ENERGEN VANILA', 2, '6300', 'Minuman penunda lapar', '22.jpg', 30, 'GR', NULL, 398, 1),
(22, 'KOROKU ORIGINAL', 4, '6000', 'Kuroku rasa original', '23.jpg', 70, 'GR', NULL, 499, 1),
(23, 'TARO NET POTATO', 4, '975', 'Makanan Ringan', '24.jpg', 9, 'GR', NULL, 400, 1),
(24, 'BUKU TULIS KIKY', 3, '36000', 'Buku Tulis kiki 38 lembar', '24.png', 38, 'GR', 0, 103, 1),
(25, 'BABY COUGH SYRUP', 8, '5700', 'obat panas untuk anak', '25.jpg', 60, 'ML', 0, 250, 1),
(26, 'SOFTENER SK SB MRH 15M*6S', 3, '2500', 'Siftener Soklin', '26.jpeg', 15, 'ML', 0, 200, 1),
(27, 'EKONOMI LMN EL900K', 3, '4850', 'Sabun Cuci piring', '27.jpg', 690, 'GR', 0, 101, 1),
(28, 'BOOM DET MRH', 3, '4950', 'Sabun Cuci pakayan', '28.jpg', 400, 'GR', 0, 100, 1),
(29, 'SENDOK BEBEK', 3, '1900', 'Sendok Pelastik Bebek', '29.jpg', 20, 'GR', 0, 110, 1),
(30, 'EKONOMI PTH EP500K', 3, '1900', 'Sabun Cuci pakayan', '30.jpg', 300, 'GR', NULL, 489, 1),
(31, 'ROMA MALKIS KLP', 4, '5800', 'Biskuit kelapa', '311.jpg', 252, 'GR', NULL, 199, 1),
(32, 'CHAMP BEEF SOSIS', 4, '14999', 'Sosis Champ rasa sapi', '32.jpg', 150, 'GR', 0, 145, 1),
(33, 'SUNLIGHT LIME RF', 3, '4800', 'Sabun Cuci piring', '33.jpg', 220, 'ML', NULL, 498, 1),
(34, 'REJOICE 3IN1', 3, '21400', 'Sampo mandi', '34.jpg', 170, 'ML', 0, 110, 1),
(35, 'FRESCO KOPI CREAM', 2, '7900', 'Kopi susu kemasan kapal api', '35.jpg', 31, 'GR', NULL, 28, 1),
(36, 'AIRCUP BTL', 2, '1300', 'Air mineral kemasan Cup', '361.jpg', 600, 'ML', 0, 96, 1),
(37, 'WALLS POPULER CHO VAN', 2, '5000', 'Es cream segar', '37.jpg', 40, 'GR', 0, 229, 1),
(38, 'SHINZUI SOAP KIREI', 3, '3800', 'Sabun Mandi', '38.jpg', 90, 'GR', 0, 124, 1),
(39, 'SHINZUI SOAP MYORI', 1, '3800', 'Sabun mandi', '39.jpg', 90, 'GR', 0, 124, 1),
(40, 'PG FORMULA PROTEKSI', 3, '2900', 'Sikat gigi', '40.jpg', 75, 'GR', 0, 136, 1),
(41, 'GULA MERAH', 1, '6500', 'Gula merah aren', '41.jpg', 490, 'GR', 0, 194, 1),
(42, 'SAMBEL ULEG TRSI', 4, '12800', 'Sambal Trasi kemasan saset', '42.jpg', 20, 'GR', 0, 116, 1),
(43, 'SUSAN C.BUDS SPB', 1, '4900', 'Blazy Susan', '43.jpg', 525, 'GR', 0, 108, 1),
(44, 'TOLAK ANGIN CAIR ANK', 8, '1900', 'Obat masuk angin', '44.jpg', 10, 'ML', 0, 173, 1),
(45, 'FLORIDINA ORG', 2, '2900', 'Minuman Segar', '45.jpg', 350, 'ML', NULL, 447, 1),
(46, 'JELLY BIG STIK', 4, '4000', 'Makanan Anak', '46.jpg', 30, 'GR', 0, 117, 1),
(47, 'DETTOL SP RE-ENZ', 1, '5600', 'Sabun Mandi', '47.jpg', 150, 'GR', 0, 117, 1),
(48, 'BENDERA CAIR CKLT', 1, '2500', 'Susu Coklat', '48.jpg', 115, 'ML', 0, 397, 0),
(49, 'SUN MARIE BISC BSR', 4, '11800', 'makanan untuk anak', '49.jpg', 150, 'GR', 2000, 486, 1),
(50, 'FRENCH FRIES', 4, '6100', 'Potato chip', '50.jpg', 68, 'GR', 0, 452, 1),
(96, 'kecap', 1, '5000', 'kecap bango sedap', '1111.jpg', 150, 'GR', NULL, 142, 1),
(97, 'Dencow', 2, '4800', 'Dencow Susu', 'dencow.jpg', 12, 'Gram', NULL, 11, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(30) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '32412356453', 'Rizki'),
(2, 'BNI', '54235653232', 'kiki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_produk`, `qty`, `is_available`) VALUES
(1, '20211017NAF6EVJ7', 96, 1, 1),
(2, '20211017NAF6EVJ7', 46, 1, 1),
(3, '20211017NAF6EVJ7', 43, 1, 1),
(4, '20211017ZX9471AY', 37, 2, 1),
(5, '20211017ZX9471AY', 33, 1, 1),
(6, '20211017ZX9471AY', 40, 1, 1),
(7, '202110177DDKC8LY', 49, 1, 1),
(8, '20211017WB0UXPZP', 35, 23, 1);

--
-- Trigger `tbl_rinci_transaksi`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tbl_rinci_transaksi` FOR EACH ROW BEGIN
UPDATE tbl_produk SET stock = stock-NEW.qty
WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riview`
--

CREATE TABLE `tbl_riview` (
  `id_riview` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_riview`
--

INSERT INTO `tbl_riview` (`id_riview`, `id_pelanggan`, `id_produk`, `nama_pelanggan`, `tanggal`, `isi`, `foto`) VALUES
(1, 12, 37, 'muhyi', '2021-09-13', 'produk bagus', NULL),
(2, 12, 96, 'muhyi', '2021-09-13', 'produk sesuai dengan gambar', NULL),
(3, 3, 37, 'opik', '2021-09-13', 'sesuai gambar', NULL),
(4, 3, 37, 'opik', '2021-09-13', 'produk sangat bagus', NULL),
(5, 13, 37, 'heni', '2021-09-13', 'sangat enak anak saya suka', NULL),
(6, 13, 2, 'heni', '2021-09-13', 'ssip', NULL),
(7, 13, 2, 'heni', '2021-09-13', 'sangat bagus untuk bolu saya', NULL),
(8, 3, 37, 'opik', '2021-10-14', 'bagus pengiriman cepat', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat`, `no_telpon`) VALUES
(1, 'Toko Mutiara', 211, 'Cipicung', '085754785529');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `berat` bigint(255) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `id_lokasi`, `no_order`, `tgl_order`, `nama_pelanggan`, `no_tlp`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `nama_pengirim`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `status`, `catatan`) VALUES
(1, 3, 1, '20211017NAF6EVJ7', '2021-10-17', 'opik', '085741245639', NULL, NULL, 'ciawilor', '45591', NULL, NULL, NULL, 2000, NULL, NULL, 13900, 15900, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(2, 3, 1, '20211017ZX9471AY', '2021-10-17', 'opik', '085712345698', NULL, NULL, 'ciawilor', '45591', NULL, NULL, NULL, 2000, NULL, NULL, 17700, 19700, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(3, 3, 11, '202110177DDKC8LY', '2021-10-17', 'opik', '085741236541', NULL, NULL, 'sindang barang', '45217', NULL, NULL, NULL, 1000, 'jamal', NULL, 9800, 10800, 1, 'WhatsApp_Image_2021-09-29_at_15_05_56.jpeg', 'opik', 'bca', '20145412451421', 2, NULL, NULL),
(4, 3, 16, '20211017WB0UXPZP', '2021-10-17', 'kiki', '0857412365412', NULL, NULL, 'jalaksana', '45217', NULL, NULL, NULL, 2000, NULL, NULL, 181700, 183700, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'pemilik', 'pemilik', 'pemilik', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `tbl_riview`
--
ALTER TABLE `tbl_riview`
  ADD PRIMARY KEY (`id_riview`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_riview`
--
ALTER TABLE `tbl_riview`
  MODIFY `id_riview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
