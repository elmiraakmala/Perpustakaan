<?php
//buat array scalar u/ master data gender dan status
$ar_role = ['user'];
//buat array associative u/ master data jabatan
/*-----Proses Mengubah data-----*/
//untuk menangkap request id edit
$IDedit = $_REQUEST ['idedit'];
$obj2 = new usermodel();
if (!empty($IDedit)) {
  //modus edit data lama yang ditampilkan di form untuk diedit
  $row =$obj2->view([$IDedit]);
  
}
else {
  $row=[];

} 


?>
<form method="POST" action="registercontroller.php">
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Fullname</label> 
    <div class="col-7">
      <input id="nama" name="nama" value="<?= $row ['fullname'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

   <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Username</label> 
    <div class="col-7">
      <input id="uname" name="uname" value="<?= $row ['username'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
 
  <div class="form-group row">
    <label for="nama" class="col-5 col-form-label">Password</label> 
    <div class="col-7">
      <input id="pass" name="pass" value="<?= $row ['password'] ?>" type="password" required="required" class="form-control">
    </div>
  </div>
<div class="form-group row">
    <label for="hp" class="col-5 col-form-label">E-mail</label> 
    <div class="col-7">
      <input id="email" name="email" value="<?= $row['email'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

 <div class="form-group row" >
    <label for="jabatan" class="col-5 col-form-label">Role</label> 
    <div class="col-7">
      <select id="role" name="role" required="required" class="custom-select">
        <option value="user">user</option>
      </select>
    </div>
  </div>

   <div class="form-group row">
    <label for="hp" class="col-5 col-form-label">Foto</label> 
    <div class="col-7">
      <input id="foto"  value="<?= $row['foto'] ?>" name="foto" type="file" required="required">
    </div>
  </div>

  

<div class="form-group row">
    <div class="offset-5 col-7">
      <?php
      if(empty($IDedit)){
        ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-sm btn-primary">Simpan</button>
      <?php 
       } 
       else{ //modus edit data lama
       ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-sm btn-warning">Ubah</button>
      <input type="hidden" name="idx" value="<?= $IDedit ?>"/>
      <?php } ?>

     
    </div>
  </div>
  
</form>