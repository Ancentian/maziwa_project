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
					<h3 class="page-title"><?php echo $singleFarmer[0]['fname']." ".$singleFarmer[0]['mname']." ".$singleFarmer[0]['lname']?> Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active"><?php echo $singleFarmer[0]['centerName']?> Collection Center</li>
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
		<!-- Search Filter -->
		<form action="<?php echo base_url('reports/milk_CollectionReports')?>" method="GET">
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
				<input type="submit" class="btn btn-success btn-block" value="FILTER" required>
				<!-- <button class="btn btn-success " value="FILTER" type="submit"> Search</button>  --> 
			</div>     
		</div>
		</form>
		<!-- /Search Filter -->	
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0" id="maziwa">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Code</th>
								<th>Morning</th>
								<th>Evening</th>
								<th>Rejected</th>
								<th>Total</th>
								<td>Date</td>					
								<th>Recorded By</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($singleFarmer as $key) { ?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><a href="<?php echo base_url('farmers/farmerProfile?fid='. $key['farmerID'] )?>"><?php echo $key['farmerID']?></a></td>	
								<td><?php echo $key['morning']?></td>
								<td><?php echo $key['evening']?></td>
								<td><?php echo $key['rejected']?></td>	
								<td><?php echo $key['total']?></td>
								<td><?php echo date('d/m/Y', strtotime($key['collection_date']))?></td>	
								<td><?php echo $key['firstname']." ".$key['lastname']?></td>
								<td class="text-right">	
									<a href="<?php echo base_url('reports/singleFarmerProduction/'.$key['farmerID'])?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>	
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
