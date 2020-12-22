<?php include 'koneksi.php';
session_start();
?>
<?php include 'navbar.php';?>
<head>
    <style>
        .utama{
            margin-top:50px;
            margin-bottom:250px;
        }
        .card-img-top{
            width:18erm;
        }
        .judul{
            text-align:center;
            margin-top:10px;
            color:rgb(0,0,0);
        }
    </style>
</head>
<div class="container utama">
    <div style="margin-top:30px;" id="carouselmain" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselmain" data-slide-to="0" class="active"></li>
            <li data-target="#carouselmain" data-slide-to="1"></li>
            <li data-target="#carouselmain" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src=".\assets\img\cao.png" class="d-block w-100" width="1120" height="400">
            </div>
            <div class="carousel-item">
            <img src=".\assets\img\co1.png" class="d-block w-100" width="1120" height="400">
            </div>
            <div class="carousel-item">
            <img src=".\assets\img\cao3.png" class="d-block w-100" width="1120" height="400">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselmain" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselmain" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php include 'listkategori.php'; ?>
    <div class="card-body main-body">
        <a style="text-decoration:none;" href="produkpage.php"><h5 class="judul-sub">PRODUK TERBARU</h5></a>
        <hr>
        <div class="row">
                <?php $i=1;
                $ambil = $koneksi->query("SELECT * FROM produk ORDER BY pr_id DESC ");?>
                <?php  while($perproduk = $ambil->fetch_assoc()){?>
                <?php if($i<=8): ?>
                <div class="col-lg-3 col-xs-12 col-sm-6 mb-3 text-center">
                    <div class="card h-100">
                        <img class="card-img-top" src="foto-webinar/<?= $perproduk['pr_gambar']?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="detailwebinar.php?&id=<?=$perproduk['pr_id']?>"><?= $perproduk['pr_nama']?></a></h5>
                            <h6 class="card-title">Rp. <?= number_format($perproduk['pr_harga'])?></h6>
                        </div>
                    </div>
                </div>
                <?php $i++;
                endif;
            } ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
