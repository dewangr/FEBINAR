<?php 
    include '../koneksi.php';
    $id = $_GET['username_seller'];
    mysqli_query($koneksi,"UPDATE `data_user` SET `keterangan_acc`= 'acc' WHERE `username_user` = '$id'");

    echo "<script> alert('Penjual berhasil di validasi.'); location='index.php?page=validasi-seller';</script>";
?>