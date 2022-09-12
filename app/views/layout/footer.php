<!-- jQuery -->
	<script src="<?php echo base_url(); ?>res/assets/js/jquery-3.5.1.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>res/assets/js/bootstrap.min.js"></script>
	<!-- Chart JS -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- End Jquery -->
	<script src="<?php echo base_url(); ?>res/assets/plugins/morris/morris.min.js"></script>
	<script src="<?php echo base_url(); ?>res/assets/plugins/raphael/raphael.min.js"></script>
	<script src="<?php echo base_url(); ?>res/assets/js/chart.js"></script>
	<!-- Slimscroll JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/jquery.slimscroll.min.js"></script>
	<!-- Select2 JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/select2.min.js"></script>
	<!-- Datetimepicker JS -->
	<!-- <script src="<?php //echo base_url(); ?>res/assets/js/moment.js"></script> -->
	<script src="<?php echo base_url(); ?>res/assets/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>res/assets/js/bootstrap-datetimepicker.min.js"></script>
	
	<!-- Datatable JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>res/assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Multiselect JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/multiselect.min.js"></script>		
	<!-- Custom JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/app.js"></script>

	<script type="text/javascript">

		//Datatable Search
		var table = $('#maziwa').DataTable();
		// #myInput is a <input type="text"> element
		$('#myInput').on( 'keyup', function (){
		    table.search( this.value ).draw();
		});
		//Datatable search End
     

      $("#addMilk tbody").on("input", ".morning", function () {
        var morning = parseFloat($(this).val());
        var evening = parseFloat($(this).closest("tr").find(".evening").val());
        var rejected = parseFloat($(this).closest("tr").find(".rejected").val());
        var total = $(this).closest("tr").find(".total");
        total.val((morning + evening)-rejected);
        //calc_total();
    });
    $("#addMilk tbody").on("input", ".evening", function () {
        var evening = parseFloat($(this).val());
        var morning = parseFloat($(this).closest("tr").find(".morning").val());
        var rejected = parseFloat($(this).closest("tr").find(".rejected").val());
        var total = $(this).closest("tr").find(".total");
        total.val((morning + evening)-rejected);
        //calc_total();
    });
    $("#addMilk tbody").on("input", ".rejected", function () {
        var rejected = parseFloat($(this).val());
        var morning = parseFloat($(this).closest("tr").find(".morning").val());
        var evening = parseFloat($(this).closest("tr").find(".evening").val());
        var total = $(this).closest("tr").find(".total");
        total.val((morning + evening)-rejected);
        //calc_total();
    });

    //Payments
    $("#cmaziwa tbody").on("input", ".rate", function () {
        var rate = parseFloat($(this).val());
        var totalMilk = parseFloat($(this).closest("tr").find(".totalMilk").val());
        //var rejected = parseFloat($(this).closest("tr").find(".rejected").val());
        var earned = $(this).closest("tr").find(".earned");
        earned.val(rate * totalMilk);
        //calc_total();
    });
    </script>
	
</body>
</html>