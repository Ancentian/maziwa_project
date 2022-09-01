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
										<a href="<?php echo base_url('farmers/farmerProfile/'. $key['id'] )?>" class="avatar"><img alt="" src="<?php echo base_url()?>res/assets/img/profiles/avatar-02.jpg"></a>
										<a href="<?php echo base_url('farmers/farmerProfile/'. $key['id'] )?>"><?php echo $key['fname']." ". $key['lname']?> <span><?php echo $key['location']?></span></a>
									</h2>
								</td>
								
								<td><?php echo $key['contact1']?></td>
								<td><?php echo $key['centerName']?></td>
								<td><?php echo date('d/m/Y', strtotime($key['join_date']))?></td>
								<td><?php echo $key['gender']?></td>
								
								<td class="text-right">
									<a href="<?php echo base_url('shop/addShopping/'.$key['farmerID']) ?>" class="btn btn-warning"><i class="fa fa-plus"></i></a>
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


