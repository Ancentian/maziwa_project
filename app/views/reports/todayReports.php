<div class="app-main__outer">
    <div class="app-main__inner">

        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('success-msg')) { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success-msg'); ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('error-msg')) { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error-msg'); ?></div>
                <?php } ?>
                
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>TODAYS PAYMENTS HISTORY
                        <div class="btn-actions-pane-right">
                            <div class="nav">
                                <a data-toggle="tab" href="#all"
                                   class="btn-pill btn-wide active btn btn-outline-alternate btn-sm">ALL</a>
                                <a data-toggle="tab" href="#cash"
                                   class="btn-pill btn-wide mr-1 ml-1  btn btn-outline-alternate btn-sm">CASH</a>
                                <a data-toggle="tab" href="#mpesa"
                                   class="btn-pill btn-wide btn btn-outline-alternate btn-sm">MPESA</a>&nbsp;

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="all" role="tabpanel">
                            <table class="mb-0 table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Mode</th>
                                    <th class="text-center">Transaction</th>
                                    <th class="text-center">Phone No</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Paid At</th>
                                    <th class="text-center">*</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $i = 1;$totpaid = 0;
                                foreach ($payments as $one) {
                                    $totpaid += $one['amount_paid'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td class="text-center"><?php echo $one['pmnt_mode']; ?></td>
                                        <td class="text-center"><?php if ($one['pmnt_mode'] == 'Mpesa') {
                                                echo $one['transaction_no'];
                                            } else { ?>
                                                --
                                            <?php } ?>
                                        </td>
                                        <td class="text-center"><?php if ($one['pmnt_mode'] == 'Mpesa') {
                                                echo $one['phno'];
                                            } else { ?>
                                                --
                                            <?php } ?>
                                        </td>
                                        <td class="text-center"><?php echo $one['amount_paid']; ?></td>
                                        <td class="text-center"> <?php echo date('d/m/Y H:i', strtotime($one['created_at'])); ?> </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url();?>car/print/<?php echo $one['id'];?> " 
                                                target="popup"
                                                onclick="window.open('<?php echo base_url();?>car/print/<?php echo $one['id'];?>','popup','width=600,height=600'); return false;" 
                                                title="Print" class="btn btn-success" ><i class="fa fa-print"></i></a>
                                            &nbsp;
                                            <a href="<?php echo base_url(); ?>car/deletePayment/<?php echo $one['id']; ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                            
                                        </td>

                                    </tr>
                                    <?php $i++;
                                } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>  
                                </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="alert alert-success">
                                    <th>#</th>
                                    <th></th>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th class="text-center" style="border-bottom: 3px double; "><?php echo $totpaid;?></th>
                                    <th></th>
                                    <th></th>  
                                </tr>
                                </tfoot>
                            </table>
                            </div>
                            <div class="tab-pane" id="cash" role="tabpanel">
                            <table class="mb-0 table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Paid At</th>
                                    <th>*</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $i = 1;$totpaid = 0;
                                foreach ($payments as $one) {
                                    if($one['pmnt_mode'] == 'Cash') {
                                    $totpaid += $one['amount_paid'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td class="text-center"><?php echo $one['amount_paid']; ?></td>
                                        <td class="text-center"><?php echo date('d/m/Y H:i', strtotime($one['created_at'])); ?> </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url();?>booking/print/<?php echo $one['id'];?> " 
                                                target="popup"
                                                onclick="window.open('<?php echo base_url();?>car/print/<?php echo $one['id'];?>','popup','width=600,height=600'); return false;" 
                                                title="Print" class="btn btn-success" ><i class="fa fa-print"></i></a>
                                            &nbsp;
                                            <a href="<?php echo base_url(); ?>car/deletePayment/<?php echo $one['id']; ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    <?php $i++;
                                } } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="alert alert-success">
                                    <th>#</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center" style="border-bottom: 3px double;"><?php echo $totpaid;?>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>                                
                            </div>
                            <div class="tab-pane" id="mpesa" role="tabpanel">
                                 <table class="mb-0 table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Transaction</th>
                                    <th class="text-center">Phone No</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Paid At</th>
                                    <th>*</th>
                                </tr>
                                </thead>
                                <tbody>
                                   
                                <?php $i = 1; $totpaid = 0;
                                foreach ($payments as $one) {
                                    if($one['pmnt_mode'] == 'Mpesa') {
                                    $totpaid += $one['amount_paid'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td class="text-center"><?php if ($one['pmnt_mode'] == 'Mpesa') {
                                                echo $one['transaction_no'];
                                            } else { ?>
                                                --
                                            <?php } ?>
                                        </td>
                                        <td class="text-center"><?php if ($one['pmnt_mode'] == 'Mpesa') {
                                                echo $one['phno'];
                                            } else { ?>
                                                --
                                            <?php } ?>
                                        </td>
                                        <td class="text-center"><?php echo $one['amount_paid']; ?></td>
                                        <td class="text-center"><?php echo date('d/m/Y H:i', strtotime($one['created_at'])); ?> </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url();?>booking/print/<?php echo $one['id'];?> " 
                                                target="popup"
                                                onclick="window.open('<?php echo base_url();?>car/print/<?php echo $one['id'];?>','popup','width=600,height=600'); return false;" 
                                                title="Print" class="btn btn-success" ><i class="fa fa-print"></i></a>
                                            &nbsp;
                                            <a href="<?php echo base_url(); ?>car/deletePayment/<?php echo $one['id']; ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    <?php $i++;
                                } } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="alert alert-success">
                                    <th>#</th>
                                    <th></th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center" style="border-bottom: 3px double;"><?php echo $totpaid;?></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>                                
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>