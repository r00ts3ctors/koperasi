	<script type="text/javascript">
function tutup(){
	window.close();
}	
</script>
<?php 
	error_reporting(1);
	$m = $_GET['act'];
 
 $min=1000;
 $max=9999;
	$acakRek = rand($min,$max); // nomor acak
	$saat = date("sid"); // saat daftar
	$nomorReg =  15  . "" . $saat . "" .$acakRek;
	
	
	
	if($m == 'input'){?>
          <div class="row">
            <div class="col-md-12">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Form Pendataan Anggota</div>
                  <div class="widget-icons pull-right">
                <button class="btn btn-danger btn-sm" onclick="window.location.href='?modul=anggota'" >List Anggota</button>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">

                    <br />
                     <form autocomplete="off" class="form-horizontal" role="form" method="POST" action = "?modul=anggota&act=add">
							<div class="col-md-6">
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Nama Anggota</label>
                                  <div class="col-lg-4">
                                    <input name="nama1" type="text" class="form-control" placeholder="Nama Depan">
                                  </div>
								  <div class="col-lg-4">
                                    <input name="nama2" type="text" class="form-control" placeholder="Nama Belakang">
                                  </div>
                                </div>
								<div class="form-group">
							  <label class="col-lg-4 control-label">Tempat / Tanggal Lahir</label>
							  <div class="col-lg-4">
								<input type="text" name="tmpLahir" class="form-control" placeholder="Tempat Lahir">
							  </div>  
							  <div class="col-lg-4">
								<input type="text" name="tglLahir" class="form-control" id="tgl_simpan" placeholder="Tanggal Lahir">
							  </div>
							</div>
							
								<div class="form-group">
                                  <label class="col-lg-4 control-label">Telepon / Email</label>
                                  <div class="col-lg-4">
                                    <input type="text" name = "tlp" class="form-control" placeholder="NO Telepon">
                                  </div> 
								  <div class="col-lg-4">
                                    <input type="text"  name= "email" class="form-control" placeholder="Alamat email">
                                  </div>
                                </div>
								
							<div class="form-group">
							  <label class="col-lg-4 control-label">No KTP</label>
							  <div class="col-lg-8">
								<input type="text" name="nik" class="form-control" placeholder="No KTP" autocomplete="off">
							  </div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-4 control-label">Kode Koperasi</label>
								<div class="col-lg-8">
									<select class="form-control" name="kodekoperasi">
									<?php 
										$kdkoperasi = mysql_query("select * from pengaturan");
										while($r = mysql_fetch_array($kdkoperasi)){
											echo "<option value='$r[kode_koperasi]'>$r[kode_koperasi] - $r[provinsi]</option>";
											
										}
									
									?>
									 
									</select>
								  </div>
								</div> 
							
							
						
						
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Jenis Kelamin</label>
                                  <div class="col-lg-8">
                                    <select class="form-control" name = "kelamin">
                                      <option value="Laki Laki">Laki - Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                          
                                    </select>
                                  </div>
                                </div>    
								
							
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">ID Facebook</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "fb" class="form-control" placeholder="ID Facebook - Dapat di abaikan">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">ID Fifteen</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "idfifteen" class="form-control" placeholder="ID Fifteen - Dapat di abaikan">
                                  </div>
                                </div>
								
								
							</div>

							<div class="col-md-6">
							
							
									<div class="form-group">
                                  <label class="col-lg-4 control-label">Pekerjaan</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" name = "pekerjaan" placeholder="Jenis Pekerjaan / Katagori">
                                  </div>
                                </div>
							
							
									
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Hobby</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" name="hobby" placeholder="Kegeraman Member">
                                  </div>
                                </div>
								

							<div class="form-group">
                                  <label class="col-lg-4 control-label">Provinsi</label>
                                  <div class="col-lg-8">
                                    <select class="form-control" name = "provinsi">
                                      <?php 
										$provinsi = mysql_query("select * from provinsi");
										while ($r = mysql_fetch_array($provinsi)){
											echo "<option value='$r[Nama]'>$r[Nama]</option>";
										}
									  
									  ?>
                                    </select>
                                  </div>
                                </div>     
								
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Kabupaten</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "kab" class="form-control" placeholder="Kabupaten / Kota Member">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">Kecamatan</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="kec"  class="form-control" placeholder="Kecamatan Member">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">Kelurahan</label>
                                  <div class="col-lg-8">
                                    <input type="text" name ="desa" class="form-control" placeholder="Desa / Kelurahan">
                                  </div>
                                </div>
						
							   <div class="form-group">
							  <label class="col-lg-4 control-label">Alamat</label>
							  <div class="col-lg-8">
								<textarea placeholder="Alamat Lengkap plus kode POS" class="form-control" rows="2" name="alamat"></textarea>
							  </div>
							</div>  
							<div class="form-group">
                                  <div class="col-lg-offset-4 col-lg-6">
                                    <button type="submit" class="btn btn-sm btn-success" >Proses</button>
                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                  </div>
                                </div>
							</div>
							

                                
                                
                                <div class="form-group">
                                
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  

            </div>

          </div>

       
	
	<?php }
	
	elseif($m =='hapus'){
		
		 // $query = mysql_query("SELECT idAnggota FROM anggota WHERE idAnggota = '$_GET[idAnggota]'");
    			   mysql_query("DELETE FROM anggota WHERE idAnggota ='$_GET[idAnggota]'");
				   echo '<div class="alert alert-warning">
                     <h4>Data Anggota Koperasi Berhasil di hapus</h4>
                    </div>';
					echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=anggota">';
		
	}
	
	elseif($m =='add'){
			$namaDepan = $_POST[nama1];
			$namaBelakang = $_POST[nama2];
		
		$nama =  $namaDepan . " " . $namaBelakang;
		$ktp 			= $_POST[nik];
		$koperasi 		= $_POST[kodekoperasi];
		$tmplahir 		= $_POST[tmpLahir];
		$tgllahir 		= $_POST[tglLahir];
		$kelamin 		= $_POST[kelamin];
		$tlp	 		= $_POST[tlp];
		$email	 		= $_POST[email];
		$fb		 		= $_POST[fb];
		$fifteen 		= $_POST[idfifteen];
		$pekerjaan		= $_POST[pekerjaan];
		$hobby			= $_POST[hobby];
		$provinsi		= $_POST[provinsi];
		$kab			= $_POST[kab];
		$kec			= $_POST[kec];
		$desa			= $_POST[desa];
		$alamat			= $_POST[alamat];
		$petugas		= $_SESSION[idPetugas];
		$tglDaftar		= date("Y-m-d H:i:s");
		
		
		$save = mysql_query("INSERT INTO anggota VALUES(
			'',
			'$nomorReg',
			'$koperasi',
			'$ktp',
			'$nama',
			'$tmplahir',
			'$tgllahir',
			'$alamat',
			'$kab',
			'$provinsi',
			'$kelamin',
			'$tlp',
			'$email',
			'$hobby',
			'$pekerjaan',
			'$fb',
			'$fifteen',
			'$petugas',
			'0',
			'$tglDaftar',
			'$kec',
			'$desa')");
		 if($save){
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=anggota">';
		 }
		else{
			echo '<div class="alert alert-warning">
                     <h4>Anda Gagal Input</h4>
                    </div>';
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=anggota&act=input">';
		}
	}
	
	elseif($m =='edit'){?>
		
		<?php 
		$id = $_GET['idAnggota'];
		$list = mysql_fetch_array(mysql_query("select * from anggota where idAnggota='$id'"));
		
		
		?>
		
		<div class="row">
            <div class="col-md-12">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Form Pendataan Anggota</div>
                  <div class="widget-icons pull-right">
                <button class="btn btn-danger btn-sm" onclick="window.location.href='?modul=anggota'" >List Anggota</button>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
			
                    <br />
                     <form class="form-horizontal" role="form" method="POST" action = "?modul=anggota&act=update">
							<div class="col-md-6">
							<div class="form-group">
							  <label class="col-lg-4 control-label">Rekening Anggota</label>
							  <div class="col-lg-8">
								<input type="text"  class="form-control" name="noRekening" readonly value="<?php echo $list[noRekening]; ?>">
							  </div>
							</div>
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Nama Anggota
								  
								  
								  </label>
                                  <div class="col-lg-4">
									<input name = "idAnggota" type="hidden" value="<?php echo $list[idAnggota]; ?>">
                                    <input name="nama1" type="text" class="form-control" placeholder="Nama Depan"
									value ="<?php 
											$namalengkap = $list[nama];
											$pisah = explode(" ",$namalengkap);
											echo $nama1 = $pisah[0];?>">
                                  </div>
								  <div class="col-lg-4">
                                    <input name="nama2" type="text" class="form-control" placeholder="Nama Belakang"
										value ="<?php 
													$namalengkap = $list[nama];
													$pisah = explode(" ",$namalengkap);
													echo $nama2 = $pisah[1];?>">
                                  </div>
                                </div>
								
							<div class="form-group">
							  <label class="col-lg-4 control-label">No KTP</label>
							  <div class="col-lg-8">
								<input type="text" name="nik" class="form-control" value="<?php echo $list[nik]; ?>">
							  </div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-4 control-label">Kode Koperasi</label>
								<div class="col-lg-8">
									<select class="form-control" name="kodekoperasi">
									<?php 
										$kode = $list[kodeKoperasi];
										$prov = $list[provinsi];
										$kdkoperasi = mysql_query("select * from pengaturan");
										
										$wilayahKoperasi = mysql_fetch_array(mysql_query("select * from pengaturan where kode_koperasi ='$kode'"));
										$wilkoperasi = $wilayahKoperasi[provinsi];
										
										echo "<option value='$kode'> $kode - $wilkoperasi</option>";
										while($r = mysql_fetch_array($kdkoperasi)){
											echo "<option value='.$r[kode_koperasi].'>$r[kode_koperasi] - $r[provinsi]</option>";
											
										}
									
									?>
									 
									</select>
								  </div>
								</div> 
							
							<div class="form-group">
							  <label class="col-lg-4 control-label">Tempat / Tanggal Lahir</label>
							  <div class="col-lg-4">
								<input type="text" name="tmpLahir" class="form-control" value ="<?php echo $list[tmpLahir];	?>">
                                  
							  </div>  
							  <div class="col-lg-4">
								<input type="text" name="tglLahir" id=""class="form-control" value ="<?php echo $list[tglLahir];	?>">
							  </div>
							</div>
						
						
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Jenis Kelamin</label>
                                  <div class="col-lg-8">
                                    <select class="form-control" name = "kelamin">
                                      <option value ="<?php echo $list[kelamin];	?>"><?php echo $list[kelamin]; ?></option>
                                      <option value="Laki Laki">Laki - Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                          
                                    </select>
                                  </div>
                                </div>    
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">Telepon / Email</label>
                                  <div class="col-lg-4">
                                    <input type="text" name = "tlp" class="form-control" value ="<?php echo $list[tlp];	?>">
                                  </div> 
								  <div class="col-lg-4">
                                    <input type="text"  name= "email" class="form-control" value ="<?php echo $list[email];	?>">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">ID Facebook</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "fb" class="form-control"value ="<?php echo $list[fb];	?>">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">ID Fifteen</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "idfifteen" class="form-control" value ="<?php echo $list[idFifteen];	?>">
                                  </div>
                                </div>
								
								
							</div>

							<div class="col-md-6">
							
							
									<div class="form-group">
                                  <label class="col-lg-4 control-label">Pekerjaan</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" name = "pekerjaan" value ="<?php echo $list[pekerjaan];	?>">
                                  </div>
                                </div>
							
							
									
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Hobby</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" name="hobby" value ="<?php echo $list[hobby];	?>">
                                  </div>
                                </div>
								

							<div class="form-group">
                                  <label class="col-lg-4 control-label">Provinsi</label>
                                  <div class="col-lg-8">
                                    <select class="form-control" name = "provinsi">
                                      <?php 
									  
										echo "<option value='$list[provinsi]'>$list[provinsi]</option>";
										
										$provinsi = mysql_query("select * from provinsi");
										while ($r = mysql_fetch_array($provinsi)){
											echo "<option value='$r[namaProvinsi]'>$r[namaProvinsi]</option>";
										}
									  
									  ?>
                                    </select>
                                  </div>
                                </div>     
								
							<div class="form-group">
                                  <label class="col-lg-4 control-label">Kabupaten</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "kab" class="form-control" value ="<?php echo $list[kab];	?>">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">Kecamatan</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="kec"  class="form-control" value ="<?php echo $list[kec];	?>">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-4 control-label">Kelurahan</label>
                                  <div class="col-lg-8">
                                    <input type="text" name ="desa" class="form-control" value ="<?php echo $list[desa];	?>">
                                  </div>
                                </div>
						
							   <div class="form-group">
							  <label class="col-lg-4 control-label">Alamat</label>
							  <div class="col-lg-8">
								<input type="text" name ="alamat" class="form-control" value ="<?php echo $list[alamat];	?>">
							  </div>
							</div>  
							<div class="form-group">
                                  <div class="col-lg-offset-4 col-lg-6">
                                    <button type="submit" class="btn btn-sm btn-success" >Proses</button>
                                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                  </div>
                                </div>
							</div>
							

                                
                                
                                <div class="form-group">
                                
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  

            </div>

          </div>
	<?php }
	
	elseif($m =='update'){
			$namaDepan = $_POST[nama1];
			$namaBelakang = $_POST[nama2];
	
		$nama =  $namaDepan . " " . $namaBelakang;
		
		$ktp 			= $_POST[nik];
		$koperasi 		= $_POST[kodekoperasi];
		$tmplahir 		= $_POST[tmpLahir];
		$tgllahir 		= $_POST[tglLahir];
		$kelamin 		= $_POST[kelamin];
		$tlp	 		= $_POST[tlp];
		$email	 		= $_POST[email];
		$fb		 		= $_POST[fb];
		$fifteen 		= $_POST[idfifteen];
		$pekerjaan		= $_POST[pekerjaan];
		$hobby			= $_POST[hobby];
		$provinsi		= $_POST[provinsi];
		$kab			= $_POST[kab];
		$kec			= $_POST[kec];
		$desa			= $_POST[desa];
		$alamat			= $_POST[alamat];
		$petugas		= $_SESSION[idPetugas];
		$namapetugas		= $_SESSION[nama];
		
		$tglDaftar		= date("Y-m-d H:i:s");
		
		$update = "UPDATE anggota SET
			
			kodeKoperasi = '$koperasi',
			nik ='$ktp',
			nama ='$nama',
			tmpLahir='$tmplahir',
			tglLahir='$tgllahir',
			alamat='$alamat',
			kab='$kab',
			provinsi='$provinsi',
			kelamin='$kelamin',
			tlp='$tlp',
			email='$email',
			hobby='$hobby',
			pekerjaan='$pekerjaan',
			fb='$fb',
			idFifteen='$fifteen',
			idPetugas='$petugas',
			tglDaftar='$tglDaftar',
			kec='$kec',
			desa='$desa'
				WHERE idAnggota = '$_POST[idAnggota]'";
		$doUpdate = mysql_query($update);
		
		if($doUpdate){
			echo '<div class="alert alert-warning"><h4>Data Anggota Berhasil di Update oleh '.$petugas.' - '.$namapetugas.'</h4></div>';
			echo '<META HTTP-EQUIV="Refresh" Content="1; URL=?modul=anggota">';
		}
		else{
			echo '<div class="alert alert-warning"><h4>Anda Gagal Input</h4></div>';
		}
		
	}
	
	elseif($m =='detail'){?>
		
			<?php
			$id	=$_GET['idAnggota'];
			$qData=mysql_query("SELECT * FROM anggota 
								WHERE idAnggota='$id'");

			$data=mysql_fetch_object($qData);
			//$query	=mysql_query('SELECT * from t_pengaturan');
			//$skol	=mysql_fetch_array($query);
			?>

<div class="row">
	<div class="col-md-12">
		<div class="content">


<table align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="54" colspan="3" align="center" id="fB"><b>DATA ANGGOTA KOPERASI</b><br />
			Koperasi Pusat Anak Bangsa
		</td>
	</tr>
    <tr>
		<td height="31" colspan="3" align="center" id="fB"><b>No Rekening = <?php echo $data->noRekening;?></b></td>
</tr>
	<tr >
    	
		<td width="113">&nbsp;Nama Anggota</td>
		<td width="232">: <?php echo $data->nama;?></td>
	</tr>
    
	<tr >
		<td width="113">&nbsp;Jenis Kelamin</td>
		<td width="232">: <?php echo $data->kelamin;?></td>
	</tr>
	<tr >
		<td width="113">&nbsp;Tempat Lahir</td>
		<td width="232">: <?php echo $data->tmpLahir;?></td>
	</tr>
	<tr >
		<td width="113">&nbsp;Tanggal Lahir</td>
		<td width="232">: <?php echo $data->tglLahir;?></td>
	</tr>
    <tr >
		<td width="113" valign="top">&nbsp;Alamat</td>
		<td width="232">: <?php echo $data->alamat;?></td>
	</tr>
	<tr >
		<td width="113" valign="top">&nbsp;Kelurahan</td>
		<td width="232">: <?php echo $data->desa;?></td>
	</tr>
    <tr >
		<td width="113" valign="top">&nbsp;Kecamatan</td>
		<td width="232">: <?php echo $data->kec;?></td>
	</tr>
    <tr >
		<td width="113" valign="top">&nbsp;Kota/Kab</td>
		<td width="232">: <?php echo $data->kab;?></td>
	</tr>
	 <tr >
		<td width="113" valign="top">&nbsp;Provinsi</td>
		<td width="232">: <?php echo $data->provinsi;?></td>
	</tr>
	
	<tr >
		<td width="113">&nbsp;No. Telepon</td>
		<td width="232">: <?php echo $data->tlp;?></td>
	</tr>
	<tr >
		<td width="113">&nbsp;Alamat Email</td>
		<td width="232">: <?php echo $data->email;?></td>
	</tr>
	<tr>
		<td width="113">&nbsp;Pekerjaan</td>
		<td width="232">: <?php echo $data->pekerjaan;?></td>
	</tr>
		<tr>
		<td width="113">&nbsp;Hobby</td>
		<td width="232">: <?php echo $data->hobby;?></td>
	</tr>
	
	<tr >
		<td width="113">&nbsp;ID Fifteen</td>
		<td width="232">: <?php echo $data->idFifteen;?></td>
	</tr>
	<tr >
		<td width="113">&nbsp;Kode Koperasi</td>
		<td width="232">: <?php echo $data->kodeKoperasi;?></td>
	</tr>

    <tr  >
		<td>&nbsp;</td>
        <td colspan="2"><input type="button" class="btn btn-warning" onclick="return tutup();" value="Tutup" /></td>
	</tr>
</table>
	
		</div>

	</div>
</div>
		
		
	<?php }
	
	else{?>
	     <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">LIST ANGGOTA</div>
                  <div class="widget-icons pull-right">
                   <button class="btn btn-danger" onclick="window.location.href='?modul=anggota&act=input'" >Tambah Anggota</button>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
							<!-- Table Page -->
							<div class="page-tables">
								<!-- Table -->
								<div class="table-responsive">
									<table class="table table-striped table-hover table-responsive table-bordered">
										<thead>
											<tr>
												<th>Nama Anggota</th>
												<th>No Rekening</th>
												<th>ID Koperasi</th>
												<th>No Telepon</th>
												<th>Saldo</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$x = mysql_query("select * from anggota");
											while($row = mysql_fetch_array($x)){
												$saldo = rupiah($row[saldo]);
												
												echo "<tr>
													<td>$row[nama]</td>
													<td>$row[noRekening]</td>
													<td>$row[kodeKoperasi]</td>
													<td>$row[tlp]</td>
													<td>$saldo</td>
													<td>
													<a href='?modul=anggota&act=hapus&idAnggota=$row[idAnggota]'>
													<span class='label label-danger'>Hapus</span>
													</a>
													
													<a href='?modul=anggota&act=edit&idAnggota=$row[idAnggota]'>
													<span class='label label-warning'>Edit</span>
													</a>
												
													<a href='?modul=anggota&act=detail&idAnggota=$row[idAnggota]' onClick=\"centeredPopup(this.href,'myWindow','600','500','yes');return false\">
													<span class='label label-info'>Detail</span>
													</a>
													</td>
												</tr>";
											}
										
										?>
											
											
										</tbody>
								
									</table>
									<div class="clearfix"></div>
								</div>
								</div>
							</div>

					
                  </div>
            
                </div>
              </div>  
              
            </div>
	<?php }


?>