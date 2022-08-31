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
                        <!--                        <h5 class="card-title"></h5>-->
                        <table class="mb-0 table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Staff Name</th>
                                <th class="text-center">Ex. Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $id = 0;
                            foreach ($expenses as $expense)
                            { $id++; $exname = "";foreach(json_decode($expense->item_name,true) as $one){$exname .= $one.", ";}

                                ?>
                            <tr>   
                                <th scope="row" class="text-center"><?php echo $id; ?></th>
                                <th class="text-center"><?php echo $expense->firstname; ?> <?php echo $expense->lastname; ?></th>
                                <td class="text-center"><?php echo $exname; ?></td>
                                <td class="text-center"><?php echo $expense->date; ?></td>
                                <td class="text-center"><?php echo $expense->total_amount; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('expense/show/' . $expense->id); ?>" title="View" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo base_url('expense/edit/' . $expense->id) ?>" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('expense/delete/' .$expense->id) ?>" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php  }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        