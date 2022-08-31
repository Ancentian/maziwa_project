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
                        <div class="page-title-subheading">Add New Expenses
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
                        <form class="" action="<?php echo base_url('expense/updateExpense/' . $expense['id']); ?>" method="post" >
                            <div class="list_wrapper alert alert-success">
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
                                                <input name="date[]" id="date" value="<?php echo $oneDate; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label for="examplePassword11" class="">Amount</label>
                                                <input name="amount[]" id="amount" type="number" value="<?php echo $oneAmount; ?>" class="form-control"/>  
                                            </div>
                                        </div>
                                        
                                    </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                  
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label for="examplePassword11" class=""><b>Total</b></label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                
                                                <input name="amount[]" id="amount" type="number" value="<?php echo $expense['total_amount']; ?>" class="form-control" readonly/>  
                                            </div>
                                        </div>
                                </div>
                                </div>

                                
                            <div class="form-row">
                                
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="description" class="">Description</label>
                                        <textarea name="description" id="description" class="form-control" readonly=""><?php echo $expense['description'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php if($expense['file'] == ''){?>
                                    <div class="badge badge-warning">No File Attached</div>
                            <?php } else{?>
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">View Attachment</button>
                        <?php } ?>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

