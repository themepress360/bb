@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
				
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">{{strtoUpper($project->project_title)}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Project</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#edit_project"><i class="fa fa-plus"></i> Edit Project</a>
								<a href="task-board" class="btn btn-white float-right m-r-10" data-toggle="tooltip" title="Task Board"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="project-title">
										<h5 class="card-title">{{ucwords($project->project_title)}}</h5>
										<small class="block text-ellipsis m-b-15"><span class="text-xs">2</span> <span class="text-muted">open tasks, </span><span class="text-xs">5</span> <span class="text-muted">tasks completed</span></small>
									</div>
									<p>{{$project->description}} </p>
								</div>
							</div>
							
							<div class="card">
								<div class="card-body">
									<h5 class="card-title m-b-20">Uploaded files</h5>
									<ul class="files-list">
										<li>
											<div class="files-cont">
												<div class="file-type">
													<span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
												</div>
												<div class="files-info">
													<span class="file-name text-ellipsis"><a href="#">AHA Selfcare Mobile Application Test-Cases.xls</a></span>
													<span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 31st at 6:53 PM</span>
													<div class="file-size">Size: 14.8Mb</div>
												</div>
												<ul class="files-action">
													<li class="dropdown dropdown-action">
														<a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="javascript:void(0)">Download</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
															<a class="dropdown-item" href="javascript:void(0)">Delete</a>
														</div>
													</li>
												</ul>
											</div>
										</li>
										<li>
											<div class="files-cont">
												<div class="file-type">
													<span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
												</div>
												<div class="files-info">
													<span class="file-name text-ellipsis"><a href="#">AHA Selfcare Mobile Application Test-Cases.xls</a></span>
													<span class="file-author"><a href="#">Richard Miles</a></span> <span class="file-date">May 31st at 6:53 PM</span>
													<div class="file-size">Size: 14.8Mb</div>
												</div>
												<ul class="files-action">
													<li class="dropdown dropdown-action">
														<a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="javascript:void(0)">Download</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
															<a class="dropdown-item" href="javascript:void(0)">Delete</a>
														</div>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="project-task">
								<ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
									<li class="nav-item"><a class="nav-link active" href="#all_tasks" data-toggle="tab" aria-expanded="true">All Tasks</a></li>
									<li class="nav-item"><a class="nav-link" href="#pending_tasks" data-toggle="tab" aria-expanded="false">Pending Tasks</a></li>
									<li class="nav-item"><a class="nav-link" href="#completed_tasks" data-toggle="tab" aria-expanded="false">Completed Tasks</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane show active" id="all_tasks">
										<div class="task-wrapper">
											<div class="task-list-container">
												<div class="task-list-body">
													<ul id="task-list">
														<li class="task">
															<div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
																<span class="task-label" contenteditable="true">Patient appointment booking</span>
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
														<li class="task">
															<div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
																<span class="task-label" contenteditable="true">Appointment booking with payment gateway</span>
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
														<li class="completed task">
															<div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
																<span class="task-label">Doctor available module</span>
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
														<li class="task">
															<div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
																<span class="task-label" contenteditable="true">Patient and Doctor video conferencing</span>
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
														<li class="task">
															<div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
																<span class="task-label" contenteditable="true">Private chat module</span>
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
														<li class="task">
															<div class="task-container">
																<span class="task-action-btn task-check">
																	<span class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
																<span class="task-label" contenteditable="true">Patient Profile add</span>
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
									<div class="tab-pane" id="pending_tasks"></div>
									<div class="tab-pane" id="completed_tasks"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-xl-3">
							<div class="card">
								<div class="card-body">
									<h6 class="card-title m-b-15">Project details</h6>
									<table class="table table-striped table-border">
										<tbody>
											<!--<tr>
												<td>Cost:</td>
												<td class="text-right">$1200</td>
											</tr>
											<tr>
												<td>Total Hours:</td>
												<td class="text-right">100 Hours</td>
											</tr> -->
											<tr>
												<td>Start Date:</td>
												<td class="text-right">{{date("j M, y",strtotime(str_replace('/', '-', $project->start_date))) }}</td>
											</tr>
											<tr>
												<td>Deadline:</td>
												<td class="text-right">{{date("j M, y",strtotime(str_replace('/', '-', $project->end_date)))}}</td>
											</tr>
											<tr>
												<td>Priority:</td>
												<td class="text-right">
													<div class="btn-group">
														<a href="#" class="badge badge-danger dropdown-toggle" data-toggle="dropdown">{{ucwords($project->priority)}} </a>
														<!--<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a>
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a>
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a>
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a> -->
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>Created by:</td>
												@if($created_by->id != '1')
												<td class="text-right"><a href="employee-profile/{{$created_by->id}}">{{$created_by->name}}</a></td>
												@else
												<td class="text-right"><a href="{{url('/admin/profile')}}">{{$created_by->name}}</a></td>
												@endif
											</tr>
											<tr>
												<td>Status:</td>
												@if($project->status == '1')
												<td class="text-right">Open</td>
												@else
												<td class="text-right">Closed</td>
												@endif
											</tr>
										</tbody>
									</table>
									<p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
									<div class="progress progress-xs mb-0">
										<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
									</div>
								</div>
							</div>
							<div class="card project-user">
								<div class="card-body">
									<h6 class="card-title m-b-20">Assigned Leader <button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i> Add</button></h6>
									<ul class="list-box">
										@foreach($project_leaders as $leaders)
										<li>
											<a href="profile">
												<div class="list-item">
													<div class="list-left">
														 @if(!empty($leaders->profile_image))
                        								  @if( $leaders->profile_image != asset('/storage/profile_images/noimage.png'))
														<span class="avatar"><img alt="" src="{{$leaders->profile_image}}"></span>
														@else
								                          <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{isset($leaders->user_name) ? ucwords($leaders->user_name) : '-'}}">
								                         <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
								                         {{ mb_substr($leaders['user_name'], 0, 1) }}
								                         </span>
								                         </div>
								                         @endif
								                          @else
                      <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{ucwords($leaders->user_name)}}">
                      <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
                      {{ mb_substr($leaders['user_name'], 0, 1) }} </span>
                       </div>
                     @endif 
													</div>
												<div class="list-body">
													  <span class="message-author">{{$leaders->user_name}}</span>
														<div class="clearfix"></div>
														<span class="message-content">{{ucwords($leaders->designation)}}</span>
														
													</div>
												</div>
											</a>
										</li>
										@endforeach										
									</ul>
								</div>
							</div>
							<div class="card project-user">
								<div class="card-body">
									<h6 class="card-title m-b-20">
										Assigned users 
										<button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_user"><i class="fa fa-plus"></i> Add</button>
									</h6>
									<ul class="list-box">
										@foreach($project_members as $members)
										<li>
											<a href="profile">
												<div class="list-item">
													<div class="list-left">
													@if(!empty($leaders->profile_image))
                        								  @if( $leaders->profile_image != asset('/storage/profile_images/noimage.png'))
														<span class="avatar"><img alt="" src="{{$members->profile_image}}"></span>
														@else
								                          <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{isset($members->user_name) ? ucwords($members->user_name) : '-'}}">
								                         <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
								                         {{ mb_substr($members['user_name'], 0, 1) }}
								                         </span>
								                         </div>
								                         @endif
								                          @else
                      <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{ucwords($members->user_name)}}">
                      <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
                      {{ mb_substr($members['user_name'], 0, 1) }} </span>
                       </div>
                     @endif 
													</div>
													<div class="list-body">
														<span class="message-author">{{$members->user_name}}</span>
														<div class="clearfix"></div>
														<span class="message-content">{{ucwords($members->designation)}}</span>
													</div>
												</div>
											</a>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Assign Leader Modal -->
				<div id="assign_leader" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Assign Leader to this project</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="input-group m-b-30">
									<input placeholder="Search to add a leader" class="form-control search-input" type="text">
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
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Assign Leader Modal -->
				
				<!-- Assign User Modal -->
				<div id="assign_user" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Assign the user to this project</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="input-group m-b-30">
									<input placeholder="Search a user to assign" class="form-control search-input" type="text">
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
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Assign User Modal -->
				
				<!-- Edit Project Modal -->
				<div id="edit_project" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Project</h5>
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
												<input class="form-control" value="Project Management" type="text">
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
												<input placeholder="$50" class="form-control" value="$5000" type="text">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>&nbsp;</label>
												<select class="select">
													<option>Hourly</option>
													<option selected>Fixed</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Priority</label>
												<select class="select">
													<option selected>High</option>
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
										<textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
									</div>
									<div class="form-group">
										<label>Upload Files</label>
										<input class="form-control" type="file">
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Project Modal -->
				
            </div>
	   <script src="{{asset('js/name-letter.js')}}" type='application/javascript'></script>		<!-- /Page Wrapper -->
@endsection