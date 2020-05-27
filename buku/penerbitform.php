<?php
//buat array scalar u/ master data gender dan status

//buat array associative u/ master data jabatan
/*-----Proses Mengubah data-----*/
//untuk menangkap request id edit
$IDedit = $_REQUEST ['idedit'];
$obj2 = new penerbitmodel();
if (!empty($IDedit)) {
  //modus edit data lama yang ditampilkan di form untuk diedit
  $row =$obj2->view([$IDedit]);
  
}
else {
  $row=[];

} 


?>
<form method="POST" action="penerbitcontroller.php">
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama :</label> 
    <div class="col-7">
      <input id="nama" name="nama" value="<?= $row ['namapenerbit'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  
  
 
  <div class="form-group row">
    <label for="alamat" class="col-5 col-form-label">Alamat :</label> 
    <div class="col-7">
      <textarea id="alamat" name="alamat" cols="40" rows="3" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?= $row ['alamat'] ?></textarea> 
      
    </div>
  </div>

<div class="form-group row">
    <label for="kota" class="col-5 col-form-label">Kota : </label> 
    <div class="col-7">
      <input id="kota" name="kota" value="<?= $row ['kota'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="hp" class="col-5 col-form-label">HP :</label> 
    <div class="col-7">
      <input id="hp" name="hp" value="<?= $row ['hp'] ?>" type="number" required="required" class="form-control">
    </div>
  </div>
 
<div class="form-group row">
    <div class="offset-5 col-7">
      <?php 
      if (empty($IDedit)) { //modus entry data baru 
      
      ?>
      <button name="proses" value="save" type="submit" class="btn btn-primary">Simpan</button>
      <?php
    }
    else { //modus edit data lama
    ?>
      <button name="proses" value="edit" type="submit" class="btn btn-primary">Ubah</button>
      <input type="hidden" name="idx" value="<?= $IDedit ?>"/>
    <?php } ?>


     

    </div>
  </div>
  
</form>