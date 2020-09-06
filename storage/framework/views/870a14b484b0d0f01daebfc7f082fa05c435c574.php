<div class="main-wrapper">
<div class="sidebar" id="sidebar">

            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul id="navi">
                        <li class="menu-title">Main</li>
                        


                        <li class="<?php echo e(Request::is('demo') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('demo')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
    </li>
                        <li class="<?php echo e(Request::is('doctor') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('doctor')); ?>"><i class="fa fa-user-md"></i><span> Doctors</span></a>
    </li>

    <li class="<?php echo e(Request::is('patients') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('patients')); ?>"><i class="fa fa-wheelchair"></i> <span> patients</span></a>
    </li>
    <li class="<?php echo e(Request::is('appointments') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('appointments')); ?>"><i class="fa fa-calendar"></i><span>Appointments</span></a>
    </li>
    <li class="<?php echo e(Request::is('doctor-schedule') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('doctor-schedule')); ?>"><i class="fa fa-calendar-check-o"></i><span>Doctor Schedule</span></a>
    </li>
    <li class="<?php echo e(Request::is('departments') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('departments')); ?>"><i class="fa fa-hospital-o"></i><span>Departments</span></a>
    </li>
                     
						<li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employees">Employees List</a></li>
								<li><a href="leaves">Leaves</a></li>
								<li><a href="holidays" >Holidays</a></li>
								<li><a href="attendance" >Attendance</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="invoices">Invoices</a></li>
								<li><a href="payments">Payments</a></li>
								<li><a href="expenses">Expenses</a></li>
								<li><a href="taxes">Taxes</a></li>
								<li><a href="provident-fund">Provident Fund</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary"> Employee Salary </a></li>
								<li><a href="salary-view"> Payslip </a></li>
							</ul>
						</li>
                        <li>
                            <a href="chat"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="voice-call">Voice Call</a></li>
                                <li><a href="video-call">Video Call</a></li>
                                <li><a href="incoming-call">Incoming Call</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose">Compose Mail</a></li>
                                <li><a href="inbox">Inbox</a></li>
                                <li><a href="mail-view">Mail View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blog">Blog</a></li>
                                <li><a href="blog-details">Blog View</a></li>
                                <li><a href="add-blog">Add Blog</a></li>
                                <li><a href="edit-blog">Edit Blog</a></li>
                            </ul>
                        </li>
						<li>
							<a href="assests"><i class="fa fa-cube"></i> <span>Assets</span></a>
						</li>
						<li>
							<a href="activities"><i class="fa fa-bell-o"></i> <span>Activities</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="expense-report"> Expense Report </a></li>
								<li><a href="invoice-reports"> Invoice Report </a></li>
							</ul>
						</li>
                        <li>
                            <a href="settings"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="menu-title">UI Elements</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-laptop"></i> <span> Components</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="uikit">UI Kit</a></li>
                                <li><a href="typography">Typography</a></li>
                                <li><a href="tabs">Tabs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="form-basic-inputs">Basic Inputs</a></li>
                                <li><a href="form-input-groups">Input Groups</a></li>
                                <li><a href="form-horizontal">Horizontal Form</a></li>
                                <li><a href="form-vertical">Vertical Form</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-table"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="tables-basic">Basic Tables</a></li>
                                <li><a href="tables-datatables">Data Table</a></li>
                            </ul>
                        </li>


                        <li class="<?php echo e(Request::is('calendar') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('calendar')); ?>"><i class="fa fa-calendar"></i><span> Calendar</span></a>
    </li>


                        <li class="menu-title">Extras</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login"> Login </a></li>
                                <li><a href="register"> Register </a></li>
                                <li><a href="forgot-password"> Forgot Password </a></li>
                                <li><a href="change-password2"> Change Password </a></li>
                                <li><a href="lock-screen"> Lock Screen </a></li>
                                <li><a href="profile"> Profile </a></li>
                                <li><a href="gallery"> Gallery </a></li>
                                <li><a href="error-404">404 Error </a></li>
                                <li><a href="error-500">500 Error </a></li>
                                <li><a href="blank-page"> Blank Page </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                            <ul style="display: none;">
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span>Level 1</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div><?php /**PATH C:\xampp\htdocs\preclinic_laravel\resources\views/layout/partials/nav.blade.php ENDPATH**/ ?>