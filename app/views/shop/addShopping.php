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
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Farmer</a>
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
				<form action="<?php echo base_url('shop/storeShopSales')?>" method="POST">
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="form-group">
								<label>Client <span class="text-danger">*</span></label>
								<select class="select" id="client" name="farmerID" readonly>
									<?php foreach($farmers as $key) {?>
									<option value="<?php echo $farmer['farmerID']?>"<?php if($key['farmerID'] == $farmer['farmerID']){ echo "selected"; }?> readonly><?php echo $key['fname']." ".$key['mname']." ".$key['lname'] ?> </option>
									<?php }?>
								</select>
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
											<th class="col-sm-2">Item</th>
											<th class="col-md-6">Description</th>
											<th style="width:80px;">Qty</th>
											<th style="width:100px;">Unit Cost</th>
											
											<th>Amount</th>
											<th> </th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<!-- <td><input class="form-control" style="min-width:150px" type="text" id="item" name="item[]"></td> -->
											<td>
												<select name="itemID" style="min-width:150px" class="form-control" required>
													<option>Select --</option>
													<?php foreach($inventory as $key) {?>
														<option value="<?php echo $key['id']?>"><?php echo $key['itemName']?></option>
													<?php }?>
												</select>
											</td>
											<td><input class="form-control"style="min-width:150px" type="text" id="description" name="description[]"></td>
											<td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]" required></td>
											<td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]" required></td>
											
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
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td class="text-right">Total</td>
											<td>
												<input class="form-control text-right total" type="text" id="sum_total" name="" value="0" readonly>
											</td>
										</tr>

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
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Comments</label>
										<textarea class="form-control" rows="3" id="other_information" name="comments"></textarea>
									</div>
								</div>
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
		<!-- Add Farmer Modal -->
		<div id="add_employee" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Farmer</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url('farmers/storeFarmer')?>" method="POST">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">First Name <span class="text-danger">*</span></label>
										<input class="form-control" name="fname" type="text">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Last Name</label>
										<input class="form-control" name="lname" type="text">
									</div>
								</div>
								<div class="col-sm-6">  
									<div class="form-group">
										<label class="col-form-label">Farmer ID <span class="text-danger">*</span></label>
										<input type="text" name="farmerID" class="form-control">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Contact 1<span class="text-danger">*</span></label>
										<input class="form-control" name="contact1" type="number">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Contact 2<span class="text-danger">*</span></label>
										<input class="form-control" name="contact2" type="number">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Gender <span class="text-danger">*</span></label>
										<select name="gender" class="select">
											<option value="">Select Gender</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
											<option value="other">Other</option>
										</select>
									</div>
								</div>

								<div class="col-sm-6">  
									<div class="form-group">
										<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" name="join_date" type="date">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Collection Center <span class="text-danger">*</span></label>
										<select name="collection_center" class="select">
											<option>Select Collection Center</option>
											<?php foreach ($collectionCenter as $key) { ?>
												<option value="<?php echo $key['id']?>"><?php echo $key['centerName']?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<div class="col-sm-6">  
									<div class="form-group">
										<label class="col-form-label">Location <span class="text-danger">*</span></label>
										<input type="text" name="location" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Marital Status <span class="text-danger">*</span></label>
										<select name="marital_status" class="select">
											<option>Select Marital Status</option>
											<option value="single">Single</option>
											<option value="married">Married</option>
											<option value="divorced">Divorced</option>
											<option value="widow">Widow</option>
											<option value="windower">Windower</option>
											<option value="seperated">Seperated</option>
										</select>
									</div>
								</div>
							</div>
							<div class="submit-section">
								<button type="submit" class="btn btn-primary submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Employee Modal -->

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
					<select name="itemID" class="form-control">
						<option>Select --</option>
						<?php foreach($inventory as $key) {?>
							<option value="<?php echo $key['id']?>"><?php echo $key['itemName']?></option>
						<?php }?>
					</select>
				</td>
            <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
            <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
            <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]"></td>
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

    $("#tableEstimate tbody").on("input", ".qty", function () {
        var qty = parseFloat($(this).val());
        var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
        var total = $(this).closest("tr").find(".total");
        total.val(unit_price * qty);
        calc_total();
    });

    $("#tableEstimate tbody").on("input", ".unit_price", function () {
        var unit_price = parseFloat($(this).val());
        var qty = parseFloat($(this).closest("tr").find(".qty").val());
        var total = $(this).closest("tr").find(".total");
        total.val(unit_price * qty);

        calc_total();
    });  
    function calc_total() {
        var sum = 0;
        $(".total").each(function () {
        sum += parseFloat($(this).val());
        });
        $(".subtotal").text(sum);
        
        var amounts = sum;
        $(document).on("change keyup blur", "#qty", function() 
        {
            // var qty = $("#qty").val();
            // $(".total").val(amounts * qty);
            // $("#sum_total").val(amounts * qty);
            $("#grand_total").val(parseInt(amounts));
        }); 
    }
    // End of Multiple Shop Items
    </script>
	
</body>
</html>


