<?php $sdate = "";$edate="";
    $sdate = $_GET['sdate'];
    $edate = $_GET['edate'];
?>
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Milk Collections</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active"><?php echo $pg_title; ?></li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto" hidden>
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Cooperative</a>
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
		<form action="<?php echo base_url('reports/collection_centerReports/'.$milkCollection[0]['center_id'])?>" method="GET">
		<div class="row filter-row">
			<div class="col-md-4">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" name="sdate" value="<?php echo $sdate;?>" type="text">
					</div>
					<label class="focus-label">From</label>
				</div>
			</div>
			<div class="col-md-4 ">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" name="edate" value="<?php echo $edate;?>" type="text">
					</div>
					<label class="focus-label">To</label>
				</div>
			</div>
			<div class="col-md-4 ">  
				<input type="submit" class="btn btn-success btn-block" value="Search" required>
				<!-- <button class="btn btn-success " value="FILTER" type="submit"> Search</button>  --> 
			</div>     
		</div>
		<!-- </form> -->
		<!-- /Search Filter -->	
		<div class="row">
			<div class="col-md-12">
				<div>
					<table class="table table-striped custom-table mb-0" style="width:100%" id="maziwa">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Center</th>
								<th>Morning</th>
								<th>Evening</th>						
								<th>Rejected</th>
								<th>Total</th>					
								<th>Clerk</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($allCenters as $key) { ?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><a href="<?php echo base_url('reports/collection_centerReports/'.$key['id'])?>"><?php echo ucfirst($key['centerName'])?></a></td>
								<td><?php echo $key['totMorning']?></td>	
								<td><?php echo $key['totEvening']?></td>	
								<td><?php echo $key['totRejected']?></td>
								<td><?php echo $key['totalMilk']?></td>				
								<td><?php echo $key['firstname']." ".$key['lastname']?></td>
								<td class="text-right">
									<a href="<?php echo base_url('reports/collection_centerReports/'.$key['id'])?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
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

</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->
