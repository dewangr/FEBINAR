<?php include 'koneksi.php';
session_start();
$keyword=$_POST['keyword'];
$semuadata = [];
$ambil = $koneksi->query("SELECT * FROM produk WHERE pr_nama LIKE '%$keyword%' OR pr_deskripsi LIKE '%$keyword%'");
while($pecah = $ambil->fetch_assoc()){
    $semuadata[]=$pecah;
};
?>
<?php include 'navbar.php';?>

<head>
    <style>
        .search-filter a{
            text-decoration:none;
            margin-top: 10px;
            float: left;
            padding: 10px 20px;
            font-size: 15px;
            margin-left: 10px;
            color: #f1f1f1;
            background-color: rgba(22,33,62,0.5);
        }
        .search-filter a:hover{
            background-color: rgba(22,33,62,1);
        }
        .search-filter p{
            color: rgb(22,33,62);
            font-size: 20px;
            float: left;
            margin-right: 15px;
            padding-top:15px;
            }
    </style>
</head>
<div class="container utama">
    <div class="search-filter" style="margin-top:10px;">
            <h3>Hasil Pencarian Webinar <?=$keyword?> : <?=count($semuadata)?> Webinar </h3>
            <?php if(empty($semuadata)):?>
                <div class="alert alert-danger">Webinar <strong><?=$keyword?></strong> Tidak Ditemukan</div>
            <?php endif ?>
            <div class="row">
                <?php foreach($semuadata as $key =>$value):?>
                <div class="col-lg-3 col-xs-12 col-sm-6 mt-4">
                    <div class="card">
                        <img class="card-img-top" src="foto-webinar/<?= $value['pr_gambar']?>" alt="Card image cap">
                        <div class="card-body h-100">
                            <h5 class="card-title"><a href="detailwebinar.php?&id=<?=$value['pr_id']?>"><?= $value['pr_nama']?></a></h5>
                            <h6 class="card-title">Rp. <?= number_format($value['pr_harga'])?></h6>
                            <a href="detail.php?&id=<?=$value['id_produk']?>" class="btn btn-secondary">Detail</a>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>