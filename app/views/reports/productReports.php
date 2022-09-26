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
					<h3 class="page-title"><?php echo ucfirst($items[0]['itemName'])?> Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active"><?php echo ucfirst($items[0]['itemName'])?> Report</li>
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
		<form action="<?php echo base_url('reports/productReports')?>" method="GET">
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
								<th>Name</th>
								<th>Item</th>
								<th>Quantity</th>					
								<th>Total</th>
								<th>Date</th>					
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; $totQty=0; $amt=0; foreach ($items as $key) { $totQty += $key['qty']; { $amt += $key['amount']; {?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $key['fname']." ".$key['mname']." ".$key['lname']?></td>
								<td><?php echo $key['itemName']?></td>
								<td><?php echo $key['qty']?></td>		
								<td><?php echo $key['amount']?></td>
								<td><?php echo $key['date']?></td>				
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_department"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php $i++; } } }?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3"></td>
								<td><?php echo $totQty;?></td>
								<td><?php echo $amt;?></td>
								<td colspan="2"></td>

							</tr>

						</tfoot>
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
