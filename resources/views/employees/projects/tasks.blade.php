@extends('layout.employeelayout')
@section('content')
    
<!-- Sidebar -->
<!--<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<ul>
							<li> 
								<a href="{{url('/employee/dashboard')}}"><i class="la la-home"></i> <span>Back to Home</span></a>
							</li>
							<li class="menu-title">Projects <a href="#" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i></a></li>
							<li> 
								<a href="tasks">Project Management</a>
							</li>
							<li class="active"> 
								<a href="tasks">Hospital Administration</a>
							</li>
							<li> 
								<a href="tasks">Video Calling App</a>
							</li>
							<li> 
								<a href="tasks">Office Management</a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			 /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
				<div class="chat-main-row">
					<div id= "main" class="task-main-wrapper">
						<div class="col-lg-7 message-view task-view task-left-sidebar">
							<div class="task-window">
								<div class="fixed-header">
									<div class="navbar">
										<div class="float-left mr-auto">
											<div class="add-task-btn-wrapper">
												<!--<span class="add-task-btn btn btn-white btn-sm">
												 <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_task">	Add Task </a>
												</span> -->
												<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_task" >Add Task </a>
											</div>
										</div>
										<!--<a class="task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a> -->
										<ul class="nav float-right custom-menu">
											<li class="nav-item dropdown dropdown-action">
												<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)">Pending Tasks</a>
													<a class="dropdown-item" href="javascript:void(0)">Completed Tasks</a>
													<a class="dropdown-item" href="javascript:void(0)">All Tasks</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
							
								<div class="dropdown task-wrapper">	
								
									@foreach($projects as $project)	
								
				<a href="#" class="dropdown-btn" style="display:block;" value="{{$project->id}}"><span  class="span-rotate">{{ucwords($project->project_title)}}</span> <i class="fa fa fa-chevron-down rotate m-l-10"></i> </a>
									 

									  <div class="dropdown-container">
												<div class="task-wrapper" >
													<div class="task-list-container">
														<div class="task-list-body">
      		     											 <ul id="task-list" onClick="openTask()">
															     @foreach($tasks as $task)														 
																@if($task->project_id == $project->id)
																<li class="task"  value="{{$task->id}}" >
																	<div class="task-container">
																		<span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																		</span>
																		<span class="task-label" contenteditable="true">{{$task->task_title}}</span>
																		<span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
																			<span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
																		</span>
																	</div>
																</li>
																  @endif
																   @endforeach
																
															</ul>
														</div>
													</div>
												</div>
										  </div>
										     									  
										@endforeach
									</div>			
			@foreach($projects as $project)	
	<!--	<div class="dropdown task-wrapper keep-open">
			 <a href="#" value="{{$project->id}}" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<span class="span-rotate">{{ucwords($project->project_title)}}</span><i class="fa fa-chevron-right m-l-10 rotate"></i></a>
								<div class="dropdown-menu task-wrapper" aria-labelledby="task-dropdown">
    										<div class="task-wrapper" >
													<div class="task-list-container">
														<div class="task-list-body">
															<ul id="task-list" onClick="openTask()">
																@foreach($tasks as $task)
																<li class="task"  value="{{$task->id}}" >
																	<div class="task-container">
																		<span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																		</span>
																		<span class="task-label" contenteditable="true">{{$task->task_title}}</span>
																		<span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
																			<span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
																		</span>
																	</div>
																</li>
																@endforeach
																
															</ul>
														</div>
														<div class="task-list-footer">
															<div class="new-task-wrapper">
																<textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
																<span class="error-message hidden">You need to enter a task first</span>
																<span class="add-new-task-btn btn" id="add-task">Add Task</span>
																<span class="btn" id="close-task-panel">Close</span>
															</div>
														</div>
													</div>
													
												</div>
  									</div>
							</div>
							    
							@endforeach

						<!--	<div class="task-wrapper" >
									
													<div class="task-list-container">
														<div class="task-list-body">
															<ul id="task-list">
																@foreach($tasks as $task)
																<li class="task"  value="{{$task->id}}" >
																	<div class="task-container">
																		<span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																		</span>
																		<span class="task-label" contenteditable="true">{{$task->task_title}}</span>
																		<span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
																			<span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
																		</span>
																	</div>
																</li>
																@endforeach
																
															</ul>
														</div>
														<div class="task-list-footer">
															<div class="new-task-wrapper">
																<textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
																<span class="error-message hidden">You need to enter a task first</span>
																<span class="add-new-task-btn btn" id="add-task">Add Task</span>
																<span class="btn" id="close-task-panel">Close</span>
															</div>
														</div>
													</div>
													
												</div> 
											
												<div class="notification-popup hide">
													<p>
														<span class="task"></span>
														<span class="notification-text"></span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div> -->
				
				<!-- Create Project Modal -->
				<div id="create_project" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Project</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Project Name</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Client</label>
												<select class="select">
													<option>Global Technologies</option>
													<option>Delta Infotech</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Start Date</label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>End Date</label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" type="text">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label>Rate</label>
												<input placeholder="$50" class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>&nbsp;</label>
												<select class="select">
													<option>Hourly</option>
													<option>Fixed</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Priority</label>
												<select class="select">
													<option>High</option>
													<option>Medium</option>
													<option>Low</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Add Project Leader</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Team Leader</label>
												<div class="project-members">
													<a class="avatar" href="#" data-toggle="tooltip" title="Jeffery Lalor">
														<img alt="" src="img/profiles/avatar-16.jpg">
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Add Team</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Team Members</label>
												<div class="project-members">
													<a class="avatar" href="#" data-toggle="tooltip" title="John Doe">
														<img alt="" src="img/profiles/avatar-02.jpg">
													</a>
													<a class="avatar" href="#" data-toggle="tooltip" title="Richard Miles">
														<img alt="" src="img/profiles/avatar-09.jpg">
													</a>
													<a class="avatar" href="#" data-toggle="tooltip" title="John Smith">
														<img alt="" src="img/profiles/avatar-10.jpg">
													</a>
													<a class="avatar" href="#" data-toggle="tooltip" title="Mike Litorus">
														<img alt="" src="img/profiles/avatar-05.jpg">
													</a>
													<span class="all-team">+2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Description</label>
										<textarea rows="4" class="form-control summernote" placeholder="Enter your message here"></textarea>
									</div>
									<div class="form-group">
										<label>Upload Files</label>
										<input class="form-control" type="file">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Create Project Modal -->
				
				<!-- Assignee Modal -->
				<div id="assignee" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Assign to this task</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="input-group m-b-30">
									<input placeholder="Search to add" class="form-control search-input" type="text">
									<span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
								</div>
								<div>
									<ul class="chat-user-list">
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="img/profiles/avatar-09.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">Richard Miles</div>
														<span class="designation">Web Developer</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="img/profiles/avatar-10.jpg"></span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">John Smith</div>
														<span class="designation">Android Developer</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar">
														<img alt="" src="img/profiles/avatar-16.jpg">
													</span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">Jeffery Lalor</div>
														<span class="designation">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Assign</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Assignee Modal -->
				
				<!-- Task Followers Modal -->
				<div id="task_followers" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add followers to this task</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="input-group m-b-30">
									<input placeholder="Search to add" class="form-control search-input" type="text">
									<span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
								</div>
								<div>
									<ul class="chat-user-list">
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="img/profiles/avatar-16.jpg"></span>
													<div class="media-body media-middle text-nowrap">
														<div class="user-name">Jeffery Lalor</div>
														<span class="designation">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="img/profiles/avatar-08.jpg"></span>
													<div class="media-body media-middle text-nowrap">
														<div class="user-name">Catherine Manseau</div>
														<span class="designation">Android Developer</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="img/profiles/avatar-26.jpg"></span>
													<div class="media-body media-middle text-nowrap">
														<div class="user-name">Wilmer Deluna</div>
														<span class="designation">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Add to Follow</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Task Followers Modal -->


				 <!-- Add Task Modal -->
            <div id="add_task" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                  {{ Form::open(array( 'id' => 'AddTaskForm' ,  'enctype'=>'multipart/form-data')) }}                                  

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Task Title <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="task_title">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Due Date<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text" name="due_date">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-sm-6">
				                        <div class="form-group">
				                           <label>Projects<span class="text-danger">*</span></label>
				                            
				                           <select class="select" name="project_id">
				                             @foreach($projects as $project)
				                         <option  value="{{$project->id}}">{{ucwords($project->project_title)}}</option>
				                              @endforeach
				                          
				                           </select>
				                        </div>
				                     </div>
				                     <div class="col-md-6">
				                       <div class="form-group">
                                <label>Task Priority</label>
                                <select class="form-control select" name="priority">
                                    <option >Select</option>
                                    <option value="1">High</option>
                                    <option value="2">Normal</option>
                                    <option value="3">Low</option>
                                </select>
                            </div>
                        </div>

				                          <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Assign To <span class="text-danger">*</span></label>
                                            <!--<input class="form-control floating" type="email">-->
                                            <div class="dropdown" style="display:flex;">
											    <a href="#" class="followers-add" data-toggle="dropdown" style=" margin-right:10px;"><i class="material-icons">add</i></a>
											    <div class="dropdown-menu">
											      <div>
												<ul class="chat-user-list" id="assign">
									 @foreach($employees as $employee)
                                       @if($employee->role == "employee")
										 <li   id="{{{$employee->id}}}">
                                          
                                             <div class="media">
                                                @if(!empty($employee->profile_image))
                                          <a href="" class="avatar" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}" id="TeamMember">
                                          <img src="{{{$employee->profile_image}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}" >
                                          @else
                                          <div class="symbol symbol-sm-35 symbol-primary m-r-10">
                                          <span class="symbol-label font-size-h3 font-weight-boldest">
                                          {{ mb_substr($employee['name'], 0, 1) }}
                                          </span>
                                          </div>
                                          @endif
                                          </a>
                                          <div class="media-body media-middle text-nowrap">
                                          <div class="user-name">{{$employee->name}}</div>
                                          <span class="designation">{{ucwords($employee->designation_name)}}</span>
                                          </div>
                                          </div>
                                       </li>
										@endif
									 @endforeach
													</ul>
												</div>
										  </div>
										  <div class="d-flex align-items-center">
											    <div class="project-members"  id="assigned-to" >
                                                
												                                    
                                               <div>
					                          	 <span class="all-team" id="total_members">+0</span>
					                          </div>
                                            </div>
                                        </div>		  

                                        </div>
                                    </div>
								</div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Task Description<span class="text-danger">*</span></label>
                                           <textarea class="form-control" placeholder="Description" name="description"></textarea>
                                        </div>
                                    </div>
                                    
                               
		                    </div>
                                
                                <div class="submit-section">
                                    <a class="btn btn-primary submit-btn" onClick="addTask()" >Submit</a>
                                </div>
                           {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Task Modal -->
				
            <div class="col-lg-5 message-view task-chat-view task-right-sidebar sidenav" id="task_window">
							<div class="chat-window">
								<div class="fixed-header">
									<div class="navbar">
										<div class="task-assign">
											<a class="task-complete-btn" id="task_complete" href="javascript:void(0);">
												<i class="material-icons">check</i> Mark Complete
											</a>
										</div>
										<ul class="nav float-right custom-menu">
											<li class="dropdown dropdown-action">
												<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)">Delete Task</a>
													<a class="dropdown-item" href="javascript:void(0)">Settings</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="chat-contents task-chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div class="chats">
													<h4>Task Title</h4>
													<div class="task-header">
														<div class="assignee-info">
															<a href="#" data-toggle="modal" data-target="#assignee">
																<div class="avatar">
																	<img alt="" src="img/profiles/avatar-02.jpg">
																</div>
																<div class="assigned-info">
																	<div class="task-head-title">Assigned To</div>
																	<div class="task-assignee">John Doe</div>
																</div>
															</a>
															<span class="remove-icon">
																<i class="fa fa-close"></i>
															</span>
														</div>
														<div class="task-due-date">
															<a href="#">
																<div class="due-icon">
																	<span>
																		<i class="material-icons">date_range</i>
																	</span>
																</div>
																<div class="due-info">
																	<div class="task-head-title">Due Date</div>
																	<div class="due-date">25 Sept</div>
																</div> 

															<div id="due-date"></div>
																
															</a>
															<span class="remove-icon">
																<i class="fa fa-close"></i>
															</span>
														</div>
														 <div class="dropdown">
															  <div class="assignee-info dropdown-toggle" data-toggle="dropdown">
															  	<div class="assigned-info">
															  	<div class="task-head-title">Status</div>

																	<div class="task-assignee" id="status-current">Assigned</div>
																</div>

																  <span class="caret"></span></button>
																  <ul class="dropdown-menu" id="status">
																
																															   
																  	@foreach($task_status as $task_status)				  	 
																		<li   value="{{$task_status->id}}" >
																		<a href="#" style="color:{{$task_status->task_board_color}}">{{ucwords($task_status->task_board_name)}}</a>
																	    </li>
																	  @endforeach	

																   </ul>
																   
															</div>
														</div>
													</div>
													<hr class="task-line">
													<div class="task-textarea">
															Project : Hospital Management
													</div>

													<div class="task-desc">
														<!--<div class="task-desc-icon">
															<i class="material-icons">subject</i>
														</div> -->
														
														<div class="task-textarea">
															Description
														</div>
													</div>
													<hr class="task-line">
													<div class="task-information">
														<span class="task-info-line"><a class="task-user" href="#">Lesley Grauer</a> <span class="task-info-subject">created task</span></span>
														<div class="task-time">Jan 20, 2019</div>
													</div>
													<div class="task-information">
														<span class="task-info-line"><a class="task-user" href="#">Lesley Grauer</a> <span class="task-info-subject">added to Hospital Administration</span></span>
														<div class="task-time">Jan 20, 2019</div>
													</div>
													<div class="task-information">
														<span class="task-info-line"><a class="task-user" href="#">Lesley Grauer</a> <span class="task-info-subject">assigned to John Doe</span></span>
														<div class="task-time">Jan 20, 2019</div>
													</div>
													<hr class="task-line">
													<div class="task-information">
														<span class="task-info-line"><a class="task-user" href="#">John Doe</a> <span class="task-info-subject">changed the due date to Sep 28</span> </span>
														<div class="task-time">9:09pm</div>
													</div>
													<div class="task-information">
														<span class="task-info-line"><a class="task-user" href="#">John Doe</a> <span class="task-info-subject">assigned to you</span></span>
														<div class="task-time">9:10pm</div>
													</div>
													<div class="chat chat-left">
														<div class="chat-avatar">
															<a href="profile" class="avatar">
																<img alt="" src="img/profiles/avatar-02.jpg">
															</a>
														</div>
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
																	<p>I'm just looking around.</p>
																	<p>Will you tell me something about yourself? </p>
																</div>
															</div>
														</div>
													</div>
													<div class="completed-task-msg"><span class="task-success"><a href="#">John Doe</a> completed this task.</span> <span class="task-time">Today at 9:27am</span></div>
													<div class="chat chat-left">
														<div class="chat-avatar">
															<a href="profile" class="avatar">
																<img alt="" src="img/profiles/avatar-02.jpg">
															</a>
														</div>
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<span class="task-chat-user">John Doe</span> <span class="file-attached">attached 3 files <i class="fa fa-paperclip"></i></span> <span class="chat-time">Feb 17, 2019 at 4:32am</span>
																	<ul class="attach-list">
																		<li><i class="fa fa-file"></i> <a href="#">project_document.avi</a></li>
																		<li><i class="fa fa-file"></i> <a href="#">video_conferencing.psd</a></li>
																		<li><i class="fa fa-file"></i> <a href="#">landing_page.psd</a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
													<div class="chat chat-left">
														<div class="chat-avatar">
															<a href="profile" class="avatar">
																<img alt="" src="img/profiles/avatar-16.jpg">
															</a>
														</div>
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<span class="task-chat-user">Jeffery Lalor</span> <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">Yesterday at 9:16pm</span>
																	<ul class="attach-list">
																		<li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">Document_2016.pdf</a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
													<div class="chat chat-left">
														<div class="chat-avatar">
															<a href="profile" class="avatar">
																<img alt="" src="img/profiles/avatar-16.jpg">
															</a>
														</div>
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<span class="task-chat-user">Jeffery Lalor</span> <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">Today at 12:42pm</span>
																	<ul class="attach-list">
																		<li class="img-file">
																			<div class="attach-img-download"><a href="#">avatar-1.jpg</a></div>
																			<div class="task-attach-img"><img src="img/user.jpg" alt=""></div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
													<div class="task-information">
														<span class="task-info-line">
															<a class="task-user" href="#">John Doe</a>
															<span class="task-info-subject">marked task as incomplete</span>
														</span>
														<div class="task-time">1:16pm</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="chat-footer">
									<div class="message-bar">
										<div class="message-inner">
											<a class="link attach-icon" href="#">
												<span class="btn-file"><input type="file" class="upload"><img  type="file" src="{{asset('img/attachment.png')}}" alt=""></span>
												
											</a>
											<div class="message-area">
												<div class="input-group">
													<textarea class="form-control" placeholder="Type message..."></textarea>
													<span class="input-group-append">
														<button class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
									<div class="project-members task-followers">
										<span class="followers-title">Followers</span>
										<a class="avatar" href="#" data-toggle="tooltip" title="Jeffery Lalor">
											<img alt="" src="img/profiles/avatar-16.jpg">
										</a>
										<a class="avatar" href="#" data-toggle="tooltip" title="Richard Miles">
											<img alt="" src="img/profiles/avatar-09.jpg">
										</a>
										<a class="avatar" href="#" data-toggle="tooltip" title="John Smith">
											<img alt="" src="img/profiles/avatar-10.jpg">
										</a>
										<a class="avatar" href="#" data-toggle="tooltip" title="Mike Litorus">
											<img alt="" src="img/profiles/avatar-05.jpg">
										</a>
										<a href="#" class="followers-add" data-toggle="modal" data-target="#task_followers"><i class="material-icons">add</i></a>
										
									</div>
								</div>
												
										
									
								</div>
								</div>
							</div>
						</div> 





            </div>
			<!-- /Page Wrapper -->
			</div>
		<!-- /Main Wrapper -->

