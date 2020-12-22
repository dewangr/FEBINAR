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
        <h3>List Calon Penjual</h3>
    </div>
        <table class="table table-hover table-condensed">
            <tr>
                <th>No.</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No. Rekening</th>
				<th>Telepon</th>
				<th>KTP</th>
				<th>Foto dg KTP</th>
				<th>Foto Rekening</th>
				<th>Opsi</th>
			</tr>
        <?php 
            $cek = mysqli_query($koneksi,"SELECT u.id_user, u.username_user, u.level_user,v.* FROM data_user u, validasi_seller v 
                                            WHERE u.username_user = v.username_seller AND u.level_user = 'provider' AND u.keterangan_acc = 'non'");
            $no=1;
            while($data = mysqli_fetch_assoc($cek)){ ?>
            <tr>
                <td><?= $no ?></td>
				<td><?= $data['username_user'] ?></td>
				<td><?= $data['nama_seller'] ?></td>
				<td><?= $data['alamat_seller'] ?></td>
				<td><?= $data['no_rek_seller'] ?></td>
				<td><?= $data['tlp_seller'] ?></td>
				<td><img style="height:120px;" src="../data-foto-penjual/<?= $data['foto_ktp'] ?>" alt=""></td>
				<td><img style="height:120px;" src="../data-foto-penjual/<?= $data['foto_dg_ktp'] ?>" alt=""></td>
				<td><img style="height:120px;" src="../data-foto-penjual/<?= $data['rekening'] ?>" alt=""></td>
				<td><button class="btn btn-info" type="submit"><a style="color:white;" href="accept.php?username_seller=<?php echo $data['username_user']?>"><span><i class="fa fa-check"></i></span></a></button></td>
			</tr>
            <?php $no++; 
            }?>
        </table>       
</div>
