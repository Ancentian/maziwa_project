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
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Farmers</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#farmer_info_modal"><i class="fa fa-plus"></i> Add Farmer</a>
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
		<div class="row filter-row" hidden>
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
					<table class="table table-striped custom-table" id="maziwa">
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
											<a href="<?php echo base_url('farmers/farmerProfile?fid='. $key['farmerID'] )?>" class="avatar"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/user.png"></a>
											<a href="<?php echo base_url('farmers/farmerProfile?fid='. $key['farmerID'] )?>"><?php echo $key['fname']." ". $key['lname']?> <span><?php echo $key['location']?></span></a>
										</h2>
									</td>

									<td><?php echo $key['contact1']?></td>
									<td><?php echo ucfirst($key['centerName'])?></td>
									<td><?php echo $key['join_date']?></td>
									<td><?php echo $key['gender']?></td>

									<td class="text-right">
										<a href="<?php echo base_url('farmers/editFarmer/'.$key['farmerID'])?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo base_url('farmers/deleteFarmer/'.$key['farmerID'])?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

		<!-- Family Info Modal -->
		<div id="farmer_info_modal" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"> Bio Data Informations</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url('farmers/storeFarmer')?>" method="POST">
							<div class="form-scroll">
								<div class="card">
									<div class="card-body">
										<h3 class="card-title">Member Bio Data<a href="javascript:void(0);" class="delete-icon"></a></h3>
										<form action="<?php echo base_url('farmers/storeFarmer')?>" method="POST">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">First Name <span class="text-danger">*</span></label>
														<input class="form-control" name="fname" type="text" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Middle Name</label>
														<input class="form-control" name="mname" value="<?php echo $mname;?>" type="text">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Last Name</label>
														<input class="form-control" name="lname"value="<?php echo $lname;?>" type="text" required>
													</div>
												</div>
												<div class="col-sm-6">  
													<div class="form-group">
														<label class="col-form-label">ID/Passport No. <span class="text-danger">*</span></label>
														<input type="text" name="id_number" class="form-control" required>
													</div>
												</div>
												<div class="col-sm-6">  
													<div class="form-group">
														<label class="col-form-label">Farmer ID <span class="text-danger">*</span></label>
														<input type="text" name="farmerID" class="form-control" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Contact 1<span class="text-danger">*</span></label>
														<input class="form-control" name="contact1" type="number" required>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="col-form-label">Contact 2<span class="text-danger"></span></label>
														<input class="form-control" name="contact2" type="number">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Gender <span class="text-danger">*</span></label>
														<select name="gender" class="select" required>
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
															<input class="form-control datetimepicker" name="join_date" type="text" required>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Collection Center <span class="text-danger">*</span></label>
														<select name="center_id" class="select" required>
															<option value="">Select Collection Center</option>
															<?php foreach ($collectionCenter as $key) { ?>
																<option value="<?php echo $key['id']?>"><?php echo $key['centerName']?></option>
															<?php }?>
														</select>
													</div>
												</div>
												<div class="col-sm-6">  
													<div class="form-group">
														<label class="col-form-label">Location <span class="text-danger">*</span></label>
														<input type="text" name="location" class="form-control" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Marital Status <span class="text-danger">*</span></label>
														<select name="marital_status" class="select" required>
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
										</div>
									</div>

									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Bank Information <a href="javascript:void(0);" class="delete-icon"></a></h3>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Bank Name <span class="text-danger">*</span></label>
														<input class="form-control" name="bank_name" type="text"  required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Branch <span class="text-danger">*</span></label>
														<input class="form-control" name="bank_branch" type="text"  required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Account Name <span class="text-danger">*</span></label>
														<input class="form-control" name="acc_name" type="text" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Account Number <span class="text-danger">*</span></label>
														<input class="form-control" name="acc_number" type="text" required>
													</div>
												</div>
											</div>
											
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
			<!-- /Family Info Modal -->

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
											<label class="col-form-label">Contact 2<span class="text-danger"></span></label>
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
											<select name="center_id" class="select" required>
												<option value="">Select Collection Center</option>
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

