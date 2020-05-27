
<?php

error_reporting(0);
if (isset($_SESSION['MEMBER'])) {

$Judul=['ID','NAMA','ALAMAT','KOTA','HP','','']; //CIPTAKAN OBJEK DARI CLASS PEGAWAI MODEL
$model= new penerbitmodel();
$rs= $model -> getALL();
?>
<h3> Daftar penerbit</h3>

<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>
<br>
<br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form penerbit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'penerbitform.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!--AKHIR MODAL-->


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
  	
  	foreach ($rs as $data) {
  	?>	
  	

    <tr>
      <th scope="row"><?= $data['IDpenerbit'] ?></th>
      <td><?= $data['namapenerbit'] ?></td>
      <td><?= $data['alamat'] ?></td>
      <td><?= $data['kota'] ?></td>
      <td><?= $data['hp'] ?></td>
      
      <!--NGETIK BAGIAN HREF NYA HARUS TANPA SPASI!!!-->
      <td align="right">
          &nbsp;&nbsp;&nbsp;&nbsp; 
        <a class="btn btn-info " href="index.php?halaman=penerbitform&idedit=<?= $data['IDpenerbit'] ?>">Edit</a>
      </td>
      <td>


 
<form method="post" action="penerbitcontroller.php">
 <button name="proses" type="submit" class="btn btn-danger" value="delete" onclick="return confirm ('apakah anda yakin akan di hapus?')">Delete</button> 

          <input type="hidden" name="idx" value="<?= $data['IDpenerbit'] ?>"/>
        </form>
        

      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php }
else{
  include_once 'dilarang.php';
}

?>