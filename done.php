
<?php include 'navbar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<body>
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container mt-5 ">

				<h2><i class="ico-usd ico-white"></i>Checkout Keranjang</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container pt-2">

			<!-- start: Table -->
                <div class="table-responsive">
                <div class="title"><h3>Checkout Selesai</h3></div>
                <div class="hero-unit">Selamat Anda telah berhasil checkout,</div>
                <div class="hero-unit">
	<?php	$id=$_GET['id_pembelian'];
			
			$cek=mysqli_query($koneksi, "SELECT * FROM listpembelian JOIN bank ON listpembelian.id_bank = bank.id_bank WHERE listpembelian.id_pembelian = $id");
			while($byr=mysqli_fetch_assoc($cek)){
				session_destroy();
				echo 'Terima kasih Anda sudah berbelanja di Toko Online kami dan berikut ini adalah data yang perlu Anda catat.';
				echo '<p> </p>';
				echo '<p>Total biaya untuk pembelian Produk adalah Rp. '.$byr['total_harga'].',- dan biaya bisa di kirimkan melalui Rekening:'.$byr['nomer_rek']. '</p>';
				echo '<p>Nama Lengkap : '.$byr['nama_pembeli'].'<br>';
                echo 'Email : '.$byr['email_pembeli'].'<br>';
				echo 'No Telepon : '.$byr['tlp_pembeli'].'<br>';
				echo 'No Rekening : '.$byr['rek'].'<br>';
				echo 'Nama Rekening : '.$byr['nama_rek'].'<br>';
				echo 'Bank : '.$byr['nama_bank'].'<br>';	 
                echo 'Total Belanja : Rp. '.$byr['total_harga'].',-</p>';
			}?>
        </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			
</body>
</html>
<?php include 'footer.php';?>