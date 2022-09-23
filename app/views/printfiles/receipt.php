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
    <h2 style="margin-top:0" class="text-center">Fort Sort Innovations Ltd<br><b style="font-size: 10px;">Mageso Chambers, Moi Avenue<br>Nairobi, Kenya.</b></b>
        <br><b style="font-size: 10px;">TEL: 0724 654 191<br>Email: info@fortsortinnovations.co.ke</b></h2>

    <table class="inv_info">
        <tr>
            <td>Paid By:</td>
            <td><?php echo $payment['fname']; ?> <?php echo $payment['lname']; ?></td>
        </tr>
        <tr>
            <td>Receipt no:</td>
            <td>#<?php echo str_pad( $payment['id'], 4, "0", STR_PAD_LEFT ); ?></td>
        </tr>
        <tr>
            <td>Receipt Date: </td>
            <td><?php echo date('d/m/Y H:s', strtotime($payment['created_at']))?><br></td>
        </tr>
    </table>
    <hr>
    <table id="products" >
        <tr class="product_row">
            <td colspan="2"><b> Mode</b></td>
            <td><b>Amount&nbsp;</b></td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <?php
        $this->pheight = 0;

        $this->pheight = $this->pheight + 8;
        echo '<tr>
            <td colspan="2"><b>' . $payment['pmnt_mode'] . '</b></td>
             <td><b> Ksh ' . $payment['amount_paid']. '</b></td>
            
        </tr>';
        ?>
        <?php if($payment['pmnt_mode'] == "Mpesa"){
             echo '<tr>
            <td colspan="2"><small>Phone No:</small></td>
             <td><small>' . $payment['phno']. '</small></td>
            
        </tr>';
         echo '<tr>
            <td colspan="2"><small>Transaction:</small></td>
             <td><small>' . $payment['transaction_no']. '</small></td>
            
        </tr><tr><td colspan="3">&nbsp;</td></tr>';
        ?>
            
        <?php } ?>
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
            <td><b>Discount</b></td>
            <td><b>Ksh. <?php echo  number_format((float)abs($repair['discount']), 2,'.','') ?></b></td>
        </tr>
        <tr>
            <td><b>Total</b></td>
            <td><b>Ksh. <?php echo  number_format((float)abs($repair['total_cost'] -$repair['discount']), 2,'.','') ?></b></td>
        </tr>
        <tr>
            <td><b>Tota Paid</b></td>
            <td><b>Ksh. <?php echo $payment['amount_paid'] ?></b></td>
        </tr>
        <tr>
            <td><b>Total Due</b></td>
            <td><b>Ksh. <?php  echo number_format((float)abs($repair['total_cost'] -$repair['discount']-$tot), 2,'.','');?></b><?php if(($repair['total_cost'] -$repair['discount']-$tot) < 0){echo "(overpaid) ";} ?></td>
        </tr>

    </table>
    <hr>
    <table>

        <tr>
            <td colspan="3">
                &nbsp;
            </td>
        </tr>

        <tr>
            <td>Received by: </td>
            <td><?php echo $this->session->userdata('user_aob')->firstname;?> <?php echo $this->session->userdata('user_aob')->lastname;?></td>
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
    <div class="text-center">  **Payment made!**</div>


</div>
</body>
</html>
