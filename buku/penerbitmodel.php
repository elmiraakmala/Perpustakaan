<?php

/**
 * 
 */
class penerbitmodel 
{
	public $koneksi;
	function __construct()
	{
		global $dbh; //panggil variabel di file lain
		$this->koneksi=$dbh;
	}
	//member3 method/fungsi/behavior
	//fungsi-fungsi CRUD
	//kalau nama variabel boleh bebas.
	public function getALL() //kata getALL itu bukan syntax , itu bebas, terserah mau kata apa aja.
	{
		$sql= "SELECT * FROM penerbit";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute();
		$rs = $ps -> fetchALL();
		return $rs;
	}
/*
metode untuk melihat detail pada aksi di penerbit.php
*/
	public function view($id) //kata view itu bukan syntax , itu bebas
	{
		$sql= "SELECT * FROM penerbit WHERE IDpenerbit=?";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		$rs = $ps -> fetch();
		return $rs;
	}
public function simpan($simpan) //kata view itu bukan syntax , itu bebas
	{
		$sql= "INSERT INTO penerbit(namapenerbit,alamat,kota,hp) VALUES (?,?,?,?)";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($simpan);
		
	}
public function ubah($data) 
	{
		$sql= "update penerbit set namapenerbit=?,alamat=?,kota=?,hp=? WHERE IDpenerbit=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($data);
		
	}
	public function hapus($id) 
	{
		$sql= "delete FROM penerbit WHERE IDpenerbit=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		
	}

}

?>