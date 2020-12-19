<?php 
    session_start();
    require_once("../koneksi.php");
    if(!isset($_SESSION['username'])){
        echo "<script>alert('Anda harus login terlebih dahulu');</script>";
        header('location:login-admin.php');
    }
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Febinar Administrator</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<div class="container-fluid">
    <div class="title">
        <h3>List Produk Tersedia</h3>
    </div>
        <table class="table table-hover table-condensed">
            <tr>
                <th>No.</th>
                <th>Kategori</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Tanggal Pelaksanaan</th>
                <th>Penjual</th>
                <th>Gambar</th>
                <th>Aksi</th>
			</tr>
        <?php 
            $cek = mysqli_query($koneksi,"SELECT * FROM produk");
            $no=1;
            while($data = mysqli_fetch_assoc($cek)){ ?>
            <tr>
                <td><?= $no ?></td>
				<td><?= $data['pr_kategori'] ?></td>
				<td><?= $data['pr_nama'] ?></td>
				<td><?= $data['pr_harga'] ?></td>
				<td><?= $data['pr_waktu'] ?></td>
				<td><?= $data['username_seller'] ?></td>
				<td><?= $data['pr_gambar'] ?></td>
                <td><button class="btn btn-danger" type="submit"><a style="color:white;" href="deleteproduk.php?pr_id=<?php echo $data['pr_id']?>"><span><i class="fa fa-times"></i></span></a></button></td>
			</tr>
            <?php $no++; 
            }?>
        </table>       
</div>