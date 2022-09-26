<!-- Page Wrapper -->
<?php //var_dump($farmers);die;?>
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Farmers</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active"><?php echo $farmers[0]['centerName']?> Collection Center</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<div class="view-icons" hidden>
						<a href="employees.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
						<a href="employees-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<?php if ($this->session->flashdata('success-msg')) { ?>
			<div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
		<?php } ?>
		<?php if ($this->session->flashdata('error-msg')) { ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
		<?php } ?>		
		<div class="row">
			<div class="col-sm-12">
				<form action="<?php echo base_url('deductions/storeIndividualDeduction')?>" method="POST">
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="form-group">
								<label>Farmer Code <span class="text-danger">*</span></label>
								<input class="form-control floating" type="text" id="farmerID" value="<?php echo $farmer['farmerID']?>" name="farmerID" readonly required>
								
							</div>
						</div> 
						<div class="col-sm-6 col-md-8">
							<div class="form-group">
								<label>Date <span class="text-danger">*</span></label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text" id="" name="date" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="table-responsive">
								<table class="table table-hover table-white" id="tableEstimate">
									<thead>
										<tr>
											<th style="width: 20px">#</th>
											<th class="col-sm-3">Deduction</th>
											<th class="col-md-6">Description</th>
											<th style="width:100px;">Amount</th>	
											<th>Amount</th>
											<th> </th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												<select name="deduction_id[]" style="min-width:150px" class="form-control" required>
													<option>Select --</option>
													<?php foreach($deductions as $key) { if($key['deductionType'] == '1') {?>
														<option value="<?php echo $key['id']?>"><?php echo $key['deductionName']?></option>
													<?php } }?>
												</select>
											</td>
											<td><input class="form-control"style="min-width:150px" type="text" id="description" name="description[]"></td>
											<td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" required></td>
											
											<td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
											<td><a href="javascript:void(0)" class="text-success font-18" title="Add" id="addBtn"><i class="fa fa-plus"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="table-responsive">
								<table class="table table-hover table-white">
									<tbody>
										<tr>
											<td colspan="5" style="text-align: right; font-weight: bold">
												Grand Total
											</td>
											<td style="font-size: 16px;width: 230px">
												<input class="form-control text-right" type="text" id="grand_total" name="" value="Ksh. 0.00" readonly>
											</td>
										</tr>
									</tbody>
								</table>                               
							</div>
						</div>
					</div>
					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /Page Content -->	
	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

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

    // Start Add Multiple Shop Items
    var rowIdx = 1;
    $("#addBtn").on("click", function ()
    {
        // Adding a row inside the tbody.
        $("#tableEstimate tbody").append(`
        <tr id="R${++rowIdx}">
            <td class="row-index text-center"><p> ${rowIdx}</p></td>
            <td>
					<select name="deduction_id[]" class="form-control">
						<option>Select --</option>
						<?php foreach($deduction as $key) { if($key['deductionType'] == '1') {?>
							<option value="<?php echo $key['id']?>"><?php echo $key['deductionName']?></option>
						<?php } }?>
					</select>
				</td>
            <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
            <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost"></td>
            <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
            <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash-o"></i></a></td>
        </tr>`);
    });
    $("#tableEstimate tbody").on("click", ".remove", function ()
    {
        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest("tr").nextAll();
        // Iterating across all the rows
        // obtained to change the index
        child.each(function () {
        // Getting <tr> id.
        var id = $(this).attr("id");

        // Getting the <p> inside the .row-index class.
        var idx = $(this).children(".row-index").children("p");

        // Gets the row number from <tr> id.
        var dig = parseInt(id.substring(1));

        // Modifying row index.
        idx.html(`${dig - 1}`);

        // Modifying row id.
        $(this).attr("id", `R${dig - 1}`);
    });

        // Removing the current row.
        $(this).closest("tr").remove();

        // Decreasing total number of rows by 1.
        rowIdx--;
    });

    $("#tableEstimate tbody").on("input", ".unit_price", function () {
        var unit_price = parseFloat($(this).val());
        var total = $(this).closest("tr").find(".total");
        total.val(unit_price);
        calc_total();
    }); 

    function calc_total() {
        var sum = 0;
        $(".total").each(function () {
        sum += parseFloat($(this).val());
        $("#grand_total").val(parseInt(sum));
        });
        $(".subtotal").text(sum);
        
        var amounts = sum;
        $(document).on("change keyup blur", "#qty", function() 
        {
            var qty = $("#qty").val();
            $("#grand_total").val(parseInt(amounts));
        }); 
    }
    // End of Multiple Shop Items
    </script>
	
</body>
</html>


