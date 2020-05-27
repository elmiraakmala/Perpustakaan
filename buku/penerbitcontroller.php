<?php 
include_once 'koneksi.php';
include_once 'penerbitmodel.php';

//untuk tangkapan request form
$nama= $_POST['nama'];
$alamat= $_POST['alamat'];
$kota= $_POST['kota'];
$hp= $_POST['hp'];



$data = [$nama, $alamat,$kota,$hp]; 
//mengumpulkan semua array menjadi satu


/* Panggil fungsi simpan di pegawaimodel.php*/
$proses = $_POST['proses'];
$model= new penerbitmodel();

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
		header('location:index.php?halaman=penerbit');


}

/*kembalikan ke halaman pegawai.php atau di landing page*/
header('location:index.php?halaman=penerbit');


?>