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
				<form action="<?php echo base_url('farmers/updateFarmer?fid='.$farmer['farmerID'])?>" method="POST">
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>First Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text" value="<?php echo $farmer['fname']?>" name="fname">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>M. Name <span class="text-danger"></span></label>
								<input class="form-control" type="text" value="<?php echo $farmer['mname']?>" name="mname">
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Last Name</label>
								<input class="form-control" type="text" value="<?php echo $farmer['lname']?>" name="lname">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>ID/Passport No.</label>
								<input class="form-control" type="text" value="<?php echo $farmer['id_number']?>" name="id_number">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>FarmerID</label>
								<input class="form-control" type="text" value="<?php echo $farmer['farmerID']?>" name="farmerID">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Contact 1</label>
								<input class="form-control" type="text" value="<?php echo $farmer['contact1']?>" name="contact1">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Contact 2</label>
								<input class="form-control" type="text" value="<?php echo $farmer['contact2']?>" name="contact2">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Gender <span class="text-danger">*</span></label>
								<select class="select" name="gender">
									<option value="male"<?php if($farmer['gender'] == 'male') { echo  "selected"; }?>>Male</option>
									<option value="female"<?php if($farmer['gender'] == 'female') { echo  "selected"; }?>>Female</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Join Date <span class="text-danger">*</span></label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" value="<?php echo $farmer['join_date']?>" type="text" name="join_date">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Collection Center</label>
								<select class="select" name="center_id">
									<?php foreach($collectionCenter as $key)?>
									<option value="<?php echo $key['id']?>"<?php if($farmer['center_id'] == $key['id']) { echo  "selected"; }?>><?php echo $key['centerName']?></option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Location</label>
								<input class="form-control" type="text" value="<?php echo $farmer['location']?>" name="location">
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Marital Status</label>
								<select class="select" name="marital_status">
									<option value="single"<?php if($farmer['marital_status'] == 'single') { echo "selected"; }?>>Single</option>
									<option value="married"<?php if($farmer['marital_status'] == 'married') { echo "selected"; }?>>Married</option>
									<option value="divorced"<?php if($farmer['marital_status'] == 'divorced') { echo "selected"; }?>>Divorced</option>
									<option value="widow"<?php if($farmer['marital_status'] == 'widow') { echo "selected"; }?>>Widow</option>
									<option value="windower"<?php if($farmer['marital_status'] == 'windower') { echo "selected"; }?>>Windower</option>
									<option value="seperated"<?php if($farmer['marital_status'] == 'seperated') { echo "selected"; }?>>Seperated</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-8">
							<div class="form-group">
								<label>Status</label>
								<select class="select" name="status">
									<option value="1"<?php if($farmer['status'] == 1) { echo "selected"; }?>>Active</option>
									<option value="0"<?php if($farmer['status'] == 0) { echo "selected"; }?>>Inactive</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Bank Name <span class="text-danger">*</span></label>
								<input class="form-control" name="bank_name" value="<?php echo $farmer['bank_name']?>" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Branch <span class="text-danger">*</span></label>
								<input class="form-control" value="<?php echo $farmer['bank_branch']?>" name="bank_branch" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Account Name <span class="text-danger">*</span></label>
								<input class="form-control" value="<?php echo $farmer['acc_name']?>" name="acc_name" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Account Number <span class="text-danger">*</span></label>
								<input class="form-control" value="<?php echo $farmer['acc_number']?>" name="acc_number" type="text">
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
