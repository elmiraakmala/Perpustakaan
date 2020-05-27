<?php 
include_once 'koneksi.php';
include_once 'usermodel.php';

//untuk tangkapan request form
$fullname = $_POST['nama'];
$username = $_POST['uname'];
$password = $_POST['pass'];
$email = $_POST['email'];
$role = $_POST['role'];
$foto = $_POST['foto'];


$data = [$fullname, $username, $password, $email, $role, $foto];
//mengumpulkan semua array menjadi satu

//tangkap request tombol-tombol neame "proses" :
$proses = $_POST['proses'];
$model = new usermodel();

//mengalihkan tombol request dari $ proses
switch ($proses) {
//mengambil request VALUE dari tombol
	case 'simpan':
		$model->simpan($data);
		break;
	

		

}

//ini untuk ada perubahan data
/*kembalikan ke halaman pegawai.php atau di landing page*/
header('location:index.php?halaman=register');


?>