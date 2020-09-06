<div class="main-wrapper">
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li class="<?php echo e(Request::is('index') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('index')); ?>">Admin Dashboard</a></li>
		<li>
        <a class="<?php echo e(Request::is('employee-dashboard') ? 'active' : ''); ?>" href="<?php echo e(url('employee-dashboard')); ?>">Employee Dashboard</a></li>

								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
								<li class="<?php echo e(Request::is('chat') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('chat')); ?>">Chat</a></li>
									
									<li class="submenu">
										<a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
										<li class="<?php echo e(Request::is('voice-call') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('voice-call')); ?>">Voice Call</a></li>

		<li class="<?php echo e(Request::is('video-call') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('video-call')); ?>">Video Call</a></li>
											
		<li class="<?php echo e(Request::is('outgoing-call') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('outgoing-call')); ?>">Outgoing Call</a></li>

		<li class="<?php echo e(Request::is('incoming-call') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('incoming-call')); ?>">Incoming Call</a></li>
											
											
										</ul>
									</li>

									<li>
        <a class="<?php echo e(Request::is('events') ? 'active' : ''); ?>" href="<?php echo e(url('events')); ?>">Calendar</a></li>

		<li>
        <a class="<?php echo e(Request::is('contacts') ? 'active' : ''); ?>" href="<?php echo e(url('contacts')); ?>">Contacts</a></li>

		<li>
        <a class="<?php echo e(Request::is('inbox') ? 'active' : ''); ?>" href="<?php echo e(url('inbox')); ?>">Email</a></li>						
									
		<li>
        <a class="<?php echo e(Request::is('file-manager') ? 'active' : ''); ?>"  href="<?php echo e(url('file-manager')); ?>">File Manager</a></li>								
									
								
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Employees</span>
							</li>
							<li class="submenu">
								<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('employees') ? 'active' : ''); ?>" href="<?php echo e(url('employees')); ?>">All Employees</a></li>			

		<li>
        <a class="<?php echo e(Request::is('holidays') ? 'active' : ''); ?>" href="<?php echo e(url('holidays')); ?>">Holidays</a></li>	
									
		<li>
        <a class="<?php echo e(Request::is('leaves') ? 'active' : ''); ?>" href="<?php echo e(url('leaves')); ?>">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span></a></li>								
								
		<li>
        <a class="<?php echo e(Request::is('leaves-employee') ? 'active' : ''); ?>" href="<?php echo e(url('leaves-employee')); ?>">Leaves (employee)</a></li>	

		<li>
        <a class="<?php echo e(Request::is('leave-settings') ? 'active' : ''); ?>" href="<?php echo e(url('leave-settings')); ?>">Leave Settings</a></li>	

		<li>
        <a class="<?php echo e(Request::is('attendance') ? 'active' : ''); ?>" href="<?php echo e(url('attendance')); ?>">Attendance (Admin)</a></li>	

		<li>
        <a class="<?php echo e(Request::is('attendance-employee') ? 'active' : ''); ?>" href="<?php echo e(url('attendance-employee')); ?>">Attendance (Employee)</a></li>	
									
		<li>
        <a class="<?php echo e(Request::is('departments') ? 'active' : ''); ?>" href="<?php echo e(url('departments')); ?>">Departments</a></li>								
									
		<li>
        <a class="<?php echo e(Request::is('designations') ? 'active' : ''); ?>" href="<?php echo e(url('designations')); ?>">Designations</a></li>								
									
        <li>
        <a class="<?php echo e(Request::is('timesheet') ? 'active' : ''); ?>" href="<?php echo e(url('timesheet')); ?>">Timesheet</a></li>	
			
		<li>
        <a class="<?php echo e(Request::is('overtime') ? 'active' : ''); ?>" href="<?php echo e(url('overtime')); ?>">Overtime</a></li>								
									
								</ul>
							</li>

							<li class="<?php echo e(Request::is('clients') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('clients')); ?>"><i class="la la-users"></i> <span>Clients</span></a></li>	

							
							<li class="submenu">
								<a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
				
								<li>
        <a class="<?php echo e(Request::is('projects') ? 'active' : ''); ?>" href="<?php echo e(url('projects')); ?>">Projects</a></li>	

		<li>
        <a class="<?php echo e(Request::is('tasks') ? 'active' : ''); ?>" href="<?php echo e(url('tasks')); ?>">Tasks</a></li>	
									
		<li>
        <a class="<?php echo e(Request::is('task-board') ? 'active' : ''); ?>" href="<?php echo e(url('task-board')); ?>">Task Board</a></li>							
									
								
								</ul>
							</li>

							<li class="<?php echo e(Request::is('leads') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('leads')); ?>"><i class="la la-user-secret"></i><span>Leads</span></a></li>		

							
		<li class="<?php echo e(Request::is('tickets') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('tickets')); ?>"><i class="la la-ticket"></i><span>Tickets</span></a></li>	

							
							<li class="menu-title"> 
								<span>HR</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('estimates') ? 'active' : ''); ?>" href="<?php echo e(url('estimates')); ?>">Estimates</a></li>			

		<li>
        <a class="<?php echo e(Request::is('invoices') ? 'active' : ''); ?>" href="<?php echo e(url('invoices')); ?>">Invoices</a></li>	
									
		<li>
        <a class="<?php echo e(Request::is('payments') ? 'active' : ''); ?>" href="<?php echo e(url('payments')); ?>">Payments</a></li>	

        <li>
        <a class="<?php echo e(Request::is('expenses') ? 'active' : ''); ?>" href="<?php echo e(url('expenses')); ?>">Expenses</a></li>	
									
		<li>
        <a class="<?php echo e(Request::is('provident-fund') ? 'active' : ''); ?>" href="<?php echo e(url('provident-fund')); ?>">Provident Fund</a></li>	

		<li>
        <a class="<?php echo e(Request::is('taxes') ? 'active' : ''); ?>" href="<?php echo e(url('taxes')); ?>">Taxes</a></li>	

									
									
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('salary') ? 'active' : ''); ?>" href="<?php echo e(url('salary')); ?>">Employee Salary</a></li>	


		<li>
        <a class="<?php echo e(Request::is('salary-view') ? 'active' : ''); ?>" href="<?php echo e(url('salary-view')); ?>">Payslip</a></li>	
									
		<li>
        <a class="<?php echo e(Request::is('payroll-items') ? 'active' : ''); ?>" href="<?php echo e(url('payroll-items')); ?>">Payroll Items</a></li>	

								
								</ul>
							</li>


							<li class="<?php echo e(Request::is('policies') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('policies')); ?>"><i class="la la-file-pdf-o"></i><span>Policies</span></a></li>	

							
							<li class="submenu">
								<a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">


								<li>
        <a class="<?php echo e(Request::is('expense-reports') ? 'active' : ''); ?>" href="<?php echo e(url('expense-reports')); ?>">Expense Report</a></li>


		<li>
        <a class="<?php echo e(Request::is('invoice-reports') ? 'active' : ''); ?>" href="<?php echo e(url('invoice-reports')); ?>"> Invoice Report </a></li>

								
								
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Performance</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('performance-indicator') ? 'active' : ''); ?>" href="<?php echo e(url('performance-indicator')); ?>"> Performance Indicator  </a></li>

		<li>
        <a class="<?php echo e(Request::is('performance') ? 'active' : ''); ?>" href="<?php echo e(url('performance')); ?>"> Performance Review  </a></li>
								
		<li>
        <a class="<?php echo e(Request::is('performance-appraisal') ? 'active' : ''); ?>" href="<?php echo e(url('performance-appraisal')); ?>"> Performance Appraisal  </a></li>

					
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('goal-tracking') ? 'active' : ''); ?>" href="<?php echo e(url('goal-tracking')); ?>"> Goal List  </a></li>

		<li>
        <a class="<?php echo e(Request::is('goal-type') ? 'active' : ''); ?>" href="<?php echo e(url('goal-type')); ?>"> Goal Type  </a></li>

									
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('training') ? 'active' : ''); ?>" href="<?php echo e(url('training')); ?>"> Training List  </a></li>

		<li>
        <a class="<?php echo e(Request::is('trainers') ? 'active' : ''); ?>" href="<?php echo e(url('trainers')); ?>"> Trainers  </a></li>

		<li>
        <a class="<?php echo e(Request::is('training-type') ? 'active' : ''); ?>" href="<?php echo e(url('training-type')); ?>"> Training Type  </a></li>

		
								</ul>
							</li>

							<li class="<?php echo e(Request::is('promotion') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('promotion')); ?>"><i class="la la-bullhorn"></i> <span>Promotion</span>  </a></li>

		<li class="<?php echo e(Request::is('resignation') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('resignation')); ?>"><i class="la la-external-link-square"></i> <span>Resignation</span>  </a></li>
						
        <li class="<?php echo e(Request::is('termination') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('termination')); ?>"><i class="la la-external-link-square"></i> <span>Termination</span>  </a></li>

							
							<li class="menu-title"> 
								<span>Administration</span>
							</li>

							<li class="<?php echo e(Request::is('assets') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('assets')); ?>"><i class="la la-object-ungroup"></i><span>Assets</span>  </a></li>

							
							<li class="submenu">
								<a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('jobs') ? 'active' : ''); ?>" href="<?php echo e(url('jobs')); ?>"> Manage Jobs  </a></li>

		<li>
        <a class="<?php echo e(Request::is('jobs-applicants') ? 'active' : ''); ?>" href="<?php echo e(url('jobs-applicants')); ?>"> Applied Candidates  </a></li>
							
									
								</ul>
							</li>

							<li class="<?php echo e(Request::is('knowledgebase') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('knowledgebase')); ?>"> <i class="la la-question"></i><span>Knowledgebase</span>  </a></li>

        <li class="<?php echo e(Request::is('activities') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('activities')); ?>"><i class="la la-bell"></i><span>Activities</span>  </a></li>

		<li class="<?php echo e(Request::is('users') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('users')); ?>"><i class="la la-user-plus"></i><span>Users</span>  </a></li>
						
		<li class="<?php echo e(Request::is('settings') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('settings')); ?>"><i class="la la-cog"></i><span>Settings</span>  </a></li>

							
							<li class="menu-title"> 
								<span>Pages</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">


								<li>
        <a class="<?php echo e(Request::is('profile') ? 'active' : ''); ?>" href="<?php echo e(url('profile')); ?>"> Employee Profile  </a></li>

		<li>
        <a class="<?php echo e(Request::is('client-profile') ? 'active' : ''); ?>" href="<?php echo e(url('client-profile')); ?>"> Client Profile  </a></li>

								
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li class="<?php echo e(Request::is('login') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('login')); ?>"> Login </a></li>

		<li class="<?php echo e(Request::is('register') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('register')); ?>"> Register </a></li>
								
		<li class="<?php echo e(Request::is('forgot-password') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('forgot-password')); ?>"> Forgot Password </a></li>

		<li class="<?php echo e(Request::is('otp') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('otp')); ?>"> OTP </a></li>

		<li class="<?php echo e(Request::is('lock-screen') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('lock-screen')); ?>"> Lock Screen </a></li>							
								
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-exclamation-triangle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li class="<?php echo e(Request::is('error-404') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('error-404')); ?>"> 404 Error </a></li>	
		<li class="<?php echo e(Request::is('error-500') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('error-500')); ?>"> 500 Error  </a></li>
								
				
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-hand-o-up"></i> <span> Subscriptions </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('subscriptions') ? 'active' : ''); ?>" href="<?php echo e(url('subscriptions')); ?>"> Subscriptions (Admin)  </a></li>
            
		<li>
        <a class="<?php echo e(Request::is('subscriptions-company') ? 'active' : ''); ?>" href="<?php echo e(url('subscriptions-company')); ?>"> Subscriptions (Company)  </a></li>
								
		<li>
        <a class="<?php echo e(Request::is('subscribed-companies') ? 'active' : ''); ?>" href="<?php echo e(url('subscribed-companies')); ?>">Subscribed Companies  </a></li>

								
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('search') ? 'active' : ''); ?>" href="<?php echo e(url('search')); ?>">Search  </a></li>

		<li>
        <a class="<?php echo e(Request::is('faq') ? 'active' : ''); ?>" href="<?php echo e(url('faq')); ?>"> FAQ  </a></li>

		<li>
        <a class="<?php echo e(Request::is('terms') ? 'active' : ''); ?>"  href="<?php echo e(url('terms')); ?>"> Terms </a></li>

        <li>
        <a class="<?php echo e(Request::is('privacy-policy') ? 'active' : ''); ?>" href="<?php echo e(url('privacy-policy')); ?>"> Privacy Policy </a></li>

		<li>
        <a class="<?php echo e(Request::is('blank-page') ? 'active' : ''); ?>" href="<?php echo e(url('blank-page')); ?>"> Blank Page </a></li>
								
								</ul>
							</li>
							<li class="menu-title"> 
								<span>UI Interface</span>
							</li>

							<li class="<?php echo e(Request::is('components') ? 'active' : ''); ?>">
        <a  href="<?php echo e(url('components')); ?>"> <i class="la la-puzzle-piece"></i><span>Components</span></a></li>


						
							<li class="submenu">
								<a href="#"><i class="la la-object-group"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('form-basic-inputs') ? 'active' : ''); ?>" href="<?php echo e(url('form-basic-inputs')); ?>"> Basic Inputs </a></li>

		<li>
        <a class="<?php echo e(Request::is('form-input-groups') ? 'active' : ''); ?>" href="<?php echo e(url('form-input-groups')); ?>"> Input Groups </a></li>

		<li>
        <a class="<?php echo e(Request::is('form-horizontal') ? 'active' : ''); ?>" href="<?php echo e(url('form-horizontal')); ?>"> Horizontal Form </a></li>

		<li>
        <a class="<?php echo e(Request::is('form-vertical') ? 'active' : ''); ?>" href="<?php echo e(url('form-vertical')); ?>"> Vertical Form </a></li>

		<li>
        <a class="<?php echo e(Request::is('form-mask') ? 'active' : ''); ?>" href="<?php echo e(url('form-mask')); ?>"> Form Mask </a></li>
							
		<li>
        <a class="<?php echo e(Request::is('form-validation') ? 'active' : ''); ?>" href="<?php echo e(url('form-validation')); ?>"> Form Validation  </a></li>							
									
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">

								<li>
        <a class="<?php echo e(Request::is('tables-basic') ? 'active' : ''); ?>" href="<?php echo e(url('tables-basic')); ?>"> Basic Tables   </a></li>	

		<li>
        <a class="<?php echo e(Request::is('data-tables') ? 'active' : ''); ?>" href="<?php echo e(url('data-tables')); ?>"> Data Table  </a></li>	
									
							
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Extras</span>
							</li>
							<li> 
								<a href="#"><i class="la la-file-text"></i> <span>Documentation</span></a>
							</li>
							<li> 
								<a href="javascript:void(0);"><i class="la la-info"></i> <span>Change Log</span> <span class="badge badge-primary ml-auto">v3.4</span></a>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
            </div>


			<?php /**PATH C:\xampp\htdocs\smarthr_laravel\resources\views/layout/partials/nav.blade.php ENDPATH**/ ?>