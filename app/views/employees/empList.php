<!-- Page Wrapper -->
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
					<div class="view-icons">
						<a href="<?php echo base_url('employee/index');?>" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
						&nbsp;
						<a href="<?php echo base_url('employee/staffList');?>" class="list-view btn btn-link" ><i class="fa fa-bars"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

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
					<label class="focus-label">Employee Name</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3"> 
				<div class="form-group form-focus select-focus">
					<select class="select floating"> 
						<option>Select Designation</option>
						<?php foreach($roles as $key) {?>
						<option value="<?php echo $key['id']?>"><?php echo $key['roleName']?></option>
						<?php }?>
					</select>
					<label class="focus-label">Designation</label>
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
								<th>Name</th>
								<th>Email</th>
								
								<!-- <th class="text-nowrap">Join Date</th> -->
								<th>Role</th>
								<th class="text-right no-sort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($employees as $key) { ?>
								<tr>
									<td><?php echo $i;?></td>
								<td>
									<h2 class="table-avatar">
										<a href="<?php echo base_url()?>" class="avatar"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/user.png"></a>
										<a href="<?php echo base_url()?>"><?php echo $key['firstname']." ".$key['lastname'] ?> <span><?php echo $key['roleName']?></span></a>
									</h2>
								</td>
								
								<td><?php echo $key['email']?></td>
								<td><?php echo $key['roleName']?></td>
								<td class="text-right">
									<a href="<?php echo base_url('employee/editStaff/'.$key['id'])?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
									<a href="<?php echo base_url('employee/deleteStaff/'.$key['id'])?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
	
	<!-- Add Employee Modal -->
	<div id="add_employee" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Employee</h5>
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
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Last Name</label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Username <span class="text-danger">*</span></label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Email <span class="text-danger">*</span></label>
									<input class="form-control" type="email">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Password</label>
									<input class="form-control" type="password">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Confirm Password</label>
									<input class="form-control" type="password">
								</div>
							</div>
							<div class="col-sm-6">  
								<div class="form-group">
									<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
									<input type="text" class="form-control">
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
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Company</label>
									<select class="select">
										<option value="">Global Technologies</option>
										<option value="1">Delta Infotech</option>
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
						<div class="table-responsive m-t-15">
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th>Module Permission</th>
										<th class="text-center">Read</th>
										<th class="text-center">Write</th>
										<th class="text-center">Create</th>
										<th class="text-center">Delete</th>
										<th class="text-center">Import</th>
										<th class="text-center">Export</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Holidays</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Leaves</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Clients</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Projects</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Tasks</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Chats</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Assets</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Timing Sheets</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
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
						<div class="table-responsive m-t-15">
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th>Module Permission</th>
										<th class="text-center">Read</th>
										<th class="text-center">Write</th>
										<th class="text-center">Create</th>
										<th class="text-center">Delete</th>
										<th class="text-center">Import</th>
										<th class="text-center">Export</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Holidays</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Leaves</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Clients</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Projects</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Tasks</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Chats</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Assets</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Timing Sheets</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
										<td class="text-center">
											<input type="checkbox">
										</td>
									</tr>
								</tbody>
							</table>
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

