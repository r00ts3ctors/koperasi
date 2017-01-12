<?php 

	// Mendapatkan Modul ACT=
	$m = $_GET['act'];
	
	$min=100;
	$max=999;
	$acakRek = rand($min,$max); // nomor acak
		$id =  5  . "" .$acakRek;
		 // = $_POST[idpetugas];
		$kodekoperasi = $_POST[kode];		
		$nik = $_POST[nik];
		$nama = $_POST[nama];
		$tmplahir= $_POST[tmpLahir];
		$tgllahir= $_POST[tgl_lahir];
		$alamat= $_POST[alamat];
		$kab= $_POST[kab];
		$provinsi= $_POST[provinsi];
		$kelamin= $_POST[kelamin];
		$tlp= $_POST[tlp];
		$email= $_POST[email];
		$pekerjaan= $_POST[pekerjaan];
		$fb= $_POST[fb];
		$level= $_POST[level];
	
	// mendapatkan Tangga 
	if($m =='add'){

		$simpan = mysql_query("INSERT INTO petugas VALUES('$id','$kodekoperasi','$nik','$nama','$tmplahir','$tgllahir','$alamat','$kab','$provinsi','$kelamin','$tlp','$email','$pekerjaan','$fb','$level','')");
			
			if($simpan){
				 echo '<div class="alert alert-success"><h4>Data Petugas Sudah di tambahkan, dan belum di beri Hak akses sistem</h4></div>';
				echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=petugas">';
			}
			else{ 
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=petugas">';
			}

	}
		
	elseif($m =='input'){?>
	
		<div class="row">
           <div class="col-md-8">
              <div class="widget wgreen">
           
                <div class="widget-content">
                  <div class="padd">

                    <br>
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" method="POST" action="?modul=petugas&act=add">
				  	
					<div class="form-group">
					  <label class="col-lg-3 control-label">Petugas Koperasi</label>
					  <div class="col-lg-8">
						<select name="kode" class="form-control" required>
						<option value="">-Pilih Provinsi-</option>
										<?php 
										$sql=mysql_query("select * from pengaturan");
										
										while($b= mysql_fetch_object($sql))
										{?>
										<option value="<?php echo $b->kode_koperasi;?>"><?php echo $b->provinsi;?></option>
										<?php } ?>
									</select>
						</select>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">No KTP</label>
					  <div class="col-lg-4">
						<input type="text" autocomplate="off"  class="form-control"placeholder="No. KTP" name="nik" required>
					  </div>
					  <div class="col-lg-4">
						<input type="text" class="form-control"  name="nama" placeholder="Nama Sesuai KTP" required>
					  </div>
					</div>
					

					<div class="form-group">
					  <label class="col-lg-3 control-label">Tempat / Tanggal Lahir</label>
					  <div class="col-lg-4">
						<input type="text" autocomplate="off" class="form-control"  name="tmpLahir" placeholder="Tempat Lahir">
					  </div>
					  <div class="col-lg-4">
						<input type="text" class="form-control"  name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir">
					  </div>
					</div>
					
					
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Alamat</label>
					  <div class="col-lg-8">
					   <textarea class="form-control" rows="2" name="alamat" placeholder="Alamat Lengkap sesuai KTP"></textarea>
					   </div>
					</div>
					<div class="form-group">
					  <label class="col-lg-3 control-label">Provinsi</label>
					  <div class="col-lg-8">
						 <select id="provinsi" name="provinsi" class="form-control">	
							<option value="">-Pilih Provinsi-</option>
							<?php $q = mysql_query("select * from provinsi ORDER BY Nama");
							while ($ro = mysql_fetch_array($q)){?>
									<option value="<?php echo $ro[Nama];?>"><?php echo $ro[Nama];?></option>
							<?php }
							?>
										
									</select>
						
					  </div>
					</div>
										
					<div class="form-group">
					  <label class="col-lg-3 control-label">Kabupaten / Kota</label>
					  <div class="col-lg-8">
					  <input type="text" name="kab" class="form-control">				   
					  </div>
					</div>
					
					
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Jenis Kelamin</label>
					  <div class="col-lg-3">
						<select name="kelamin"  required class="form-control">
							<option value="">Jenis Kelamin</option>
							<option value="Laki-laki">Laki Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					  </div>
					
					  <label class="col-lg-2 control-label">Level Petugas</label>
					  <div class="col-lg-3">
						<select name="level" class="form-control" required>
							<option value="">Pilih Level</option>
							<option value="2">Manager Regional</option>
							<option value="3">Staf CS</option>
							<option value="4">Staf Taller</option>
						</select>
					  </div>
					  
					</div>

					
					<div class="form-group">
					  <label class="col-lg-3 control-label">No Telepon</label>
					  <div class="col-lg-3">
						<input type="text" class="form-control" autocomplate="off"  name="tlp" placeholder="No Telepon Aktif" required>
					  </div>
					  <div class="col-lg-5">
						<input type="email" class="form-control"  autocomplate="off"  name="email" placeholder="Alamat email Aktif">
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Pekerjaan</label>
					  <div class="col-lg-4">
						<input type="text" class="form-control"  autocomplate="off"  name="pekerjaan" placeholder="ex. Pegawai Koperasi" >
					  </div>
					  <div class="col-lg-4">
						<input type="text" class="form-control" autocomplate="off"  name="fb" placeholder="ID Facebook">
						</div>
					</div>
					
                        <div class="form-group">
							<div class="col-lg-offset-3 col-lg-6">
								<button type="submit" class="btn btn-sm btn-primary">Proses Penambahan</button>
								<button type="reset" class="btn btn-sm btn-danger">Reset</button>
                            </div>
                                
                                </div>
                              </form>
                  </div>
                </div>
				
              </div>  

            </div>
 </div>
	<?php }
	
	
	elseif($m =='edit'){?>
	
	<?php 
		$idp = $_GET['idPetugas'];
		$row =mysql_fetch_array(mysql_query("select * from petugas where idPetugas ='$idp'"));
		
	?>
		<div class="row">
           <div class="col-md-8">
              <div class="widget wgreen">
           
                <div class="widget-content">
                  <div class="padd">

                    <br>
			
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" method="POST" action="?modul=petugas&act=update">
				  			
					<div class="form-group">
					  <label class="col-lg-3 control-label">Petugas Koperasi</label>
					  <div class="col-lg-8">
						<input name="keyID" value="<?php echo $row[idPetugas];?>" type="hidden">
						<select name="kode" class="form-control" required>
						<option value="<?php echo $row[kodeKoperasi]; ?>"><?php echo $row[provinsi]; ?></option>
						<?php
							$ckoperasi = mysql_query("select * from pengaturan where status='Aktif'");
								
								while ($baca =mysql_fetch_array($ckoperasi)){
									echo "<option value='$baca[kode_koperasi]'>$baca[provinsi]</option>";
								}
						
						?>
						</select>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">No KTP</label>
					  <div class="col-lg-4">
						<input type="text" value="<?php echo $row[nik];?>" autocomplate="off"  class="form-control"placeholder="No. KTP" name="nik" required>
					  </div>
					  <div class="col-lg-4">
						<input type="text" class="form-control"  value="<?php echo $row[nama]; ?>" name="nama" placeholder="Nama Sesuai KTP" required>
					  </div>
					</div>
					

					<div class="form-group">
					  <label class="col-lg-3 control-label">Tempat / Tanggal Lahir</label>
					  <div class="col-lg-4">
						<input type="text" autocomplate="off" class="form-control"  value="<?php echo $row[tmpLahir]; ?>" name="tmpLahir" placeholder="Tempat Lahir">
					  </div>
					  <div class="col-lg-4">
						<input type="text" class="form-control"  name="tgl_lahir" id="tgl_lahir" value="<?php echo $row[tglLahir]; ?>" placeholder="Tanggal Lahir">
					  </div>
					</div>
					
					
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Alamat</label>
					  <div class="col-lg-8">
					   <input type="text" class="form-control" name="alamat"  value="<?php echo $row[alamat];?>" placeholder="Alamat Lengkap sesuai KTP Anggota">
					   </div>
					</div>
					<div class="form-group">
					  <label class="col-lg-3 control-label">Kabupaten / Kota</label>
					  <div class="col-lg-8">
						<input type="text" class="form-control" value="<?php echo $row[kab]; ?>" name="kab">
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-lg-3 control-label">Jenis Kelamin</label>
					  <div class="col-lg-3">
						<select name="kelamin"  class="form-control">
							<option value="<?php echo $row[kelamin]; ?>"><?php echo $row[kelamin]; ?></option>
							<option value="Laki laki">Laki Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					  </div>
					  <label class="col-lg-2 control-label">Level Petugas</label>
					  <div class="col-lg-3">
						<select name="level" class="form-control" required>
								
							<option value="<?php echo $row[level]; ?>"><?php echo $row[level]; ?></option>
							<option value="2">Manager Regional</option>
							<option value="3">Staf CS</option>
							<option value="4">Staf Taller</option>
						</select>
					  </div>
					  
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">No Telepon</label>
					  <div class="col-lg-3">
						<input type="text" class="form-control" value="<?php echo $row[tlp];?>" name="tlp" placeholder="No Telepon Aktif" required>
					  </div>
					  <div class="col-lg-5">
						<input type="text" class="form-control"  autocomplate="off"  name="email" value="<?php echo $row[email];?>" placeholder="Alamat email Aktif">
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Pekerjaan</label>
					  <div class="col-lg-4">
						<input type="text" class="form-control"  value="<?php echo $row[pekerjaan]; ?>"  name="pekerjaan" placeholder="Sebenarnya" >
					  </div>
					  <div class="col-lg-4">
						<input type="text" class="form-control" autocomplate="off"  name="fb" value="<?php echo $row[fb]; ?>" placeholder="ID Facebook">
						</div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-3 control-label">Provinsi</label>
					  <div class="col-lg-8">
						<select name="provinsi" class="form-control">
						<option value="<?php echo $row[provinsi]; ?>"><?php echo $row[provinsi]; ?></option>
						<?php 
							$provinsi = mysql_query("select * from provinsi");
							while ($row = mysql_fetch_array($provinsi)){
								echo "<option value='$row[Nama]'>$row[Nama]</optioin>";
							}
						
						?>
						</select>
						
					  </div>
					  
					       
					</div>
                   <div class="form-group">
                   
					  <div class="col-lg-offset-3 col-lg-6">
				<button type="submit" class="btn btn-sm btn-primary">Proses Penambahan</button>
				<button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
				
              </div>  

            </div>
 </div>
	<?php }
	
	elseif($m=='aktif'){
		$update = "UPDATE petugas SET s = 'Aktif'
				WHERE idPetugas = '$_GET[idPetugas]'";
				$doUpdate = mysql_query($update);
				
				$dpetugas  = mysql_query("select * from petugas where idPetugas = '$_GET[idPetugas]'");
					
					$bdp = mysql_fetch_array($dpetugas);
					
						$u= $bdp[idPetugas];
						$p=md5($bdp[tlp]);
						$level=$bdp[level];
						$nama =$bdp[nama];
						$koperasi = $bdp[kodeKoperasi];
						
				$hakakses = mysql_query("INSERT INTO login VALUES(
						'','$u','$p','$level','$nama','$u','$koperasi')");
								
				if($doUpdate){
					echo '<div class="alert alert-success">
						<h4>Berhasil Petugas Baru sudah di Aktifkan.!</h4></div>';
					echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=petugas">';
				}
					else{	
					echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=petugas">';
					}
				
				
	}
	
	elseif($m =='update'){
		
		// echo "ID Anggota : " . $keyID = $_POST[keyID];
		// echo "<br />";
		// echo "Kode Koperasi : " . $kodekoperasi = $_POST[kode];
		// echo "<br />";		
		// echo "KTP : " . $nik = $_POST[nik];
		// echo "<br />";
		// echo "Nama : " . $nama = $_POST[nama];
		
		// echo "<br />";
		// echo "Tempat Lahir : " . $tmplahir= $_POST[tmpLahir];
		// echo "<br />";
		// echo "Tganggal : " .$tgllahir= $_POST[tgl_lahir];
		// echo "<br />";
		// echo "Alamat : " . $alamat= $_POST[alamat];
		// echo "<br />";
		// echo "kab : " . $kab= $_POST[kab];
		// echo "<br />";
		// echo "provinsi : " . $provinsi= $_POST[provinsi];
		// echo "<br />";
		// echo "Kelamin : " . $kelamin= $_POST[kelamin];
		// echo "<br />";
		// echo "phone : " . $tlp= $_POST[tlp];
		// echo "<br />";
		// echo "email : " . $email= $_POST[email];
		// echo "<br />";
		// echo "pekerjaan : " . $pekerjaan= $_POST[pekerjaan];
		// echo "<br />";
		// echo "sosmed : " . $fb= $_POST[fb];
		// echo "<br />";
		// echo "level : " . $level= $_POST[level];
		// echo "<br />";
		// echo "status : " . $status = 'Tunda';
		
		
		// echo '<META HTTP-EQUIV="Refresh" Content="50; URL=?modul=petugas">';
		
		$update = "UPDATE petugas SET
			kodekoperasi 	='$kodekoperasi',
			nik				='$nik',
			nama 			='$nama',
			tmplahir		='$tmplahir',
			tgllahir		='$tgllahir',
			alamat			='$alamat',
			kab				='$kab',
			provinsi		='$provinsi',
			kelamin			='$kelamin',
			tlp				='$tlp',
			email			='$email',
			pekerjaan		='$pekerjaan',
			fb				='$fb',
			level			='$level',
			s				='$status'
			WHERE idPetugas = '$_POST[keyID]'";
		$updateOK = mysql_query($update);
		if($updateOK){
			echo '<div class="alert alert-warning"><h4>Data Petugas Berhasil di Update</h4></div>';
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=petugas">';
		}
		else{
		echo '<div class="alert alert-warning"><h4>Ups... gagal dalam melakukan proses</h4></div>';
		echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=petugas">';
		}
		
		
	}
	
	elseif($m =='hapus'){
		 // $query =mysql_fetch_array(mysql_query("SELECT idPetugas FROM petugas WHERE idPetugas = '$_GET[idPetugas]'"));
    			   mysql_query("DELETE FROM petugas WHERE idPetugas ='$_GET[idPetugas]'");
				   echo '<div class="alert alert-warning">
                     <h4>Data Petugas Koperasi Berhasil di hapus</h4>
                    </div>';
					echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=petugas">';
	}
	
	elseif($m=='detail'){?>
		<?php
$idp	=$_GET['idPetugas'];
$qData=mysql_query("SELECT * FROM petugas 
					WHERE idPetugas='$idp'");

$data=mysql_fetch_object($qData);
//$query	=mysql_query('SELECT * from t_pengaturan');
//$skol	=mysql_fetch_array($query);
?>

<div class="row">
	<div class="col-md-12">
		<div class="content">
	<script type="text/javascript">
function tutup(){
	window.close();
}	
</script>
<table align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="54" colspan="3" align="center" id="fB"><b>DATA PETUGAS KOPERASI</b><br />
			Koperasi Pusat Anak Bangsa
		</td>
	</tr>
    <tr>
		<td height="31" colspan="3" align="center" id="fB"><h3><b>No PETUGAS = <?php echo $data->idPetugas;?> LEVEL = 
		<?php 
			if($data->level =='1'){
				echo "Administrator";
			}
			elseif($data->level =='2'){
				echo "Manager Regional";
			}
			elseif($data->level =='3'){
				echo "Staf CS";
			}
			elseif($data->level =='4'){
				echo "Staf Taller";
			}
			else{
				echo "Anggota Koperasi";
			}
			
		
		?></h3>
		</b></td>
</tr>
	<tr >
    	
		<td width="113">&nbsp;Nama Petugas</td>
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
		<td width="113" valign="top">&nbsp;Kota/Kab</td>
		<td width="232">: <?php echo $data->kab;?></td>
	</tr>
    <tr >
		<td width="113" valign="top">&nbsp;Alamat</td>
		<td width="232">: <?php echo $data->alamat;?></td>
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
                  <div class="pull-left">LIST PETUGAS / MANAGER DAN STAF</div>
                  <div class="widget-icons pull-right">
                    <a href="?modul=petugas&act=input">TAMBAH PETUGAS</a>
					<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Nama Lengkap</th>
							  <th>ID Anggota</th>
							  <th>Posisi</th>
							  <th>Telepon</th>
							  <th>IDKoperasi / Wilayah</th>
							  <th>Status</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
								<?php 
									$nomor=1;
									$ptgs = mysql_query("select * from petugas");
									while ($r = mysql_fetch_array($ptgs)){
										echo "<tr>
											<td>$nomor</td>
											<td>$r[nama]</td>
											<td>$r[idPetugas]</td>";
											if($r[level] =='1'){
												echo "	<td>Administrator </td>";
											}
											elseif($r[level] =='2'){
												echo "	<td>Manager </td>";
											}
												elseif($r[level] =='3'){
												echo "	<td>Staf CS </td>";
											}
												elseif($r[level] =='4'){
												echo "	<td>Staf Taller  </td>";
											}
											
											else{
												echo "	<td>Member</td>";
											}
										
											echo "<td>$r[tlp]</td>
											<td>$r[kodeKoperasi] - $r[provinsi]</td>";
											if($r[s]=='Aktif'){
											echo "<td><span class='label label-success'>Aktif</span></td>";	
											}
											else{
				echo "<td><a href='?modul=petugas&act=aktif&idPetugas=$r[idPetugas]' class='label label-danger'>Tunda</a></td>";
											}
											 
										echo "<td>

  <a href='?modul=petugas&act=edit&idPetugas=$r[idPetugas]' class='btn btn-xs btn-success' title='Fitur Edit'><i class='fa fa-pencil'></i> </a>
  
  <a href='?modul=petugas&act=detail&idPetugas=$r[idPetugas]' class='btn btn-xs btn-warning' onClick=\"centeredPopup(this.href,'myWindow','600','500','yes');return false\"><i class='fa fa-check' title='Fitur Detail'></i> </a>
  
  <a href='?modul=petugas&act=hapus&idPetugas=$r[idPetugas]' class='btn btn-xs btn-danger'><i class='fa fa-times'></i> </a>

</td>
										</tr>";
										$nomor++;
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

?>


           


