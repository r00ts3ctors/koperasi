


	    <!-- Matter -->

	    <div class="matter">
        <div class="container">

          <div class="row">

            <div class="col-md-12">


              <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Input</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br />
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" method="post" action="doinput.php">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Nama Depan</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" maxlength="50" placeholder="" required autofocus name="member">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Nama Belakang</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" maxlength="50" placeholder="" required name="member2">
                                  </div>
                                </div>
                                
								 <div class="form-group">
                                  <label class="col-lg-2 control-label">Pekerjaan</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" maxlength="50" placeholder="" required  name="pekerjaan">
                                  </div>
                                </div>
							 
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Alamat</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" rows="5" required name="alamat" placeholder=""></textarea>
                                  </div>
                                </div>    
								
								 <div class="form-group">
                                  <label class="col-lg-2 control-label">Provinsi</label>
                                  <div class="col-lg-5">
                                    <select id="provinsi" name="provinsi" class="form-control">	
										<option value="">-Pilih Provinsi-</option>
										<?php $sql="select * from provinsi order by Nama";
										$a = mysqli_query($db, $sql) or die(mysqli_error($db));
										while($b= mysqli_fetch_object($a))
										{?>
										<option value="<?php echo $b->Nama;?>"><?php echo $b->Nama;?></option>
										<?php } ?>
									</select>
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Kabupaten</label>
                                  <div class="col-lg-5">
                                    <select id="kabupaten"  name="kabupaten" class="form-control">	
										
									</select>
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Kecamatan</label>
                                  <div class="col-lg-5">
                                    <select id="kecamatan"   name="kecamatan" class="form-control">	
										
									</select>
                                  </div>
                                </div>
                                
								 <div class="form-group">
                                  <label class="col-lg-2 control-label">Kelurahan</label>
                                  <div class="col-lg-5">
                                    <select id="kelurahan" name="kelurahan" class="form-control">	
										
									</select>
                                  </div>
                                </div>
							 
							 
							   <div class="form-group">
                                  <label class="col-lg-2 control-label">Nilai (Rp)</label>
                                  <div class="col-lg-5">
                                    <input type="text" min="0" class="form-control numbers" placeholder="" required  name="nilai">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Bunga (Rp)</label>
                                  <div class="col-lg-5">
                                    <input type="text" min="0" class="form-control numbers" placeholder="" required  name="bunga">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Masa Pinjaman (Tahun)</label>
                                  <div class="col-lg-5">
                                    <input type="text" min="0" class="form-control numbers" placeholder="" required  name="masa">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Angsuran (Rp)</label>
                                  <div class="col-lg-5">
                                    <input type="text" min="0" class="form-control numbers" placeholder="" required  name="angsuran">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Pokok (Rp)</label>
                                  <div class="col-lg-5">
                                    <input type="text" min="0" class="form-control numbers" placeholder="" required  name="pokok">
                                  </div>
                                </div>
                                
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Tgl Awal Kontrak</label>
                                  <div class="col-lg-5">
                                    <input type="text" min="0" class="date form-control" placeholder="" required  name="awal">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Tgl Akhir Kontrak</label>
                                  <div class="col-lg-5">
                                    <input type="text" min="0" class="date form-control" placeholder="" required  name="akhir">
                                  </div>
                                </div>
								
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="submit" class="btn btn-sm btn-default">Simpan</button>
                                    </div>
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

        </div>
		  </div>

		<!-- Matter ends -->

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>

<script>
	$(document).ready(function()
	{
		$("#provinsi").change(function()
		{
			$("#kabupaten").html("");
			$("#kecamatan").html("");
			$("#kelurahan").html("");
			var val = $(this).val();
			$.ajax({
				method:'GET',
				data:
				{
					provinsi:val,
					act:1,
				},
				url:'ajax.php',
				success:function(data)
				{
					$("#kabupaten").html(data);
				}
				
			});
		});
		$("#kabupaten").change(function()
		{
			$("#kecamatan").html("");
			$("#kelurahan").html("");
			var val = $(this).val();
			$.ajax({
				method:'GET',
				data:
				{
					kabupaten:val,
					act:2,
				},
				url:'ajax.php',
				success:function(data)
				{
					$("#kecamatan").html(data);
				}
				
			});
		});
		$("#kecamatan").change(function()
		{
			$("#kelurahan").html("");
			var val = $(this).val();
			$.ajax({
				method:'GET',
				data:
				{
					kecamatan:val,
					act:3,
				},
				url:'ajax.php',
				success:function(data)
				{
					$("#kelurahan").html(data);
				}
				
			});
		});
	});
</script>

<!-- Footer ends -->
<?php include "footer.php";?>