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
        .left-category a{
            text-decoration:none;
            color:rgb(22,33,62);
        }
        .left-category a:hover{
            color:rgb(23,162,184)
        }
    </style>
</head>
<div class="container utama">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" >
            <h5 class="judul-sub" style="margin-top:50px;" >KATEGORI</h5>
            <ul class="list-group list-group-flush left-category">
            <?php 
                $cek = mysqli_query($koneksi, "SELECT * FROM kategori");
                while($kategori = mysqli_fetch_assoc($cek)){ ?>
                        <li class="list-group-item"><a href="kategoripage.php?id_kategori=<?php echo $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="card-body main-body product-small">
                <a style="text-decoration:none;" href="produkpage.phps"><h5 class="judul-sub">PRODUK TERBARU</h5></a>
                <hr>
            <div class="row">
                <?php
                $ambil = $koneksi->query("SELECT * FROM produk ORDER BY pr_id DESC ");?>
                <?php  while($perproduk = mysqli_fetch_assoc($ambil)){?>
                <div class="col-lg-3 col-xs-12 col-sm-6 mb-3 text-center">
                    <div class="card h-100">
                        <img class="card-img-top" src="foto-webinar/<?= $perproduk['pr_gambar']?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="detailwebinar.php?&id=<?=$perproduk['pr_id']?>"><?= $perproduk['pr_nama']?></a></h5>
                            <h6 class="card-title">Rp. <?= number_format($perproduk['pr_harga'])?></h6>
                        </div>
                    </div>
                </div>
                <?php 
            } ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php include 'footer.php';?>
