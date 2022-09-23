<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>Expenses
                        <div class="page-title-subheading">New Expenses
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Petty Cash Details
                        <div class="btn-actions-pane-right">
                            <div class="nav">
                                <a data-toggle="tab" href="#tab-eg2-0" class="btn-pill btn-wide active btn btn-outline-alternate btn-sm">Individual</a>
                                <a data-toggle="tab" href="#tab-eg2-1" class="btn-pill btn-wide mr-1 ml-1  btn btn-outline-alternate btn-sm">Other Staff</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg2-0" role="tabpanel">
                               <form class="" action="<?php echo base_url('expense/store'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="position-relative form-group" hidden>
                                    <label for="exampleEmail11" class="">User Id</label>
                                    <input name="user_id" id="user_id" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->id; ?>" >
                                </div>
                                <div class="list_wrapper">  
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Item/Product</label>
                                                <input name="item_name[]" type="text" placeholder="Name" class="form-control"/>  
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Date</label>
                                                <input name="date[]" id="date" placeholder="" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Amount</label>
                                                <input name="amount[]" id="amount" type="number" placeholder="Amount" class="form-control"/>  
                                            </div>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                            <br>
                                            <button class="btn btn-primary mt-2 list_add_button" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="description" class="">General Remarks</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Type Your Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative row form-group">
                                        <label for="exampleFile" class="col-sm-4 col-form-label">Attach File</label>
                                        <div>
                                            <input name="file" id="file" type="file" class="form-control-file">
                                            <small class="form-text text-muted">Please Upload your Supportive Document.</small>
                                        </div>
                                        
                                    </div>
                                </div>

                                <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                            </form>
                        </div>

                        <div class="tab-pane" id="tab-eg2-1" role="tabpanel">
                            <form class="" action="<?php echo base_url('expense/store'); ?>" method="post" enctype="multipart/form-data" >
                                <div class="position-relative form-group" hidden>
                                    <label for="exampleEmail11" class="">User Id</label>
                                    <input name="user_id" id="user_id" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->id; ?>" >
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">First Name</label>
                                            <input name="emp_fname" id="fname" placeholder="Enter Employee First Name" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="">Last Name</label>
                                            <input name="emp_lname" id="mname" placeholder="Enter Employees Last Name" type="text" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="list_wrapper">  
                                    <div class="row">
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Item/Product</label>
                                                <input name="item_name[]" type="text" placeholder="Name" class="form-control"/>  
                                            </div>
                                        </div>
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Amount</label>
                                                <input name="amount[]" id="amount" type="number" placeholder="Amount" class="form-control"/>  
                                            </div>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                            <br>
                                            <button class="btn btn-primary mt-2 list_add_button" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="description" class="">General Remarks</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Type Your Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative row form-group">
                                        <label for="exampleFile" class="col-sm-4 col-form-label">Attach File</label>
                                        <div>
                                            <input name="file" id="file" type="file" class="form-control-file">
                                            <small class="form-text text-muted">Please Upload your Supportive Document.</small>
                                        </div>
                                        
                                    </div>
                                </div>

                                <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                            </form>

                        </div>
                        <div class="tab-pane" id="tab-eg2-2" role="tabpanel">
                            <h5 class="card-title">SMS Custom</h5>
                            <hr>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> 

</div>





<script type="text/javascript">
    $(document).ready(function()

    {
        var x = 0; //Initial field counter
        var list_maxField = 20; //Input fields increment limitation
        
            //Once add button is clicked
            $('.list_add_button').click(function()
            {
            //Check maximum number of input fields
            if(x < list_maxField){ 
                //x++; //Increment field counter
                var list_fieldHTML = '<div class="row"><div class="col-xs-3 col-sm-3 col-md-3"><div class="form-group"><input name="item_name[]" type="text" placeholder="Name" class="form-control"/></div></div><div class="col-xs-4 col-sm-4 col-md-4"><div class="form-group"><input name="date[]" id="date" placeholder="" type="date" class="form-control"></div></div><div class="col-xs-3 col-sm-3 col-md-3"><div class="form-group"><input name="amount[]" type="number" id="amount" placeholder="Amount" class="form-control"/></div></div><div class="col-xs-1 col-sm-7 col-md-1"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; //New input field html 
                $('.list_wrapper').append(list_fieldHTML); //Add field html
            }
        });

            //Once remove button is clicked
            $('.list_wrapper').on('click', '.list_remove_button', function()
            {
               $(this).closest('div.row').remove(); //Remove field html
               x--; //Decrement field counter
           });
        });
    </script>
