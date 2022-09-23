<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Edit User</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo base_url('employee/updateStaff/'.$staff['id'])?>" method="POST">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="<?php echo $staff['firstname']?>" name="firstname">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" value="<?php echo $staff['lastname']?>" name="lastname">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="<?php echo $staff['email']?>" name="email">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="select" name="role_id">
                                    <?php foreach($roles as $key) {?>
                                    <option value="<?php echo $key['id']?>"<?php if($staff['role_id'] == $key['id']) { echo  "selected"; }?>><?php echo $key['roleName']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>  
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
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
