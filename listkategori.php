<head>
    <style>
        .menu-kategori p{
            display: block;
        }
        .menu-kategori a{
            text-decoration:none;
            color: rgb(22,33,62);
            padding: 10px 20px;
            border-radius: 3px;
            background-color: rgba(22,33,62,0);
        }
        .menu-kategori a:hover{
            background-color: rgba(22,33,62,1);
            color:#fff;
        }
        .menu-kategori li{
            margin-top:10px;
        }
    </style>
</head>
<div class="card-body main-body">
    <h5 class="judul-sub">KATEGORI</h5>
    <hr>
    <div class="menu-kategori">
        <ul class="unlysted-list list-group list-group-action list-group-horizontal-md">
            <?php 
                $cek = mysqli_query($koneksi, "SELECT * FROM kategori");
                while($kategori = mysqli_fetch_assoc($cek)){ ?>
                        <li><a href="kategoripage.php?id_kategori=<?php echo $kategori['id_kategori']?>"><?= $kategori['nama_kategori']?></a></li>
                <?php } ?>
        </ul>
    </div>
</div> 
