<div class="main-wrapper">

	<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li>
								<a href="/admin/dashboard"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
								
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="chat">Chat</a></li>
									<li class="submenu">
										<a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="/admin/voice-call">Voice Call</a></li>
											<li><a href="/admin/video-call">Video Call</a></li>
											<li><a href="/admin/outgoing-call">Outgoing Call</a></li>
											<li><a href="/admin/incoming-call">Incoming Call</a></li>
										</ul>
									</li>
									<li><a href="/admin/events">Calendar</a></li>
									<li><a href="/admin/contacts">Contacts</a></li>
									<li><a href="/admin/inbox">Email</a></li>
									<li><a href="/admin/file-manager">File Manager</a></li>
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Employees</span>
							</li>
							<li class="submenu">
								<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="/admin/employees">All Employees</a></li>
								    <li><a href="/admin/departments">Departments</a></li>
									<li><a href="/admin/designations">Designations</a></li>
									
								</ul>
							</li>
							 
								<li class="submenu">
								<a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="/admin/projects">Projects</a></li>
									<li><a href="/admin/tasks">Tasks</a></li>
									<li><a href="/admin/task-board">Task Board</a></li>
								</ul>
							</li>
							<li>
								<a href="{{url(isset(Auth::user()->type) ? Auth::user()->type.'/clients' : '')}}"><i class="la la-users"></i> <span>Clients</span></a>
							</li>
							<li> 
								<a href="/admin/leads"><i class="la la-user-secret"></i> <span>Leads</span></a>
							</li>
							<li> 
								<a href="/admin/tickets"><i class="la la-ticket"></i> <span>Tickets</span></a>
							</li>
							<li> 

								<a href="/admin/users"><i class="la la-user-plus"></i> <span>Users</span></a>

							</li>

							<li> 

								<a href="/admin/settings"><i class="la la-cog"></i> <span>Settings</span></a>

							</li>							
							
						</ul>
					</div>
                </div>
            </div>

</div>


			