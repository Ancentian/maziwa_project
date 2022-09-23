<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Farmer Salary</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Salary</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Farmer Name</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus select-focus">
					<select class="select floating"> 
						<option value=""> -- Select -- </option>
						<option value="">Employee</option>
						<option value="1">Manager</option>
					</select>
					<label class="focus-label">Role</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> 
				<div class="form-group form-focus select-focus">
					<select class="select floating"> 
						<option> -- Select -- </option>
						<option> Pending </option>
						<option> Approved </option>
						<option> Rejected </option>
					</select>
					<label class="focus-label">Leave Status</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" type="text">
					</div>
					<label class="focus-label">From</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" type="text">
					</div>
					<label class="focus-label">To</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<a href="#" class="btn btn-success btn-block"> Search </a>  
			</div>     
		</div>
		<!-- /Search Filter -->

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Farmer ID</th>
								<th>Rate</th>
								<th>Total Milk</th>
								<th>Gross</th>
								<th>Payslip</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($salary as $key) { ?>
								<tr>
								<td><?php echo $i; ?></td>
								<td>
									<h2 class="table-avatar">
										<a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
										<a href="#"><?php echo $key['fname']." ".$key['lname']?> <span><?php echo $key['centerName']?></span></a>
									</h2>
								</td>
								<td><?php echo $key['farmerID']?></td>
								<td><?php echo $milkRate['milkRate']?></td>				
								<td><?php echo $key['totalMilk']?> Ltrs</td>
								<td>Ksh. <?php echo ($key['totalMilk'] * $milkRate['milkRate'])?></td>
								<td><a class="btn btn-sm btn-primary" href="<?php echo base_url('payments/payslip/'.$key['farmerID'])?>">Generate Slip</a></td>
								
							</tr>
							<?php $i++; }?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->



</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
