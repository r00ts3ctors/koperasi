<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <!-- Copyright info -->
            <p class="copy">Copyright &copy; 2017 | Koperasi Anak Bangsa v.0</p>
      </div>
    </div>
  </div>
</footer> 	

<!-- Footer ends -->

<!-- Scroll to top -->
<link type="text/css" href="tanggal/themes/base/ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="tanggal/jquery-1.3.2.js"></script>
<script type="text/javascript" src="tanggal/ui/ui.core.js"></script>
<script type="text/javascript" src="tanggal/ui/ui.datepicker.js"></script>

<script type="text/javascript" src="tanggal/ui/i18n/ui.datepicker-id.js"></script>


<script src="date_picker/jquery-1.8.3.js"></script>
    <script src="date_picker/jquery-ui.js"></script>
    <script>
    $(function() {
        $( "#tgl_simpan" ).datepicker({
			dateFormat  : "yy-mm-dd",       
          	changeMonth : true,
          	changeYear  : true
        });
    });
	$(function() {
        $( "#tgl_lahir" ).datepicker({
			dateFormat  : "yy-mm-dd",       
          	changeMonth : true,
          	changeYear  : true
        });
    });
	
	$(function() {
	$( "#tgl_pinjaman" ).datepicker({
		dateFormat  : "yy-mm-dd",       
		changeMonth : true,
		changeYear  : true
	});
	});
	$(function() {
	$( "#tgl_angsuran" ).datepicker({
		dateFormat  : "yy-mm-dd",       
		changeMonth : true,
		changeYear  : true
	});
});

function hrz_angka(evt){
	var charCode=(evt.which)? evt.which:event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}
		return true;
}

function hitung(){ 
		//menghitung variabel2
   		var besar_pinjaman	=document.getElementById("besar_pinjaman").value;  
        var bunga			=document.getElementById("bunga").value; 
		var lama_pinjaman	=document.getElementById("lama_pinjaman").value; 
	
		var jasa			=parseInt(besar_pinjaman)*parseInt(bunga)/100;
		
		var angsuran		=parseInt(besar_pinjaman)/parseInt(lama_pinjaman)+parseInt(jasa);
        //menghitung total pinjaman 
        var total_pinjaman	=parseInt(angsuran)*parseInt(lama_pinjaman);
        //menampilkan total pinjaman
        document.getElementById("total_pinjaman").value=parseFloat(total_pinjaman);
		//menghitung cicilan
		//menampilkan angsuran
        document.getElementById("angsuran").value=Math.round(parseFloat(angsuran));
}	
</script>





<!-- JS -->
<script src="js/jquery.js"></script> <!-- jQuery -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="js/moment.min.js"></script> <!-- Moment js for full calendar -->
<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="js/jquery.dataTables.min.js"></script> <!-- Data tables -->

<!-- jQuery Flot -->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>




<script src="js/sparklines.js"></script> <!-- Sparklines -->
<script src="js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="js/filter.js"></script> <!-- Filter for support page -->
<script src="js/custom.js"></script> <!-- Custom codes -->
<script src="js/charts.js"></script> <!-- Charts & Graphs -->


<!-- jQuery Notification - Noty -->
<script src="js/jquery.noty.js"></script> <!-- jQuery Notify -->
<script src="js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<script src="js/layouts/topRight.js"></script> <!-- jQuery Notify -->
<script src="js/layouts/top.js"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

</body>
</html>