-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2023 pada 03.41
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
-- Database: `gress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_terbit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `kategoriKODE` char(5) NOT NULL,
  `destinasiKET` varchar(2000) NOT NULL,
  `destinasiFOTO` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `kategoriKODE`, `destinasiKET`, `destinasiFOTO`) VALUES
('3I9U', 'haechan', '2024', 'The main train station is the northern heart of Amsterdam. In my opinion, it’s one of the most photogenic buildings in the city. Tip: a long lens here will let you capture the architecture at its best.', ''),
('D001', 'keindahan alam', 'K001', 'The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content', 'fotob2.jpg'),
('E004', 'Michael Gaillard', 't001', '“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”', 'fotob5.jpg'),
('G002', 'keindahan laut', 'K102', 'The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.', 'fotob3.jpg'),
('G008', 'SEVENTEEN', '3033', 'Seventeen is a South Korean boy band formed by Pledis Entertainment. The group consists of thirteen members: S.Coups, Jeonghan, Joshua, Jun, Hoshi, Wonwoo, Woozi, DK, Mingyu, The8, Seungkwan, Vernon, and Dino. ', 'fotob8.jpg'),
('GG25', 'AMSTERDAM', ' KK02', 'The main train station is the northern heart of Amsterdam. In my opinion, it’s one of the most photogenic buildings in the city. Tip: a long lens here will let you capture the architecture at its best.', 'fotob7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `destinasitravel`
--

CREATE TABLE `destinasitravel` (
  `id_destinasi` int(11) NOT NULL,
  `nama_destinasi` varchar(255) NOT NULL,
  `tujuan` text DEFAULT NULL,
  `kategori` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `destinasitravel`
--

INSERT INTO `destinasitravel` (`id_destinasi`, `nama_destinasi`, `tujuan`, `kategori`) VALUES
(220, 'batak toba\r\n', 'Cinetourism', 'clas'),
(224, 'bali', 'Staycation', 'vip'),
(225, 'paris', 'Array', 'vip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foods`
--

