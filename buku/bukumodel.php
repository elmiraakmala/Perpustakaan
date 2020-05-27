<?php

/**
 * 
 */
class bukumodel 
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
		$sql= "SELECT buku.*,penerbit.namapenerbit AS penerbit FROM buku INNER JOIN penerbit on penerbit.IDpenerbit=buku.idpenerbit";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute();
		$rs = $ps -> fetchALL();
		return $rs;
	}
/*
metode untuk melihat detail pada aksi di buku.php
*/
	public function view($id) //kata view itu bukan syntax , itu bebas
	{
		$sql= "SELECT buku.*,penerbit.namapenerbit AS penerbit FROM buku INNER JOIN penerbit on penerbit.IDpenerbit=buku.idpenerbit WHERE IDbuku=?";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		$rs = $ps -> fetch();
		return $rs;
	}
public function simpan($data){
		$sql = "INSERT INTO buku(kategori,namabuku,harga,stok,idpenerbit) VALUES (?,?,?,?,?)";
		//prepare statement PDO
		$ps =$this ->koneksi->prepare($sql);
		$ps ->execute($data);
	}
public function ubah($data) 
	{
		$sql= "update buku set kategori=?,namabuku=?,harga=?,stok=?,idpenerbit=? WHERE IDbuku=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($data);
		
	}
	public function hapus($id) 
	{
		$sql= "delete FROM buku WHERE IDbuku=?"; 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute($id);
		
	}

public function cari($search) //kata getALL itu bukan syntax , itu bebas, terserah mau kata apa aja.
	{ //SELECT * FROM pegawai
		$sql= " SELECT buku.*,penerbit.namapenerbit AS penerbit FROM buku INNER JOIN penerbit on penerbit.IDpenerbit=buku.idpenerbit WHERE buku.namabuku LIKE '%$search%'ORDER by IDbuku DESC";
		//ps adalah prepare statement PDO atau menyiapkan pernyataan 
		$ps= $this-> koneksi -> prepare($sql);
		$ps-> execute();
		$rs = $ps -> fetchALL(); //ini untukmengeksekusi sekaligus mengambil datanya
		return $rs;
	}
	
}

?>