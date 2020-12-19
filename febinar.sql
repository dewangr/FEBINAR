-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 09:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `febinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `nomer_rek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `nomer_rek`) VALUES
(1, 'Mandiri', '11111111111111'),
(2, 'BNI', '2222222222222'),
(3, 'BCA', '3333333333333'),
(4, 'BRI', '444444444444');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(15) NOT NULL,
  `password_user` varchar(300) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  `keterangan_acc` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `username_user`, `password_user`, `email_user`, `level_user`, `keterangan_acc`) VALUES
(23, 'penjual', '$2y$10$HG1laYVgbtAN7P1XdNq.pegJw1i.0bYdXqk39jUPA/E9iiG2RZqCO', 'penjual@gmail.com', 'provider', 'acc'),
(24, 'pembeli', '$2y$10$3Z8WW96Rd3S3OmmCu.MM0eYYECIbJD0ZiDdG.jA6/4TDUrLrGYva6', 'pembeli@gmail.com', 'seeker', 'acc'),
(25, 'penjual2', '$2y$10$dcUDJAzrrDToiXGd9l6xx.aoC5BaragLOLCpTlEljCdpQbz2r990e', 'penjual2@gmail.com', 'provider', 'acc'),
(26, 'penjual3', '$2y$10$oPo6OAIgxBOGh8lawzFIDOOlUvApPhD4Na3pvhZXbKm3JQW16CeqG', 'penjual3@gmail.com', 'provider', 'acc'),
(27, 'penjual4', '$2y$10$x32QyuMewk8R3OGj2TlNQOXnMFu.y87.1WaZENgTPVoShcDe4t3.e', 'penjual4@gmail.com', 'provider', 'non');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(2, 'Science'),
(3, 'Kesehatan'),
(4, 'Bisnis'),
(5, 'Psikologi'),
(6, 'Motivasi'),
(7, 'Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `listpembelian`
--

CREATE TABLE `listpembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tanggal_pembelian` varchar(20) NOT NULL,
  `total_harga` varchar(8) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `email_pembeli` varchar(30) NOT NULL,
  `tlp_pembeli` varchar(12) NOT NULL,
  `rek` varchar(15) NOT NULL,
  `nama_rek` varchar(30) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listpembelian`
--

INSERT INTO `listpembelian` (`id_pembelian`, `tanggal_pembelian`, `total_harga`, `nama_pembeli`, `email_pembeli`, `tlp_pembeli`, `rek`, `nama_rek`, `id_bank`, `status`) VALUES
(1, '19 December 2020', '50000', 'I Dewa Ngurah Tri Hendrawan', 'dewahendrawan99@gmail.com', '083114104070', '1234567890123', 'I Dewa Ngurah Tri Hendrawan', 1, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'joshua', 'joshua123'),
(2, 'ngurah', 'ngurah123'),
(3, 'bayu', 'bayu123');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `pr_id` int(10) NOT NULL,
  `pr_nama` varchar(255) NOT NULL,
  `pr_harga` int(20) NOT NULL,
  `pr_gambar` varchar(100) NOT NULL,
  `pr_deskripsi` varchar(5000) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `pr_tema` varchar(100) NOT NULL,
  `pr_waktu` varchar(100) NOT NULL,
  `pr_tempat` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`pr_id`, `pr_nama`, `pr_harga`, `pr_gambar`, `pr_deskripsi`, `id_kategori`, `pr_tema`, `pr_waktu`, `pr_tempat`, `id_user`) VALUES
(2, 'Webinar Kewirausahaan', 150000, 'contoh3.jpeg', 'Webinar Wirausaha sangat mantap', 4, 'Wirausaha Mantap', '10-13 Desember 2020', 'Webex Meeting', 23),
(5, 'Fintech Literacy Acceleration Virtual Roadshow', 50000, 'tech1.jpg', 'Hola!\r\nAdanya pandemi membuat sektor ekonomi ikut menurun. Untuk mengembalikannya perlu peran seluruh pihak, termasuk sektor industri keuangan dengan memanfaatkan teknologi yaitu fintech.\r\n\r\nUntuk itu Equila Corp menghadirkan Zoominar dengan tema:\r\n\r\n*\"Dunia P2P Lending dan Dunia Keuangan Setelah New Normal, serta Berbagi Kesempatan di Dalamnyaâ€*\r\n\r\nHari, Tanggal: Kamis, 17 Desember 2020\r\nPukul : 13.00 WIB-Selesai\r\nTempat : Zoom App\r\n\r\nFasilitas berupa:\r\n*E-Certificate* bagi yang absensi saat acara\r\n*Doorprize total 1 Jt* untuk penanya dan peserta beruntung\r\n\r\nDaftar sekarang!\r\n\r\nNB: *Kuota Peserta Terbatas!*\r\n*TERBUKA UNTUK UMUM*\r\n\r\nCP: 081476650007 (WA Only)\r\nPresented By : KFund, Indosaku, PinjamDuit, Edufund, Crowdo\r\nOrganized By Equila Corp\r\n', 1, 'Dunia P2P Lending dan Dunia Keuangan Setelah New Normal', '17 Desember 2020', 'Zoom Meeting', 23),
(7, 'MAB Talks', 0, 'mab.jpg', 'Bagi mahasiswa mencari perkerjaan pertama setelah lulus kuliah bukanlah hal yang mudah. Setiap sarjana yang baru lulus pastinya berharap agar bidang studi yang telah ditekuni menjadi pedoman bagi karier mereka selanjutnya.\r\n\r\nNamun, tidak semua mahasiswa yang lulus bekerja sesuai dengan apa yang dipelajari saat kuliah. Keadaan ini memaksa mereka untuk terjun ke bidang pekerjaan yang tidak sesuai ekspektasinya.\r\n\r\nKeluar dari zona nyaman bukan berarti keputusan yang salah. Banyak mahasiswa yang baru lulus dan menetapkan pilihan untuk kerja di bidang lain mendapatkan banyak pelajaran baru, pengalaman kerja yang tak diduga dan pengetahuan tentang diri lebih dalam lagi.\r\n\r\nLalu bagaimana cara mempertimbangkan perkerjaan pertamamu?\r\nYayasan Mata Air Biru proudly present:\r\nMAB Talks edisi kali ini bertemakan “Finding Purpose Between College and Your First Job”\r\nMenghadirkan pembicara yang sukses di bidangnya masing-masing:\r\n1. Ir. Cindar Hari Prabowo, Ketua Umum ILUNI FTUI, Owner Kamata Group\r\n2. Ir. Chairul Hudaya, ST., M.Emg..,Ph.D.,IPM, Rektor Univeritas Teknologi Sumbawa\r\n3. Ghofar Rozaq Nazila, ST, CEO Relife Property.\r\n\r\nPelaksanaan :\r\nSabtu, 19 Desember 2020\r\nPukul : 19.30-21.30 WIB\r\n\r\nLink utk Donasi Beasiswa Pendidikan utk Anak Bangsa : kitabisa.com/beasiswamabftui\r\n\r\nKegiatan akan dilaksanakan secara virtual melalui platform Zoom Meeting dengan kapasitas 300 serta tautan ruang zoom yang akan dibagikan selambat-lambatnya H-1 acara.\r\n\r\nPastikan kalian tidak ketinggalan ya!\r\nNarahubung : Febby Damayanti (WA : 089503629664)\r\nAtau dm ke @beasiswamab\r\n', 6, '“Finding Purpose Between College and Your First Job”', '19 Desember 2020', 'Zoom Meetings', 25),
(8, 'Kopi Tirto: Secangkir Kopi Merawat Bumi', 0, 'kopi.jpg', 'Pecinta kopi wajib menyimak! ?\r\n\r\nTahukah Sahabat bahwa budidaya kopi juga merupakan upaya konservasi yang dapat menjaga keberlanjutan air dan menyejahterakan petani?\r\n\r\nMemperkenalkan Kopi Tirto, sebuah merek dagang untuk kopi yang diproduksi oleh para petani dampingan Danone-AQUA di Jempanang Badung-Bali, Wonosobo-Jawa Tengah, Pandaan-Jawa Timur, dan Tanggamus-Bandar Lampung. Nah, Kopi Tirto ini dibudidayakan dengan sistem agroforestri ramah lingkungan yang dilengkapi dengan pembuatan rorak, sehingga membantu lebih banyak air hujan terserap ke dalam tanah lho!\r\n\r\nDanone-AQUA bersama dengan Nirudaya, mitra LSM, mengajak Sahabat mendalami lebih jauh praktik ramah lingkungan yang juga dapat membantu menyejahterakan petani dalam webinar bertajuk \"Kopi Tirto: Secangkir Kopi Merawat Bumi\". Catat waktu pelaksanaannya ya!\r\n\r\n?? Jumat, 18 Desember 2020\r\n? 14.00 - 16.00 WIB\r\n? Disiarkan langsung di channel YouTube AQUA Lestari\r\n\r\nJadi, jangan sampai ketinggalan webinar bermanfaat ini ya, Sahabat! Yuk subscribe ke channel YouTube AQUA Lestari dari sekarang!\r\n', 4, 'Kopi Konservasi untuk Menjaga Keberlanjutan Air dan Menyejahterakan Petani', '18 Desember 2020', 'Youtube: AQUA Lestari', 26),
(9, 'WEBINAR UKM & INVESTASI', 0, 'ukm.jpg', 'Ayo bergabung bersama kami dalam free webinar dengan topik \"PELUANG BISNIS UKM DITENGAH COVID-19\"??\r\n??\r\nKesulitan seringkali membuat kita tidak bisa melihat peluang yang ada, karena fokus hanya melihat kesulitan.??\r\n??\r\nPadahal di antara kesulitan sesungguhnya ada banyak peluang bisa PowerPeople dapatkan.??\r\n??\r\nChief Executive Officer (CEO) PowerCommerce.Asia @hadikuncoroo bersama Prof. Dr. @indrawanrully,MSi, @sandiuno @avi.aviliani dan @artobiantoro akan membantu PowerPeople untuk menangkap peluang dan memaksimalkan peluang di tengah pandemi COVID-19??\r\n??\r\nCatat tanggalnya!??\r\n16 DESEMBER 2020??\r\n??\r\nAyo segera daftar sebelum 12 Desember??\r\ndan lakukan langkah produktifmu sekarang!??\r\n??\r\nDaftarkan diri PowerPeople dengan format \' NAMA_ DAFTAR UKM \' melalui Whatsapp ke nomor:??\r\n??\r\n0817178968 (Nety)??\r\nAtau ??\r\n08121112959 (Tim SmartFM)??\r\n', 4, 'PELUANG BISNIS UKM DITENGAH COVID-19', '16 Desember 2020', 'Zoom Meeting', 26),
(10, 'WEBINAR KEENERGIAN', 0, 'energy.jpg', '[ENERGY COMPETITION 2020]\r\n\r\nHimpunan Mahasiswa Teknik Energi Politeknik Negeri Bandung proudly present\r\n\r\n?ENERGY COMPETITION 2020?\r\n\r\nIndonesia memiliki kekayaan energi terbarukan yang melimpah dan berpotensi besar dalam mengembangkan EBT. Energi Baru Terbarukan yang sudah ada saat ini memerlukan peningkatan dan inovasi dalam menghadapi konsumsi energi setiap tahunnya.\r\n\r\nUntuk itu, mari kita bersama-sama meningkatkan pengetahuan mengenai Energi Baru Terbarukan melalui rangkaian acara Webinar Nasional dan Essay Competition dengan tema \"Perkembangan dan Potensi Energi Baru Terbarukan (EBT) di Indonesia\"!\r\n\r\nWEBINAR NASIONAL ?\r\n\r\n\"Perkembangan dan Potensi Energi Baru Terbarukan (EBT) di Indonesia\"\r\n\r\nPemateri :\r\n? : Dr. Ir. Dadan Kusdiana, M.Sc (Direktur Jenderal Energi Baru Terbarukan dan Konservasi Energi Kementerian ESDM)\r\n? : Temmy Hanafi (AVP Technical Services ISS Indonesia & Alumni Teknik Konversi Energi Angkatan 1991)\r\n? : Afrizal Faisal Ali (Corporate Planning and Management Development PT. Pamapersada Nusantara (ASTRA Group) & Alumni Teknik Konversi Energi Angkatan 2010)\r\n\r\nSAVE THE DATE!?\r\n?? Sabtu, 19 Desember 2020\r\n? 09.00 - selesai\r\n? Zoom Cloud Meeting Apps\r\n\r\n??FASILITAS :\r\n- Free Entry!\r\n- E-Sertifikat\r\n- Ilmu yang bermanfaat\r\n', 2, 'Perkembangan dan Potensi Energi Baru Terbarukan (EBT) di Indonesia', '19 Desember 2020', 'Zoom Meeting', 25),
(11, 'Be a Great Programmer for Digital Era ', 0, 'programmer.jpg', '? GIVE AWAY RP. 400.000 + E-Certificate !!!\r\n\r\nKuota Terbatas ?!!\r\nPastikan kalian hadir di acara webinar kita\r\nDengan Tema:\r\n“BE A GREAT PROGRAMMER FOR DIGITAL ERA\"\r\n\r\nDalam rangka mengembangkan profesi Programmer / IT yang sangat dibutuhkan untuk karir masa depan. buat kalian para designer programmer mahasiswa atau yang masih SMA, yang ingin mengetahui karir seorang programmer atau yang masih bingung mau mencari pekerjaan apa yang berprospek bagus kedepan cocok banget untuk mengikuti webinar ini.\r\nSave The Date Yaa??\r\n\r\n?Selasa, 15 Desember 2020\r\n?16.00 WIB – Selesai\r\n??Via Zoom ( Link akan dibagikan lewat email / Whatsapp )\r\nNarasumber\r\n- Muhammad Zamroni (Programmer Ex. Front End Development Tiket.com )\r\n- Muhammad Nur Haddi (Programmer Mobile Engineer Altera)\r\n- Achmad Fikri Zulfikar (Head Of Wira Informatika Solution)\r\n\r\nSYARAT GIVE AWAY Rp. 400.000 :\r\n1. Follow Instagram @wis.bootcamp\r\n2. Mengikuti webinar sampai selesai\r\n3. Pengumaman pemenang akan di sampaikan setelah webinar selesai\r\n', 1, 'Be a Great Programmer for Digital Era ', '15 Desember 2020', 'Zoom Meeting', 25),
(12, 'Tarumanagara Medical Seminar 2020', 30, 'trauma.jpg', '?[OPEN REGISTRATION TMS 2020]?\r\n\r\nWound becomes a big problem if it is not handled properly, while the correct treatment reduces the risks of its complication.\r\n\r\nWe of course would want to prevent that and save our life. Want to know how? Let\'s find out !\r\n\r\nBEM FK UNTAR x DPM FK UNTAR × AMSA UNTAR PROUDLY PRESENT:\r\n?Tarumanagara Medical Seminar 2020: “Trauma Care : Same Problems with Different Solutions”?\r\n\r\nThe seminar will be held on:\r\n? : Saturday, December 19th, 2020\r\n? : 10.30 - End\r\n? : Zoom Meeting\r\n\r\nPrice List:\r\n?FK UNTAR Students: 25.000\r\n?Non - FK UNTAR Students: 30.000\r\n?Doctors: 40.000\r\n(Include certificate)\r\n-----------------------\r\nFor further info, you can contact us:\r\n(LINE messenger)nandaamellia93 (Nanda)\r\n081324240339\r\n(LINE messenger)Syaraufazahra (Aufa)\r\n081395325894\r\n------------------------\r\nAnd for the registration, please kindly fill this form\r\n?? http://bit.ly/RegistTMS2020\r\n\r\n??close registration: 16th December 2020 ??\r\n\r\nSee u there! Don’t forget to join as you may be the lucky winner who get our special doorprize! ??\r\n', 5, 'Trauma Care : Same Problems with Different Solutions', '19 Desember 2020', 'Zoom Meeting', 23),
(13, 'EVERIDEA WEBINAR SERIES', 0, 'leader.jpg', 'Munculnya COVID-19 telah menciptakan tantangan yang signifikan bagi para pemimpin di semua industri, salah satunya adalah industri kreatif. Pandemi ini membawa dampak yang buruk bagi industri kreatif karena terdapat efek domino terhadap dunia kreatif di seluruh dunia. Perspektif baru tentang masalah dari pendekatan kreatif dapat mengarah pada solusi baru. Contohnya melakukan konser virtual, kelas virtual, mapping from home, dan lainnya\r\n\r\nEveridea Education memiliki rangkaian webinar yang diadakan setiap sebulan sekali berkolaborasi dengan kampus-kampus di seluruh Indonesia. Untuk webinar ke-4 kami, kami ingin berbagi pengetahuan dan pembelajaran agar masyarakat dapat dapat memahami mengenai kepemimpinan di dunia kreatif\r\n\r\nDetail Acara:\r\n\r\nHari/Tanggal : Rabu, 16 Desember 2020\r\nWaktu : 13.00 - 14.30\r\nPlatform : Zoom & Youtube\r\n\r\nNarasumber:\r\n\r\n1. Adi Panuntun\r\nCEO & Creative Head Sembilan Matahari\r\n\r\n2. Yanuar Pratama Firdaus, IAI\r\nPrinciple of Aaksen Responsible Aarchitecture\r\n\r\n3. Dicky Sukmana\r\nCo- Founder & Creative Director PT. Panenmaya Digital\r\n\r\nCP: Everidea Edu:+62 812-9260-3504\r\n', 4, 'LEADERSHIP IN CREATIVE INDUSTRY ', '16 Desember 2020', 'Zoom % Youtube', 23),
(14, 'Facing The Truth About Business For Youth Generation', 0, 'mineur.jpg', 'Halo, Sobat Mineur ??\r\n\r\nSeperti yang kita ketahui, masih banyak Millenials yang berjiwa entrepreneur takut untuk memulai bisnis atau bahkan kehilangan semangat karena kesulitan untuk bertahan dalam menjalankan bisnisnya.\r\n\r\nMaka kami menghadirkan Webinar yang mengangkat tema kewirausahaan dengan judul “Facing The Truth About Business For Youth Generation” dengan harapan para Millenial yang berjiwa entrepreneur dapat lebih siap dalam menghadapi tantangan bisnis yang ada.\r\n\r\n? Sabtu, 19 Desember 2020\r\n? 09.30 - 12.00 WIB\r\n? Free + E-Certificate + Doorprize\r\n?Live Via ZOOM\r\n\r\nSpeakers :\r\n? Diva Velda\r\n(Millenial Entrepreneur owner “Oh My Gethuk\")\r\n? Diaz Adiyatnika\r\n(Millenial Entrepreneur owner Kedai Kopi “Kopinobis dan Lorongtemu“)\r\nNOTE: Pastikan alamat email terdaftar di aplikasi zoom meeting\r\n*WAJIB\r\n\r\nDON\'T FORGET TO REGISTER AND MARK THE DATE ?? SEE YOU ??\r\n\r\nContact Person :\r\nLine : jasminenmard (Jasmine)\r\nWhatsapp : 081374197421 (Gita)\r\n', 4, 'Enterpreneur', '19 Desember 2020', 'Zoom Meeting', 26),
(15, 'Zoominar', 0, 'fintech.jpg', 'Hola Balikpapan!\r\nAdanya pandemi membuat sektor ekonomi ikut menurun. Untuk mengembalikannya perlu peran seluruh pihak, termasuk sektor industri keuangan dengan memanfaatkan teknologi yaitu fintech.\r\n\r\nUntuk itu Equila Corp menghadirkan Zoominar dengan tema:\r\n\r\n*\"Dunia P2P Lending dan Dunia Keuangan Setelah New Normal, serta Berbagi Kesempatan di Dalamnya”*\r\n\r\nHari, Tanggal: Kamis, 17 Desember 2020\r\nPukul : 13.00 WIB-Selesai\r\nTempat : Zoom App\r\nHTM : _*GRATIS !!!*_\r\n\r\nFasilitas berupa:\r\n*E-Certificate* bagi yang absensi saat acara\r\n*Doorprize total 1 Jt* untuk penanya dan peserta beruntung\r\n\r\nNB: *Kuota Peserta Terbatas!*\r\n\r\nCP: 081476650007 (WA Only)\r\nPresented By : KFund, Indosaku, PinjamDuit, Edufund, Crowdo\r\nOrganized By Equila Corp\r\n', 4, 'Dunia P2P Lending dan Dunia Keuangan Setelah New Normal, serta Berbagi Kesempatan di Dalamnya', '17 Desember 2020', 'Zoom Meeting', 25);

-- --------------------------------------------------------

--
-- Table structure for table `validasi_seller`
--

CREATE TABLE `validasi_seller` (
  `no` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username_seller` varchar(15) NOT NULL,
  `nama_seller` varchar(100) NOT NULL,
  `alamat_seller` varchar(100) NOT NULL,
  `no_rek_seller` varchar(20) NOT NULL,
  `tlp_seller` char(12) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_dg_ktp` varchar(100) NOT NULL,
  `rekening` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_seller`
--

INSERT INTO `validasi_seller` (`no`, `id_user`, `username_seller`, `nama_seller`, `alamat_seller`, `no_rek_seller`, `tlp_seller`, `foto_ktp`, `foto_dg_ktp`, `rekening`) VALUES
(6, 23, 'penjual', 'penjual yang pertama', 'jln. penjual 1', '1111111111', '081111111111', 'himakom.png', 'MIPA.jpg', 'Logo-unud-baru.png'),
(7, 25, 'penjual2', 'penjual yang kedua', 'jln. penjual 2', '2222222222', '082222222222', 'himakom.png', 'mipantap.png', 'logo-unud-2018.png'),
(8, 26, 'penjual3', 'penjual yang ketiga', 'jln. penjual 3', '3333333333', '083333333333', 'himakom.png', 'MIPA.jpg', 'Logo-unud-baru.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `listpembelian`
--
ALTER TABLE `listpembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `validasi_seller`
--
ALTER TABLE `validasi_seller`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `listpembelian`
--
ALTER TABLE `listpembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `pr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `validasi_seller`
--
ALTER TABLE `validasi_seller`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listpembelian`
--
ALTER TABLE `listpembelian`
  ADD CONSTRAINT `listpembelian_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `validasi_seller`
--
ALTER TABLE `validasi_seller`
  ADD CONSTRAINT `validasi_seller_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `data_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
