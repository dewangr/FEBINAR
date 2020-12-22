<?php
session_start();
include 'koneksi.php';
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong silahkan belanja terlebih dahulu')</script>";
    echo "<script>location='produkpage.php'</script>";
}?>
    <?php include 'navbar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .utama{
                margin-top:70px;
                margin-bottom:250px;
            }
    </style>
 	<link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>

<body>
	 <div class="container mt-5 utama">
	 <h3 style="margin-top:50px;">Keranjang Belanja Anda</h3>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; $total = 0;?>
                    <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah):?>
                        <!-- menampilkan produk yang sedang diperulangkan berdasarkan id produk -->
                    <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE pr_id='$id_produk'")?>
                    <?php $pecah = $ambil->fetch_assoc();?>
                    <?php $subtotal=$pecah['pr_harga']*$jumlah;?>
					<?php $total+=$subtotal;?>
                    <tr>
                        <th><?=$nomor?></th>
                        <td><?=$pecah['pr_nama']?></td>
                        <td>Rp.<?=number_format($pecah['pr_harga'])?></td>
                        <td><?=$jumlah?></td>
                        <td>Rp.<?=number_format($subtotal)?></td>
                        <td><a href="hapuskeranjang.php?id=<?=$id_produk?>">  <i class="fa fa-trash-o" style="font-size:24px;color:red"></i></a></td>
                    </tr>
                    <?php $nomor++;?>
                    <?php endforeach ?>
					
					
                </tbody>
            </table>
			<?php
					echo"<h3>Total Belanja Anda  Rp $total</h3>"
					?>
            <div class="tombol pull-right mt-3">
                <a href="mainmenu.php" class="btn btn-secondary ">Lanjutkan Belanja</a>
                <a href="checkout.php?total=<?=$total?>" class="btn btn-primary ">Checkout</a>
            </div>
        </div>
</body>
