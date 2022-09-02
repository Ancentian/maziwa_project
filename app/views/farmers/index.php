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
						<li class="breadcrumb-item active">Farmers</li>
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
		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Employee ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Farmer Name</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3"> 
				<div class="form-group form-focus select-focus">
					<select class="select floating"> 
						<option>Select Collection Center</option>
						<option>Web Developer</option>
						<option>Web Designer</option>
						<option>Android Developer</option>
						<option>Ios Developer</option>
					</select>
					<label class="focus-label">Collection Center</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
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
								<th>Farmer Code</th>
								<th>Name</th>
								
								<th>Contact</th>
								<th>Collection Center</th>
								<th class="text-nowrap">Join Date</th>
								<th>Gender</th>
								<th class="text-right no-sort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($farmers as $key) { ?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $key['farmerID']?></td>
								<td>
									<h2 class="table-avatar">
										<a href="<?php echo base_url('farmers/farmerProfile/'. $key['farmerID'] )?>" class="avatar"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/avatar-02.jpg"></a>
										<a href="<?php echo base_url('farmers/farmerProfile/'. $key['farmerID'] )?>"><?php echo $key['fname']." ". $key['lname']?> <span><?php echo $key['location']?></span></a>
									</h2>
								</td>
								
								<td><?php echo $key['contact1']?></td>
								<td><?php echo $key['centerName']?></td>
								<td><?php echo date('d/m/Y', strtotime($key['join_date']))?></td>
								<td><?php echo $key['gender']?></td>
								
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
											
											
										</div>
									</div>
								</td>
							</tr>

							<?php $i++; }?>				
						</tbody>
					</table>
				</div>
			</div>
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
									<label class="col-form-label">Middle Name</label>
									<input class="form-control" name="mname" type="text">
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
										<input class="form-control datetimepicker" name="join_date" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Collection Center <span class="text-danger">*</span></label>
									<select name="center_id" class="select">
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
	
	<!-- Edit Employee Modal -->
	<div id="edit_employee" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">First Name <span class="text-danger">*</span></label>
									<input class="form-control" value="John" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Last Name</label>
									<input class="form-control" value="Doe" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Username <span class="text-danger">*</span></label>
									<input class="form-control" value="johndoe" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Email <span class="text-danger">*</span></label>
									<input class="form-control" value="johndoe@example.com" type="email">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Password</label>
									<input class="form-control" value="johndoe" type="password">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Confirm Password</label>
									<input class="form-control" value="johndoe" type="password">
								</div>
							</div>
							<div class="col-sm-6">  
								<div class="form-group">
									<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
									<input type="text" value="FT-0001" readonly class="form-control floating">
								</div>
							</div>
							<div class="col-sm-6">  
								<div class="form-group">
									<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
									<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Phone </label>
									<input class="form-control" value="9876543210" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Company</label>
									<select class="select">
										<option>Global Technologies</option>
										<option>Delta Infotech</option>
										<option selected>International Software Inc</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Department <span class="text-danger">*</span></label>
									<select class="select">
										<option>Select Department</option>
										<option>Web Development</option>
										<option>IT Management</option>
										<option>Marketing</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Designation <span class="text-danger">*</span></label>
									<select class="select">
										<option>Select Designation</option>
										<option>Web Designer</option>
										<option>Web Developer</option>
										<option>Android Developer</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Employee Modal -->
	
	<!-- Delete Employee Modal -->
	<div class="modal custom-modal fade" id="delete_employee" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Employee</h3>
						<p>Are you sure want to delete?</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete Employee Modal -->
	
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


