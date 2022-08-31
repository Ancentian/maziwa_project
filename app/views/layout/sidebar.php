            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title"> 
                                <span>Main</span>
                            </li>
                            <li class="submenu">
                                <a href="<?php base_url('main/index');?>"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a class="active" href="<?php echo base_url('main/index');?>">Admin Dashboard</a></li>
                                    <li hidden><a href="#">Employee Dashboard</a></li>
                                </ul>
                            </li>

                            <li class="menu-title"> 
                                <span>Employees</span>
                            </li>
                            <li class="submenu">
                                <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="<?php echo base_url('employee/index'); ?>">All Employees</a></li>
                                    <!-- <li><a href="departments.html">Departments</a></li>
                                        <li><a href="designations.html">Designations</a></li> -->
                                    </ul>
                                </li>                           
                                <li class="menu-title"> 
                                    <span>HR</span>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="la la-files-o"></i> <span> Sales </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="<?php echo base_url('cooperative/searchCollectionCenter')?>">Add Collection</a></li>
                                        <li><a href="<?php echo base_url('cooperative/milkCollection')?>">Milk Collections</a></li>
                                        <li><a href="<?php echo base_url('payments/invoices')?>">Invoices</a></li>
                                        <li><a href="<?php echo base_url('payments/index')?>">Payments</a></li>
                                        <li><a href="#">Expenses</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="la la-files-o"></i> <span> Accounting </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="categories.html">Categories</a></li>
                                        <li><a href="budgets.html">Budgets</a></li>
                                        <li><a href="budget-expenses.html">Budget Expenses</a></li>
                                        <li><a href="budget-revenues.html">Budget Revenues</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="<?php echo base_url('payments/salary')?>"> Farmer Salary </a></li>
                                        <li hidden><a href="salary-view.html"> Payslip </a></li>
                                        <li hidden><a href="payroll-items.html"> Payroll Items </a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="expense-reports.html"> Expense Report </a></li>
                                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                                        <li><a href="payments-reports.html"> Payments Report </a></li>
                                        <li><a href="user-reports.html"> User Report </a></li>
                                        <li><a href="employee-reports.html"> Employee Report </a></li>
                                        <li><a href="payslip-reports.html"> Payslip Report </a></li>
                                        <li><a href="daily-reports.html"> Daily Report </a></li>
                                    </ul>
                                </li>                     
                                <li class="menu-title"> 
                                    <span>Administration</span>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="la la-cog"></i> <span> Settings </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="<?php echo base_url('employee/index'); ?>">Users</a>
                                        </li>
                                        <li><a href="<?php echo base_url('farmers/index'); ?>">Farmers</a></li>
                                        <li><a href="<?php echo base_url('cooperative/index'); ?>">Cooperatives</a></li>
                                        <li><a href="<?php echo base_url('cooperative/collectionCentre'); ?>">Collection Centers</a>
                                        </li>
                                        <li><a href="<?php echo base_url('roles/index'); ?>">Roles</a></li>
                                        <li><a href="<?php echo base_url('payments/milkRates'); ?>">Milk Rates</a></li>
                                    </ul>
                                </li>     
                                <li class="menu-title"> 
                                    <span>Pages</span>
                                </li>
                                <li class="submenu">
                                    <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="profile.html"> Employee Profile </a></li>
                                        <li><a href="client-profile.html"> Client Profile </a></li>
                                    </ul>
                                </li>
                                <li> 
                                    <a href="#"><i class="la la-file-text"></i> <span>Documentation</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            <!-- /Sidebar -->