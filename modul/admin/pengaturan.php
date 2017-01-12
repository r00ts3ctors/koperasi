
?>

<script type="text/javascript">
function goBack() {
    window.history.back();
}
</script>
<?php
	// Mendapatkan Modul ACT=
	$m = $_GET['act'];
	// mendapatkan Tanggal
	$characters = '1234567890';
	$k = '1234567890';
	$string = '';
	$max = strlen($characters) - 1;

		 for ($i = 0; $i < 4; $i++) {
			  $string .= $characters[mt_rand(0, $max)];
		 }
	$kodeKoperasi = $string;

if($m =='add'){

	$kode 			= $kodeKoperasi;
	$namakoperasi	= 'Koperasi Pusat Anak Bangsa';
	$alamat 		= $_POST['alamat'];
	$kecamatan 		= $_POST['kec'];
	$provinsi 		= $_POST['prov'];
	$kota 			= $_POST['kota'];
	$email 			= $_POST['email'];
	$nomorsk 		= $_POST['sk'];
	$tglsk 			= $_POST['tglsk'];
	$noizin 		= $_POST['noizin'];
	$tglizin 		= $_POST['tglizin'];
	$tlp 			= $_POST['tlp'];
	$visi 			= 'Mensejahterakan Rakyat';
	$ketua 			= $_POST['ketua'];

   $simpan = mysql_query("INSERT INTO pengaturan
			  (kode_koperasi, nama_koperasi, alamat, kecamatan, provinsi, kota, email, nomor_sk, tanggal_sk, no_izin, tanggal_izin, no_telp, visi, ketua)
	       VALUES('$kode', '$namakoperasi', '$alamat', '$kecamatan', '$provinsi', '$kota', '$email', '$nomorsk', '$tglsk', '$noizin', '$tglizin', '$tlp', '$visi', '$ketua')");

			if($simpan){ echo '<META HTTP-EQUIV="Refresh" Content="1; URL=?modul=pengaturan&act=list">'; }
			else{ echo '<div class="alert alert-warning"> <h4>Maaf data Koperasi gagal di input</h4> </div>';
				echo '<META HTTP-EQUIV="Refresh" Content="1; URL=?modul=pengaturan&act=list">';
			}

	}

	elseif ($m =='hps'){
	  			   mysql_query("DELETE FROM pengaturan WHERE id ='$_GET[id]'");
				        echo '<div class="alert alert-warning"> <h4>Data Koperasi Berhasil di hapus</h4> </div>';
					      echo '<META HTTP-EQUIV="Refresh" Content="2; URL=?modul=pengaturan">';
	}
	elseif($m == 'list'){?>

    <div class="row">
	     <div class="col-md-12">
		       <div class="widget">
              <div class="widget-head">
                  <div class="pull-left">
						              Total Cabang : <?php $hitungCabang = mysql_num_rows(mysql_query("select * from pengaturan")); echo $hitungCabang;?>
				  </div>
				  <div class="widget-icons pull-right">
                     <div class="btn-group">
                      <button class="btn btn-success" onclick="window.location.href='?modul=pengaturan'">Tambah</button>
             
                    </div>
                  </div>

                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Nama Koperasi</th>
							  <th>Alamat</th>
							  <th>No Telepon</th>
							  <th>Kab / Kota</th>
							  <th>Provinsi</th>
							  <th>Ketua</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
							<?php
							$nomor=1;
							$tampilKoperasi = mysql_query("select * from pengaturan");
							while ($r = mysql_fetch_array($tampilKoperasi)){
								echo "<tr>
									<td>$nomor</td>
									<td>$r[nama_koperasi]</td>
									<td>$r[alamat]</td>
									<td>$r[no_telp]</td>
									<td>$r[kota]</td>
									<td>$r[provinsi]</td>
									<td>$r[ketua]</td>";

									if($r[status]=="Aktif"){
							echo "<td>
						<span class='label label-success'>Active</span>
								<button class='btn btn-xs btn-warning' ><i class='fa fa-pencil'></i> </button>
								<button class='btn btn-xs btn-danger' onclick=\"window.location.href='?modul=pengaturan&act=hps&id=$r[id]'\"><i class='fa fa-times'></i> </button>
						</td>";
									}
									else {
										echo "<td>
						<span class='label label-danger'>Tunda</span>
								<button class='btn btn-xs btn-warning' ><i class='fa fa-pencil'></i> </button>
								<button class='btn btn-xs btn-danger' onclick=\"window.location.href='?modul=pengaturan&act=hps&id=$r[id]'\"><i class='fa fa-times'></i> </button>
						</td>";
									}
								echo "</tr>
								";
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

	else{?>
		           <div class="col-md-12">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Formulir Pembukaan Cabang Koperasi</div>

				<div class="widget-icons pull-right">
                     <div class="btn-group">
                      <button class="btn btn-success" onclick="window.location.href='?modul=pengaturan&act=list'">List</button>
                    </div>
                  </div>

                  <div class="clearfix"></div>
                </div>

                    <br>
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" method="post" action="?modul=pengaturan&act=add">
					<div class="col-md-6">
						<div class="form-group">
						  <label class="col-lg-4 control-label">Alamat</label>
						  <div class="col-lg-8">
						   <textarea class="form-control" rows="2" name="alamat" placeholder="Alamat Koperasi"></textarea>
						   </div>
					</div>
						<div class="form-group">
						  <label class="col-lg-4 control-label">Kecamatan</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control" placeholder="Kecamatan Koperasi" name="kec">
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-lg-4 control-label">Kab / Kota</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control"placeholder="Kab / Kota Koperasi" name="kota">
						  </div>
						</div>




						<div class="form-group">
						  <label class="col-lg-4 control-label">Provinsi</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control"placeholder="Provinsi Koperasi" name="prov">
						  </div>
						</div>


						<div class="form-group">
						  <label class="col-lg-4 control-label">No Telepon</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control" placeholder="No Telepon Koperasi" name="tlp">
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-lg-4 control-label">Alamat Email</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control" placeholder="eMail Koperasi" name="email">
						  </div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="form-group">
						  <label class="col-lg-4 control-label">Nomor SK</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control" placeholder="Nomor SK Koperasi" name="sk">
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-lg-4 control-label">Tanggal SK</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control" placeholder="Tanggal SK Koperasi" name="tglsk">
						  </div>
						</div>

						<div class="form-group">
						  <label class="col-lg-4 control-label">Nomor Izin</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control" placeholder="Nomor Izin Koperasi" name="noizin">
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-lg-4 control-label">Tanggal Izin</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control" placeholder="Tanggal Izin Koperasi" name="tglizin">
						  </div>
						</div>




						<div class="form-group">
						  <label class="col-lg-4 control-label">Ketua Koperasi</label>
						  <div class="col-lg-8">
							<input type="text" class="form-control"placeholder="Ketua Koperasi" name="ketua">
						  </div>
						</div>

			\		<div class="col-lg-offset-4 col-lg-6">
								<button type="submit" class="btn btn-sm btn-primary">Proses</button>
								<button type="reset" class="btn btn-sm btn-danger" onclick="goBack();">Reset</button>
                            </div>
					</div>

                        <div class="form-group">

                        </div>

						</form>
                  </div>
                </div>

	<?php }



?>



</div>

            </div>


</div>
