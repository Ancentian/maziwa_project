<?php 
$totpayable = 0;
$discount = 0;
$amount_paid = 0;
$totpaid = 0;
//var_dump($car_returns);die;
?>
<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="pe-7s-graph text-success">
            </i>
          </div>
          <div>Cars
            <div class="page-title-subheading">Add Payment
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

          <!-- PART 1 -->
          <div class="main-card col-md-10 mb-3 card">
            <div class="card-body"><h5 class="card-title">1) PAYMENT DETAILS</h5>
              <hr>
              <table class="mb-0 table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="text-center">Paid By</th>
                    <th class="text-center">phno</th> 
                    <th class="text-center">Mode</th>
                    <th class="text-center">Amount Paid</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $id = 0; $amount_paid = 0; ;
                  foreach($payments as $one) 
                    { $id++ ;

                      $amount_paid += $one['amount_paid'];

                      ?>
                      <tr>
                        <th scope="row"><?php echo $id; ?></th>
                        <td class="text-center"><?php echo $one['fname']; ?> <?php echo $one['lname']; ?></td>
                        <td class="text-center"><?php echo $one['phno']; ?></td>
                        <td class="text-center"><?php echo $one['pmnt_mode']; ?></td>
                        <td class="text-center"><?php echo $one['amount_paid']; ?></td> 
                        <td class="text-center">
                          <a href="<?php echo base_url();?>car/print/<?php echo $one['id'];?> " 
                              target="popup"
                              onclick="window.open('<?php echo base_url();?>car/print/<?php echo $one['id'];?>','popup','width=600,height=600'); return false;" 
                              title="Print" class="btn btn-success" ><i class="fa fa-print"></i></a>
                          <a href="<?php echo base_url(); ?>car/deletePayment/<?php echo $one['id']; ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <hr>

              <!-- PART 2 -->
              <div class="card-body"><h5 class="card-title"> </h5>
                <div class="row">
                  <div class="position-relative row form-group col-sm-12">
                    <label for="exampleEmail" class="col-sm-2 col-form-label"><b>Total Billed: <?php echo round($repair['total_cost']) ?></b></label>
                    <label for="exampleEmail" class="col-sm-2 col-form-label"><b>Discount: </b>
                      <span class="badge badge-info"> <?php echo $repair['discount'] ?></span></label>
                      <label for="exampleEmail" class="col-sm-2 col-form-label"><b>Total Paid:  </b></label>
                      <label for="exampleEmail" class="col-sm-2 col-form-label"><span class="badge badge-success"> <?php echo $amount_paid ?></span></label>
                      <label for="exampleEmail" class="col-sm-2 col-form-label"><b>Total Due: </b></label>
                      <label for="exampleEmail" class="col-sm-2 col-form-label"><span class="badge badge-danger">Ksh. <?php echo (round($repair['total_cost'])-$repair['discount']-$amount_paid);  ?></span></label>
                    </div>
                  </div>
                  <div class="row alert alert-success">
                    <a href="<?php echo base_url(); ?>car/print_i<?php echo '/'.$repair['id']; ?>"
                     target="_blank"
                     class="btn btn-warning"
                     onclick="window.open('<?php echo base_url(); ?>car/print_i<?php echo '/'.$repair['id']; ?>','popup','width=600,height=600'); return false;"
                     >PRINT INVOICE</a>
                   </div>
                 </div>
                 <hr>
                 <!-- PART 3 -->
                 <?php if(($repair['total_cost']-$repair['discount']-$amount_paid) > 0) {?>
                   <div class="card-body"><h5 class="card-title">2) Add Payment </h5>
                    <hr>
                    <form class="" action="<?php echo base_url(); ?>car/storePayment" method="post" enctype="multipart/form-data" >
                     <input name="repair_id"  type="text" class="form-control" value="<?php echo $repair['id'] ?>" hidden>
                     <!-- <input name="car_id"  type="text" class="form-control" value="<?php //echo $booking['car_id'] ?>" hidden> -->
                     <div class="form-row">
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="examplePassword11" class="">First Name</label>
                          <input name="fname" id="fname" type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="position-relative form-group">
                          <label for="examplePassword11" class="">Last Name</label>
                          <input name="lname" id="lname" type="text" class="form-control" >
                        </div>
                      </div>
                    </div>

                    <!-- Payment -->
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <label for="amount">Mode</label>
                        <select class="form-control pmt-select" name="pmnt_mode" required>
                          <option value="">--Choose here</option>
                          <option value="Cash">Cash</option>
                          <option value="Mpesa">Mpesa</option>  
                        </select>                   
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="cost">Amount Payable</label>
                        <input type="number" class="form-control" name="" id="totcost" value="<?php echo round($repair['total_cost']-$repair['discount']-$amount_paid); ?>" readonly >
                      </div>
                      <div class="form-group col-sm-4">
                        <label for="cost">Discount</label>
                        <input type="text" class="form-control" onkeyup="compute()" onkeydown="compute()" id="discount" name="discount" value="<?php if ($repair['discount'] > 0){ echo $repair["discount"];} ?>" <?php if ($repair['discount'] > 0){echo "disabled";} ?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-12 " >
                        <div class="row">
                          <!--  -->
                          <div class="col-sm-4">
                            <label for="cost">Total Payable</label>
                            <input type="text" class="form-control" placeholder="Total Payable" name="amount_paid" id="totpayable" value="" />
                          </div>
                          <div class="col-sm-4 ">
                            <label for="cost">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Mobile Number" name="phno">
                          </div>
                          <div class="col-sm-4 mpesa-pmt">
                            <label for="cost">Transaction Number</label>
                            <input type="text" class="form-control" placeholder="Transaction ID" name="transaction_no">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Payment -->

                    <div class="form-row">

                      <div class="col-md-12">
                        <div class="position-relative form-group">
                          <label for="examplePassword11" class="">Remarks</label>
                          <textarea name="remarks" class="form-control" placeholder="Enter the Approval Remarks" rows="2" ></textarea>
                        </div>
                      </div>

                    </div>
                    <input name="received_by" id="user_id" type="text" class="form-control" value="<?php echo $this->session->userdata('user_aob')->firstname; ?> <?php echo $this->session->userdata('user_aob')->lastname; ?>" hidden>

                    <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                  </form>

                </div>
              <?php } ?>
              <!-- Part 4 -->
            
            </div>

            
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>


<script type="text/javascript">

      //payment select
      $(".pmt-select").change(function(){
        var method = this.value;
        if (method == 'Cash') {
          $(".mpesa-pmt").hide();
          $(".insurance-pmt").hide();
        } else if(method == 'Cash'){
          $(".mpesa-pmt").hide();
          $(".insurance-pmt").hide();
        } else if(method == 'Mpesa'){
          $(".mpesa-pmt").show();
          $(".insurance-pmt").hide();
        } else if(method == 'InsuranceCard'){
          $(".mpesa-pmt").hide();
          $(".insurance-pmt").show();
        }
      });
//end payment select

function compute(){
  var totcost = $('#totcost').val();
  var discount = $('#discount').val();

  var totpayable = 0;

  totpayable = totcost-discount;

  $('#totpayable').val(totpayable);
}


</script>


