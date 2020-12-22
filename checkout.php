<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu');
      location='login.php'</script>";
}
if(!isset($_SESSION['keranjang']) OR (empty($_SESSION['keranjang']))){
    echo "<script>alert('Anda Harus Belanja Terlebih Dahulu')</script>";
    echo "<script>location='mainmenu.php'</script>"; }


?>

<?php include 'navbar.php';?>

<?php 
    $query = mysqli_query($koneksi,"SELECT max(id_pembelian) as kodemax FROM listpembelian");
    $cek= mysqli_fetch_array($cek);
    $kode= $cek['kodemax'];
    $urutan=(int) substr($kode);
    $urutan++;
    $kodebrg = $urutan;

    if(isset($_POST["finish"])){
      $id = $_POST['id'];
      $tanggal = $_POST['tanggal'];
      $totalharga = $_POST['total'];
      $nama = $_POST['nm_usr'];
      $email = $_POST['email_usr'];
      $tlp = $_POST['tlp'];
      $rek = $_POST['rek'];
      $nmrek = $_POST['nmrek'];
      $bank = $_POST['bank'];
      
      mysqli_query($koneksi, "INSERT INTO listpembelian (`tanggal_pembelian`, `total_harga`, `nama_pembeli`, `email_pembeli`, `tlp_pembeli`, `rek`, `nama_rek`, `id_bank`, `status`) 
              VALUES ('$tanggal', '$totalharga', '$nama','$email','$tlp', '$rek', '$nmrek', '$bank', 'pending')");

      echo "<script>alert('Pembelian berhasil dilakukan. Silahkan lanjutkan ke pembayaran');
          location='done.php?id_pembelian=$id';</script>";

    }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
      .utama{
            margin-top:50px;
            margin-bottom:250px;
        }
    </style>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<body>
    <div id="wrapper">
				
		<!-- start: Container -->
		<div class="container utama">

			<!-- start: Table -->
                <div class="table-responsive">
                <div class="title"><h3>Form Checkout</h3></div>
                <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
                <?php $tanggal = date("j F Y");?>
                <div>Tanggal: <?php echo $tanggal ?></div>
                <div class="hero-unit">Total Belanja Anda Rp. <?php echo abs((int)$_GET['total']); ?>,-</div> 
  <form id="form" action="" method="POST">
    <table class="table table-condensed">
    <input type="hidden" name="tanggal" value="<?= $tanggal?>">
    <input type="hidden" name="id" value="<?= $kodebrg?>">
    <input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
    <tr>
      <div class="form-group">
        <td><label for="nm_usr">Nama</label></td>
        <td><input class="form-control required" name="nm_usr" type="text" minlength="6" id="nm_usr" size="100" style="border" required /></td>
        </div>
      </tr>
      <tr>
      <div class="form-group">
        <td><label for="email_usr">Email</label></td>
        <td><input class="form-control email required" name="email_usr" type="text" id="email_usr" required /></td>
      </div>
      </tr>
      <tr>
      <div class="form-group">
        <td><label for="tlp">No telepon</label></td>
        <td><input class="form-control required number" name="tlp" type="text" minlength="12" id="tlp" required /></td>
      </div>
      </tr>
      <tr>
      <div class="form-group">
        <td><label for="rek">No Rekening</label></td>
        <td><input class="form-control required number" name="rek" type="text" minlength="12" id="rek" required /></td>
      </div>
      </tr>
      <tr>
      <div class="form-group">
        <td><label for="nmrek">Nama Rekening</label></td>
        <td><input class="form-control required" name="nmrek" type="text" minlength="6" id="nmrek" required/></td>
      </div>
      </tr>
      <tr>
      <div class="form-group">
        <td><label for="bank">Bank</label></td>
        <td><select name="bank" class="form-control required" >
        <option></option>
        <?php
        $cek = mysqli_query($koneksi, "SELECT * FROM bank");
                while($bank = mysqli_fetch_assoc($cek)){ ?>
                        <option value="<?= $bank['id_bank'] ?>"><?= $bank['nama_bank'] ?></option>
                <?php } ?>
        </select>
        </td>
      </div>
      </tr>
      <tr>
      <td></td>
        <td><input type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
        </tr>
    </table>
    </form>
  </div>
  
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->	
</body>
<?php include 'footer.php';?>
