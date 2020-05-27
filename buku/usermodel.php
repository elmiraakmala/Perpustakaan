<?php

/**
 * 
 */
class usermodel
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
		$sql= "SELECT * FROM user";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute();
		$rs = $ps -> fetchALL();
		return $rs;
	}

/*
metode untuk melihat detail pada aksi di pegawai.php
*/
public function view($id) //kata view itu bukan syntax , itu bebas
	{
		$sql= "SELECT * FROM user WHERE id=?";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		$rs = $ps -> fetch();
		return $rs;
	}
	

	public function simpan($data) 
	{
		$sql= "INSERT INTO user(fullname,username,password,email,role,foto) VALUES (?,?,SHA1(?),?,?,?)";
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($data);
		
	}

	public function edit($data) 
	{$sql= "update user set fullname=?,username=?,password=?,email=?,role=?,foto=? WHERE id=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($data);
		
	}
	public function hapus($id) 
	{
		$sql= "delete FROM user WHERE id=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		
	}
}


?>