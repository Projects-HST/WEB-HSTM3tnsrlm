<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>  Developed by <a href="http://happysanztech.com/" target="_blank">Happysanz Tech</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- jquery
============================================ -->
<!-- datapicker JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/datapicker/datepicker-active.js"></script>
<!-- wow JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/wow.min.js"></script>
<!-- price-slider JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/owl.carousel.min.js"></script>
<!-- scrollUp JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/counterup/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- jvectormap JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- sparkline JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/sparkline/sparkline-active.js"></script>
<!-- sparkline JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/flot/curvedLines.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/flot/flot-active.js"></script>
<!-- knob JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/knob/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/knob/knob-active.js"></script>
<!--  wave JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/wave/waves.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/wave/wave-active.js"></script>
<!--  todo JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/todo/jquery.todo.js"></script>
<!-- plugins JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins.js"></script>
<!--  Chat JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/chat/moment.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/admin/js/chat/jquery.chat.js"></script> -->
<!-- main JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-select/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/data-table/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/data-table/data-table-act.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/dialog/sweetalert2.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/admin/js/dialog/dialog-active.js"></script> -->
  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.galpop.min.js"></script>

<script type="text/javascript">

	$('#data-table-basic').dataTable({
		"oLanguage": {
			"sEmptyTable": "No data available"
		},
		"aLengthMenu": [[25, 50, 75, 100, -1], [25, 50, 75, 100, "All"]],
        "iDisplayLength": 25,
		"ordering": false,
		"bAutoWidth": false
	});
	
	
		
$(document).ready(function () {
	
	$('#data-table-export').dataTable({
		dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
		"oLanguage": {
			"sEmptyTable": "No data available"
		},
		
        "iDisplayLength": 500,
		"ordering": false,
		"bAutoWidth": false,
		"searching": false
	});
	
    $('.dob').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
		maxDate: new Date(),
	    endDate: new Date()
    });
	
	$('.track_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });
	
		$('.from_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });
	
		$('.to_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });
	
});

</script>


</html>
