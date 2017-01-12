
 <?php 
	// simpanan dan penarikan 
 $fituradmin = $_SESSION['level'];
 $managerWil = $_SESSION['kodeKoperasi'];
	$m = $_GET['act'];
	
	if($m =='input'){?>
		
	 <div class="row">
            <div class="col-md-12">
				<div class="widget wgreen">
				<div class="widget-content">
                  <div class="padd">
                    <br />
					<?php 
						$getID = $_GET['idAnggota'];
						$getList = mysql_query("select * from anggota where idAnggota = '$getID'");
						$row = mysql_fetch_object($getList);
					?>
                    <!-- Form starts.  -->
                     <form autocomplete="off" class="form-horizontal" role="form" method="POST" action="?modul=simpan&act=proses">
                               <div class="col-md-6">
							  
							  <div class="form-group">
                                  <label class="col-lg-3 control-label">No Rekening</label>
                                  <div class="col-lg-8">
				<input type="hidden" name="idAnggota" value="<?php echo $row->idAnggota;?>">
			
                                    <input type="text" name="norekening" class="form-control"  value="<?php echo $row->noRekening;?>" readonly>
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Nama Lengkap</label>
                                  <div class="col-lg-8">
                                    <input type="text" name="nama" class="form-control"  value="<?php echo $row->nama;?>" readonly>
                                  </div>
                                </div>
								
								
								<div class="form-group">
                                  <label class="col-lg-3 control-label"></label>
                                  <div class="col-lg-5">
                                    <?php
										$result = mysql_query("SELECT * from layanan WHERE tipe='simpan'");  
										$jsArray = "var prdName = new Array();\n"; 
										echo '<select name="idLayanan" id="idLayanan" class ="form-control" required onchange="document.getElementById(\'jasa\').value = prdName[this.value]" onclick="fresh()">';  
										echo '<option value="" selected >JENIS SIMPANAN</option>';  
										while ($row = mysql_fetch_array($result)) {  
											 echo '<option value="' . $row['idLayanan'] . '">' . $row['namaLayanan'] . '</option>';  
											 $jsArray .= "prdName['" . $row['idLayanan'] . "'] = '" . addslashes($row['jasa']) . "';\n";  
										}  
										echo '</select>'; 
									?>
														  </div>
								  <div class="col-lg-3">
                                    <input type="text" name ="jasa" class="form-control" name="jasa" id="jasa" readonly value="<?php echo $data[jasa]?>">
									<script type="text/javascript">  
										<?php echo $jsArray; ?>  
									</script>
                                  </div>
                                </div> 
								
								 <div class="form-group">
                                  <label class="col-lg-3 control-label"></label>
                                  <div class="col-lg-5">
                                    <select name="jenis_transaksi" class="form-control" required>
										<option value="">JENIS TRANSAKSI</option>
										<option value="SETOR">SETOR</option>
										<option value="TARIK">TARIK</option>
									</select>
								</div>
								
								
								<div class="col-lg-3">
                                    <input type="text" name="tgl_simpan" id="tgl_simpan" required class="form-control" placeholder="Tgl Simpan">
                                  </div>
								
                                </div> 
								
								
							   </div>
							   
							    <div class="col-md-6">
							   <div class="form-group">
                                  <label class="col-lg-2 control-label">Jumlah</label>
                                  <div class="col-lg-10">
                                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Simpanan" autocomplete="off" required>
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Keterangan</label>
                                  <div class="col-lg-10">
                                    <textarea name="ket" class="form-control" rows="3" placeholder="Keterangan Simpanan - Bisa di kosongkan"></textarea>
                                  </div>
								
								   
                                </div>  
								  <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                   
                               
                                    <button type="submit" class="btn btn-sm btn-success">Proses</button>
                                    <button type="reset" class="btn btn-sm btn-default" onclick="goBack();" >Reset</button>
                         
                                  </div>
                                </div>
							   </div>
							   
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <div class="col-lg-offset-2 col-lg-6">
                                   
                                  </div>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
                  
              </div>  

            </div>

          </div>

  	<?php }
	
	elseif($m =='proses'){
		 $idanggota				=$_POST['idAnggota'];
			
			$p = mysql_query("select * from anggota where idAnggota ='$idanggota'");
			$row = mysql_fetch_array($p);
		
		
		  $rekening				=$_POST['norekening'];
		  $nama					=$_POST['nama'];
		  $kodelayanan			=$_POST['idLayanan']; // kodelayanan
		  $jasa					=$_POST['jasa']; // jasa di layanan
		  $jenis_transaksi		=$_POST['jenis_transaksi']; //namalayanan
		  $tgl_simpan			=$_POST['tgl_simpan']; 
		  $jumlah				=$_POST['jumlah'];
		  $ket					=$_POST['ket'];
		  $idpetugas				=$_SESSION['idPetugas'];
		  $kodekoperasi			= $row[kodeKoperasi]; // idkoperasi
		  $detil_waktu			= date("Y-m-d H:i:s");
		  $notransaksi			=rand(1111111,99999999);
		
		// kode_layanan = idlayanan
		// kode_anggota = idAnggota
		if($jenis_transaksi =='SETOR'){
				
							
		$sql=mysql_query("INSERT INTO simpanan VALUES ('','$idanggota','$idpetugas','$kodekoperasi','$kodelayanan','SETOR','$jumlah','','$jasa','$jumlah','$tgl_simpan','$detil_waktu','$ket')");
				
						
				$qSaldo		=mysql_query("SELECT * FROM anggota WHERE idAnggota='$idanggota'");
				
				$saldo		=mysql_fetch_array($qSaldo);
				$saldo_lama	=$saldo[saldo];
				$saldo_baru	=$saldo_lama+$jumlah;
				
				$qUpSaldo	=mysql_query("UPDATE anggota SET saldo='$saldo_baru' WHERE idAnggota='$idanggota' ");
				
				$kas		=mysql_query("INSERT INTO kas VALUES ('','$notransaksi','$tgl_simpan','Simpanan an. $saldo[nama]','$idpetugas','$idanggota',
				'$kodekoperasi','$kodelayanan',$jumlah,'','$detil_waktu')");
				
				
				
				
					if($sql && $qUpSaldo){
					echo '<div class="alert alert-warning"><h4>Proses Simpanan Anggota Berhasil</h4></div>';
					echo '<META HTTP-EQUIV="Refresh" Content="1; URL=?modul=simpan">';
					}
					else{
						echo '<div class="alert alert-warning"><h4>Proses Simpanan Anggota Gagal Silahkan Coba Lagi</h4></div>';
					}
				}
			elseif($jenis_transaksi =='TARIK'){		
					
				
				$qMasuk		=mysql_query("SELECT SUM(jumlah) as debet FROM simpanan WHERE kodeLayanan ='$kodelayanan' AND JenisTransaksi ='SETOR' AND idAnggota='$idanggota'");
				
				$debet		=mysql_fetch_array($qMasuk);
				$masukan	=$debet[debet];
				
				$qKeluar	=mysql_query("SELECT SUM(jumlah) as kredit FROM simpanan WHERE kodeLayanan ='$kodelayanan' AND JenisTransaksi='TARIK' AND idAnggota='$idanggota'");
				
				$kredit		=mysql_fetch_array($qKeluar);
				$keluaran	=$kredit[kredit];
				
				$validasi	=$masukan+$keluaran;
				
				
			if($jumlah > $validasi ){
						?>
							<script type="text/javascript">
								alert("Maaf... tidak bisa melakukan penarikan <?php echo $kode_layanan ?> melebihi periksa kembali ");
								window.location='?modul=simpan';
							</script>
						<?php					
				}else{
				$sql=mysql_query("INSERT INTO simpanan VALUES ('','$idanggota','$idpetugas','$kodekoperasi','$kodelayanan','TARIK','','$jumlah','$jasa','$jumlah','$tgl_simpan','$detil_waktu','$ket')");
				
				
					$qSaldo		=mysql_query("SELECT * FROM anggota WHERE idAnggota='$idanggota'");
					$saldo		=mysql_fetch_array($qSaldo);
					$saldo_lama	=$saldo[saldo];
					$saldo_baru	=$saldo_lama-$jumlah;
					$qUpSaldo	=mysql_query("UPDATE anggota SET saldo='$saldo_baru' WHERE idAnggota='$idanggota' ");
					
		$kas		=mysql_query("INSERT INTO kas VALUES ('','$notransaksi','$tgl_simpan','Simpanan an. $saldo[nama]','$idpetugas','$idanggota',
				'$kodekoperasi','$kodelayanan','','$jumlah','$detil_waktu')");
					
						if($sql && $qUpSaldo){
						echo '<div class="alert alert-warning"><h4>Proses Penarikan Anggota Berhasil</h4></div>';
						echo '<META HTTP-EQUIV="Refresh" Content="1; URL=?modul=simpan">';
						}
						else{
							echo '<div class="alert alert-warning"><h4>Proses Penarikan Anggota Gagal Silahkan Coba Lagi</h4></div>';
							echo '<META HTTP-EQUIV="Refresh" Content="1; URL=?modul=simpan">';
						}
				}
				
					}
		
		
		
	}
	
	
	
	else{?>
		<div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Listing Member</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
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
												<th>No Rekening</th>
												<th>Nama Anggota</th>
												<th>No KTP</th>
												<th>No Telepon</th>

												<th>Saldo</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
		<?php 
			$anggota = mysql_query("select * from anggota");
			while ($r = mysql_fetch_array($anggota)){
				$saldo = rupiah($r[saldo]);
				$rek = rek($r[noRekening]);
				
				echo "<tr>
						<td>$rek</td>
						<td>$r[nama]</td>
						<td>$r[nik]</td>
						<td>$r[tlp]</td>
						<td>$saldo</td>
						<td>
							<a href='?modul=simpan&act=input&idAnggota=$r[idAnggota]'>
							<button class='btn btn-info btn-sm'> PROSES</button></a>
						</td>
						</tr>";
						
			}
		
		
		?>
											
											
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

<script type="text/javascript">
function goBack() {
    window.history.back();
}
</script>