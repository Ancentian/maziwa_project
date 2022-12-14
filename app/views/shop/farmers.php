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
					<table class="table table-striped custom-table" id="maziwa">
						<thead>
							<tr>
								<th>#</th>
								<th>Farmer Code</th>
								<th>Name</th>
								
								<th>Contact</th>
								<th>Center</th>
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
										<a href="<?php echo base_url('farmers/farmerProfile/'. $key['farmerID'] )?>" class="avatar"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/user.png"></a>
										<a href="<?php echo base_url('farmers/farmerProfile/'. $key['farmerID'] )?>"><?php echo $key['fname']." ". $key['lname']?> <span><?php echo $key['location']?></span></a>
									</h2>
								</td>
								
								<?php if($key['contact1'] != "") {?>
								<td><?php echo $key['contact1']?></td>
								<?php }elseif($key['contact1'] == ""){?>
								<td><?php echo "--"; ?></td>
								<?php }?>
								<td class="text-center"><?php echo $key['centerName']?></td>			
								<td class="text-right">
									<a href="<?php echo base_url('shop/addShopping?fid='.$key['farmerID']) ?>" class="btn btn-warning"><i class="fa fa-plus"></i></a>
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
	
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


