<!-- Page Wrapper -->
<?php //var_dump($farmers);die;?>
<div class="page-wrapper">
	
	<!-- Page Content -->
	<div class="content container-fluid">
		
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title"><?php echo $farmers[0]['centerName']?> Farmers</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active"><?php echo $farmers[0]['centerName']?> Collection Center</li>
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
					<form action="<?php echo base_url('cooperative/storeMilkCollection')?>" method="post">
						<table class="table table-striped custom-table " id="addMilk">
							<thead>
								<tr>
									<th>#</th>
									<!-- <th>Name</th> -->
									<th class="text-center">Farmer ID</th>
									<th>Morning</th>
									<th>Evening</th>
									<th>Rejected</th>		
									<th>Total</th>			
								</tr>
							</thead>
							<tbody>
								<input type="number" name="center_id" value="<?php echo $farmers[0]['id']?>" class="form-control" hidden>
								<div class="form-group form-focus">
											<div class="cal-icon">
												<input class="form-control floating datetimepicker" name="collection_date" type="text" required>
											</div>
											<label class="focus-label">Collection Date</label>
										</div>
								
								<?php $i=1; foreach ($farmers as $key) { ?>
									<?php if ($key['status'] == 1) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td>
												<a href="<?php echo base_url('farmers/farmerProfile/'. $key['id'] )?>" class="avatar">
													<img alt="" src="<?php echo base_url()?>res/assets/img/profiles/user.png"></a><?php echo $key['farmerID']." - ".($key['fname']." ".$key['lname'])?> 
											</td>
												<input type="text" name="farmerID[]" value="<?php echo $key['farmerID']?>" class="form-control" hidden> 
											<td>
												<input type="number" name="morning[]" id="value1" class="form-control  morning" value="0" step="any" placeholder="Enter first value" required />
											</td>
											<td>
												<input type="number" name="evening[]" id="value2" class="form-control  evening" value="0" step="any" placeholder="Enter second value" required />
											</td>
											<td>
												<input type="number" name="rejected[]" id="value3" class="form-control  rejected" value="0" step="any" placeholder="Enter second value" required />
											</td>
											<td>
												<input type="number" value="0" name="total[]" id="sum" class="form-control total"readonly />
											</td>
										</tr>
									<?php }?>
										<?php $i++;  }?>				
									</tbody>
								</table>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn m-r-10" hidden>Save & Send</button>
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
<!-- 
	<script type="text/javascript">
      $(function(){
            $('#morning, #evening, #rejected').keyup(function(){
               var value1 = parseFloat($('#morning').val()) || 0;
               var evening = parseFloat($('#evening').val()) || 0;
               var rejected = parseFloat($('#rejected').val()) || 0;
               $('#total').val((morning + evening)-rejected);
            });
         });
    </script> -->


