<!-- Page Wrapper -->
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
						<li class="breadcrumb-item active"><?php //echo $farmers[0]['centerName']?> General Deductions</li>
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

		<!-- Content Starts -->
		<div class="row">
			<div class="col-12">
				<div class="search-lists">
					<ul class="nav nav-tabs nav-tabs-solid">
						<li class="nav-item"><a class="nav-link active" href="#individual" data-toggle="tab">Individual Deductions</a></li>
						<li class="nav-item"><a class="nav-link" href="#general" data-toggle="tab">General Deductions</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="individual">
							<div class="table-responsive">
								<table class="table table-striped custom-table" id="maziwa">
									<thead>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Name</th>
											<th>Deduction</th>
											<th>Type</th>
											<th>Center</th>
											<th>Amount</th>
											<th class="text-nowrap">Date</th>
											<th class="text-right no-sort">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($deductions as $key) { ?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $key['farmerID']?></td>
											<td>
												<h2 class="table-avatar">
													<a href="<?php echo base_url('farmers/farmerProfile?fid='. $key['farmerID'] )?>" class="avatar"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/user.png"></a>
													<a href="<?php echo base_url('farmers/farmerProfile?fid='. $key['farmerID'] )?>"><?php echo $key['fname']." ". $key['lname']?> <span><?php echo $key['location']?></span></a>
												</h2>
											</td>	
											<td><?php echo $key['deductionName']?></td>
											<?php if($key['deductionType'] == '1'){?>
											<td><?php echo "Individual";?></td>
											<?php }elseif ($key['deductionType'] == '2') {?>
											<td><?php echo "General";?></td>
											<?php }?>
											<td><?php echo $key['centerName']?></td>
											<td><?php echo $key['amount']?></td>
											<td><?php echo date('d/m/Y', strtotime($key['date']))?></td>		
											<td class="text-right">
												<a href="<?php echo base_url('deductions/addDeduction/'.$key['farmerID']) ?>" title="Add Deduction" class="btn btn-success"><i class="fa fa-pencil"></i></a>
												<a href="<?php echo base_url('deductions/delete_farmerDeduction/'.$key['id']) ?>" title="Delete Deduction" class="btn btn-danger"><i class="fa fa-trash"></i></a>
											</td>
										</tr>

										<?php $i++; }?>				
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane " id="general">
							<div class="table-responsive">
								<table class="table table-striped custom-table" id="maziwa">
									<thead>
										<tr>
											<th>#</th>
											<th>Deduction</th>
											<th>Type</th>
											<th>Center</th>
											<th>Amount</th>
											<th class="text-nowrap">Date</th>
											<th class="text-right no-sort">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach ($general as $key) { ?>
										<tr>
											<td><?php echo $i; ?></td>
												
											<td><?php echo $key['deductionName']?></td>
											<?php if($key['deductionType'] == '1'){?>
											<td><?php echo "Individual";?></td>
											<?php }elseif ($key['deductionType'] == '2') {?>
											<td><?php echo "General";?></td>
											<?php }?>
											<td><?php echo $key['centerName']?></td>
											<td><?php echo $key['amount']?></td>
											<td><?php echo date('d/m/Y', strtotime($key['date']))?></td>		
											<td class="text-right">
												<a href="<?php echo base_url('deductions/addDeduction/'.$key['farmerID']) ?>" title="Add Deduction" class="btn btn-success"><i class="fa fa-pencil"></i></a>
												<a href="<?php echo base_url('deductions/delete_farmerDeduction/'.$key['id']) ?>" title="Delete Deduction" class="btn btn-danger"><i class="fa fa-trash"></i></a>
											</td>
										</tr>

										<?php $i++; }?>				
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
		<!-- /Content End -->

	</div>
	<!-- /Page Content -->

</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

