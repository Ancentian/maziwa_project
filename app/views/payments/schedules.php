<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payment Schedules</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Payment Schedules</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_scheduule"><i class="fa fa-plus"></i> Create Schedule</a>
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
			<div class="col-md-12">
				<div>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Schedule Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Created on</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($schedules as $key) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $key['scheduleName']?></td>
									<td><?php echo $key['start_date']?></td>
									<td><?php echo $key['end_date']?></td>
									<td><?php echo date('d/m/Y H:i', strtotime($key['created_at'])) ?></td>
									<td class="text-right">
										<a href="<?php echo base_url('payments/editSchedule/'.$key['id'])?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo base_url('payments/deleteSchedule/'.$key['id'])?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php $i++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content -->

		<!-- Create Schedule Modal -->
		<div id="create_scheduule" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Payment Schedule</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url('payments/storeSchedules') ?>"method="POST" >
							<div class="col-md-12">
								<div class="form-group">
									<label>Schedule Name <span class="text-danger">*</span></label>
									<input class="form-control" name="scheduleName" type="text">
								</div>
							</div>
							<div class="col-md-12">  
								<div class="form-group">
									<label class="col-form-label">Start Date <span class="text-danger">*</span></label>
									<div class="cal-icon">
										<input class="form-control datetimepicker" name="start_date" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-12">  
								<div class="form-group">
									<label class="col-form-label">End Date <span class="text-danger">*</span></label>
									<div class="cal-icon">
										<input class="form-control datetimepicker" name="end_date" type="text">
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
		<!-- /Add Department Modal -->

	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
