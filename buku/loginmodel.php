<?php
	class loginmodel{

		//Member 1 variabel / attribute
	
		public $koneksi;
		//Member 2 Constructor
		public function __construct()
		{
			global $dbh; //panggil var di file lain
			$this->koneksi = $dbh;
		}

		//Member 3 method atau fungsi atau behavior
		//fungsi2 CRUD

		public function ceklogin($data){
			$sql = "select * from user where username = ? AND password = SHA1(?)";

			//prepare statement PDO
			$ps = $this -> koneksi->prepare($sql);
			$ps -> execute($data);

			$rs = $ps -> fetch();

			return $rs;
	}


}

?>