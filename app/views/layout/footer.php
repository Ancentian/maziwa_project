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
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
	<!-- Multiselect JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/multiselect.min.js"></script>		
	<!-- Custom JS -->
	<script src="<?php echo base_url(); ?>res/assets/js/app.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
        $('#maziwa').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'excel', 'pdf', 'print'
            ],
            stateSave: true,
            //scrollY:        "300px",
            //scrollX:        true,
            //scrollCollapse: true,
            paging:         true,
            fixedColumns:   {
                left: 4
            }
        });
    	$('#shopDeductions').DataTable({
    		dom: 'Bfrtip',
            buttons: [
            'copy', 'excel', 'pdf', 'print'
            ],
            stateSave: true,
    	});
    	$('#otherDeductions').DataTable({
    		dom: 'Bfrtip',
            buttons: [
            'copy', 'excel', 'pdf', 'print'
            ],
            stateSave: true,
    	});
    	$('#payments').DataTable({
    		dom: 'Bfrtip',
            buttons: [
            'copy', 'excel', 'pdf', 'print'
            ],
            stateSave: true,
    	});
        $('#addMilk').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'excel', 'pdf', 'print'
            ],
            stateSave: true,
            // paging:    true
        });

    });

		//Datatable Search
		// var table = $('#maziwa').DataTable();
		// $('#myInput').on( 'keyup', function (){
		//     table.search( this.value ).draw();
		// });
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

    function getcube(){  
    var rate = document.getElementById("rate").value;  
  //alert(rate);
}  

    //Payments
    $("#cmaziwa tbody").on("input", "rate", function () {
        var rate = parseFloat($(this).val());
        var totalMilk = parseFloat($(this).closest("tr").find(".totalMilk").val());
        var shop = parseFloat($(this).closest("tr").find(".shop").val());
        var individual = parseFloat($(this).closest("tr").find(".individual").val());
        var general = parseFloat($(this).closest("tr").find(".general").val());
        var gross = $(this).closest("tr").find(".gross");
        gross.val((rate * totalMilk)- (shop + individual + general));
        //calc_total();
        
    });

    // Morris.Bar({
    //     element: 'bar-charts',
    //     data: <?php //echo $data;?>,
    //     xkey: 'centerName',
    //     ykeys: ['totalMilk', 'b'],
    //     labels: ['Total Milk', 'Total Outcome'],
    //     lineColors: ['#f43b48','#453a94'],
    //     lineWidth: '3px',
    //     barColors: ['#f43b48','#453a94'],
    //     resize: true,
    //     redraw: true
    // });
    </script>
	
</body>
</html>