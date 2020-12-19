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
        <h3>List User Terdaftar</h3>
    </div>
        <table class="table table-hover table-condensed">
            <tr>
                <th>No.</th>
				<th>Username</th>
				<th>Email</th>
				<th>Level User</th>
			</tr>
        <?php 
            $cek = mysqli_query($koneksi,"SELECT * FROM data_user WHERE keterangan_acc = 'acc'");
            $no=1;
            while($data = mysqli_fetch_assoc($cek)){ ?>
            <tr>
                <td><?= $no ?></td>
				<td><?= $data['username_user'] ?></td>
				<td><?= $data['email_user'] ?></td>
				<td><?= $data['level_user'] ?></td>
			</tr>
            <?php $no++; 
            }?>
        </table>       
</div>