<?php 
    include '../koneksi.php';
    $id = $_GET['pr_id'];
    mysqli_query($koneksi,"DELETE FROM produk WHERE `pr_id` = '$id'");

    echo "<script> alert('Data Produk Berhasil Dihapus.'); location='page-penjual.php?page=list-produk-penjual';</script>";
?>