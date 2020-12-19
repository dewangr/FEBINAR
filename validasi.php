<?php include 'koneksi.php';?>
<?php 
$username=$_GET['username'];
    if( isset($_POST["kirim"])) {
        $username = $_POST['username'];
        $fullname = $_POST['name'];
        $alamat = $_POST['alamat'];
        $norek = $_POST['norek'];
        $tlp = $_POST['tlp'];
        $ktp = $_POST['ktp'];
        $dgktp = $_POST['dgktp'];
        $fotorek = $_POST['atm'];

        $cek = mysqli_query("SELECT * FROM validasi_seller WHERE nama_seller='$fullname");

        if(mysqli_fetch_assoc($cek)){
            echo "<script> alert('data sudah digunakan.');
                    location='validasi.php';
                </script>";
            exit;
        }
        else{
            mysqli_query($koneksi,"INSERT INTO `validasi_seller`(`username_seller`, `nama_seller`, `alamat_seller`, `no_rek_seller`, `tlp_seller`, `foto_ktp`, `foto_dg_ktp`, `rekening`) 
                        VALUES ('$username','$fullname','$alamat','$norek','$tlp','$ktp','$dgktp','$fotorek')");
            echo "<script> alert('Data Anda berhasil dimasukkan. Mohon tunggu proses verivikasi. Terimakasih');
                    location='index.php';
                </script>";
        }
    }
    
?>
<?php 
    
    $id = mysqli_query($koneksi,"SELECT id_user FROM data_user WHERE username_user='$username'");
?>
<?php include 'navbar.php';?>
<head>
    <style>
        .card{
            margin-left:28%;
        }   
    </style>
</head>
<div class="card-md">
    <div class="container main">
        <div class="card" style="width:500px">
            <h3 class="card-header text-center">Validate your account</h3>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="name">Username</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" name="username" value="<?php echo $username ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="name">Full Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="alamat">Address</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="alamat">Bank number</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="norek" name="norek" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="tlp">Phone number</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="tlp" name="tlp" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="ktp">KTP</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="file" id="ktp" name="ktp" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="dgktp">Photo w/ KTP</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="file" id="dgktp" name="dgktp" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="atm">Bank book</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="file" id="atm" name="atm" required>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="cek" name="cek" required>
                        <label class="form-check-label" for="cek">The data entered is correct.</label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top:15px; float:right;" name="kirim">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
