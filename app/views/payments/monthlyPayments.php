<?php $sdate = "";$edate="";
$sdate = $_GET['sdate'];
$edate = $_GET['edate'];
?>
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Monthly Payments</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">General</li>
					</ul>
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
		<!-- Search Filter -->
		<form action="<?php echo base_url('payments/addPayment')?>" method="GET"> 
		<div class="row filter-row">
			<div class="col-md-4">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" name="sdate" value="<?php echo $sdate;?>" type="text">
					</div>
					<label class="focus-label">From</label>
				</div>
			</div>
			<div class="col-md-4 ">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" name="edate" value="<?php echo $edate;?>" type="text">
					</div>
					<label class="focus-label">To</label>
				</div>
			</div>
			<div class="col-md-4 ">  
				<input type="submit" class="btn btn-success btn-block" value="FILTER" required>
				<!-- <button class="btn btn-success " value="FILTER" type="submit"> Search</button>  --> 
			</div>     
		</div>
		</form>
		<!-- /Search Filter -->	
		<div class="row">
			<div class="col-md-12">		
				<!-- <div> -->
					<form action="<?php echo base_url('payments/storeMonthlyPayments')?>" method="POST">
						
					<table class="table table-striped custom-table mb-0 test" id="maziwa">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Code</th>
								<th>Name</th>
								<th>Center</th>
								<th>Total Milk</th>
								<th>Deductions</th>					
								<th>Recorded By</th>
								<th>Created at</th>
								<!-- <th class="text-right">Action</th> -->
							</tr>
						</thead>
						<tbody>
							
							<?php $i=1; foreach ($payments as $key) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $key['farmerID']?></td>
									<td><?php echo $key['fname']." ".$key['mname']." ".$key['lname']?></td>
									<td><?php echo ucfirst($key['centerName']) ?></td>
									<td><?php echo $key['total_milk']?></td>
									<td><?php echo $key['totShopAmount']?></td>				
									<td><?php echo $key['firstname']?></td>
									<td class="text-right">
										<a href="<?php echo base_url('payments/print_invoice/'.$key['id']) ?>" class="btn btn-info"><i class="fa fa-print"></i></a>
									</td>
								</tr>
								<?php $i++; } ?>
							</tbody>
						</table>
						<!-- </div> -->
						<div class="submit-section">
							<!-- <button class="btn btn-primary submit-btn m-r-10" hidden>Save & Send</button> -->
							<button type="submit" class="btn btn-primary submit-btn">Save</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->
