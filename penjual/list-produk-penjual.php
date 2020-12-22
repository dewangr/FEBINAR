<!--start: Wrapper-->
<?php include '../koneksi.php'; 
session_start();
$user = $_SESSION["username"];
?>			
	
<div class="container-fluid">
    <div class="title">
        <h3>List Webinar Anda</h3>
    </div>
        
		<table class="table table-hover table-condensed">
            <tr>
				<th>No.</th>
				<th>Judul Webinar</th>
				<th>Harga Webinar</th>
				<th>Kategori Webinar</th>
				<th>Deskripsi Webinar</th>
				<th>Waktu Webinar</th>
				<th>Tempat Webinar</th>
				<th>Foto Webinar</th>
				<th>Opsi</th>
			</tr>
        <?php 
            $cek = mysqli_query($koneksi,"SELECT * FROM data_user JOIN produk ON produk.id_user = data_user.id_user 
						JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE data_user.username_user = '$user'");
            $no=1;
            while($data = mysqli_fetch_assoc($cek)){ ?>
            <tr>
                <td><?= $no ?></td>
				<td><?= $data['pr_nama'] ?></td>
				<td><?= number_format($data['pr_harga']) ?></td>
				<td><?= $data['nama_kategori'] ?></td>
				<td><?= $data['pr_deskripsi'] ?></td>
				<td><?= $data['pr_waktu'] ?></td>
				<td><?= $data['pr_tempat'] ?></td>
				<td style="height:10%;  width:10%;" align="center">
				<img style="display:block;" width="100%" height="auto" src="../foto-webinar/<?= $data['pr_gambar'] ?>" alt="">
				</td>
				<td><button class="btn btn-danger" type="submit"><a style="color:white;" href="deleteproduk.php?pr_id=<?php echo $data['pr_id']?>"><span><i class="fa fa-times"></i></span></a></button></td>
			</tr>
            <?php $no++; 
            }?>
        </table>   
		<a  class="btn btn-info" style="color:white;" href="tambah-barang-penjual.php">Tambah Barang</a>
			<!-- end: Table -->
	</div>
		<!-- end: Container -->
					