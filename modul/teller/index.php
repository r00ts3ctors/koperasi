	<?php 
		
		$saldoTotal = mysql_query("select SUM(jumlah) AS Totalsaldo from simpanan where JenisTransaksi = 'SETOR'");
		$saldo = mysql_fetch_array($saldoTotal);
		
		$saldoTotal2 = mysql_query("select SUM(jumlah) as PenarikanTotal from simpanan where JenisTransaksi='TARIK'");
		$saldoPenarikan = mysql_fetch_array($saldoTotal2);
		
		
		$totalKas = $saldo[Totalsaldo] - $saldoPenarikan[PenarikanTotal]; 

	?>			
				
					
				<div class="row">
				<div class="col-md-12">
				
				<div class="alert alert-warning">
					
                 			    <h4>Selamat Datang  Taller</h4>
					 <p>Sistem informasi koperasi ini, pada sistem ini anda dapat melakukan proses simpan dan pinjam dimana manual peminjaman dapat anda temui di bagian panduan aplikasi. saat ini sistem ini masih dalam versi beta dan untuk upgrade sistem akan di kerjakan secara bertahap.</p>

					<p>
					Sebagai informasi, jangan lakukan proses kegiatan jika id dan level anda tidak di tanyang kan di bagian pojok kanan atas. dan untuk dapat menggunakan sistem ini kembali saat kondisi terjadi klik link  <a href="logout.php" target="_blank">berikut</a>
					</p>
 					 </div>
					</div>
			