<?php
/* untuk mengkoneksi ke database*/
//mysql untuk koneksi
//dbname= nama database yang akan dikoneksi
//host nya wajib localhost
$dsn = 'mysql:dbname=tokobuku;host=localhost';
$user = 'root';
$password = '';



try {
  
    
  /*$dbh nya gue ubah jadi $koneksi*/  
  $dbh = new PDO($dsn, $user, $password);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
//ATTR_ERRMODE = untuk melihat dan mengatasi kesalahan,
  //ERRMODE_EXCEPTION = Melempar kesalahan tsb ke PDOException

  //Tips buffer query
  $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);

} catch (PDOException $e) {
    echo 'Koneksi gagal! ' . $e->getMessage();
}

?>