<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Edit Farmer</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Edit Farmer</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<form action="<?php echo base_url('payments/updateSchedule/'.$schedule['id'])?>" method="POST">
					<div class="row">
						<div class="col-md-12">
								<div class="form-group">
									<label>Schedule Name <span class="text-danger">*</span></label>
									<input class="form-control" name="scheduleName" value="<?php echo $schedule['scheduleName']?>" type="text">
								</div>
							</div>
							<div class="col-md-12">  
								<div class="form-group">
									<label class="col-form-label">Start Date <span class="text-danger">*</span></label>
									<div class="cal-icon">
										<input class="form-control datetimepicker" value="<?php echo $schedule['start_date']?>" name="start_date" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-12">  
								<div class="form-group">
									<label class="col-form-label">End Date <span class="text-danger">*</span></label>
									<div class="cal-icon">
										<input class="form-control datetimepicker" name="end_date" value="<?php echo $schedule['end_date']?>" type="text">
									</div>
								</div>
							</div>
					</div>

					<div class="submit-section">
						<button type="submit" class="btn btn-primary submit-btn">Update</button>
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
