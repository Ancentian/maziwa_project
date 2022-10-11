<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Deductions</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url()?>">Dashboard</a></li>
						<li class="breadcrumb-item active">Deductions</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_deduction"><i class="fa fa-plus"></i> Add Deduction</a>
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
								<th>Deduction Name</th>
								<th>Deduction Type</th>
								<th>Created on</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($deductions as $key) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $key['deductionName']?></td>
									<?php if($key['deductionType'] == '1'){?>
										<td><?php echo "Individual";?></td>
									<?php }elseif ($key['deductionType'] == '2') {?>
										<td><?php echo "General";?></td>
									<?php }?>
									<td><?php echo date('d/m/Y', strtotime($key['created_at'])) ?></td>
									<td class="text-right">
										<a href="<?php echo base_url('deductions/editDeduction/'.$key['id'])?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo base_url('deductions/deleteDeduction/'.$key['id'])?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

		<!-- Add Department Modal -->
		<div id="add_deduction" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Deduction</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo base_url('deductions/storeDeduction') ?>"method="POST" >
							<div class="form-group form-focus select-focus">
								<select name="deductionType" class="select floating" required> 
									<option value="">Select Type</option>
									<option value="1">Individual</option>
									<option value="2">General</option>
								</select>
								<label class="focus-label">Dedection Type</label>
							</div>
							<div class="form-group">
								<label>Deduction Name <span class="text-danger">*</span></label>
								<input class="form-control" name="deductionName" type="text">
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

		<!-- Edit Department Modal -->
		<div id="edit_department" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Department</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Department Name <span class="text-danger">*</span></label>
								<input class="form-control" value="IT Management" type="text">
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Department Modal -->

		<!-- Delete Department Modal -->
		<div class="modal custom-modal fade" id="delete_department" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-header">
							<h3>Delete Department</h3>
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
		<!-- /Delete Department Modal -->

	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
