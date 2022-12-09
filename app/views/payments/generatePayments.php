<?php $sdate = "";$edate="";
$sdate = $_GET['sdate'];
$edate = $_GET['edate'];
?>
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">
		<?php 
			//Defines Previous Months Date
			$sdate = date('Y-m-d', strtotime("first day of -1 month"));
    		$edate = date('Y-m-d', strtotime("last day of -1 month"));
    		//echo($sdate." ".$edate);
			?>

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><u type="dotted">Generate Payments for <?php echo date("F jS, Y", strtotime($sdate));?> to <?php echo date("F jS, Y", strtotime($edate));?></u></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Monthly Payments</li>
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
		<form action="<?php echo base_url('payments/addPayment')?>" method="GET"> 
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
					<form action="<?php echo base_url('payments/storeMonthlyPayments')?>" method="POST">
						<input class="form-control floating" name="from_date" value="<?php echo $sdate; ?>"  type="text" hidden>
						<input class="form-control floating" name="to_date" value="<?php echo $edate; ?>" type="text" hidden>
					<table class="table  mb-0 test stripe row-border order-column" class="" id="cmaziwa">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Code</th>
								<th>Center</th>
								<th>Milk</th>
								<th>Shop</th>					
								<th>Individ</th>
								<th>General</th>
								<!-- <th>Gross</th> -->
								<!-- <th class="text-right">Action</th> -->
							</tr>
						</thead>
						<tbody>
							<div class="form-group form-focus">
								<!-- <div class="cal-icon"> -->
									<input class="form-control floating rate" id="rate" name="milkRate" type="number" onkeyup="getcube()"  required>
								<!-- </div> -->
								<label class="focus-label">Milk Rate</label>
							</div>
							<?php $i=1; foreach ($milkCollection as $key) {
									$total = $this->payments_model->select_deductions($key['farmerID'],$startdate,$enddate);
									$individualDeduction = $this->payments_model->select_individualDeductions($key['farmerID'],$startdate,$enddate);
									$generalDeduction = $this->payments_model->select_generalDeductions($startdate,$enddate); 
							 ?>
							 <?php if($key['milktotal'] > 0) {?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $key['farmerID']." - ".$key['fname']." ".$key['mname']." ".$key['lname']?></td>
									<input type="text" name="farmerID[]" value="<?php echo $key['farmerID']?>" class="form-control" hidden> 
									<td><?php echo $key['centerName']?></td>
									<td>
										<input type="text" class="form-control totalMilk" name="total_milk[]" value="<?php echo $key['milktotal']?>" readonly>
									</td>
									<td>
										<input type="text" class="form-control shop" id="shop" name="shopDeductions[]" value="<?php echo $total?>" readonly>
									</td>				
									<td><input type="text" class="form-control individual" name="individualDeductions[]" id="individual" value="<?php echo $individualDeduction?>" readonly></td>
									<td>
										<input type="text" class="form-control general" id="general" name="generalDeductions[]" value="<?php echo $generalDeduction?>" readonly>
									</td>
									<!-- <td ><input type="text" class="form-control gross" id="gross" name="generalDeductions[]" value="" readonly></td> -->
								</tr>
							<?php }?>
								<?php $i++; }  ?>
							</tbody>
						</table>
						</div>
						<div class="submit-section">
							<!-- <button class="btn btn-primary submit-btn m-r-10" hidden>Save & Send</button> -->
							<button type="submit" class="btn btn-primary submit-btn">Save</button>
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
