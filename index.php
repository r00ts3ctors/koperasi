<?php
	session_start();
	error_reporting(1);
	include "config/database.php";
	include "config/fungsi.php";


	 if(!isset($_SESSION['username'])){
          header('location: user.php');
        }

// $timeout = 5; // Set timeout menit
// $logout_redirect_url = "logout.php"; // Set logout URL

// $timeout = $timeout * 60; // Ubah menit ke detik
// if (isset($_SESSION['start_time'])) {
    // $elapsed_time = time() - $_SESSION['start_time'];
    // if ($elapsed_time >= $timeout) {
        // session_destroy();
        // echo "<script>alert('Maaf Waktu Login Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    // }
// }
// $_SESSION['start_time'] = time();


?>
<?php include "theme/header_atas.php"; ?>

<body>

<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="logo">
           <img src="img/logo.png">
		
          </div>
        </div>

        <div class="col-md-4">
          <div class="header-data">

         	<div class="alert alert-warning">
						<h3>Level :  <?php echo $_SESSION['nama'];?> ID : <?php echo $_SESSION['idPetugas'];?>
														</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="content">




		<?php include_once "theme/menu.php"; ?>
		<div class="mainbar">
			<div class="page-head">
				<h4>
					<script language="JavaScript">document.write(tanggallengkap);</script> |
					<strong><span id="output" class="jam" ></span></strong>
				</h4>
				<div class="clearfix"></div>
			</div>
			<div class="matter">
				<div class="container">
					<?php
					$UserLevel = $_SESSION['level'];
		
					$m = $_GET['modul'];
						
					if($UserLevel =='1'){
							// Level Member Login 1. Admin 2. Manager 31 Staf CS 32 Staf Taller

							if($m =='home'){
								include "modul/admin/index.php";
							}
							elseif($m =='petugas'){
								include "modul/admin/petugas.php";
							}
							
							elseif($m =='kontrak'){
								include "kontrak/index.php";
							}
							elseif($m =='neraca'){
								include_once "modul/admin/neraca/index.php";
							}
							
							elseif($m =='simpan'){
								include "modul/admin/simpanan.php";
							}
							elseif($m=='pinjam'){
								include "modul/admin/pinjaman.php";
							}
							elseif($m =='pengaturan'){
								include "modul/admin/pengaturan.php";
							}
							elseif($m =='anggota'){
								include "modul/admin/ang.php";
							}
							elseif($m =='laporan'){

							include "modul/admin/laporan/index.php";
							}

							else{
								include "modul/admin/index.php";
							}
					}

						elseif($UserLevel =='2'){
						
							if($m =='home'){
							include "modul/manager/index.php";
							}
							
							elseif($m =='kontrak'){
								include "kontrak/index.php";
							}
							elseif($m =='setor'){
								include "modul/manager/setor.php";
							}
							
							elseif($m =='petugas'){
								include "modul/manager/petugas.php";
							}
							elseif($m =='simpan'){
								include "modul/manager/simpanan.php";
							}
							elseif($m=='pinjam'){
								include "modul/manager/pinjaman.php";
							}
						
							elseif($m =='anggota'){
								include "modul/manager/ang.php";
							}
							elseif($m =='laporan'){

							include "modul/manager/laporan/index.php";
							}

							else{
								"lainnaya";
							}
						}
				else{
					echo "lain nya";
				}


			?>
		</div>


		</div>

		<!-- Matter ends -->

		</div>

   <!-- Mainbar ends -->


</div>
<!-- Content ends -->

<!-- Footer starts -->
<?php
include "theme/footer_bawah.php";
?>
