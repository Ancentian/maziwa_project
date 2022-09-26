<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Milk Rates</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Set Milk Rates</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<?php if ($this->session->flashdata('success-msg')) { ?>
			<!-- <div class="alert alert-success"></div> -->
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong></strong> Your <a href="#" class="alert-link"><?php echo $this->session->flashdata('success-msg');?></a> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>
		<?php if ($this->session->flashdata('error-msg')) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong><a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('error-msg'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="alert alert-danger"></div>
		<?php } ?>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Set Milk Rates</h4>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('payments/store_milkRates')?>" method="post">
							<h4 class="card-title">Cooperative Milk Rates</h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="rateName" value="<?php echo $milkRate['rateName']?>" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Milk Rate</label>
										<input type="number" name="milkRate" value="<?php echo $milkRate['milkRate']?>" class="form-control">
									</div>
								</div>
								<div class="col-md-6">  
									<div class="form-group form-focus">
										<div class="cal-icon">
											<input class="form-control floating datetimepicker" name="runs_from" value="<?php echo $milkRate['runs_from']?>" type="text">
										</div>
										<label class="focus-label">Runs From</label>
									</div>
								</div>
								<div class="col-md-6">  
									<div class="form-group form-focus">
										<div class="cal-icon">
											<input class="form-control floating datetimepicker" name="runs_to" value="<?php echo $milkRate['runs_to']?>" type="text">
										</div>
										<label class="focus-label">To</label>
									</div>
								</div>
							</div>		
						</div>
						<div class="col-md-10 mb-3">
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



</div>
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

