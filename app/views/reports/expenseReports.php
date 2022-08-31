<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Expense List
                        <div class="page-title-subheading">All Expenses
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
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Expenses</div>
                    <div class="card-body">
                        <form action="https://ftiba.fortsortinnovations.co.ke/departmental_reports/index/14" method="GET">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" style="" value="" name="sdate" required>
                                </div>
                                <div class="col-sm-3">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" style="" value="" name="edate" required>
                                </div>
                                <div class="col-sm-1">
                                    <label>.</label><br>
                                    <input type="submit" class="btn btn-success" value="FILTER" required>
                                </div>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Staff Name</th>
                                <th class="text-center">Ex. Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                            </tr>
                            </thead>
                            <tbody>

                                
                            <?php $id = 0; $totexpense = 0; foreach ($expenses as $expense) { $totexpense += $expense['total_amount']; 
                            $id++;
                                     $exname = "";
                                foreach(json_decode($expense['item_name'],true) as $one){
                                    $exname .= $one.", ";
                                }
                             ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $id; ?></th>
                                <th class="text-center"><?php echo $expense['firstname']; ?> <?php echo $expense['lastname']; ?></th>
                                <td class="text-center"><?php echo $exname; ?></td>
                                <td class="text-center"><?php echo $expense['date']; ?></td>
                                <td class="text-center"><?php echo $expense['total_amount']; ?></td>
                                
                            </tr>
                            <?php  }?>

                            </tbody>
                            <tfoot>
                                <tr class="alert alert-success">
                                    <td class="text-center">#</td>
                                    <td></td>
                                    <td class="text-center" rowspan="2"><b>Total</b></td>
                                    <td></td>
                                    <td class="text-center"><b><?php echo $totexpense; ?></b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        