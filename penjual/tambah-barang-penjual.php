<?php include '../koneksi.php';
session_start();
?>
<?php 
$username = $_SESSION['username'];
    if( isset($_POST["kirim"])) {
        $judul = $_POST['judul'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori'];
        $tema = $_POST['tema'];
        $waktu = $_POST['waktu'];
        $tempat = $_POST['tempat'];
        $foto = $_POST['foto'];
        $id = $_POST['iduser'];

        mysqli_query($koneksi,"INSERT INTO `produk`(`pr_id`, `pr_nama`, `pr_harga`, `pr_gambar`, `pr_deskripsi`, `id_kategori`, `pr_tema`, `pr_waktu`, `pr_tempat`, `id_user`) 
        VALUES ('','$judul','$harga','$foto','$deskripsi','$kategori','$tema','$waktu', '$tempat','$id')");
            echo "<script> alert('Data Webinar Anda berhasil dimasukkan. Terimakasih');
                    location='page-penjual.php';
                </script>";
        }
$cek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM data_user WHERE username_user = '$username'"));
$iduser=$cek['id_user'];
?>
<!--php 
    $id = mysqli_query($koneksi,"SELECT id_user FROM data_user WHERE username_user='$username'");
?>-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Febinar</title>
    <link rel="stylesheet" href="./assets/css/style2.css">
    <style>
        .img-logo{
            height:70px;
            width:auto;
        }
        .header{
            position:fixed;
            top:0;
            z-index:1000;
            width:100%;
        }
        .searching{
            border-radius:1px;
        }
    </style>
    <style>
        .card{
            margin-left:28%;
        }   
    </style>
</head>
<div class="card-md">
    <div class="container main">
        <div class="card" style="width:500px">
            <h3 class="card-header text-center">Masukkan Data Webinar</h3>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                    <input type="hidden" name="iduser" value="<?= $iduser ?>" class="form-control">
                        <div class="form-group col-md-3">
                            <label for="name">Judul Webinar</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" name="judul" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="name">Harga</label>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="name">Rp</label>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="alamat">Deskripsi</label>
                        </div>
                        <div class="form-group col-md-9">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="alamat" required>Kategori Webinar</label>
                        </div>
                        <div class="form-group col-md-9">
                            <select name="kategori" class="form-control">
                            <?php
                                $cek = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while($kategori = mysqli_fetch_assoc($cek)){ ?>
                                        <option value="<?= $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="tlp">Tema Webinar</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="tema" name="tema" required>
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="tlp">Waktu Webinar</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="waktu" name="waktu" required>
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="tlp">Tempat Webinar</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="tempat" name="tempat" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="ktp">Upload Foto Webinar</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="file" id="ktp" name="foto" required>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="cek" name="cek" required>
                        <label class="form-check-label" for="cek">The data entered is correct.</label>
                    </div>
                    <button type="submit" class="btn btn-danger" style="margin-top:15px; margin-left:70%">
                        <a style="color:white;text-decoration:none;" href="page-penjual.php?page=list-produk-penjual">Batal
                    </a></button>
                    <button type="submit" class="btn btn-primary" style="margin-top:15px; float:right;" name="kirim">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>