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
            <h1><a href="#">
			<?php
			$idpetugas = $_SESSION['idPetugas'];
			
			$wilayahStaff = mysql_fetch_array(mysql_query("select * from petugas where idPetugas ='$idpetugas'"));
			$wilayah = $wilayahStaff['provinsi'];

			$setkoperasi = mysql_fetch_array(mysql_query("select * from pengaturan where provinsi ='$wilayah'"));
			if($setkoperasi >0){
			echo "KOP<span class='bold'> AB</span></a></h1>";
			echo '<p class="meta">'.$setkoperasi['nama_koperasi'].' - Cabang '.$setkoperasi['provinsi'].'</p>';
			echo '<p>'.$setkoperasi['alamat'].' - '.$setkoperasi['kota'].' - '.$setkoperasi['no_telp'].'</p>';

			}else{
			echo "KOP<span class='bold'> AB</span></a></h1>";
			echo '<p class="meta">'.$setkoperasi['nama_koperasi'].'</p>';

			}

			?>
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




		<?php include_once "theme/menu_teller.php"; ?>
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
					$m = $_GET['modul'];
					
					if($m =='home'){
						include "modul/teller/index.php";
					}

					elseif($m=='pinjam'){
						include "modul/teller/pinjaman.php";
					}
					elseif($m=='simpan'){
						include "modul/teller/simpanan.php";
					}
				
					// elseif($m =='anggota'){
						// include "modul/cs/ang.php";
					// }
					elseif($m =='laporan'){

					include "modul/teller/laporan/index.php";
					}

					else{
						"lainnaya";
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
