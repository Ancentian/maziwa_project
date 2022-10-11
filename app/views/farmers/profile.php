<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title"> Profile</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Profile / <?php echo $farmer['fname']." ".$farmer['mname']." ".$farmer['lname']?></li>
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
		<div class="card mb-0">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="profile-view">
							<div class="profile-img-wrap">
								<div class="profile-img">
									<a href="#"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/user.png"></a>
								</div>
							</div>
							<div class="profile-basic">
								<div class="row">
									<div class="col-md-5">
										<div class="profile-info-left">
											<h3 class="user-name m-t-0 mb-0"><?php echo $farmer['fname']." ".$farmer['mname']." ".$farmer['lname']?></h3>
											<h6 class="text-muted"><?php echo $farmer['location']?></h6>
											<small class="text-muted"><?php echo strtoupper($farmer['centerName'])?></small>
											<div class="staff-id"><?php echo $farmer['farmerID']?></div>
											<div class="small doj text-muted">Date of Join : <?php echo $farmer['join_date']?></div>
											<div class="staff-msg" hidden><a class="btn btn-custom" href="#">Send Message</a></div>
										</div>
									</div>
									<div class="col-md-7">
										<ul class="personal-info">
											<li>
												<div class="title">Phone:</div>
												<div class="text"><a href=""><?php echo $farmer['contact1']?></a></div>
											</li>
											<li>
												<div class="title">Email:</div>
												<div class="text"><a href="">email@example.com</a></div>
											</li>						
											<li>
												<div class="title">Gender:</div>
												<div class="text"><?php echo $farmer['gender']?></div>
											</li>
											<li>
												<div class="title">Reports to:</div>
												<div class="text">
													<div class="avatar-box">
														<div class="avatar avatar-xs">
															<img src="assets/img/profiles/avatar-16.jpg" alt="">
														</div>
													</div>
													<a href="profile.html">
														<?php echo $farmer['clerkName']?>
													</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card tab-box">
			<div class="row user-tabs">
				<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
						<li class="nav-item"><a href="#milk_collections" data-toggle="tab" class="nav-link">Milk Collections</a></li>
						<li class="nav-item"><a href="#shop_collections" data-toggle="tab" class="nav-link">Shop Deductions</a></li>
						<li class="nav-item"><a href="#other_deductions" data-toggle="tab" class="nav-link">Other Deductions</a></li>
						<li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Payments <small class="text-danger">(Admin Only)</small></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="tab-content">

			<!-- Profile Info Tab -->
			<div id="emp_profile" class="pro-overview tab-pane fade show active">
				<div class="row">
					<div class="col-md-6 d-flex">
						<div class="card profile-box flex-fill">
							<div class="card-body">
								<h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
								<ul class="personal-info">
									<li>
										<div class="title">ID/Passport No.</div>
										<div class="text"><?php echo $farmer['id_number']?></div>
									</li>
									<li>
										<div class="title">Tel</div>
										<div class="text"><a href=""><?php echo ucfirst($farmer['contact1'])?></a></div>
									</li>
									
									<li>
										<div class="title">Religion</div>
										<div class="text">Christian</div>
									</li>
									<li>
										<div class="title">Marital status</div>
										<div class="text"><?php echo ucfirst($farmer['marital_status'])?></div>
									</li>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 d-flex">
					<div class="card profile-box flex-fill">
						<div class="card-body">
							<h3 class="card-title">Next of Kin <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
							<div class="table-responsive">
								<table class="table table-nowrap">
									<thead>
										<tr>
											<th>Name</th>
											<th>Relationship</th>
											<th>Phone</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($next_of_kin as $key ) { ?>
											<tr>
												<td><?php echo $key['name']?></td>
												<td><?php echo $key['relationship']?></</td>
												<td><?php echo $key['phone']?></</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
										<?php }?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 d-flex">
					<div class="card profile-box flex-fill">
						<div class="card-body">
							<h3 class="card-title">Bank information</h3>
							<ul class="personal-info">
								<li>
									<div class="title">Bank name</div>
									<div class="text"><?php echo $farmer['bank_name']?></div>
								</li>
								<li>
									<div class="title">Bank account No.</div>
									<div class="text"><?php echo $farmer['bank_branch']?></div>
								</li>
								<li>
									<div class="title">Account. Name</div>
									<div class="text"><?php echo $farmer['acc_name']?></div>
								</li>
								<li>
									<div class="title">Bank account No.</div>
									<div class="text"><?php echo $farmer['acc_number']?></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- /Profile Info Tab -->
		<!-- Projects Tab -->
		<div class="tab-pane fade" id="milk_collections">
			<div class="row">
				<div class="col-md-12 ">
					<div class="card">
						<div class="card-body">
							<h3 class="card-title">Milk Production</h3>
							<table class="table table-striped custom-table mb-0" id="maziwa">
								<thead>
									<tr>
										<th>#</th>
										<th>Collection Date</th>
										<th>Morning</th>
										<th>Evening</th>
										<th>Rejected</th>					
										<th>Clerk</th>
										<th>Created at</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($milk as $key) { ?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo date('d/m/Y', strtotime($key['collection_date']))?></td>	
											<td><?php echo $key['morning']?></td>
											<td><?php echo $key['evening']?></td>
											<td><?php echo $key['rejected']?></td>				
											<td><?php echo $key['firstname']?></td>
											<td><?php echo date('d/m/Y', strtotime($key['created_at'])) ?></td>
										</tr>
										<?php $i++; } ?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Projects Tab -->

			<!-- Projects Tab -->
			<div class="tab-pane fade" id="shop_collections">
				<div class="row">
					<div class="col-md-12 ">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">Shop Deductions</h3>
								<table class="table table-striped custom-table mb-0" id="shopDeductions">
									<thead>
										<tr>
											<th>#</th>
											<th>Item </th>
											<th>Qty</th>
											<th>@</th>
											<th>Amount</th>
											<th>Cashier</th>
											<th>Created on</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; $amt=0; foreach ($shopping as $key) { $amt+=$key['amount']; ?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $key['itemName']?></td>
											<td><?php echo $key['qty']?></td>
											<td><?php echo $key['unit_cost']?></td>
											<td><?php echo $key['amount']?></td>
											<td><?php echo $key['firstname']." ".$key['lastname']?></td>
											<td><?php echo date('d/m/Y', strtotime($key['created_at']))?></td>
											<td class="text-right">
												<a href="<?php echo base_url('shop/deleteShoppedItem/'.$key['id']."/".$key['farmerID'])?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
										<?php $i++; }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" style="text-align: right; font-weight: bold">
												Grand Total
											</td>
											<td>
												<input class="form-control text-right" type="text" id="grand_total" name="" value="Ksh. <?php echo $amt; ?>" readonly>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Projects Tab -->
			<!-- Other Deductions Tab -->
			<div class="tab-pane fade" id="other_deductions">
				<div class="row">
					<div class="col-md-12 ">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">Other Deductions</h3>
								<table class="table table-striped custom-table mb-0" id="otherDeductions">
									<thead>
										<tr>
											<th>#</th>
											<th>Deduction</th>
											<th>Type</th>
											<th>Amount</th>
											<th class="text-nowrap">Date</th>
											<th>Created at</th>
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
												<td><?php echo $key['amount']?></td>
												<td><?php echo date('d/m/Y', strtotime($key['date'])) ?></td>				
												<td><?php echo date('d/m/Y', strtotime($key['created_at'])) ?></td>
											</tr>
											<?php $i++; } ?>
										</tbody>
									</table>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Other Deductions Tab -->

				<!-- Bank Statutory Tab -->
				<div class="tab-pane fade" id="bank_statutory">
					<div class="card">
						<div class="card-body">
							<h3 class="card-title"> Basic Salary Information</h3>
							<table class="table table-striped custom-table mb-0 test" id="payments">
								<thead>
									<tr>
										<th>#</th>
										<th>Milk</th>
										<th>Shop</th>
										<th>Individual</th>	
										<th>General</th>
										<th>Deductions</th>	
										<th>Gross</th>			
										<th>Date</th>
										<th>*</th>
										<!-- <th class="text-right">Action</th> -->
									</tr>
								</thead>
								<tbody>

									<?php $i=1; 
											$milk = 0; 
											$shop = 0; 
											$indv = 0; 
											$gen = 0;  
											$totDed = 0;
											$totGross = 0;
											foreach ($payments as $key){
												$milk += $key['total_milk']; {
												$shop += $key['shopDeductions']; {
												$indv += $key['individualDeductions']; {
												$gen += $key['generalDeductions'];  {
												$totDed += $key['shopDeductions'] + $key['individualDeductions'] + $key['generalDeductions']; {
												$totGross = (($milk * $key['milkRate']) - $totDed); {

									?>

										<tr <?php if(($key['total_milk']*$key['milkRate']) - ($key['shopDeductions'] + $key['individualDeductions'] + $key['generalDeductions']) < 0) {?> class="table-danger" <?php }?>>
											<td><?php echo $i; ?></td>
											<td><?php echo $key['total_milk']?></td>
											<td><?php echo number_format($key['shopDeductions'])?></td>
											<td><?php echo number_format($key['individualDeductions'])?></td>
											<td><?php echo number_format($key['generalDeductions'])?></td>	
											<td><?php echo number_format($key['shopDeductions'] + $key['individualDeductions'] + $key['generalDeductions'])?></td>
											<td><?php echo number_format(($key['total_milk']*$key['milkRate']) - ($key['shopDeductions'] + $key['individualDeductions'] + $key['generalDeductions']))?></td>
											
											<td><?php echo date('d/m/Y', strtotime($key['created_at']))?></td>
											<td class="text-right">
												<a href="<?php echo base_url('payments/print_invoice/'.$key['id']) ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
											</td>
										</tr>
										<?php $i++; } } } } } } }?>
									</tbody>
									<tfoot>
										<tr>
											<th></th>
											<th><?php echo $milk;?></th>
											<th><?php echo $shop;?></th>
											<th><?php echo $indv;?></th>
											<th><?php echo $gen;?></th>
											<th><?php echo $totDed;?></th>
											<th><?php echo $totGross;?></th>
										</tr>
									</tfoot>
								</table>

							</div>
						</div>
					</div>
					<!-- /Bank Statutory Tab -->

				</div>
			</div>
			<!-- /Page Content -->


			<!-- Personal Info Modal -->
			<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Personal Information</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport No</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport Expiry Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Tel</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nationality <span class="text-danger">*</span></label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Religion</label>
											<div class="cal-icon">
												<input class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Marital status <span class="text-danger">*</span></label>
											<select class="select form-control">
												<option>-</option>
												<option>Single</option>
												<option>Married</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Employment of spouse</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>No. of children </label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Personal Info Modal -->

			<!-- Family Info Modal -->
			<div id="family_info_modal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Next of Kin</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url('farmers/store_next_of_kin')?>" method="POST">
								<div class="form-scroll">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Next of Kin <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Farmer ID <span class="text-danger">*</span></label>
														<input class="form-control" name="farmerID" value="<?php echo $farmer['farmerID']?>" type="text" readonly>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Name <span class="text-danger">*</span></label>
														<input class="form-control" name="name" type="text" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Relationship <span class="text-danger">*</span></label>
														<input class="form-control" name="relationship" type="text" required>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Phone <span class="text-danger">*</span></label>
														<input class="form-control" name="phone" type="number" required>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Family Info Modal -->

		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

