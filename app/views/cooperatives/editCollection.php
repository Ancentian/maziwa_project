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
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active"><?php echo $farmers[0]['centerName']?> Collection Center</li>
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
					<form action="<?php echo base_url('cooperative/update_milkCollection/'.$farmers[0]['id'])?>" method="post">
						<table class="table table-striped custom-table " id="addMilk">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Farmer ID</th>
									<th>Morning</th>
									<th>Evening</th>
									<th>Rejected</th>		
									<th>Total</th>			
								</tr>
							</thead>
							<tbody>
								<input type="number" name="center_id" value="<?php echo $farmers[0]['center_id']?>" class="form-control" hidden>
								<div class="form-group form-focus">
											<div class="cal-icon">
												<input class="form-control floating datetimepicker" value="<?php echo $farmers[0]['collection_date']?>" name="collection_date" type="text" required>
											</div>
											<label class="focus-label">Collection Date</label>
										</div>
								
								<?php $i=1; foreach ($farmers as $key) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td>
											<h2 class="table-avatar">
												<a href="<?php echo base_url('farmers/farmerProfile/'. $key['id'] )?>" class="avatar">
													<img alt="" src="<?php echo base_url()?>res/assets/img/profiles/avatar-02.jpg"></a>
													<a href="<?php echo base_url('farmers/farmerProfile/'. $key['id'] )?>"><?php echo $key['fname']." ".$key['lname']?> 
													<span><?php echo $key['location']?></span></a>
												</h2>
											</td>
											<td>
												<input type="text" name="farmerID" value="<?php echo $key['farmerID']?>" class="form-control" readonly> 
											</td>
											<td>
												<input type="number" name="morning" id="value1" class="form-control  morning" value="<?php echo $key['morning']?>" required />
											</td>
											<td>
												<input type="number" name="evening" id="value2" class="form-control  evening" value="<?php echo $key['evening']?>" required />
											</td>
											<td>
												<input type="number" name="rejected" id="value3" class="form-control  rejected" value="<?php echo $key['rejected']?>" required />
											</td>
											<td>
												<input type="number" name="total" id="sum" value="<?php echo $key['total']?>" class="form-control total"readonly />
											</td>
										</tr>
										<?php $i++; }?>				
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


