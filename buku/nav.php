<?php 
error_reporting(0);
session_start();
$sesi = $_SESSION['MEMBER'];
?>

<!-- BAGIAN NAVBAR -->

	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">

				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="margin-right: 19px;">
					<span class="navbar-toggler-icon"></span>

		<!-- HOME -->			
				</button> <a class="navbar-brand" href="index.php?halaman=buku">Home</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav">



		<!-- About Us -->
							<li class="nav-item active">
							 <a class="nav-link" href="index.php?halaman=about">About<span class="sr-only">(current)</span></a>

						</li>

						
		<!-- Master Data -->

						<?php 
								if ($sesi['role'] == 'admin') {
								?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown">Master Data</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							
							
							<a class="dropdown-item" href="index.php?halaman=buku">Data Buku</a>

								<a class="dropdown-item" href="index.php?halaman=penerbit">Data Penerbit</a>
								  <a class="dropdown-item" href="index.php?halaman=user">Data User</a>

								
		
							</div>	 
						</li>
					<?php } ?>
					</ul>


		<!-- SEARCH -->	


					<ul class="navbar-nav ml-md-auto">
						<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" name="search"> 
						<button class="btn btn-outline-success" type="submit">
							Search
						</button>
						<input type="hidden" name="halaman" value="buku" />
					</form>


		<!-- LOGIN -->			
					<ul class="navbar-nav ml-md-auto">	
					<?php
					if(!isset($sesi)){
					?>	
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?halaman=login">Login</a>
						</li>
						<?php 
						}
						else{
						?>	


		<!-- DROPDOWN LOGIN -->					
							<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
							 	<?= $sesi['fullname']?></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								
								
									<a class="dropdown-item" href="index.php?halaman=detailuser&iduser=<?= $sesi['id'] ?>">My profile</a>
								

								 <?php
								 if ($sesi['role'] == 'admin') {
								 ?>
								  <a class="dropdown-item" href="index.php?halaman=user">kelola user</a>
								<?php } ?>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="Logout.php">Log out</a>
							</div>
						</li>
						<?php } ?>					
					</ul>
					
				</div>
			</nav>
		</div>
	</div>
