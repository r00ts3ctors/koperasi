
	<?php 
		$saldoTotal = mysql_query("select SUM(jumlah) AS Totalsaldo from simpanan where JenisTransaksi = 'SETOR'");
		$saldo = mysql_fetch_array($saldoTotal);
		
		$saldoTotal2 = mysql_query("select SUM(jumlah) as PenarikanTotal from simpanan where JenisTransaksi='TARIK'");
		$saldoPenarikan = mysql_fetch_array($saldoTotal2);
		
		$saldoTotal3 = mysql_query("select SUM(jmlAngsuran) as jmlh from angsur");
		$saldoAngsuran = mysql_fetch_array($saldoTotal3);
		
		$totalKas = $saldo[Totalsaldo] - $saldoPenarikan[PenarikanTotal]; 

	?>			
				
					
				<div class="row">
				<div class="col-md-12">
				
				<div class="alert alert-warning">
					
                     <h4>Selamat Datang</h4>
					 <p>Sistem informasi koperasi ini, pada sistem ini anda dapat melakukan proses simpan dan pinjam dimana manual peminjaman dapat anda temui di bagian panduan aplikasi. saat ini sistem ini masih dalam versi beta dan untuk upgrade sistem akan di kerjakan secara bertahap.</p>

					<p>
					Sebagai informasi, jangan lakukan proses kegiatan jika id dan level anda tidak di tanyang kan di bagian pojok kanan atas. dan untuk dapat menggunakan sistem ini kembali saat kondisi terjadi klik link  <a href="logout.php" target="_blank">berikut</a>
					</p>
 					 </div>
					</div>
			
			<div class="col-md-12">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Sekilah Informasi Sistem</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd statement">
                    
                    <div class="row">

                      <div class="col-md-3">
                        <div class="well">
                          <h2>Rp. <?php echo rupiah($saldo[Totalsaldo]); ?></h2>
                          <p>TOTAL SALDO <?php echo $tgl = date("d-m-Y");?></p>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="well">
                          <h2>IDR. <?php echo rupiah($saldoPenarikan[PenarikanTotal]); ?></h2>
                          <p>TOTAL PENARIKAN <?php echo $tgl = date("d-m-Y");?></p>                        
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="well">
                          <h2>IDR. <?php echo rupiah($saldoAngsuran[jmlh]); ?></h2>
                          
                          <p>TOTAL ANGSURAN <?php echo $tgl = date("d-m-Y");?> </p>
                        </div>
                      </div>
					  
					  <div class="col-md-3">
                        <div class="well">
                          <h2>IDR. <?php echo rupiah($totalKas); ?></h2>
                          <p>TOTAL KAS <?php echo $tgl = date("d-m-Y");?> </p>
                        </div>
                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-12">
                        <hr>
			<div class="table-responsive">
				<table class="table table-striped table-hover table-responsive table-bordered">
						<thead>
								<tr>
								  <th>#</th>
								  <th>Nama Anggota</th>
								  <th>No Rekening</th>
								  <th>Kode Koperasi</th>
								  <th>No Telepon</th>
				
								</tr>
							  </thead>
							  <tbody>
								<?php 
								$urut=1;
								$list_anggota = mysql_query("select * from anggota");
									while($r = mysql_fetch_array($list_anggota)){
										echo "<tr>
											<td>$urut</td>
											<td>$r[nama]</td>
											<td>$r[noRekening]</td>
											<td>$r[kodeKoperasi] - $r[provinsi]</td>
											<td>$r[tlp]</td>
										</tr>";
										$urut++;
									}
								?>
							  </tbody>
							</table>
						</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
				</div>


			
				<div class="row">
		
			<div class="col-md-12">
              <div class="widget">
           
                <div class="widget-content">
                  <div class="padd statement">
                  

                    <div class="row">

                      <div class="col-md-12">
    
						<div class="table-responsive">
							<table class="table table-striped table-hover table-responsive table-bordered">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>Nama Pemohon</th>
								  <th>Kode Koperasi/ Wilayah</th>
								  <th>Besar Pinjaman</th>
								  <th>Bunga</th>
								  <th>Lama Pinjaman</th>
								  <th>Status</th>
								  <th></th>
					
								</tr>
							  </thead>
							  <tbody>
								<?php 
								$urut=1;
								$list_anggota = mysql_query("select * from anggota inner join pinjamawal on anggota.idAnggota = pinjamawal.idAnggota");
									while($r = mysql_fetch_array($list_anggota)){
										$nilai = rupiah($r[besarpinjaman]);
								$list_koperasi = mysql_fetch_array(mysql_query("select * from pengaturan where kode_koperasi = '$r[kodeKoperasi]'"));
										echo "<tr>
											<td><a href='#'>[ $urut ]</a></td>
											<td>$r[nama]</td>
											<td>$list_koperasi[kode_koperasi] - $list_koperasi[provinsi]</td>
											<td>$nilai</td>
											<td>$r[bunga] %</td>
											<td>$r[lamapinjaman] Bulan</td>";
											if($r[status]=='Tunda'){
												echo '<td><span class="label label-danger">TUNDA</span></td>';
												echo "<td>
														<a href='?modul=pinjam&act=prosespinjaman&idAnggota=$r[idAnggota]'>
														<span class='label label-success'>SETUJUI</span></a>
														
														<a href='?modul=pinjam&act=prosesbatal&idAnggota=$r[idAnggota]'>
														<span class='label label-warning'>BATAL</span></a>
														
														<a href='?modul=pinjam&act=hapus&idAnggota=$r[idAnggota]'><span class='label label-danger'>HAPUS</span></a>
													</td>";
											}
											elseif($r[status]=='Setuju'){
												echo '<td><span class="label label-success">SETUJU</span></td>';
												echo "<td>													
														<a href='#'><span class='label label-success'>PROSES</span></a>
													</td>";
											}
											else{
												echo '<td><span class="label label-warning">BATAL</span></td>';
												echo "<td>													
														<a href='?modul=pinjam&act=hapus&idAnggota=$r[idAnggota]'><span class='label label-danger'>HAPUS</span></a>
													</td>";
											}
											
											echo "
										
										
										</tr>";
										$urut++;
									}
								
								?>
  
								
							  </tbody>
							</table>
						</div>
                      </div>

                    </div>

                  </div>
            
                </div>
              </div>  
              
            </div>
				
				</div>

				<!-- <td>
							
			<a href='?modul=pinjam&act=prosespinjaman&idAnggota=$r[idAnggota]'>SETUJUI</a>
			|
			<a href='?modul=pinjam&act=prosesbatal&idAnggota=$r[idAnggota]'>BATAL</a>
			
			</td>-->