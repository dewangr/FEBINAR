<?php 
    include '../koneksi.php';
    $id = $_GET['pr_id'];
    mysqli_query($koneksi,"DELETE FROM produk WHERE `pr_id` = '$id'");

    echo "<script> alert('Penjual berhasil di validasi.'); location='list-produk.php';</script>";
?>