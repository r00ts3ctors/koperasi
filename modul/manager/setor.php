

<?php

	$m = $_GET['act'];

		$pe = $_POST['petugas'];
		$tgl = $_POST['tgl_angsuran'];
		$detail_waktu = date("Y-m-d H:i:s");
		$ket = $_POST['ket'];
		$nilai = $_POST['nilai'];

	  @$nama_file = $_FILES["bukti"]["name"];
	  @$ukuran_file = $_FILES["bukti"]["size"];
	  @$tipe_file = $_FILES["bukti"]["type"];
	  @$tmp_file = $_FILES["bukti"]["tmp_name"];
	  @$acak = rand (00000,99999);
	  @$bukti = $acak.$nama_file;
	  @$path = "img/bukti/".$bukti;
		
	if($m =='add'){
			
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            if(move_uploaded_file($tmp_file, $path)){
                   $simpan = mysql_query("INSERT INTO buktisetor VALUES(
				   '',
				   '$pe',
				   '$tgl',
				   '$bukti',
				   '$nilai',
				   'TUNDA',
				   '$ket',
				   '$detail_waktu'
				   
				   )");
		
			echo "<div class='alert alert-success'>
			<h4>Bukti Setoran Harian Berhasil di Laporkan!</h4>
			Status Laporan anda adalah TUNDA, System akan mencocokan kembali Jumlah dan Penerimaan dari Unit Koperasi Anda. <br />
			Pelaporan anda paling lambat di proses adalah 1 x 24 Jam. 
			</div>";
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=setor&act=listing">';
					
				}}}
		}
	elseif($m =='listing'){?>
	<div class="row">
		<div class="col-md-6">
		  <div class="widget wgreen">
			<div class="widget-content">
			  <div class="padd">
				<?php 
					$ptgsid = $_SESSION['idPetugas'];
					
						$s = mysql_query ("select * from petugas where level = '2' and idPetugas='$ptgsid'");
						$ambil = mysql_fetch_array($s);
					
				?>
			 <form class="form-horizontal" role="form" method="post" action="?modul=setor&act=add" enctype="multipart/form-data">
					<div class="form-group">
					  <label class="col-lg-3 control-label">ID PETUGAS</label>
					  <div class="col-lg-8">
						<input type="text" class="form-control" name="petugas" value="<?php echo $ambil[idPetugas];?>" readonly>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Nama Petugas</label>
					  <div class="col-lg-8">
						<input  class="form-control" value="<?php echo $ambil[nama];?>" readonly >
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Tanggal Setoran</label>
					  <div class="col-lg-8">
						<input  class="form-control" name="tgl_angsuran" id="tgl_angsuran" type="text" placeholder="Tanggal Pelaporan Setoran" >
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Nilai Setoran</label>
					  <div class="col-lg-8">
						<input type="text" class="form-control" name="nilai" placeholder="ex. 1000000 - Tidak pakai pemisah">
					
					  </div>
					</div>
					
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Bukti Setoran</label>
					  <div class="col-lg-8">
						<input type="file" name="bukti">
						<span>Format Bukti setoran wajib (PNG, JPG / JPEG) Max 1 MB</span>
					  </div>
					</div>
					
					 <div class="form-group">
					  <label class="col-lg-3 control-label">Keterangan</label>
					  <div class="col-lg-8">
						<textarea class="cleditor" name="ket"></textarea>
					  </div>
					</div>     
 
					<div class="form-group">
					  <div class="col-lg-offset-2 col-lg-6">

						<button type="submit" class="btn btn-sm btn-success">Proses</button>
	
						<button type="reset" class="btn btn-sm btn-danger">Batal</button>
					  </div>
					</div>
			</form>
                  </div>
                </div>
              </div>  
            </div>

			
			 <div class="col-md-6">
			   <div class="widget wgreen">
                <div class="widget-content">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
						  <thead>
							<tr>
							  <th>No.</th>
							  <th>Nama Petugas</th>
							  <th>Tanggal Setoran</th>
							  <th>Nilai Setoran</th>
							  <th>Bukti</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						<?php 
							$nomorUrut=1;
							$lihatx = mysql_query("select * from buktisetor inner join petugas on petugas.idPetugas = buktisetor.idPetugas
								where buktisetor.idPetugas = '$ptgsid' AND buktisetor.status = 'Selesai'");

							while ($row = mysql_fetch_array($lihatx)){
								$nilairupiah = number_format($row[nilai]);
								echo "<tr>
										<td>$nomorUrut</td>
										<td>$row[nama]</td>
										<td>$row[tgl_setor]</td>
										<td>$nilairupiah</td>
										<td><a href='img/bukti/$row[bukti]' target='_blank'>Bukti</a></td>
										<td>
										<span class='label label-success'>$row[status]</span>
										</td>
										</tr>";
										$nomorUrut++;
							}
						?>
						  </tbody>
						</table>
					</div>

				</div>
			 </div>
			 </div>

          </div>

		<?php }
		else{
		echo "<center>Em... ID Petugas kami catat sementara, karena melakukan aksi yang menurut kami tidak baik";
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=setor&act=listing">';
		}
?>

  