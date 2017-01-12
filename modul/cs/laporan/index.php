	<?php 

		$m = $_GET['aksi'];
		
		if($m =='anggota'){?>
			   <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Laporan Anggota Koperasi</div>
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
									<table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>No Rekening</th>
												<th>Nama Lengkap</th>
												<th>No KTP</th>
												<th>No Telepon</th>
												<th>Kode Koperasi</th>

											</tr>
										</thead>
										<tbody>
										<?php 
											
											$lapAnggota = mysql_query("select * from anggota"); // queri untuk anggota
											$urut = 1;
											
											while ($baca = mysql_fetch_array($lapAnggota)){
												$rekening = rek($baca[noRekening]);
												echo "<tr>
													  <td>$urut</td>
													  <td>$rekening</td>
													  <td>$baca[nama]</td>
													  <td>$baca[nik]</td>
													  <td>$baca[tlp]</td>
													  <td>$baca[kodeKoperasi]</td>

													  </tr>";
													  $urut++;
											}
											
										?>
											
											
										</tbody>
										<!--<tfoot>
											<tr>
												<th>Rendering engine</th>
												<th>Browser</th>
												<th>Platform(s)</th>
												<th>Engine version</th>
												<th>CSS grade</th>
											</tr>
										</tfoot>-->
									</table>
									<div class="clearfix"></div>
								</div>
								</div>
							</div>

					
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
              
            </div>
         
			
			
		<?php }
	
		
		elseif($m=='pinjam'){?>
					  <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Laporan Pinjaman Anggota Koperasi</div>
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
									<table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Anggota</th>
												<th>Lama Pinjaman</th>
												<th>Jumlah Pinjaman</th>
												<th>Bunga</th>
												<th>Jumlah Bayar</th>
												<th>Angsuran</th>
												<th>Sisa Cicilan</th>
												<th></th>
											
											</tr>
										</thead>
										<tbody>
										<?php 
											$list_angsuran = mysql_query("select * from pinjaman inner join anggota on pinjaman.idAnggota = anggota.idAnggota");
											$isan =1;
											while ($zia  = mysql_fetch_array($list_angsuran)){
												$totalPinjam = number_format($zia[totalPinjam]);
												$pembayaran = number_format($zia[pembayaran]);
												$angsuran = number_format($zia[angsuran]);
												$sisaCicilan = number_format($zia[sisaCicilan]);
												
												echo "<tr>
													<td>[ $isan ]</td>
													<td>$zia[nama]</td>
													<td>$zia[lamaPinjam] Bulan</td>
													<td>$totalPinjam</td>
													<td>$zia[bunga] %</td>
													<td>$pembayaran</td>
													<td>$angsuran</td>
													<td>$sisaCicilan</td>";
													if($zia[sisaCicilan] ==0){
														echo "<td><span class=\"label label-success\">LUNAS</span></td>";
													}
													else{
														echo "<td><span class=\"label label-default\">PROSES</span></td>";
													}
										
													echo "
												</tr>";
											$isan++;
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
         
		
		<?php }
		elseif($m=='detail_pinjaman'){?>
			
			<?php 
			$pinjamanid =  $_GET['idAwal'];
			$qData=mysql_query("SELECT * FROM pinjaman a,anggota b WHERE a.idAwal='$pinjamanid' AND a.idAnggota=b.idAnggota");
			$data=mysql_fetch_object($qData);
			
				$nama = ucwords($data->nama);

			?>
			  <div class="widget">
			  <div class="widget-content">
<table align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="54" colspan="7" align="center" id="fB"><b><h3>DETIL PINJAMAN ANGGOTA KOPERASI</h3></b></td>
	</tr>
    <tr>
		<td height="31" colspan="5" id="fB">&nbsp;<b>Kode. Pinjaman = <?php echo $data->idAwal;?></b></td>
        <td colspan="2" align="right"><b>No Anggota - <?php echo $data->idAnggota;?></b></td>
</tr>
	<tr >
		<td width="191">&nbsp;Nama  Anggota</td><td width="3">:</td>
		<td width="134" align="right"> &nbsp;<?php echo $nama;?></td><td width="59">&nbsp;</td>
        <td width="156">&nbsp;Total Pinjaman</td><td width="3">:</td>
		<td width="154" align="right"> <?php echo number_format($data->totalPinjam , 2 , ',' , '.' );?></td>
	</tr>
    
	<tr >
		<td width="191">&nbsp;Besar Pinjaman</td><td>:</td>
		<td width="134" align="right"> &nbsp;<?php echo number_format($data->besarPinjam , 2 , ',' , '.' );?></td><td>&nbsp;</td>
        <td width="156" valign="top">&nbsp;Angsuran</td><td>:</td>
		<td width="154" align="right"> <?php echo number_format($data->angsuran , 2 , ',' , '.' );?></td>
	</tr>
	<tr >
		<td width="191">&nbsp;Jasa</td><td>:</td>
		<td width="134" align="right"><?php echo $data->bunga;?> %</td><td>&nbsp;</td>
		
		<td width="156" valign="top">&nbsp;Pembayaran</td><td>:</td>
		<td width="154" align="right"> <?php echo number_format($data->pembayaran , 2 , ',' , '.' );?></td>
	</tr>
	<tr >
		<td width="191">&nbsp;Lama Pinjaman</td><td>:</td>
		<td width="134" align="right"> <?php echo $data->lamaPinjam;?> Bulan</td><td>&nbsp;</td>
		
		<td width="156">&nbsp;Sisa Cicilan</td><td>:</td>
		<td width="154" align="right"> <?php echo number_format($data->sisaCicilan , 2 , ',' , '.' );?></td>
	</tr>
	
</table>
	</div>
	</div>
<br />

<table class="table table-striped table-hover table-responsive table-bordered">
	<tr align="center">
		<td width="92">Angsuran Ke</td>
    	<td width="120">Kode Angsuran</td>
        <td width="127">Tanggal Angsuran</td>
        <td width="102">Angsuran</td>
        <td width="111">Pembayaran</td>
        <td width="108">Sisa Cicilan</td>
    </tr>
    <?php	
    $pembayaran		=0;
	$sisa_cicilan	=$data->totalPinjam;
	
	$query	=mysql_query("SELECT * FROM angsur a, pinjaman b WHERE a.idPinjaman='$pinjamanid' AND b.idAnggota =a.idAnggota");
	while($ang=mysql_fetch_array($query)){
		$pembayaran		=$pembayaran+$ang[angsuran];
		$sisa_cicilan	=$sisa_cicilan-$ang[angsuran];
	?>
    <tr>
        <td align="center"><?php echo $ang[angsuranKe];?></td>
        <td align="center"><?php echo $ang[idAngsuran];?></td>
        <td align="center"><?php echo $ang[tglAngsuran];?></td>
        <td align="right"><?php echo number_format($ang[angsuran] , 2 , ',' , '.' );?></td>
        <td align="right"><?php echo number_format($pembayaran , 2 , ',' , '.' );?></td>
        <td align="right"><?php echo number_format($sisa_cicilan , 2 , ',' , '.' );?></td>
    </tr>    
    <?php	
	}
	?>
 
	<tr	>
		<td>&nbsp;Keterangan</td>
		<td width="134" align="right" colspan="7"><i> <?php echo $data->keterangan;?></i></td>
		
	
	</tr>
	   <tr>
        <td colspan="7">
		<div class="btn-group">
                      <button class="btn btn-danger">Kembali</button>
                      <button class="btn btn-success">Cetak</button>
            
                    </div>
	</tr>
</table>

		<?php }
		
		
		
		
		
		
		else{
			echo "lainnya";
		}
	?>