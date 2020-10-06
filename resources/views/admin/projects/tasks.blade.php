@extends('layout.mainlayout')
@section('content')
    
<!-- Sidebar -->
<!--<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<ul>
					
							<li> 
								<a href="{{url('/admin/dashboard')}}"><i class="la la-home"></i> <span>Back to Home</span></a>
							</li>
							<a href="#" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i></a>
							</li>
								@foreach($projects as $project)
							<li class="menu-title" value="{{$project->id}}">{{ucwords($project->project_title)}}

							@endforeach
						</ul>
					</div>
                </div>
            </div> -->
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
				<div class="chat-main-row">
					<div id= "main" class="task-main-wrapper">
						<div class="col-lg-7 message-view task-view task-left-sidebar">
							<div class="task-window" style="">
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
										<div class="chat-wrap-inner scrollbars">
											<div class="chat-box">
							
								<div class="dropdown task-wrapper">	
									 <form id="GetTaskWindowForm">
																		
									</form>
																
									@foreach($projects as $project)	
									
				<a href="#" class="dropdown-btn" style="display:block;" value="{{$project->id}}"><span  class="span-rotate">{{ucwords($project->project_title)}} <i id="arrow" class="fa fa fa-chevron-down rotate m-l-10"></i></span> </a>
									 

									  <div class="dropdown-container">
												<div class="task-wrapper" >
													<div class="task-list-container">
														<div class="task-list-body">
      		     											 <ul id="task-list">
      		     											 		
      		     											 	 @foreach($tasks as $index => $task)								 
																@if($task->project_id == $project->id)
														<li class="task"  value="{{$task->id}}" onClick="openTask('{{$task->id}}')">
																	<div class="task-container">
																		<span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																		</span>
										<span class="task-label" contenteditable="true">{{$task->task_title}} </span>
						
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
						<input placeholder="Add Followers" class="form-control search-input" type="text">
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
								<div class="m-b-30 tag-control tag-input scrollbars">
									<div class="add_follower d-flex " id="add_followers">
				
				<input placeholder="Add Follower" type="hidden" name="add_followers">
								</div>
									<!--<span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span> -->
								</div>
								<div>
									<ul class="chat-user-list" id="followers">
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="img/profiles/avatar-16.jpg"></span>
													<div class="media-body media-middle text-nowrap">
														<div class="user-name f-name">Jeffery Lalor</div>
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
														<div class="user-name f-name">Catherine Manseau</div>
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
														<div class="user-name f-name">Wilmer Deluna</div>
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
                                    <option value="high">High</option>
                                    <option value="normal">Normal</option>
                                    <option value="low">Low</option>
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
                                    <a href="#" class="btn btn-primary submit-btn" onClick="addTask()" >Submit</a>
                                </div>
                           {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Task Modal -->
				
            <div class="col-lg-5 message-view task-chat-view task-right-sidebar sidenav" id="task_window">

							
			</div> 

							
			</div> 






            </div>
			<!-- /Page Wrapper -->
			</div>
		<!-- /Main Wrapper -->


<script>

	$('#followers li').on('click', function(){

		var follower =  $(this).find("div.f-name").text();

$('#add_followers').append('<span id="name" align="center" class="follower-tag">' + follower + '<i class="fa fa-close" id="close" aria-hidden="true"></i></span>');

	//	$('#add_followers').val(follower);

		console.log(follower);

	});
</script>

<script>

	$(document).on('click', '#close', function(){

		 $(this).closest('#name').remove();

	});
</script>

<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  $(this).find('#arrow').toggleClass('down');
    var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "none") {
  dropdownContent.style.display = "block";
  $('#arrow').removeClass("down");

  } else {
  dropdownContent.style.display = "none";
    
  }
  


  });
}

</script>









<script>
function openTask(task_id) {
	
	//$("#datepicker").datepicker('destroy');
	//$("#datepicker").datepicker('update');

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#GetTaskWindowForm").html('');
  	var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/gettaskwindow' : '#') }}";  
    var input = $("<input type=\"hidden\" name=\"task_id\" value=\""+task_id+"\"/>");
    $("#GetTaskWindowForm").append(input);
    var form = $('#GetTaskWindowForm').get(0);
    var formData = new FormData(form);
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
            	$("#task_window").html('');
            	$("#task_window").append(response.data.gettaskwindowhtml);
            	$("#task_window").addClass("left-task-window");
            	$("#main").addClass("all-task-list");
  				
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
     	added_team_members = [];
     	total_members = 0 ;
    	var id = $(this).attr('id');
      	if(typeof  added_team_members[id] === 'undefined') 
      	{
      		$('#assigned-to').html('');
        	var employeeObject = search(id);
        	added_team_members[employeeObject.id] = employeeObject;
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
          



@endsection


                                                
