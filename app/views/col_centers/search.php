<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Add New Milk Collection</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Select Collection Center</li>
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
				<div class="main-search" hidden>
					<form action="<?php echo base_url('cooperative/selectCollectionCenter'); ?>" method="post">
						<div class="input-group">
							<input type="text" name="" class="form-control" required>
							<div class="input-group-append">
								<button type="submit" class="btn btn-primary" type="button">Search</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /Search Form -->

				<!-- <div class="search-result">
					<h3>Search Result Found For: <u>Keyword</u></h3>
					<p>
						
							<div class="col-sm-8">
							<?php //foreach ($collectionCenter as $key) { ?>
								<a href="<?php //echo base_url('cooperative/centerMembers/') . $key['id']; ?>"><?php //echo strtoupper($key['centerName']); ?>
								</a> |
							<?php //} ?>
						</div>
						<
					</p>
				</div> -->
				<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 " id="maziwa">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Collection Center </th>
								<th>Clerk Name</th>
								<th class="text-center">Farmers</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($collectionCenter as $key) { ?>
								<tr>
								<td><?php echo $i; ?></td>
								<td><a href="<?php echo base_url('cooperative/centerMembers/') . $key['id']; ?>"><?php echo strtoupper($key['centerName']); ?>
								</a></td>
								<td><?php echo $key['firstname']." ".$key['lastname']?></td>
								<td class="text-center"><?php echo $this->farmers_model->count_farmers($key['id']); ?></td>
							</tr>
							<?php $i++; }?>
						</tbody>
					</table>
				</div>
			</div>
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

