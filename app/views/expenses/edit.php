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
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="main-card mb-3 col-md-10 card">
                        <div class="card-body"><h5 class="card-title">Petty Cash Details</h5>
                            <hr>
                            <form class="" action="<?php echo base_url('expense/updateExpense/' . $expense['id']); ?>" method="post" enctype="multipart/form-data" >
                                <div class="position-relative form-group" hidden>
                                    <label for="exampleEmail11" class="">User Id</label>
                                    <input name="user_id" id="user_id" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->id; ?>" >
                                </div>
                                <div class="list_wrapper">
                                <?php
                                    $nameArr = json_decode($expense['item_name'],true);
                                    $datArr = json_decode($expense['date'],true);
                                    $amntArr = json_decode($expense['amount'],true);
                                    $i = 0;
                                    foreach($nameArr as $one){
                                        $oneName = $one;
                                        $oneDate = $datArr[$i];
                                        $oneAmount = $amntArr[$i];
                                        $i++;
                                  
                                ?>   
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Name</label>
                                                <input name="name[]" type="text" value="<?php echo $one; ?>" class="form-control"/>  
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Date</label>
                                                <input name="date[]" id="date" value="<?php echo $oneDate; ?>" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Amount</label>
                                                <input name="amount[]" id="amount" type="number" value="<?php echo $oneAmount; ?>" class="form-control"/>  
                                            </div>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                            <br>
                                            <button class="btn btn-primary mt-2 list_add_button" type="button">+</button>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="description" class="">General Remarks</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Type Your Notes"></textarea>
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
                var list_fieldHTML = '<div class="row"><div class="col-xs-3 col-sm-3 col-md-3"><div class="form-group"><input name="name[]" type="text" placeholder="Name" class="form-control"/></div></div><div class="col-xs-4 col-sm-4 col-md-4"><div class="form-group"><input name="date[]" id="date" placeholder="" type="date" class="form-control"></div></div><div class="col-xs-3 col-sm-3 col-md-3"><div class="form-group"><input name="amount[]" type="number" id="amount" placeholder="Amount" class="form-control"/></div></div><div class="col-xs-1 col-sm-7 col-md-1"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; //New input field html 
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
