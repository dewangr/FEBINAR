<?php 
    include '../koneksi.php';
    $id = $_GET['id_pembelian'];
    mysqli_query($koneksi,"UPDATE listpembelian SET `status`= 'lunas' WHERE `id_pembelian` = '$id'");

    echo "<script> alert('Pembayaran telah divalidasi. Uang akan dikirimkan ke seller.'); location='index.php?page=validasi-pembayaran';</script>";
?>