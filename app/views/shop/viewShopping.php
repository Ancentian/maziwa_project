?php $sdate = "";$edate="";
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
					<h3 class="page-title">Farmer Items</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Dashboard</a></li>
						<li class="breadcrumb-item active">Items</li>
					</ul>
				</div>
				
			</div>
		</div>
		<!-- /Page Header -->
		<!-- Search Filter -->
		<form action="<?php echo base_url('shop/viewShopping')?>" method="GET">					
			<div class="row filter-row mb-4">		
				<div class="col-sm-6 col-md-4">  
					<div class="form-group form-focus">
							<input class="form-control"  name="sdate" value="<?php echo $sdate; ?>" type="date">
						<label class="focus-label">From</label>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">  
					<div class="form-group form-focus">
							<input class="form-control"  name="edate" value="<?php echo $edate?>" type="date">
						<label class="focus-label">To</label>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
				<button type="submit" class="btn btn-success btn-block">Filter</button> 
				</div>    
			</div>
		</form>
		<!-- /Search Filter -->
		<?php if ($this->session->flashdata('success-msg')) { ?>
			<div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
		<?php } ?>
		<?php if ($this->session->flashdata('error-msg')) { ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
		<?php } ?>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0" id="maziwa">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								
								<th>Item Name</th>
								<th>Quantity</th>
								<th>Unit Price</th>
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
								<td><?php echo $key['created_at']?></td>
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
								<td style="font-size: 16px;width: 230px">
									Ksh. <?php echo $amt; ?>
								</td>
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

