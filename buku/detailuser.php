<?php

error_reporting(0);
$ID = $_GET['iduser']; //"idpeg" sesuai dengan request pada href di pegawai.php bagian view Detail
$model= new usermodel();
$rs= $model->view([$ID]); //view()->harus sesuai dengan variabel pada get.

//print_r ($rs); exit;   //untuk check ada array nya atau tidak . tinggal aktifin aja 

//panggil session, abis itu mulai di filter dengan if , jika $sesi sesuai role=admin atau $sesi sesuai id = $ID biar bisa dipanggil sekaligus di sekat.
$sesi = $_SESSION['MEMBER'];
if($sesi['role'] == 'admin' || $sesi['id'] == $ID){

?>
<div class="card" style="width: 30%; " >
  
  <img src="foto/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card text-white bg-primary mb-3" style="font-size: 20px;text-align: center;font-family: courier;">
    <br>
    <h3 class="card-title"><?= $rs ['fullname'] ?></h3><hr>
    <p class="card-text">
    Username: <?= $rs['username'] ?> <br>
    Email : <?= $rs['email'] ?> <br>
    Role : <?= $rs['role'] ?> <br>
    
    	

    </p>

  <?php
      if ($sesi['role'] == 'admin') {
        ?>

    <a href="index.php?halaman=user" class="btn btn-primary">Go somewhere</a>

    <?php } ?>
  </div>
</div>

<?php }
else{
  include_once 'dilarang.php';
}
