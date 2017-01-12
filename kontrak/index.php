<?php include "header.php";?>

    <!-- Sidebar ends -->
	<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

 


   <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">List Kontrak</div>
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
												<th>Nama Peminjam</th>
												<th>Nomor Kontrak</th>
												<th>Nilai Pinjaman</th>
												<th>Bunga</th>
												<th>Pokok</th>
												<th>Angsuran</th>
												<th>Masa Kontrak</th>
												<th>Akhir Kontrak</th>
												<th>Cetak</th>
											</tr>
										</thead>
										<tbody>
										<?php $sql = "select * from kontrak";
								$a = mysqli_query($db, $sql) or die(mysqli_error($db));
								$no = 1;
								while($b=mysqli_fetch_object($a))
								{?>
											<tr>
												<td><?php echo $no++;?></td>
												<td><?php echo $b->nama_depan . " " . $b->nama_belakang;?></td>
												<td><?php echo $b->nomor;?></td>
												<td>Rp <?php echo number_format($b->nilai);?></td>
												<td><?php echo number_format($b->bunga);?> %</td>
												<td>Rp <?php echo number_format($b->pokok);?></td>
												<td>Rp <?php echo number_format($b->angsuran);?></td>
												<td><?php echo number_format($b->masa_pinjaman);?> Tahun</td>
												<td><?php echo date('d-M-Y',strtotime($b->tgl_akhir_kontrak));?></td>
												<td><a href="kontrak/cetak.php?id=<?php echo $b->id;?>">Cetak</a></td>
											</tr>
								<?php }?>
											
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