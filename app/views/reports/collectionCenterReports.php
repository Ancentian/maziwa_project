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
						<li class="breadcrumb-item active">Report / <?php echo ucfirst($milkCollection[0]['centerName'])?></li>
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
				<input type="button" class="btn btn-success btn-block" value="Search" required>
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
								<th>Code</th>
								<th>Name</th>
								<th>Col. Date</th>						
								<th>Total</th>					
								<th>Recorded By</th>
								<th>Created at</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($milkCollection as $key) { ?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><a href="<?php echo base_url('reports/singleFarmerProduction?fid='.$key['farmerID'])?>"><?php echo $key['farmerID']?></a></td>
								<td><?php echo $key['fname']." ".$key['mname']." ".$key['lname']?></td>
								<td><?php echo date('d/m/Y', strtotime($key['collection_date']))?></td>	
								<td><?php echo $key['total']?></td>				
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
	<!-- /Page Content -->

	<!-- Add Department Modal -->
	<div id="add_department" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Cooperative</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('cooperative/storeCooperative') ?>"method="POST" >
						<div class="form-group">
							<label>Cooperative Name <span class="text-danger">*</span></label>
							<input class="form-control" name="cooperativeName" type="text">
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
