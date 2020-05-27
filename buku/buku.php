
<?php

error_reporting(0);
if (isset($_SESSION['MEMBER'])) {

$Judul=['ID','NAMA BUKU','NAMA PENERBIT','KATEGORI','HARGA','STOK','','']; //CIPTAKAN OBJEK DARI CLASS PEGAWAI MODEL
$model= new bukumodel();
$rs= $model -> getALL();

//SEARCH-----------------
$search= $_REQUEST['search'];


//CARI!!!!!!!!
if (!empty($search)) {
  $rs=$model->cari($search);

}
else{
  $rs=$model->getALL();
}
//print_r($rs);exit; //>>untuk mengecek
//
?>



<h3> Daftar buku</h3>

<br>

<?php
      if ( $_SESSION ['MEMBER']['role'] =='admin') {
      ?>   
<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>
<br>
<br>
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'bukuform.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
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
      <th scope="row"><?= $data['IDbuku'] ?></th>
      <td><?= $data['namabuku'] ?></td>
       <td><?= $data['penerbit'] ?></td>
      <td><?= $data['kategori'] ?></td>
      <td><?= $data['stok'] ?></td>
      <td><?= $data['harga'] ?></td>
      
      <!--NGETIK BAGIAN HREF NYA HARUS TANPA SPASI!!!-->

      <?php
      if ( $_SESSION ['MEMBER']['role'] =='admin') {
      ?>  
      <td align="right">
          &nbsp;&nbsp;&nbsp;&nbsp; 
        <a class="btn btn-info " href="index.php?halaman=bukuform&idedit=<?= $data['IDbuku'] ?>">Edit</a>
      </td>
      <td>


 
<form method="post" action="bukucontroller.php">
 <button name="proses" type="submit" class="btn btn-danger" value="delete" onclick="return confirm ('apakah anda yakin akan di hapus?')">Delete</button> 

          <input type="hidden" name="idx" value="<?= $data['IDbuku'] ?>"/>
        </form>
    <?php } ?>    

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