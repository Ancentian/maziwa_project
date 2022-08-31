    
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>Add Staff
                        <div class="page-title-subheading">Add New Staff
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <?php if ($this->session->flashdata('success-msg')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('error-msg')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
        <?php } ?>
        
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="col-sm-1"></div>
                <div class="main-card mb-3 card float:center">
                    <div class="card-body float:center"><h5 class="card-title">Employee Details</h5>
                        <hr>
                        <div class="alert alert-danger">By default, staff password is pass12345. They are advised to change upon login! </div>
                        <form class="" action="<?php echo base_url(); ?>employee/update/<?php echo $id; ?>" method="post">
                            <input type="hidden" name="password" value="<?php echo $this->auth_model->generate_hash('pass12345');?>">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail11" class="">First Name</label>
                                        <input name="firstname" id="firstname" value="<?php echo $employee['firstname']; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Middle Name</label>
                                        <input name="middlename" id="middlename" value="<?php echo $employee['middlename']; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Last Name</label>
                                        <input name="lastname" id="lastname" value="<?php echo $employee['lastname']; ?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Phone Number</label>
                                        <input name="phonenumber" id="phonenumber" type="text" class="form-control" value="<?php echo $employee['phonenumber']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Email</label>
                                        <input name="email" id="email"  type="email" class="form-control" value="<?php echo $employee['email']; ?>"></div>
                                    </div>
                                </div>
                            <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="">ID/Passport</label>
                                            <input name="idnumber" id="idnumber"  type="text" class="form-control" value="<?php echo $employee['idnumber']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">NHIF Number</label>
                                            <input name="nhifnumber" id="nhifnumber" type="text" class="form-control" value="<?php echo $employee['nhifnumber']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">NSSF Number</label>
                                            <input name="nssfnumber" id="nssfnumber" type="text" class="form-control" value="<?php echo $employee['nssfnumber']; ?>">
                                        </div>
                                    </div>
                                </div>
                            <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="department" class="">Gender</label>
                                            <select class="select form-control" name="gender" class="form-control" required>
                                                <option value="">--Select</option>
                                                <option value="male"<?php if($employee['gender'] == 'male'){echo "selected"; }?>>Male</option>
                                                <option value="female"<?php if($employee['gender'] == 'female'){echo "selected"; }?>>Female</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="department" class="">Marital Status</label>
                                            <select class="select form-control" name="marital_status" class="form-control" required>
                                                <option value="">--Select</option>
                                                <option value="single"<?php if($employee['marital_status'] == 'single'){echo "selected"; }?>>Single</option>
                                                <option value="married"<?php if($employee['marital_status'] == 'married'){echo "selected"; }?>>Married</option>
                                                <option value="divorced"<?php if($employee['marital_status'] == 'divorced'){echo "selected"; }?>>Divorced</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleCity" class="">Date of Birth</label>
                                            <input name="dob" id="dob" type="date"  class="form-control" value="<?php echo $employee['dob']; ?>">
                                        </div>
                                    </div>
                                </div>

                            <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="position-relative form-group">
                                            <label for="exampleAddress" class="">Address</label>
                                            <input name="address" id="address" type="text" class="form-control" value="<?php echo $employee['address']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="exampleCity" class="">City</label>
                                            <input name="city" id="city" type="text" class="form-control" value="<?php echo $employee['city']; ?>"></div>
                                        </div>

                                    </div>
                                <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleCity" class="">Date of Joining</label>
                                                <input name="doj" id="doj" type="date" value="<?php echo $employee['doj']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="department" class="">Contract Type</label>
                                                <select class="select form-control" name="contract_type" class="form-control" required>
                                                    <option value="">--Select</option>
                                                    <option value="permanent"<?php if($employee['contract_type'] == 'permanent'){echo "selected"; }?>>Permanent</option>
                                                    <option value="intern"<?php if($employee['contract_type'] == 'intern'){echo "selected"; }?>>Intern</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="department" class="">Role</label>
                                                <select class="select form-control" name="role" class="form-control" required>
                                                    <option value="">--Select</option>
                                                    <option value="developer"<?php if($employee['role'] == 'developer'){echo "selected"; }?>>Developer</option>
                                                    <option value="accountant"<?php if($employee['role'] == 'accountant'){echo "selected"; }?>>Accountant</option>
                                                    <option value="hr"<?php if($employee['role'] == 'hr'){echo "selected"; }?>>Hr</option>
                                                    <option value="salesperson"<?php if($employee['role'] == 'salesperson'){echo "selected"; }?>>Salesperson</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="department" class="">Department</label>
                                                <select class="select form-control" name="department" class="form-control" required>
                                                    <option value="">--Select</option>
                                                    <option value="development" <?php if($employee['department'] == 'development'){echo "selected"; }?> >Development</option>
                                                    <option value="accounting"<?php if($employee['department'] == 'accounting'){echo "selected"; }?>>Accounting</option>
                                                    <option value="hrm"<?php if($employee['department'] == 'hrm'){echo "selected"; }?>>Hrm</option>
                                                    <option value="sales"<?php if($employee['department'] == 'sales'){echo "selected"; }?>>Sales</option>
                                                </select>
                                            </div>
                                        </div>

                                </div>
                                <h5 class="card-title">Medical Information</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Doctor's Name</label>
                                                <input name="doctorname" id="doctorname" type="text" class="form-control" value="<?php echo $employee['doctorname']; ?>" ></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword11" class="">Phone Number</label>
                                                    <input name="doc_phone_no" id="doc_phone_no" type="text" class="form-control" value="<?php echo $employee['doc_phone_no']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail11" class="">Blood Type</label>
                                                    <input name="bloodtype" id="bloodtype" type="text" class="form-control" value="<?php echo $employee['bloodtype']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword11" class="">Medical Conditions</label>
                                                    <input name="medical_condition" id="medical_condition"  type="textarea" class="form-control" value="<?php echo $employee['medical_condition']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">Allergies</label>
                                                    <textarea name="allergies" id="allergies" class="form-control" ><?php echo $employee['allergies']; ?></textarea></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword11" class="">Current Medications</label>
                                                        <textarea name="current_medication" id="current_medication" class="form-control" ><?php echo $employee['current_medication']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        <h5 class="card-title">Emergency Information</h5>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Contacts Name</label>
                                                        <input name="kins_name" id="kins_name" type="text" class="form-control" value="<?php echo $employee['kins_name']; ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="department" class="">Relationship</label>

                                                        <select class="select form-control" name="kins_relationship" class="form-control">
                                                            <option value="">--Select</option>
                                                            <option value="parent/guardian"<?php if($employee['kins_relationship'] == 'parent/guardian'){echo "selected"; }?>>Parent/Guardian</option>
                                                            <option value="brother"<?php if($employee['kins_relationship'] == 'brother'){echo "selected"; }?>>Brother</option>
                                                            <option value="sister"<?php if($employee['kins_relationship'] == 'sister'){echo "selected"; }?>>Sister</option>
                                                            <option value="cousin"<?php if($employee['kins_relationship'] == 'cousin'){echo "selected"; }?>>Cousin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class="">Address/Phone Number</label>
                                                        <input name="kins_phone_no" id="kins_phone_no"  type="text" class="form-control" value="<?php echo $employee['kins_phone_no']; ?>">
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                                        </form>


                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