CREATE TABLE `foods` (
  `id_resto` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `imageUrl` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foods`
--

INSERT INTO `foods` (`id_resto`, `title`, `description`, `imageUrl`, `category`) VALUES
(1, 'desserts', 'Hidangan penutup ', 'des3.jpg', 'Category 1'),
(2, 'Main dish', 'hidangan utama', 'main4.jpg', 'Category 2'),
(3, 'drink', 'main menu', 'mum1.jpg', 'Category 3'),
(4, 'appetizers', 'makanan pembuka', 'main2.jpg', 'Category 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grasyahotel`
--

CREATE TABLE `grasyahotel` (
  `hotel0160` char(4) NOT NULL,
  `hotelNAMA` char(160) NOT NULL,
  `hotelALAMAT` varchar(250) NOT NULL,
  `kategori0160` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `grasyahotel`
--

INSERT INTO `grasyahotel` (`hotel0160`, `hotelNAMA`, `hotelALAMAT`, `kategori0160`) VALUES
('127', 'BEBE', 'lagDFJ', '22'),
('2003', 'sicahotel', 'pasaribu', 'j25'),
('765', 'kesyahotel', 'sihite', 'k24'),
('882', 'betrixhotel', 'singamangaraja', 'b88'),
('thby', 'fbht', 'fffg', '333'),
('126', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haechan`
--

CREATE TABLE `haechan` (
  `nama` int(4) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `makanan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `harga_malam` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('		 t', 'pulau Simalala', 'weway', 'panta'),
('', '', '', ''),
('3033', 'seventeen', 'Seventeen (Korean: ???; stylized in all caps or as SVT) is a South Korean boy band formed by Pledis Entertainment. The group consists of thirteen members: S.Coups, Jeonghan, Joshua, Jun, Hoshi, Wonwoo, Woozi, DK, Mingyu, The8, Seungkwan, Vernon, and Dino. Seventeen has conquered a large audience since its debut and has grown into an internationally recognized K-Pop group with signature music and performances.', 'carat24'),
('K001', 'destinasi', 'Sebuah adat istiadat masyarakat yang dilestarikan', 'Buku Sejarah'),
('K102', 'Sejarah', 'Peninggalan masa kerajaan ', 'Prasasti'),
('KK01', 'Labuhan Bajo', 'Labuan Bajo is a fishing town located at the western end of the large island of Flores in the East Nusa Tenggara province of Indonesia. It is the capital of the West Manggarai Regency, one of the eight regencies which are the major administrative divisions of Flores.', 'lalala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualanoleholeh`
--

CREATE TABLE `penjualanoleholeh` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` char(25) NOT NULL,
  `pesanan` varchar(300) NOT NULL,
  `produk` char(255) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualanoleholeh`
--

INSERT INTO `penjualanoleholeh` (`id_pembeli`, `nama_pembeli`, `pesanan`, `produk`, `lokasi`, `gambar`) VALUES
(1, 'Mingyu\'s favorite', 'Telur Gabus Keju', '', 'South Korea ', 'kue4.jpg'),
(4, 'Haechan\'s favorite', 'Kue Semprong', '', 'my heart', 'kue5.jpg'),
(44, 'Joshua\'s favorite', 'Tape Uli', '', 'my soulmate', 'kue6.jpeg'),
(231, 'Johnny\'s favorite', 'Putu Manyum', '', 'half of my life', 'kue.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE `pesawat` (
  `id_pesawat` int(11) NOT NULL,
  `maskapai` varchar(255) NOT NULL,
  `rute` varchar(255) DEFAULT NULL,
  `harga_tiket` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesonajawa`
--

CREATE TABLE `pesonajawa` (
  `grasya_id` varchar(50) NOT NULL,
  `grasya_kota` varchar(50) NOT NULL,
  `kategoriKODE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesonajawa`
--

INSERT INTO `pesonajawa` (`grasya_id`, `grasya_kota`, `kategoriKODE`) VALUES
('8431', 'kota malang', 0),
('KKO3', 'lampung', 2004);

-- --------------------------------------------------------

--
-- Struktur dari tabel `photodestinasi`
--

CREATE TABLE `photodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(120) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `photodestinasi`
--

INSERT INTO `photodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`) VALUES
('009', 'little cow', 'a1.jpg', ''),
('3045', 'sugaricandy', 'a2.jpg', ''),
('6590', 'joshua', 'a3.jpg', ''),
('F586', 'So Jung-Hwan', 'a4.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `restaurant`
--

CREATE TABLE `restaurant` (
  `pelanggan_id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `jumlah` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `restaurant`
--

INSERT INTO `restaurant` (`pelanggan_id`, `nama_menu`, `category`, `description`, `price`, `images`, `jumlah`) VALUES
(2, 'chocco cake', 'Dessert', 'full toping', 54000.00, '../images/makan4_.jpg', ''),
(3, 'Drink sodac', 'Drink', 'cool,ice', 17000.00, '../images/minum1.jpg', ''),
(6, 'indianfood', 'Main Dish', '-', 76000.00, '../images/des4.jpg', ''),
(21312313, 'sushi', 'Main Dish', 'segar', 17000.00, '../images/aparizer1.jpg', ''),
(21312314, 'full korean food', 'Appetizer', 'kering,renyah,segar', 36000.00, '../images/makan1.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shine`
--

CREATE TABLE `shine` (
  `id_shine` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `shine`
--

INSERT INTO `shine` (`id_shine`, `nama`, `gambar`) VALUES
(1, 'japan', 'jap5.jpg'),
(2, 'japan', 'jap2.jpg'),
(3, 'japan', 'jap3.jpg'),
(4, 'japan', 'jap4.jpg'),
(5, 'amsterdam', 'am1.jpg'),
(6, 'amsterdam', 'am2.jpg'),
(7, 'amsterdam', 'am3.jpg'),
(8, 'amsterdam', 'am4.jpg'),
(9, 'paris', 'par1.jpg'),
(10, 'paris', 'par2.jpg'),
(11, 'paris', 'par3.jpg'),
(12, 'paris', 'par4.jpg'),
(13, 'korea', 'kor1.jpg'),
(14, 'korea', 'kor2.jpg'),
(15, 'korea', 'kor3.jpg'),
(16, 'korea', 'kor4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_amsterdam`
--

CREATE TABLE `tempat_amsterdam` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_button` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tempat_amsterdam`
--

INSERT INTO `tempat_amsterdam` (`id`, `nama_tempat`, `deskripsi`, `gambar`, `link_button`) VALUES
(1, 'cow house amsterdam', 'Amstelpark is one of the two most popular parks in Amsterdam. There are lots of things you can do in this park starting from a play area for children, cafes, restaurants, galleries and mini-golf. This green park area is very suitable for relaxing or jogging.', '../images/wq1.jpg', '#!'),
(2, 'PICNIC IN AMSTERDAM', 'Big and probably busy, yet also very fun! The great thing about the Vondelpark is that there is so much to see. Just watch everyone around you and enjoy your long summer night comfortable, safe, calm and peaceful.', '../images/wq2.jpg', '#!'),
(3, 'TULIP PINK', 'Pink Tulip Flowers Symbolize appreciation and good wishes. In the Netherlands, at every sporting event, the flower necklace given to the winner is a series of pink tulips, as an expression of appreciation for the victory that has been achieved.', '../images/wq3.jpg', '#!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiketting`
--

CREATE TABLE `tiketting` (
  `namaTIKET` varchar(60) NOT NULL,
  `kategoriTIKET` varchar(25) NOT NULL,
  `JumlahTIKET` int(200) NOT NULL,
  `tanggalTIKET` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tiketting`
--

INSERT INTO `tiketting` (`namaTIKET`, `kategoriTIKET`, `JumlahTIKET`, `tanggalTIKET`) VALUES
('be the sun', 'row 1', 2, 25),
('jesika poerbax', 'row 1', 8, 4),
('the unity', 'VIP', 1, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `travel_destinations`
--

CREATE TABLE `travel_destinations` (
  `id_travel` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `travel_destinations`
--

INSERT INTO `travel_destinations` (`id_travel`, `category`, `image`, `description`) VALUES
(1, 'Flocation', '../images/lala1.jpg', 'Deskripsi destinasi Flocation.'),
(2, 'Cinetourism', '../images/lala3.jpg', 'Deskripsi destinasi Cinetourism.'),
(3, 'Digital Detox', '../images/lala4.jpg', 'Deskripsi destinasi Digital Detox.'),
(4, 'Staycation', '../images/lala2.jpg', 'Deskripsi destinasi Staycation.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('002', 'gress', 'geyesmunthe@gmail.com', '202cb962ac59075b964b07152d234b70'),
('U001', 'wasino', 'wwasino@yahoo.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indeks untuk tabel `destinasitravel`
--
ALTER TABLE `destinasitravel`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indeks untuk tabel `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id_resto`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `penjualanoleholeh`
--
ALTER TABLE `penjualanoleholeh`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id_pesawat`);

--
-- Indeks untuk tabel `pesonajawa`
--
ALTER TABLE `pesonajawa`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indeks untuk tabel `photodestinasi`
--
ALTER TABLE `photodestinasi`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `shine`
--
ALTER TABLE `shine`
  ADD PRIMARY KEY (`id_shine`);

--
-- Indeks untuk tabel `tempat_amsterdam`
--
ALTER TABLE `tempat_amsterdam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiketting`
--
ALTER TABLE `tiketting`
  ADD PRIMARY KEY (`namaTIKET`);

--
-- Indeks untuk tabel `travel_destinations`
--
ALTER TABLE `travel_destinations`
  ADD PRIMARY KEY (`id_travel`);

--
-- Indeks untuk tabel `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `destinasitravel`
--
ALTER TABLE `destinasitravel`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT untuk tabel `foods`
--
ALTER TABLE `foods`
  MODIFY `id_resto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id_pesawat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21312318;

--
-- AUTO_INCREMENT untuk tabel `shine`
--
ALTER TABLE `shine`
  MODIFY `id_shine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tempat_amsterdam`
--
ALTER TABLE `tempat_amsterdam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `travel_destinations`
--
ALTER TABLE `travel_destinations`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
