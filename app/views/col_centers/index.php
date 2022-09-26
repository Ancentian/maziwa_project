<!-- Page Wrapper -->
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Collection Centers</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Collection Centers</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Collection Center</a>
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
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Collection Center </th>
								<th hidden>Cooperative </th>
								<th>Clerk Name</th>
								<th>Created on</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($collectionCenter as $key) { ?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $key['centerName']?></td>
								<td hidden><?php echo $key['cooperativeName']?></td>
								<td><?php echo $key['firstname']." ".$key['lastname']?></td>
								<td><?php echo $key['created_at']?></td>
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_designation"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_designation"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

	<!-- Add Designation Modal -->
	<div id="add_designation" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Collection Center</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('cooperative/storeCollectionCenter') ?>" method="POST">
						<div class="form-group">
							<label>Collection Center Name <span class="text-danger">*</span></label>
							<input class="form-control" name="centerName" type="text">
						</div>
						<div class="form-group">
							<label>Cooperative <span class="text-danger">*</span></label>
							<select name="cooperative_id" class="select">
								<option>Select Cooperative</option>
								<?php foreach ($cooperative as $key) { ?>
									<option value="<?php echo $key['id']?>"><?php echo $key['cooperativeName']?></option>
								<?php }?>	
							</select>
						</div>
						<div class="form-group">
							<label>Collection Clerk <span class="text-danger">*</span></label>
							<select name="clerk_id" class="select">
								<option>Select Clerk</option>
								<?php foreach ($clerk as $key) { if($key['role_id'] == '1') { ?>
									<option value="<?php echo $key['id'];?>"><?php echo $key['firstname']." ".$key['lastname']?> </option>
								<?php } } ?>
							</select>
						</div>
						<div class="submit-section">
							<button type="submit" class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Designation Modal -->
	
	<!-- Edit Designation Modal -->
	<div id="edit_designation" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Designation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Collection Center Name <span class="text-danger">*</span></label>
							<input class="form-control" value="Web Developer" type="text">
						</div>
						<div class="form-group">
							<label>Department <span class="text-danger">*</span></label>
							<select class="select">
								<option>Select Cooperatiev</option>
								<option>Cooperative</option>
								<option>IT Management</option>
								<option>Marketing</option>
							</select>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Designation Modal -->
	
	<!-- Delete Designation Modal -->
	<div class="modal custom-modal fade" id="delete_designation" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Designation</h3>
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
	<!-- /Delete Designation Modal -->
	
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

