<?php
session_start();

include_once 'koneksi.php';
include_once 'loginmodel.php';
//tangkap request form
$username = $_POST['uname'];
$password = $_POST['pass'];
//gabungkan var diatas ke array

$data = [$username, $password ];


//panggil fungsi Cek Login di LoginModel.php
$model = new loginmodel();

$jumlah = $model->ceklogin($data);

// buat ngetest login doang 
//print_r('Jumlah Baris : '.$jumlah); exit;
if(!empty($jumlah)){ //sukses login 
	$_SESSION['MEMBER'] = $jumlah;
	//kembalikan (landing page) ke halaman pegawai
	header('location:index.php?halaman=start');
}
else{ //gagal login
	echo '<script>
		alert("Maaf Username dan Password Anda Salah ! Silahkan Login kembali. ");
		history.go(-1);
	</script>';
}
?>