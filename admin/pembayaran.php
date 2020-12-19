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
        <h3>List Pembayaran di Validasi</h3>
    </div>
        <table class="table table-hover table-condensed">
            <tr>
                <th>No.</th>
                <th>Tanggal Pembelian</th>
                <th>Nama Pembeli</th>
				<th>Email</th>
                <th>Telepon</th>
				<th>No Rekening</th>
				<th>Nama Rekening</th>
				<th>Bank</th>
                <th>Opsi</th>

			</tr>
        <?php 
            $cek = mysqli_query($koneksi,"SELECT * FROM listpembelian JOIN bank ON listpembelian.id_bank = bank.id_bank WHERE status = 'pending'");
            $no=1;
            while($data = mysqli_fetch_assoc($cek)){ ?>
            <tr>
                <td><?= $no ?></td>
				<td><?= $data['tanggal_pembelian'] ?></td>
				<td><?= $data['nama_pembeli'] ?></td>
				<td><?= $data['email_pembeli'] ?></td>
				<td><?= $data['tlp_pembeli'] ?></td>
				<td><?= $data['rek'] ?></td>
				<td><?= $data['nama_rek'] ?></td>
                <td><?= $data['nama_bank'] ?></td>
				<td><button class="btn btn-info" type="submit"><a style="color:white;" href="accbeli.php?id_pembelian=<?php echo $data['id_pembelian']?>"><span><i class="fa fa-check"></i></span></a></button></td>
			</tr>
            <?php $no++; 
            }?>
        </table>       
</div>