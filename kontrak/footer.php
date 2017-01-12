<!-- Footer starts -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <!-- Copyright info -->
            <p class="copy">Copyright &copy; 2016 | <a href="#">Your Site</a> </p>
      </div>
    </div>
  </div>
</footer> 	

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 



<script>
		
		$(document).ready(function() {
			$(".date").datepicker(
				{
					dateFormat:'yy-mm-dd',
				}
			);
			$(".numbers").keyup(function(event)
			{				
			  // When user select text in the document, also abort.
				var selection = window.getSelection().toString();
				if ( selection !== '' ) {
					return;
				}
				
				// When the arrow keys are pressed, abort.
				if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
					return;
				}
				
				
				var $this = $( this );
				
				// Get the value.
				var input = $this.val();
				
				var input = input.replace(/[\D\s\._\-]+/g, "");
						input = input ? parseInt( input, 10 ) : 0;

						$this.val( function() {
							return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
						} );
			});
			 $(".numbers").keydown(function (e) {
				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					 // Allow: Ctrl+A, Command+A
					(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
					 // Allow: home, end, left, right, down, up
					(e.keyCode >= 35 && e.keyCode <= 40)) {
						 // let it happen, don't do anything
						 return;
				}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});
			
			 $('table').DataTable( {
				"bLengthChange": false //used to hide the property  
			} );
		});
		
	</script>

</body>
</html>