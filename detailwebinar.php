<?php
include 'koneksi.php';
session_start();
//ambil id produk dari url
$id_produk = $_GET["id"];
//query ke database untuk mendapatkan informasi produk
$ambil = $koneksi->query("SELECT * FROM produk WHERE pr_id='$id_produk'");
$pecah= $ambil->fetch_assoc();
// var_dump($pecah);
//ambil data semua foto produk
$semuafoto = [];
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE pr_id ='$id_produk'");
while($pecahfoto = mysqli_fetch_assoc($ambilfoto)){
  $semuafoto []= $pecahfoto;
}
?>
<?php include 'navbar.php';?>
<head>
    <style>
        .detail{
            margin-top:10px;
        }
        .harga{
            margin-left:10%;
            margin-right:10%;
        }
        .harga p{
            padding-left:20px;
            font-size:40px;
        }
        .judul-web{
            font-size:25px;
            color:rgb(22,33,62);
        }
        .pilih{
            width:210px;
            padding:10px 30px;
            margin-top:20px;
            border-radius:3px;
        }
        .share, h6, h5{
            color:rgb(22,33,62);
            margin-right:20px;
        }
    </style>
</head>
<div class="container utama">
    <div class="card-body main-body">
        <div class="row">
            <div class="col-md-6">
                <img src="foto-webinar/<?=$pecah['pr_gambar']?>" class="jumbo"  style="width:100%">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="row detail">
                        <h5 class="judul-web"><?=$pecah['pr_nama']?></h5>
                    </div>
                <div class="row">
                    <div class="card-body harga">
                        <h6>Rp.<p><?=number_format($pecah['pr_harga']);?></p></h6>
                    </div>
                </div>
                <div class="row detail">
                    <div class="col-lg-2 col-md-2 col-xs-3 col-sm-3">
                        <h6>Tema </h6>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-9 col-sm-9">
                        <h6><?=$pecah['pr_tema']?></h6>
                    </div>
                </div>
                <div class="row detail">
                    <div class="col-lg-2 col-md-2 col-xs-3 col-sm-3">
                        <h6>Waktu </h6>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-9 col-sm-9">
                        <h6><?=$pecah['pr_waktu']?></h6>
                    </div>
                </div>
                <div class="row detail">
                    <div class="col-lg-2 col-md-2 col-xs-3 col-sm-3">
                        <h6>Tempat </h6>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-9 col-sm-9">
                        <h6><?=$pecah['pr_tempat']?></h6>
                    </div>
                </div>
                <div class="row detail">
                    <div class="col-lg-2 col-md-2 col-xs-3 col-sm-3">
                         <h6>Kuantitas</h6>
                    </div>
                    <div class="col-lg-10 col-md-10 col-xs-9 col-sm-9">
                        <form action="" method="POST">
                            <div class="input-group">
                                <div class="col-auto">
                                    <input type="number" name="qty" value="1" class="form-control input-sm" style="width:70px;">
                                </div>
                                <div class="row detail ">
                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <button class="btn btn-outline-dark pilih" name="cart" style="margin-top:60px;"><span><i class="fa fa-cart-plus"></i></span> | Keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                  <div style="margin-top:40px"class="row detail">
                        <div class="col-lg-2 col-md-2 col-xs-3 col-sm-3">
                            <h6 style="padding-top:10px">Share:</h6>
                        </div>
                        <div class="col-lg-10 col-md-10 col-xs-9 col-sm-9">
                            <ul class="list-group list-group-horizontal-sm fa-li">
                                <li><h3><a class="share"  href="#"><span><i class="fa fa-instagram"></i></span></a></h3></li>
                                <li><h3><a class="share" href="#"><span><i class="fa fa-whatsapp"></i></span></a></h3></li>
                                <li><h3><a class="share" href="#"><span><i class="fa fa-twitter"></i></span></a></h3></li>
                                <li><h3><a class="share" href="#"><span><i class="fa fa-facebook"></i></span></a></h3></li>
                                <li><h3><a class="share" href="#"><span><i class="fa fa-google"></i></span></a></h3></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         <div class="card-body main-body">
            <h5 class="judul-sub">DESKRIPSI</h5>
            <p style="text-align: justify;"><?=$pecah['pr_deskripsi']?></p>
        </div>
                        <?php
                        //jika tombol beli diklik
                        if(isset($_POST['cart'])){
                            //mendapatkan jumlah yang diinputkan
                            $jumlah=$_POST['qty'];
                            //masukan ke keranjang belanja
                            $_SESSION['keranjang'][$id_produk]=$jumlah;
                            echo "<script>alert('Produk berhasil masuk ke keranjang belanja')</script>";
                            header("Location: detailwebinar.php?id=$id_produk");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>