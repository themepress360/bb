

<?php $__env->startSection('content'); ?>
<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="demo"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                        </li>
                        <li class="menu-title">Settings</li>
                        <li>
                            <a href="settings"><i class="fa fa-building"></i> <span>Company Settings</span></a>
                        </li>
                        <li>
                            <a href="localization"><i class="fa fa-clock-o"></i> <span>Localization</span></a>
                        </li>
                        <li>
                            <a href="theme-settings"><i class="fa fa-picture-o"></i> <span>Theme Settings</span></a>
                        </li>
                        <li class="active">
                            <a href="roles-permissions"><i class="fa fa-key"></i> <span>Roles & Permissions</span></a>
                        </li>
                        <li>
                            <a href="email-settings"><i class="fa fa-envelope-o"></i> <span>Email Settings</span></a>
                        </li>
                        <li>
                            <a href="invoice-settings"><i class="fa fa-pencil-square-o"></i> <span>Invoice Settings</span></a>
                        </li>
                        <li>
                            <a href="salary-settings"><i class="fa fa-money"></i> <span>Salary Settings</span></a>
                        </li>
                        <li>
                            <a href="notifications-settings"><i class="fa fa-globe"></i> <span>Notifications</span></a>
                        </li>
                        <li>
                            <a href="change-password"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                        <li>
                            <a href="leave-type"><i class="fa fa-cogs"></i> <span>Leave Type</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="page-title">Roles & Permissions</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                        <a href="add-role.html" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Roles</a>
                        <div class="roles-menu">
                            <ul>
                                <li class="active">
                                    <a href="javascript:void(0);">Administrator</a>
									<span class="role-action">
										<a href="edit-role.html">
											<span class="action-circle large">
												<i class="material-icons">edit</i>
											</span>
										</a>
										<a href="#" data-toggle="modal" data-target="#delete_role">
											<span class="action-circle large delete-btn">
												<i class="material-icons">delete</i>
											</span>
										</a>
									</span>
                                </li>
                                <li><a href="">Doctor</a></li>
                                <li><a href="">Nurse</a></li>
                                <li><a href="">Laboratorist</a></li>
                                <li><a href="">Pharmacist</a></li>
                                <li><a href="">Accountant</a></li>
                                <li><a href="">Receptionist</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                        <h6 class="card-title m-b-20">Module Access</h6>
                        <div class="m-b-30">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Employee
                                    <div class="material-switch float-right">
                                        <input id="staff_module" type="checkbox">
                                        <label for="staff_module" class="badge-success"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Holidays
                                    <div class="material-switch float-right">
                                        <input id="holidays_module" type="checkbox">
                                        <label for="holidays_module" class="badge-success"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Leave Request
                                    <div class="material-switch float-right">
                                        <input id="leave_module" type="checkbox">
                                        <label for="leave_module" class="badge-success"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Events
                                    <div class="material-switch float-right">
                                        <input id="events_module" type="checkbox">
                                        <label for="events_module" class="badge-success"></label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    Chat
                                    <div class="material-switch float-right">
                                        <input id="chat_module" type="checkbox">
                                        <label for="chat_module" class="badge-success"></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Import</th>
                                        <th class="text-center">Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Employee</td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Holidays</td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leave Request</td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Events</td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" checked="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">See all messages</a>
                    </div>
                </div>
            </div>
        </div>
		<div id="delete_role" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Role?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="sidebar-overlay" data-reff=""></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\preclinic_laravel\resources\views/roles-permissions.blade.php ENDPATH**/ ?>