<?php //echo $payment; die;?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Print Invoice</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 12px;
            background-color: #fff;
        }

        #products {
            width: 100%;
        }

        #products tr td {
            font-size: 12px;
        }

        #printbox {
            width: 280px;
            margin: 5pt;
            padding: 5px;
            text-align: justify;
        }

        .inv_info tr td {
            padding-right: 10pt;
        }

        .product_row {
            margin: 15pt;
        }

        .stamp {
            margin: 5pt;
            padding: 3pt;
            border: 3pt solid #111;
            text-align: center;
            font-size: 20pt;
            color
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body  dir="<?= LTR ?>">

<div id='printbox'>
     <h3 style="margin-top:0" class="text-center">I N V O I C E<br><b style="font-size: 10px;"></b></b>
    <h3 style="margin-top:0" class="text-center">Fort Sort Innovations Ltd<br><b style="font-size: 10px;">Mageso Chambers, Moi Avenue<br>Nairobi, Kenya.</b></b>
        <br><b style="font-size: 10px;">TEL: 0724 654 191<br>Email: info@fortsortinnovations.co.ke</b></h3>

    <table class="inv_info">
        <tr>
            <td>Invoiced To:</td>
            <td><?php echo $repair->fname; ?> <?php echo $repair->lname; ?></td>
        </tr>
        <tr>
            <td>Invoice no:</td>
            <td>#<?php echo str_pad( $repair->id, 4, "0", STR_PAD_LEFT ); ?></td>
        </tr>
        <tr>
            <td>Date: </td>
            <td><?php echo date('d/m/Y H:s', strtotime($repair->created_at))?><br></td>
        </tr>
    </table>
    <hr>
    <table id="products" >
        <tr class="product_row">
            <td colspan="2"><b> Instance</b></td>
            <td><b>Description&nbsp;</b></td>
        </tr>
        <tr class="product_row">
            <td colspan="2"><b>Car Make</b></td>
            <td><?php echo $repair->car_make ?>&nbsp;</td>
        </tr>
        <tr class="product_row">
            <td colspan="2"><b> Car Model</td>
            <td><?php echo $repair->car_model ?>&nbsp;</td>
        </tr>
        <tr class="product_row">
            <td colspan="2"><b> Reg No.</b></td>
            <td><?php echo $repair->reg_no ?>&nbsp;</td>
        </tr>
        <?php
            //$autopartArr = //json_decode($repair->autopart,true);
            //$descrArr = json_decode($repair['description'],true);
            //$cstArr = //json_decode($repair->cost,true);
            // $i = 0;
            // foreach($autopartArr as $one){
            //     $oneAutopart = $one;
            //     //$oneDescription = $descrArr[$i];
            //     $oneCost = $cstArr[$i];
            //     $i++;
          
        ?>
        <!-- <tr class="product_row">
            <td colspan="2"><b> Autopart</b></td>
            <td><?php //echo $oneAutopart; ?>&nbsp;</td>
        </tr>
        <tr class="product_row">
            <td colspan="2"><b> Cost</b></td>
            <td><?php //echo <?php  } ?> $oneCost ?>&nbsp;</td>
        </tr> --> 

        
        <tr class="product_row">
            <td colspan="2"><b>Total Cost</b></td>
            <td>Kes. <?php echo round($repair->total_cost) ?>&nbsp;</td>
        </tr>
        <!-- <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr> -->
    </table>
    <hr>
   
    <table class="inv_info">
        <!-- <?php //$id = 0; $amount_paid = 0; ; foreach($payments as $one) { $id++ ; $amount_paid += $one['amount_paid']; ?>
        <tr>
            <td><b>Previous Pay:</b></td>
            <td><b>Ksh. <?php //echo $amount_paid ?></b></td>
        </tr>
        <?php  ?> -->
        <tr>
            <td><b>Total Payable</b></td>
            <td><b>Ksh. <?php echo round($repair->total_cost) ?></b></td>
        </tr>
        <!-- <tr>
            <td><b>Total Due</b></td>
            <td><b>Ksh.<?php  //echo number_format((float)abs($booking['total_cost'] -$booking['discount']-$payment['amount_paid']), 2,'.','');?></b><?php //if(($totpaid -$total)>0){echo "(overpaid) ";} ?></td>
        </tr> -->

    </table>
    <hr>
    <table>

        <!-- <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr> -->

        <tr>
            <td>Invoiced by: </td>
            <td><?php echo $this->session->userdata('user_aob')->firstname;?> <?php echo $this->session->userdata('user_aob')->lastname;?></td>
        </tr>
        <!-- <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr> -->
        <tr>
            <td>Stamp: </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr>
    </table>
    <hr>
    <div class="text-center">  **Powered by Fortsort 0724654191!**</div>


</div>
</body>
</html>