<script>
$(".rotate").click(function(){
 $(this).toggleClass("down")  ; 
})

$(".span-rotate").click(function(){
 $('.fa-chevron-right').toggleClass("down")  ; 
})

</script>

<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>


<script>
function openTask() {
  
  document.getElementById("task_window").style.width = "675px";
  document.getElementById("main").style.marginLeft = "0px";
  
}

function closeNav() {
  document.getElementById("task_window").style.width = "0";
  document.getElementById("main").style.marginLeft= "auto";
}
</script>

<script>
   function search(id){
      var employees = <?php echo json_encode($employees); ?>;
      for (var i=0; i < employees.length; i++) {
         if (employees[i].id == id) {
            return employees[i];
         }
      }
   }
   var total_members = 0 ;
  
   var added_team_members = [];

   $(document).on('click','#assign li', function() {
     
     	 var id = $(this).attr('id');
      if(typeof  added_team_members[id] === 'undefined') 
      {
         var employeeObject = search(id);
         added_team_members[employeeObject.id] = employeeObject;
       //  console.log(added_employees);
         var html = '';
         html +='<a href="#" data-toggle="tooltip" value = "'+id+'"  title="'+employeeObject.name+'"  class="avatar"">'
         html +='<img alt="'+employeeObject.name+ '" src="'  +employeeObject.profile_image+ ' " />'  
         $('#assigned-to').append(html);
         total_members = total_members + 1;
         $('#total_members').html('+'+total_members); 

      }
      else
      {
         var employeeObject = search(id);
         added_team_members[employeeObject.id] = employeeObject;
         toastr['error']( employeeObject.name + " Already Added" );
      }
      
                
      });

      </script>

      <script type="text/javascript">

            function addTask() {
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addtasks' : '#') }}";  
                var form = $('#AddTaskForm').get(0);
                var formData = new FormData(form);
                           
                var team_members = Object.keys(added_team_members);

                console.log(team_members);
                             
               formData.append('team_members', team_members);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response)
                    {
                        if(response.status == "SUCCESS")
                        {
                            toastr['success'](response.message);
                            window.location = "";
                        }
                        else
                        {
                            toastr['error'](response.message);
                        }    
                    }
                    
                }); 
            }

        </script>

        <script>
        	$("#status li").on("click",function() {
                	    			  
                $('#status-current').text($(this).text());
			});

        </script>

        <script>
        	$("#status li").on("click",function() {
              
              $.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
        		
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/updatetaskstatus' : '#') }}";  
              
                var status = $(this).text();
                console.log(status);

                $.ajax({
                    type: "POST",
                    url: url,
                   
                    data: {status:status},
                    
                    success: function(response)
                    {
                        if(response.status == "SUCCESS")
                        {
                            toastr['success'](response.message);
                            window.location = "";
                        }
                        else
                        {
                            toastr['error'](response.message);
                        }    
                    }
                    
                }); 
           
              
			});

        </script>


		@endsection