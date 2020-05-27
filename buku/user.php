
<?php
error_reporting(0);
$sesi = $_SESSION ['MEMBER'];
  if (isset($sesi) && $sesi['role'] =='admin') {


$Judul= ['NO','FULLNAME','USERNAME','EMAIL','ROLE','','']; //CIPTAKAN OBJEK DARI CLASS PEGAWAI MODEL
$model= new usermodel();
$rs= $model -> getALL();
?>
<h3> Daftar User</h3>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'userform.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div> 
  </div>
</div>

<!--AKHIR MODAL-->



<br><br>
<table class="table table-striped table-dark">
  

  <thead>
    <tr>
    	<?php 
    	foreach ($Judul as $judul) {
    	?>
      <th scope="col"> <?= $judul ?></th>
    <?php } ?>


    </tr>
  </thead>
  <tbody>
  	<?php
  	$no=1;
  	foreach ($rs as $user) {
  	?>	
  	

    <tr>
       <th scope="row"><?=$no ?></th>
      <td><?=$user['fullname'] ?></td>
      <td><?=$user['username'] ?></td>
      <td><?=$user['email'] ?></td>
      <td><?=$user['role'] ?></td>



        <td align="right">
       
       
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <a class="btn btn-info " href="index.php?halaman=userform&idedit=<?= $user['id'] ?>">Edit</a>
      </td>
 
       
      <td align="left">
        <form method="post" action="usercontroller.php">
           <button name="proses" type="submit" class="btn btn-danger" value="hapus" onclick="return confirm ('apakah anda yakin akan di hapus?')">Delete</button>

          <input type="hidden" name="idx" value="<?= $user['id'] ?>"/>
        </form>
       

      </td>
    
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>

<?php }
else{
  include_once 'dilarang.php';
}

?>