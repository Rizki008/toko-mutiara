-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Sep 2021 pada 06.25
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

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
(1, 1, NULL, NULL, 'contoh ah chat', '2021-09-04 14:24:45'),
(2, 1, 2, 'ok', NULL, '2021-09-04 15:17:50');

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
(7, 'es cream');

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
(14, 'contoh', 'contoh@gmail.com', '12345678912', 'laki-laki', NULL, '12345', NULL);

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
(5, 'BIORE BF RELAX RFL', 3, '22700', 'Sabun Mandi Cair', '51.jpg', 450, 'ML', 2000, 147, 1),
(6, 'MITU GANTI PPK WHITE', 3, '20600', 'Popok bayi isi 50', '61.jpg', 250, 'GR', NULL, 500, 1),
(7, 'TROPICANA CHOCO VAN', 2, '4800', 'Es cream segar', '71.png', 65, 'ML', NULL, 496, 1),
(8, 'DOMPET KOSMETIK', 3, '17000', 'Dompet untuk kosmetik', '81.jpg', 5, 'GR', NULL, 499, 1),
(9, 'KOPI K.API MOCHA', 2, '5300', 'Kopi kapal api kemasan saset', '10.jpg', 32, 'GR', NULL, 486, 1),
(10, 'COCA COLA', 2, '4500', 'Minuman segar', '112.jpg', 390, 'ML', NULL, 499, 1),
(11, 'LAYS NORI SEAWEED', 4, '5000', 'Ciki Lays', '121.jpg', 35, 'GR', NULL, 499, 1),
(12, 'POTABEE BBQ SP', 4, '1900', 'Ciki Potato', '13.jpg', 15, 'GR', 0, 500, 1),
(13, 'sandal', 3, '13000', 'Sandal Swalow untuk perempuan', '14.jpg', 50, 'GR', 0, 499, 1),
(14, 'SKM FF KNTL MNS', 4, '6700', 'Susu kenatal manis', '111.jpg', 200, 'GR', NULL, 500, 1),
(15, 'LAURIER DBL CMFRT 8\'P', 3, '4200', 'Pembalut', '16.jpg', 50, 'GR', NULL, 500, 1),
(16, 'DJINGGO', 6, '8200', 'Rokok Djinggo 10 S', '171.jpg', 20, 'GR', 0, 459, 1),
(17, 'ROTI AUCKLAND KOMBINASI', 4, '8000', 'Roti Auckland', '18.jpg', 250, 'GR', NULL, 499, 1),
(18, 'HELLO PANDA STRW', 4, '2600', 'Biskuit helo panda', '19.jpg', 25, 'GR', NULL, 500, 1),
(19, 'REGAL ROL', 4, '17000', 'Biskuit regal', '20.jpg', 250, 'GR', NULL, 500, 1),
(20, 'FAIR & LOVELY FOAM', 3, '2500', 'Untuk melembutkan wajah', '211.jpg', 9, 'GR', 0, 500, 1),
(21, 'ENERGEN VANILA', 2, '6300', 'Minuman penunda lapar', '22.jpg', 30, 'GR', NULL, 398, 1),
(22, 'KOROKU ORIGINAL', 4, '6000', 'Kuroku rasa original', '23.jpg', 70, 'GR', NULL, 499, 1),
(23, 'TARO NET POTATO', 4, '975', 'Makanan Ringan', '24.jpg', 9, 'GR', NULL, 400, 1),
(24, 'BUKU TULIS KIKY', 3, '36000', 'Buku Tulis kiki 38 lembar', '24.png', 38, 'GR', 0, 103, 1),
(25, 'BABY COUGH SYRUP', 2, '5700', 'obat panas untuk anak', '25.jpg', 60, 'ML', NULL, 250, 1),
(26, 'SOFTENER SK SB MRH 15M*6S', 3, '2500', 'Siftener Soklin', '26.jpeg', 15, 'ML', 0, 200, 1),
(27, 'EKONOMI LMN EL900K', 3, '4850', 'Sabun Cuci piring', '27.jpg', 690, 'GR', 0, 101, 1),
(28, 'BOOM DET MRH', 3, '4950', 'Sabun Cuci pakayan', '28.jpg', 400, 'GR', 0, 100, 1),
(29, 'SENDOK BEBEK', 3, '1900', 'Sendok Pelastik Bebek', '29.jpg', 20, 'GR', 0, 110, 1),
(30, 'EKONOMI PTH EP500K', 3, '1900', 'Sabun Cuci pakayan', '30.jpg', 300, 'GR', NULL, 489, 1),
(31, 'ROMA MALKIS KLP', 4, '5800', 'Biskuit kelapa', '311.jpg', 252, 'GR', NULL, 199, 1),
(32, 'CHAMP BEEF SOSIS', 4, '14999', 'Sosis Champ rasa sapi', '32.jpg', 150, 'GR', 0, 145, 1),
(33, 'SUNLIGHT LIME RF', 3, '4800', 'Sabun Cuci piring', '33.jpg', 220, 'ML', NULL, 499, 1),
(34, 'REJOICE 3IN1', 3, '21400', 'Sampo mandi', '34.jpg', 170, 'ML', 0, 110, 1),
(35, 'FRESCO KOPI CREAM', 2, '7900', 'Kopi susu kemasan kapal api', '35.jpg', 31, 'GR', NULL, 51, 1),
(36, 'AIRCUP BTL', 2, '1300', 'Air mineral kemasan Cup', '361.jpg', 600, 'ML', 0, 96, 1),
(37, 'WALLS POPULER CHO VAN', 2, '5000', 'Es cream segar', '37.jpg', 40, 'GR', 0, 232, 1),
(38, 'SHINZUI SOAP KIREI', 3, '3800', 'Sabun Mandi', '38.jpg', 90, 'GR', 0, 124, 1),
(39, 'SHINZUI SOAP MYORI', 1, '3800', 'Sabun mandi', '39.jpg', 90, 'GR', 0, 124, 1),
(40, 'PG FORMULA PROTEKSI', 3, '2900', 'Sikat gigi', '40.jpg', 75, 'GR', 0, 137, 1),
(41, 'GULA MERAH', 1, '6500', 'Gula merah aren', '41.jpg', 490, 'GR', 0, 194, 1),
(42, 'SAMBEL ULEG TRSI', 4, '12800', 'Sambal Trasi kemasan saset', '42.jpg', 20, 'GR', 0, 117, 1),
(43, 'SUSAN C.BUDS SPB', 1, '4900', 'Blazy Susan', '43.jpg', 525, 'GR', 0, 109, 1),
(44, 'TOLAK ANGIN CAIR ANK', 2, '1900', 'Obat masuk angin', '44.jpg', 10, 'ML', NULL, 173, 1),
(45, 'FLORIDINA ORG', 2, '2900', 'Minuman Segar', '45.jpg', 350, 'ML', NULL, 447, 1),
(46, 'JELLY BIG STIK', 4, '4000', 'Makanan Anak', '46.jpg', 30, 'GR', 0, 119, 1),
(47, 'DETTOL SP RE-ENZ', 1, '5600', 'Sabun Mandi', '47.jpg', 150, 'GR', 0, 118, 1),
(48, 'BENDERA CAIR CKLT', 1, '2500', 'Susu Coklat', '48.jpg', 115, 'ML', 0, 397, 0),
(49, 'SUN MARIE BISC BSR', 4, '11800', 'makanan untuk anak', '49.jpg', 150, 'GR', 2000, 487, 1),
(50, 'FRENCH FRIES', 4, '6100', 'Potato chip', '50.jpg', 68, 'GR', 0, 455, 1),
(96, 'kecap', 1, '5000', 'kecap bango sedap', '1111.jpg', 150, 'GR', NULL, 143, 1);

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
(1, '20210917QYDPLMP2', 96, 1, 1),
(2, '20210917QYDPLMP2', 48, 1, 1),
(3, '20210917QYDPLMP2', 45, 1, 1),
(4, '20210917YSBOJ7FM', 50, 1, 1),
(5, '20210917YSBOJ7FM', 44, 1, 1),
(6, '20210917YSBOJ7FM', 32, 1, 1),
(7, '20210917YSBOJ7FM', 49, 1, 1),
(8, '20210917IF49ZBEE', 4, 1, 1),
(9, '20210917NMQEB0UM', 9, 1, 1),
(10, '20210917NMQEB0UM', 21, 1, 1),
(11, '20210917NMQEB0UM', 35, 1, 1),
(12, '20210917FXC8L06P', 41, 1, 1),
(13, '20210917YTWKEYIS', 96, 1, 1),
(14, '20210917YTWKEYIS', 48, 2, 1),
(15, '20210917GRLHTOWD', 4, 1, 1),
(16, '20210917YMI9LGNH', 45, 2, 1),
(17, '20210917YMI9LGNH', 35, 2, 1),
(18, '20210917YMI9LGNH', 41, 2, 1),
(19, '20210917HOY2DB1K', 11, 1, 1),
(20, '20210917HOY2DB1K', 17, 1, 1),
(21, '20210917HOY2DB1K', 31, 1, 1),
(22, '20210917HOY2DB1K', 22, 1, 1),
(23, '202109176CQDSHNA', 28, 8, 1),
(24, '202109176CQDSHNA', 27, 1, 1),
(25, '202109176CQDSHNA', 30, 11, 1),
(26, '20210917LGCJDWDM', 3, 1, 1),
(27, '20210917LGCJDWDM', 7, 4, 1),
(28, '20210917LGCJDWDM', 37, 1, 1),
(29, '20210917HT1SAYV3', 42, 1, 1),
(30, '20210917HT1SAYV3', 32, 1, 1),
(31, '20210917HT1SAYV3', 36, 1, 1),
(32, '20210917HKWCRGBT', 38, 4, 1),
(33, '20210917HHMZBVU5', 36, 3, 1),
(34, '20210917VA4TELSV', 35, 1, 1),
(35, '20210917TQBDHVZM', 43, 1, 1),
(36, '20210917TQBDHVZM', 38, 1, 1),
(37, '20210917E30G2ZUZ', 39, 1, 1),
(38, '20210917E30G2ZUZ', 8, 1, 1),
(39, '20210917DMW8E1UU', 43, 1, 1),
(40, '20210917PDWOUZPR', 3, 1, 1),
(41, '20210917KDMGXYAP', 40, 1, 1),
(42, '20210917KDMGXYAP', 5, 1, 1),
(43, '20210917KMEFW1M9', 45, 1, 1),
(44, '20210917D50V3BDK', 3, 7, 1),
(45, '20210917JSVLEFRR', 42, 3, 1);

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
(7, 13, 2, 'heni', '2021-09-13', 'sangat bagus untuk bolu saya', NULL);

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
  `id_produk` int(11) DEFAULT NULL,
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
  `berat` bigint(255) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `id_produk`, `no_order`, `tgl_order`, `nama_pelanggan`, `no_tlp`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`, `catatan`) VALUES
(1, 3, NULL, '20210917QYDPLMP2', '2021-09-17', 'opik', '085741245636', '9', '211', 'Kuningan', '452157', 'tiki', 'REG', '3 Hari', 9000, NULL, 10400, 19400, 1, 'Grocery_Store_(2)4.png', 'opik', 'BRI', '123-456-654-78', 1, NULL, ''),
(2, 3, NULL, '20210917YSBOJ7FM', '2021-09-17', 'opik', '085741236542', '9', '211', 'Kuningan', '32712', 'tiki', 'REG', '3 Hari', 9000, NULL, 32799, 41799, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(3, 3, NULL, '20210917IF49ZBEE', '2021-09-17', 'opik', '085741236548', '9', '211', 'Kuningan', '45591', 'tiki', 'ECO', '4 Hari', 8000, NULL, 26400, 34400, 1, 'Grocery_Store_(2)3.png', 'opik', 'BRI', '123-456-654-78', 2, 'JNR324154', ''),
(4, 3, NULL, '20210917NMQEB0UM', '2021-09-17', 'opik', '085741236547', '9', '211', 'Kuningan', '452157', 'jne', 'CTC', '1-2 Hari', 7000, NULL, 19500, 26500, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(5, 3, NULL, '20210917FXC8L06P', '2021-09-17', 'opik', '085741236542', '9', '211', 'Kuningan', '12452', 'jne', 'CTCYES', '1-1 Hari', 9000, NULL, 6500, 15500, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(6, 2, NULL, '20210917YTWKEYIS', '2021-09-17', 'uud', '087412365897', '9', '211', 'Sindang barang', '45597', 'pos', 'Pos Instan Barang', '0 HARI Hari', 12000, NULL, 10000, 22000, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(7, 2, NULL, '20210917GRLHTOWD', '2021-09-17', 'uud', '087451236547', '9', '211', 'sindang barang', '452157', 'tiki', 'ECO', '4 Hari', 8000, NULL, 26400, 34400, 1, 'Helpdesk_System.png', 'uud', 'BRI', '123-456-654-78', 1, NULL, ''),
(8, 2, NULL, '20210917YMI9LGNH', '2021-09-17', 'uud', '087541236541', '9', '211', 'Sindang Barang', '45591', 'jne', 'CTC', '1-2 Hari', 14000, NULL, 34600, 48600, 0, NULL, NULL, NULL, NULL, 4, NULL, ''),
(9, 2, NULL, '20210917HOY2DB1K', '2021-09-17', 'uud', '087541236547', '9', '211', 'sindang barang', '452157', 'jne', 'CTC', '1-2 Hari', 7000, NULL, 24800, 31800, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(10, 2, NULL, '202109176CQDSHNA', '2021-09-17', 'uud', '087451236547', '9', '211', 'sindang barang', '452157', 'jne', 'CTC', '1-2 Hari', 49000, NULL, 65350, 114350, 1, 'Grocery_Store.png', 'uud', 'BRI', '123-456-654-78', 0, NULL, ''),
(11, 12, NULL, '20210917LGCJDWDM', '2021-09-17', 'muhyi', '083124579567', '9', '211', 'Kuningan', '45512', 'jne', 'CTC', '1-2 Hari', 7000, NULL, 28600, 35600, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(12, 12, NULL, '20210917HT1SAYV3', '2021-09-17', 'muhyi', '085746841230', '9', '252', 'Majalengka', '452157', 'jne', 'OKE', '3-6 Hari', 8000, NULL, 29099, 37099, 1, 'Screenshot_(31).png', 'muhyi', 'BRI', '123-456-654-78', 0, NULL, ''),
(13, 12, NULL, '20210917HKWCRGBT', '2021-09-17', 'muhyo', '087413524678', '9', '211', 'jalaksana', '452157', 'jne', 'CTC', '1-2 Hari', 7000, NULL, 15200, 22200, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(14, 12, NULL, '20210917HHMZBVU5', '2021-09-17', 'muhyi', '085746987124', '9', '211', 'Jalaksana', '452157', 'jne', 'CTC', '1-2 Hari', 14000, NULL, 3900, 17900, 0, NULL, NULL, NULL, NULL, 4, NULL, ''),
(15, 12, NULL, '20210917VA4TELSV', '2021-09-17', 'muhyi', '087451236547', '6', '151', 'Jakarta, Tanjung periuk, Hilir', '35470', 'jne', 'REG', '1-2 Hari', 13000, NULL, 7900, 20900, 1, 'Grocery_Store_(1).png', 'muhyi', 'BRI', '123-456-654-78', 1, NULL, ''),
(16, 8, NULL, '20210917TQBDHVZM', '2021-09-17', 'wulandari', '085741236547', '9', '211', 'darma', '35470', 'jne', 'CTC', '1-2 Hari', 7000, NULL, 8700, 15700, 1, 'Grocery_Store_(2)5.png', 'wulan', 'bni', '1234578658', 1, NULL, ''),
(17, 8, NULL, '20210917E30G2ZUZ', '2021-09-17', 'wulandari', '087451236547', '9', '211', 'darma', '455321', 'jne', 'CTC', '1-2 Hari', 7000, NULL, 20800, 27800, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(18, 8, NULL, '20210917DMW8E1UU', '2021-09-17', 'wulandari', '085742365874', '9', '211', 'darma', '452157', 'tiki', 'ECO', '4 Hari', 8000, NULL, 4900, 12900, 1, 'Screenshot_(6).png', 'wulan', 'bni', '123-456-654-78', 3, 'jne12345', ''),
(19, 8, NULL, '20210917PDWOUZPR', '2021-09-17', 'wulandari', '085741236547', '9', '211', 'Selajambe', '452157', 'jne', 'CTC', '1-2 Hari', 7000, NULL, 4400, 11400, 1, 'New_Wireframe_1.png', 'wulan', 'bni', '123-456-654-78', 0, NULL, ''),
(20, 8, NULL, '20210917KDMGXYAP', '2021-09-17', 'wulandari', '085741236547', '9', '211', 'darma', '45591', 'tiki', 'ECO', '4 Hari', 8000, NULL, 23600, 31600, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(21, 8, NULL, '20210917KMEFW1M9', '2021-09-17', 'wulandari', '085741236547', '9', '211', 'sindang barang', '452157', 'pos', 'Paket Kilat Khusus', '2 HARI Hari', 7000, NULL, 2900, 9900, 0, NULL, NULL, NULL, NULL, 0, NULL, ''),
(22, 3, NULL, '20210917D50V3BDK', '2021-09-17', 'opik', '085741245789', '6', '153', 'Jakarta, Tanjung periuk, Hilir', '35470', 'pos', 'Paket Kilat Khusus', '2 HARI Hari', 13000, NULL, 30800, 43800, 1, 'Grocery_Store_(2)6.png', 'opik', 'BRI', '123-456-654-78', 3, 'JNR324154', ''),
(23, 3, NULL, '20210917JSVLEFRR', '2021-09-17', 'opik', '085741236547', '6', '153', 'Jakarta, Tanjung periuk, Hilir', '35470', 'jne', 'OKE', '2-3 Hari', 12000, NULL, 38400, 50400, 0, NULL, NULL, NULL, NULL, 0, NULL, '');

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
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_riview`
--
ALTER TABLE `tbl_riview`
  MODIFY `id_riview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
