<?php 
include_once 'koneksi.php';
include_once 'bukumodel.php';

//untuk tangkapan request form
$nama= $_POST['nama'];

$kategori= $_POST['kategori'];
$harga= $_POST['harga'];
$stok= $_POST['stok'];
$penerbit= $_POST['penerbit'];



$data = [$nama,$kategori ,$harga,$stok,$penerbit]; 
//mengumpulkan semua array menjadi satu


/* Panggil fungsi simpan di pegawaimodel.php*/
$proses = $_POST['proses'];
$model= new bukumodel();

//mengalihkan tombol request dari $ proses
switch ($proses) {
//mengambil request VALUE dari tombol
	case 'save':
		$model->simpan($data);
		break;
	
		case 'edit': 
			//tangkap request tombol idx
		$data[] = $_POST ['idx'];
		$model->ubah($data);
			break;

		case 'delete':
		$id = $_POST ['idx'];
			$model->hapus([$id]);
			break;

		default: 
		#kalau yang ini tidak ada perubahan data
		//dikembalikan ke halaman pegawai.php
		header('location:index.php?halaman=buku');


}

/*kembalikan ke halaman pegawai.php atau di landing page*/
header('location:index.php?halaman=buku');


?>