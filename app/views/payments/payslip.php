<?php //echo var_dump($payslip);die; ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payslip</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Payslip</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<div class="btn-group btn-group-sm">
						<button class="btn btn-white">CSV</button>
						<button class="btn btn-white">PDF</button>
						<button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="payslip-title">Payslip for the month of <?php echo date('M/Y'); ?></h4>
						<div class="row">
							<div class="col-sm-6 m-b-20">
								<img src="assets/img/logo2.png" class="inv-logo" alt="">
								<ul class="list-unstyled mb-0">
									<li><span>Collection Center: </span><?php echo strtoupper($payslip['centerName']) ?></li>
									<li>P. O Box --,</li>
									<li>Meru</li>
								</ul>
							</div>
							<div class="col-sm-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">Payslip #49029</h3>
									<ul class="list-unstyled">
										<li>Salary Month: <span>March, 2019</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 m-b-20">
								<ul class="list-unstyled">
									<li><h5 class="mb-0"><strong><?php echo $payslip['fname']." ".$payslip['lname']?></strong></h5></li>
									<li><span>Web Designer</span></li>
									<li>Farmer Code: <?php echo $payslip['farmerID']?></li>
									<li>Joining Date: <?php echo $payslip['join_date']?></li>
								</ul>
							</div>
						</div>
						<div class="row">
							<?php if($shopSales['totAmount'] > 0) {?>
							<div class="col-sm-6">
								<div>
									<h4 class="m-b-10"><strong>Earnings</strong></h4>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td><strong>Basic Salary</strong> <span class="float-right">Ksh. <?php echo number_format($milkRate['milkRate'] * $payslip['totalMilk'])?></span></td>
											</tr>
											<tr>
												<td><strong>Milk Produced</strong> <span class="float-right"><?php echo $payslip['totalMilk'] ?> Ltrs</span></td>
											</tr>
											<tr>
												<td><strong>Milk Rates</strong> <span class="float-right">Ksh. <?php echo $milkRate['milkRate']?></span></td>
											</tr>
											<tr>
												<td><strong>Deductions</strong> <span class="float-right">Ksh. <?php echo number_format($shopSales['totAmount']) ?></span></td>
											</tr>
											<tr>
												<td><strong>Total Earnings</strong> <span class="float-right"><strong><?php echo number_format(($milkRate['milkRate'] * $payslip['totalMilk']) - $shopSales['totAmount'])?></strong></span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-sm-6">
									<h4 class="m-b-10"><strong>Shop Deductions</strong></h4>
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Item</th>
												<th>Qty</th>
												<th>@</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=0; $tot = 0; foreach($shop as $key) { $totAmount += $key['amount']; ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $key['itemName']?></td>
												<td><?php echo $key['qty']?></td>
												<td><?php echo $key['unit_cost']?></td>
												<td><?php echo $key['amount']?></td>
											</tr>
											<?php $i++; }?>
										</tbody>
										<tfoot>
											<tr>
												<th rowspan="2"></th>
												<th></th>
												<th><strong>Total Deductions</strong> </th>
												<th></th>
												<th><span class="float-right"><strong>Ksh. <?php echo $totAmount; ?></strong></span></th>
											</tr>
										</tfoot>
										</tbody>
									</table>
							</div>
							<div class="col-sm-12">
								<?php 
								$val = $this->load->library('convertNumbersIntoWords');
								$number = (($milkRate['milkRate'] * $payslip['totalMilk']) - $shopSales['totAmount']);
								//echo($number);
								?>
								<p>
									<strong>Net Salary: Ksh. <?php echo number_format(($milkRate['milkRate'] * $payslip['totalMilk']) - $shopSales['totAmount'])?></strong> (<?php echo $this->convertNumbersIntoWords->convert_number($number);?>.)
								</p>
							</div>
						<?php }elseif (condition) {?>
							<div class="col-md-12">
								<div>
									<h4 class="m-b-10"><strong>Earnings</strong></h4>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td><strong>Basic Salary</strong> <span class="float-right">Ksh. <?php echo number_format($milkRate['milkRate'] * $payslip['totalMilk'])?></span></td>
											</tr>
											<tr>
												<td><strong>Milk Produced</strong> <span class="float-right"><?php echo $payslip['totalMilk'] ?> Ltrs</span></td>
											</tr>
											<tr>
												<td><strong>Milk Rates</strong> <span class="float-right">Ksh. <?php echo $milkRate['milkRate']?></span></td>
											</tr>
											<tr>
												<td><strong>Deductions</strong> <span class="float-right">Ksh. <?php echo number_format($shopSales['totAmount']) ?></span></td>
											</tr>
											<tr>
												<td><strong>Total Earnings</strong> <span class="float-right"><strong><?php echo number_format(($milkRate['milkRate'] * $payslip['totalMilk']) - $shopSales['totAmount'])?></strong></span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-sm-12">
								<?php 
								$val = $this->load->library('convertNumbersIntoWords');
								$number = $milkRate['milkRate'] * $payslip['totalMilk'];
								//echo($number);
								?>
								<p>
									<strong>Net Salary: Ksh. <?php echo number_format($milkRate['milkRate'] * $payslip['totalMilk']) ?></strong> (<?php echo $this->convertNumbersIntoWords->convert_number($number);?>.)
								</p>
							</div>
						<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->
	
</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery-3.5.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/js/jquery.slimscroll.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/app.js"></script>

</body>
</html>