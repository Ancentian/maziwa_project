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
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Search Dates For Payment</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Search</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<?php if ($this->session->flashdata('error-msg')) { ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
		<?php } ?>

		<!-- Content Starts -->
		<div class="row">
			<div class="col-12">

				<!-- Search Form -->
				<div class="main-search">
					<form action="<?php echo base_url('payments/searchResults'); ?>" method="GET">
						<div class="row">
							<div class="col-md-6">  
								<div class="form-group form-focus">
									<div class="cal-icon">
										<input class="form-control floating datetimepicker" name="sdate" value="<?php echo $sdate;?>" type="text">
									</div>
									<label class="focus-label">From</label>
								</div>
							</div>
							<div class="col-md-6">  
								<div class="form-group form-focus">
									<div class="cal-icon">
										<input class="form-control floating datetimepicker" name="edate" value="<?php echo $edate;?>" type="text">
									</div>
									<label class="focus-label">To</label>
								</div>
								<div class="input-group-append">
								<button type="submit" class="btn btn-primary" type="button">Search</button>
							</div>
							</div>
						</div>
					</form>
				</div>
				<!-- /Search Form -->

				<div class="search-result">
					<h3>Search Result Found For: <u>Keyword</u></h3>
					<p>
						
					</p>
				</div>

				<div class="search-lists" hidden>
					<ul class="nav nav-tabs nav-tabs-solid">
						<li class="nav-item"><a class="nav-link active" href="#results_projects" data-toggle="tab">Projects</a></li>
						<li class="nav-item"><a class="nav-link" href="#results_clients" data-toggle="tab">Clients</a></li>
						<li class="nav-item"><a class="nav-link" href="#results_users" data-toggle="tab">Users</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="results_projects">
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- /Content End -->

	</div>
	<!-- /Page Content -->

</div>
<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

