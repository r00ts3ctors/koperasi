<?php 
	$m = $_GET['act'];
		$tahun	=$_POST['tahun'];
		$tgl	=date('d');
		$bln	=date('m');
		$thn	=date('Y');
		switch($bln){
			case"01": $bulan="JANUARI";break;
			case"02": $bulan="FEBRUARI";break;
			case"03": $bulan="MARET";break;
			case"04": $bulan="APRIL";break;
			case"05": $bulan="MEI";break;
			case"06": $bulan="JUNI";break;
			case"07": $bulan="JULI";break;
			case"08": $bulan="AGUSTUS";break;
			case"09": $bulan="SEPTEMBER";break;
			case"10": $bulan="OKTOBER";break;
			case"11": $bulan="NOVEMBER";break;
			case"12": $bulan="DESEMBER";break;
		}
		
		
	if($m =='laporan'){?>
		<table cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <col width="35" />
  <col width="162" />
  <col width="131" span="2" />
  <col width="35" />
  <col width="245" />
  <col width="131" />
  <col width="143" />
  <tr>
    <td colspan="8" align="center" width="1013" ><b>NERACA INDUK KOPERASI PUSAT ANAK BANGSA</b></td>
  </tr>
  <tr>
    <td colspan="8" align="center">
    	<?php
        	if($tahun==$thn){
		?>
        	PER  <?php echo $tgl.'&nbsp;'; echo $bulan.'&nbsp;'; echo $thn;?>
        <?php
			}else{
		?>
        	PER  31 DESEMBER <?php echo $thn;?>
        <?php		
			}
		?>
        
    </td>
  </tr>
</table>
<br />
<table cellspacing="0" cellpadding="0" border="1" class="table table-striped table-bordered table-hover">
  <col width="35" />
  <col width="162" />
  <col width="131" span="2" />
  <col width="35" />
  <col width="245" />
  <col width="131" />
  <col width="143" />
  <tr align="center">
    <td width="34">No.</td>
    <td width="190">HARTA</td>
    <td width="165">POSISI <?php echo $tahun;?></td>
    <td>&nbsp;</td>
    <td width="49">No.</td>
    <td width="286">KEWAJIBAN DAN    EKUITAS</td>
    <td width="186"><?php echo $tahun;?></td>
    <td width="44">&nbsp;</td>
  </tr>
  <tr>
    <td>I.</td>
    <td>HARTA LANCAR</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>III.</td>
    <td>KEWAJIBAN LANCAR</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  </tr>
  <?php
	$qKas		=mysql_query("SELECT sum(debet) as debet
							  FROM kas
							  WHERE year( tglTransaksi ) = '$tahun'");
	$datakas	=mysql_fetch_object($qKas);
	$kas		=$datakas->debet;
	//$kas		=100;
  	
  ?>
    <td>1.&nbsp;</td>
    <td>Kas</td>
    <td>&nbsp;Rp. <?php echo number_format($kas, 2, ",", ".");?></td>
    <td></td>
    <td>1.</td>
    <td>Beban yang masih harus dibayar</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>2.&nbsp;</td>
    <?php
		$qPiutang		=mysql_query("SELECT sum(sisaCicilan) as piutang
							  FROM pinjaman
							  WHERE year( tglPinjam ) = '$tahun'");
		$datapiutang	=mysql_fetch_object($qPiutang);
		$piutang		=$datapiutang->piutang;
		//$piutang		=200;
	?>
    <td>Piutang</td>
    <td><font color="#FF0000">&nbsp;Rp. <?php echo number_format($piutang, 2, ",", ".");?></font></td>
    <td>&nbsp;</td>
    <td>2.</td>
    <td>&nbsp;Dana-dana SHU&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <?php
		$harta_lancar=$kas+$piutang;
	?>
    <td>JUMLAH HARTA LANCAR</td>
    <td>&nbsp;Rp. <?php echo number_format($harta_lancar, 2, ",", ".");?></td>
    <td>&nbsp;Rp&nbsp;-&nbsp;&nbsp; </td>
  <?php
	$qSukarela	=mysql_query("SELECT sum( debet ) AS debet
							  FROM simpanan
							  WHERE kodeLayanan = 'SUKARELA'
							  AND year( tgl_simpan ) = '$tahun'");
	$skrl		=mysql_fetch_object($qSukarela);
	$sukarela	=$skrl->debet;
	//$kas		=100;
  	
  ?>    
    <td>3.</td>
    <td>Simpanan sukarela</td>
    <td><font color="#FF0000">&nbsp;Rp. <?php echo number_format($sukarela, 2, ",", ".");?></font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>4.</td>
    <?php 
		$sna	=0;
	?>
    <td>Simpanan non anggota</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>II.</td>
    <td>HARTA TETAP</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <?php
    	$wajiblancar	= $sukarela+$sna;
	?>
    <td>JUMLAH KEWAJIBAN    LANCAR</td>
    <td>&nbsp;Rp. <?php echo number_format($wajiblancar, 2, ",", ".");?></td>
    <td>&nbsp;Rp&nbsp;-&nbsp;&nbsp; </td>
  </tr>
  <tr>
    <td>1.&nbsp;</td>
    <td>Bangunan Kantin</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Akm. peny. Kantin</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>IV.</td>
    <td>EKUITAS</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>2.&nbsp;</td>
    <td>Bangunan Toko</td>
    <td>&nbsp;</td>
    <td></td>
    <td>1.</td>
    <td>Modal anggota</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Selisih Aktiva</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  <?php
	$qPokok		=mysql_query("SELECT sum( debet ) AS debet
							  FROM simpanan
							  WHERE kodeLayanan = 'POKOK'
							  AND year( tgl_simpan ) = '$tahun'");
	$pok		=mysql_fetch_object($qPokok);
	$pokok		=$pok->debet;
	//$kas		=100;
  	
  ?>     
    <td>- Simpanan Pokok</td>
     <td><font color="#FF0000">&nbsp;Rp. <?php echo number_format($pokok, 2, ",", ".");?></font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <?php 
		$hartatetap=0;
	?>
    <td>JUMLAH HARTA TETAP</td>
    <td>&nbsp;Rp&nbsp;-&nbsp;&nbsp; </td>
   <td>&nbsp;Rp&nbsp;-&nbsp;&nbsp; </td>
    <td>&nbsp;</td>
    <?php
		$smk	=0;
	?>
    <td>- Sertifikat Modal    Koperasi (SMK)</td>
    <td><font color="#FF0000">&nbsp;Rp. <?php echo number_format($smk, 2, ",", ".");?></font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>- Dana Hibah</td>
 <?php
	$qHibah		=mysql_query("SELECT sum( debet ) AS debet
							  FROM kas
							  WHERE kodeLayanan = 'HIBAH'
							  AND year( detil_waktu ) = '$tahun'");
	$hib		=mysql_fetch_object($qHibah);
	$hibah		=$hib->debet; 	
  ?>      
    <td><font color="#FF0000">&nbsp;Rp. <?php echo number_format($hibah, 2, ",", ".");?></font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>2.</td>
    <td>Cadangan Umum</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <?php
		$cadangan_dana	=0;
	?>
    <td>Cad. Peng. Dana    Penyertaan</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <?php
		$ekuitas	=$pokok+$smk+$hibah+$cadangan_dana;
	?>
    <td>JUMLAH EKUITAS</td>
    <td>&nbsp;Rp.<?php echo number_format($ekuitas, 2, ",", ".");?></td>
    <td>&nbsp;Rp&nbsp;-&nbsp;&nbsp; </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>V.</td>
    <?php
		$shu	=0;
	?>
    <td>SHU Tahun Berjalan</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>JUMLAH HARTA</td>
    <?php
		$jumlahharta=$harta_lancar+$hartatetap;
	?>
    <td>&nbsp;Rp. <?php echo number_format($jumlahharta, 2, ",", ".");?></td>
    <td>&nbsp;Rp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp;&nbsp; </td>
    <td>&nbsp;</td>
    <?php
		$kewajiban_ekuitas	=$wajiblancar+$ekuitas+$shu;
	?>
    <td>JUMLAH KEWAJIBAN DAN EKUITAS</td>
    <td>&nbsp;Rp.<?php echo number_format($kewajiban_ekuitas, 2, ",", ".");?></td>
    <td>&nbsp;Rp&nbsp;-&nbsp;&nbsp; </td>
  </tr>
</table>
	<?php }
	
	
	else{?>
	 <div class="row">

            <div class="col-md-12">


              <div class="widget wgreen">
        

                <div class="widget-content">
                  <div class="padd">

                    <br />
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="?modul=neraca&act=laporan" method="post"> 
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Input Box</label>
                                  <div class="col-lg-5">
                                  <select name="tahun" class="form-control" required>
									<option value="">--------</option>
									<?php
										$simpan	=mysql_query("SELECT year(tglTransaksi) as tahun FROM kas GROUP BY tahun ORDER BY tahun DESC");
										while($d=mysql_fetch_array($simpan)){
										?>
											<option value="<?php echo $d['tahun'];?>">Neraca Tahun - <?php echo $d['tahun'];?></option>
										<?php
										}
									?>
								</select>
                                  </div>
                                </div>
                                
                                                              
                                
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="submit" class="btn btn-sm btn-default">Proses</button>
                                    <button type="reset" class="btn btn-sm btn-danger" onClick = "kembali()">Batal</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
               
              </div>  

            </div>

          </div>	
	<?php }
	
	
	
		
?>
<!-- index1.php?menu=laporan_neraca -->
       

