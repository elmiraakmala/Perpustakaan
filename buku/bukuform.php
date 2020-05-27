<?php
//buat array scalar u/ master data gender dan status

//buat array associative u/ master data jabatan
/*-----Proses Mengubah data-----*/
//untuk menangkap request id edit
$obj = new penerbitmodel();
$ar_pnb = $obj->getAll();


$IDedit = $_REQUEST ['idedit'];
$obj2 = new bukumodel();
if (!empty($IDedit)) {
  //modus edit data lama yang ditampilkan di form untuk diedit
  $row =$obj2->view([$IDedit]);
  
}
else {
  $row=[];

} 


?>
<form method="POST" action="bukucontroller.php">
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Nama Buku :</label> 
    <div class="col-7">
      <input id="nama" name="nama" value="<?= $row ['namabuku'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-5 col-form-label">Nama penerbit</label> 
    <div class="col-7">
      <select id="penerbit" name="penerbit" required="required" class="custom-select">
        <option value="">-- Pilih penerbit--</option>
        <?php
        foreach($ar_pnb as $pnb){

            $sel = ($pnb['IDpenerbit'] == $row['idpenerbit']) ? "selected" : "";
      ?>
       

          <option value="<?= $pnb['IDpenerbit'] ?>"<?= $sel ?> > <?= $pnb['namapenerbit'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Kategori :</label> 
    <div class="col-7">
      <input id="kategori" name="kategori" value="<?= $row ['kategori'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  

  <div class="form-group row">
    <label for="hp" class="col-5 col-form-label">Stok :</label> 
    <div class="col-7">
      <input id="stok" name="stok" value="<?= $row ['stok'] ?>" type="number" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="harga" class="col-5 col-form-label">harga : </label> 
    <div class="col-7">
      <input id="harga" name="harga" value="<?= $row ['harga'] ?>" type="float" required="required" class="form-control">
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