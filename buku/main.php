<!-- BAGIAN ISI -->

	<div class="row">
		<div class="col-md-12" style="font-family: calibri;font-size:14px; ">
			<?php
			error_reporting(0);  
	//tangkap request di url (dari klik menu)
	$hal = $_GET['halaman'];  
	//$_GET[''] dalamnya harus sesuai dengan request di bagian href nya 
	if (!empty($hal)) {
		//arahkan sesuai halaman request
		include_once $hal.'.php';
	}
	else {
		//arahkan ke halaman home.php
		include_once 'home.php';
	}


	?>
		</div>
		</div>
	</div>