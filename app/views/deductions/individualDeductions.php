<!-- Page Wrapper -->
<?php //var_dump($farmers);die;?>
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">All Farmers</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Farmers</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto" hidden>
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
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table" id="maziwa">
						<thead>
							<tr>
								<th>#</th>
								<th>Code</th>
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
										<a href="<?php echo base_url('farmers/farmerProfile?fid='. $key['farmerID'] )?>" class="avatar"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/user.png"></a>
										<a href="<?php echo base_url('farmers/farmerProfile?fid='. $key['farmerID'] )?>"><?php echo $key['fname']." ". $key['lname']?> <span><?php echo $key['location']?></span></a>
									</h2>
								</td>
								<?php if($key['contact1'] != "") {?>
								<td><?php echo $key['contact1']?></td>
								<?php }elseif($key['contact1'] == ""){?>
								<td><?php echo "--"; ?></td>
								<?php }?>
								<td><?php echo ucfirst($key['centerName'])?></td>
								<td class="text-right">
									<a href="<?php echo base_url('deductions/addDeduction?fid='.$key['farmerID']) ?>" class="btn btn-warning"><i class="fa fa-plus"></i></a>
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
	
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->


