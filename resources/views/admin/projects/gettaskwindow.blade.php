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
				                  <h4>{{ !empty($project['task']['task_title']) ? ucwords($project['task']['task_title']) : '-' }}</h4>
				                  <div class="task-header">
				                     <div class="assignee-info">
				                        <a href="#" data-toggle="modal" data-target="#assignee">
				                           <div class="avatar">
				                              <img alt="{{ !empty($project['task']['assignee_name']) ? ucwords($project['task']['assignee_name']) : '-' }}" src="{{ !empty($project['task']['assignee_profile_image_url']) ? $project['task']['assignee_profile_image_url'] : '-' }}">
				                           </div>
				                           <div class="assigned-info">
				                              <div class="task-head-title">Assignee To</div>
				                              <div class="task-assignee">{{ !empty($project['task']['assignee_name']) ? ucwords($project['task']['assignee_name']) : '-' }}</div>
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
				                              <div class="due-date">{{ !empty($project['task']['due_date']) ? date("M j",strtotime(str_replace('/', '-', $project['task']['due_date']))) : '-' }}</div>
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
				                              @foreach($task_statuses as $task_status)
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
				                     Project : {{ !empty($project['project_title']) ? ucwords($project['project_title']) : '-' }}
				                  </div>
				                  <div class="task-desc">
				                     <!--<div class="task-desc-icon">
				                        <i class="material-icons">subject</i>
				                        </div> -->
				                     <div class="task-textarea">
				                        Description : {{ !empty($project['description']) ? ucwords($project['description']) : '-' }}
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
				               @forelse ($project['task']['followers'] as $follower)
					               <a class="avatar" href="#" data-toggle="tooltip" title="{{ucwords($follower['name'])}}">
					               <img alt="{{ucwords($follower['name'])}}" src="{{$follower['profile_image_url']}}">
					               </a>
				               @empty
				               @endforelse
				               <a href="#" class="followers-add" data-toggle="modal" data-target="#task_followers"><i class="material-icons">add</i></a>
				            </div>
				         </div>
				      </div>
				   </div>
				</div>
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