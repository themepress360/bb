@push('styles')
<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
@endpush	

<div class="chat-window">
	<div class="fixed-header">
		<div class="navbar">
			<div class="task-assign">
				 @if( $task->status == "completed")

				 <a class="task-complete-btn task-completed" id="task_completed" href="javascript:void(0);">
					<i class="material-icons">check</i>Completed
				</a>
				@else
				<a class="task-complete-btn" id="task_completed" href="javascript:void(0);">
					<i class="material-icons">check</i> Mark Complete
				</a>
				@endif				
			</div>
			<!--<ul class="nav float-right custom-menu">
				<li class="dropdown dropdown-action">
				    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
				    <div class="dropdown-menu dropdown-menu-right">
				        <a class="dropdown-item" href="javascript:void(0)">Delete Task</a>
				        <a class="dropdown-item" href="javascript:void(0)">Settings</a>
				    </div>
				</li>
			</ul> -->
			
			<a href="#" class="followers-add"><i class="material-icons" onClick="closeTask()">close</i></a>
			
			
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
				                              @if(!empty($project['task']['assign_to_profile_image_url']))
				                              <img alt="{{ !empty($project['task']['assign_to_name']) ? ucwords($project['task']['assign_to_name']) : '-' }}" src="{{ !empty($project['task']['assign_to_profile_image_url']) ? $project['task']['assign_to_profile_image_url'] : '-' }}">
				                           		@endif
				                           </div>
				                           <div class="assigned-info">
				                              <div class="task-head-title">Assign To </div>
				                              <div class="task-assignee">{{ !empty($project['task']['assign_to_name']) ? ucwords($project['task']['assign_to_name']) : '-' }}</div>
				                           </div>
				                        </a>
				                        <span class="remove-icon">
				                        <i class="fa fa-close"></i>
				                        </span>
				                     </div>
				                    
				                    <div class="dropdown" id="updateduedate" >
				                     <div class="task-due-date" data-toggle="" id="date-picker">
				                       <a href="#">
				                           <div class="due-icon">
				                              <span>
				                              <i class="material-icons">date_range</i>
				                              </span>
				                           </div>
				                           <div class="due-info" >
				                              <div class="task-head-title due-date-title">Due Date</div>
				                              <div class="due-date" id="due-date" style="">{{ !empty($project['task']['due_date']) ? date("M j",strtotime(str_replace('/', '-', $project['task']['due_date']))) : '-' }}</div>
	 <input type="text" name='due_date' class="form-control datetimepicker" id="datepicker" style="display:none;" 
	 value ="">
				                           </div>
				                            
				                           <div ></div>
				                        </a>
				                       
				                     </div>
				                 </div>
				            


				                     <div class="dropdown">
				                        <div class="assignee-info dropdown-toggle" data-toggle="dropdown">
				                           <div class="assigned-info">
				                              <div class="task-head-title">Status</div>
				                              <div class="task-assignee" id="status-current" style="color:{{$task_status_color->task_board_color}}">{{ !empty($project['task']['status']) ? ucwords($project['task']['status']) : '-' }}</div>
				                           </div>
				                           <span class="caret"></span>
				                           <ul class="dropdown-menu" id="status">
				                              @foreach($task_statuses as $task_status)
				                              <li   value="{{$task_status->id}}" >
				                                 <a href="#" class="dropdown-item" style="color:{{$task_status->task_board_color}}">{{ucwords($task_status->task_board_name)}}</a>
				                              </li>
				                              @endforeach
				                           </ul>
				                        </div>
				                     </div>
				                     
				                  </div>
				                  <hr class="task-line">
				                  <div class="task-textarea">
				                     Project : {{ !empty($project['project_title']) ? ucwords($project['project_title']) : '-' }}</span>
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
				                  @if($project['task']['task_histories'])
				                  	@foreach($project['task']['task_histories'] as $history_key => $history)
				                  		@if($history['type'] == "create_task" || $history['type'] == "due_date" || $history['type'] == "assign_task" || $history['type'] == "added_user" || $history['type'] == "incomplete_task" || $history['type'] == "change_task" )
				                  			<div class="task-information">
				                     			<span class="task-info-line"><a class="task-user" href="#">{{ !empty($history['description']) ? $history['description'] : '-' }}</a></span>
				                     			<div class="task-time">{{ !empty($history['created_at']) ? date("M d, Y",strtotime($history['created_at'])) : '-' }}</div>
				                  			</div>		
				                  		@elseif( $history['type'] == "complete_status")
				                  			<div class="completed-task-msg">
				                  				<span class="task-success"><a href="#">{{ !empty($history['description']) ? $history['description'] : '-' }}</a></span> <span class="task-time">{{ !empty($history['created_at']) ? date("M d, Y",strtotime($history['created_at'])) : '-' }}</span>
				                  			</div>
				                  		@elseif($history['type'] == "comment")
				                  			<div class="chat chat-left">
				                     			<div class="chat-avatar">
				                        			<a href="profile" class="avatar">
				                        				<img alt="{{ !empty($history['name']) ? $history['name'] : '-' }}" src="{{ !empty($history['profile_image_url']) ? $history['profile_image_url'] : '-' }}">
				                        			</a>
				                     			</div>
				                     			<div class="chat-body">
				                        			<div class="chat-bubble">
				                           				<div class="chat-content">
				                              				<span class="task-chat-user">{{ !empty($history['name']) ? $history['name'] : '-' }} </span><span class="chat-time">{{ !empty($history['created_at']) ? date("M d, Y",strtotime($history['created_at'])) : '-' }}</span>
				                              				<p>{{ !empty($history['description']) ? $history['description'] : '-' }}</p>
				                           				</div>
				                        			</div>
				                     			</div>
				                  			</div>
				                  		@elseif($history['type'] == "attachment")
				                  			<div class="chat chat-left">
				                     			<div class="chat-avatar">
				                        			<a href="profile" class="avatar">
				                        				<img alt="{{ !empty($history['name']) ? $history['name'] : '-' }}" src="{{ !empty($history['profile_image_url']) ? $history['profile_image_url'] : '-' }}">
				                        			</a>
				                     			</div>
				                     			<div class="chat-body">
				                        			<div class="chat-bubble">
				                           				<div class="chat-content">
				                              				<span class="task-chat-user">{{ !empty($history['name']) ? $history['name'] : '-' }}</span> 
				                              				<span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">{{ !empty($history['created_at']) ? date("M d, Y",strtotime($history['created_at'])) : '-' }}</span>
				                              				<p>{{ !empty($history['description']) ? $history['description'] : '-' }}</p>
				                              				<ul class="attach-list">
				                                 				<li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">{{ !empty($history['attachment_name']) ? $history['attachment_name'] : '-' }}</a></li>
				                              				</ul>
				                           				</div>
				                        			</div>
				                     			</div>
				                  			</div>			
				                  		@endif		
				                  	@endforeach	
				                  @endif
				                  <div id="comment_append">
				                  </div>
				               </div>
				            </div>
				         </div>
				      </div>
				   </div>
				   <div class="chat-footer">
				      <div class="message-bar">
				         <form id="GetAddTaskHistoryForm" style="display: contents;">
					         <div class="message-inner">
					            <a class="link attach-icon" href="#">
			<span class="btn-file">
				<input type="file" class="upload" name="attachment" id="attachment" >
				<img  type="file" src="{{asset('img/attachment.png')}}" alt=""></span>
					            </a>
					            <div class="message-area">
					               <div class="input-group">
					                  <textarea class="form-control" id="description" placeholder="Type message..." name="description"></textarea>
					                  <span class="input-group-append">
					                  <a href="#" onClick="AddTaskHistory()" class="btn btn-primary" ><i class="fa fa-send"></i></a>
					                  </span>
					               </div>
					            </div>
					         </div>
					    </form>
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
				      <div id="preview" class="file-preview" style="display:none">
				     	<div id="display-images">
				     	</div>
				     	 <a href="#" class="followers-add"><i class="material-icons" onclick="deleteImage()">close</i></a>
				      </div>
				   </div>
				</div>

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
									<div class="add_follower d-flex" id="add_followers" style="width: max-content;">
				
									<input placeholder="Add Follower" type="hidden" name="add_followers">
								</div>
									<!--<span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span> -->
								</div>
								
								<div>
									<ul class="chat-user-list" id="followers">
										@if($project['members'])
										<form id="GetAddFollowerForm">
											
										</form>
										@foreach($project['members'] as $key => $member)
										<li>
											<!-- {{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$member['id'] : '#') }} -->
											<a href="" onclick="return false;">
												<div class="media">
													<span class="avatar"><img alt="" src="{{!empty($member['profile_image_url']) ? $member['profile_image_url'] : '-'}}"></span>
													<div class="media-body media-middle text-nowrap">
														<input type="hidden" name="user_id" class="f-id" value="{{!empty($member['id']) ? $member['id'] : '-'}}">
														<div class="user-name f-name">{{!empty($member['name']) ? ucwords($member['name']) : '-'}}</div>
														<span class="designation">{{!empty($member['designation_name']) ? ucwords($member['designation_name']) : '-'}}</span>
													</div>
												</div>
											</a>
										</li>
										@endforeach
										@endif
									</ul>
								</div>
								<div class="submit-section">
									<a href="#" onClick="AddFollowers()" class="btn btn-success submit-btn">Add to Follow</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Task Followers Modal -->

  @push('scripts')

<!-- Bootstrap Core JS -->
        <script src="{{asset('js/popper.min.js')}}" type='application/javascript'></script>
        <script src="{{asset('js/bootstrap.min.js')}}" type='application/javascript'></script>
		
		<script src="{{asset('js/jquery-ui.min.js')}}" type='application/javascript'></script>
		<script src="{{asset('js/jquery.ui.touch-punch.min.js')}}" type='application/javascript'></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{asset('js/moment.min.js')}}" type='application/javascript'></script>
		<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}" type='application/javascript'></script>

		
@endpush

<script type="text/javascript">
    $(document).ready(function () {


        $("#task_followers").appendTo("body");


        });
</script>

<script>
	
$('#task_followers').insertAfter($('body'));

</script>

<script type="text/javascript">
    $(document).ready(function () {


        $("#task_followers").appendTo("body");


        });
</script>

<script>

function closeTask() {
	//console.log('Clicked 123')
  $("#task_window").removeClass("left-task-window");
  $("#main").removeClass("all-task-list");
 // $("#task_window").addClass("closeTask");
  
}	

</script>



<script>
		


	var added_followers = [];
	$('#followers li').on('click', function(){
		var follower =  $(this).find("div.f-name").text();
		var id = $(this).find("input.f-id").val();
		if(typeof  added_followers[id] === 'undefined') 
      	{
        	added_followers[id] = id;
        	// console.log(added_followers);
        	// console.log("-----------------");
			$('#add_followers').append('<span id="name" align="center" class="follower-tag">' + follower + '<i class="fa fa-close" id="close" aria-hidden="true"><input class="remove-id" type="hidden" value="'+id+'" id="remove_'+id+'"></i></span>');
		}
		else
      	{
        	toastr['error']( follower + " Already Added" );
      	}
	});
	
	$(document).on('click', '#close', function(){
		$(this).closest('#name').remove();
		var id = $(this).find("input.remove-id").val();
		const index = added_followers.indexOf(added_followers[id]);
		if (index > -1) {
  			added_followers.splice(index, 1);
  			// console.log("+++++++++++++");
  			// console.log(added_followers);
		}
	});
</script>
			 <script>
        	$("#status li").on("click",function() {
                $('#status-current').text($(this).text());
                          var color =  $(this).children('a').attr('style');
             			  console.log(color);
  	                $('#status-current').attr('style',color);
           
           });
       	
        </script>

			

        <script>
        	var task_id = "{{$project['task']['id']}}";
        
        	$("#task_completed").on('click',function(e){

        		
        		var txt = $(this).text();
        		
        		var task_status = txt.replace("check", "");
        		
        		var task_status = task_status.trim();

        		
        		if (task_status === "Mark Complete"){

        			console.log("Task Not Complete");

        		var status ="completed";

        		 e.preventDefault();

			//console.log(task_id);             
            $.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
        		
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/completetask' : '#') }}";  
              
               // var status = $(this).text();
               // console.log(status);

                $.ajax({
                    type: "POST",
                    async: false,
                    url: url,
                   
                    data: {status:status,task_id:task_id},
                    
                    success: function(response)
                    {
                        if(response.status == "SUCCESS")
                        {
                            toastr['success'](response.message);
                            var html = '';
           					 html +='<i class="material-icons">check</i>'
                            var comp_status = status.charAt(0).toUpperCase() + status.slice(1)
                            $('#status-current').text(comp_status);

                            $('#status-current').attr('style','color:#35ba67');
                           // $("#task_complete").addClass("task-complete-btn");
                            $("#task_completed").addClass("task-completed");
                            $("#task_completed").html('<i class="material-icons">check</i>Completed');
                            
                            
                            }
                        else
                        {
                            toastr['error'](response.message);
                        }    
                    }
                    
                }); 

            }else {

            	toastr['error']("Task Already Completed");
            }


        		}) 
        

        		
        	


        	$("#status li").on("click",function(e) {
		      
		      e.preventDefault();

			//console.log(task_id);             
            $.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
        		
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/updatetaskstatus' : '#') }}";  
              
                var status = $(this).text().trim();
                
                //var status = status;

                
                $.ajax({
                    type: "POST",
                    async: false,
                    url: url,
                   
                    data: {status:status,task_id:task_id},
                    
                    success: function(response)
                    {
                        if(response.status == "SUCCESS")
                        {
                            toastr['success'](response.message);
                            $('#status-current').text(status);
                            //window.location = "";
                            console.log(status);
                            if(status === "Completed"){

                           	    $("#task_completed").addClass("task-completed");
                     			$("#task_completed").html('<i class="material-icons">check</i>Completed');
                     			console.log(status);
                            }else{

	                            $("#task_completed").removeClass("task-completed");
	                            $("#task_completed").html('<i class="material-icons">check</i>Mark Complete');                    
	                           
	                            	console.log(status);
	                            }
                            }
                        else
                        {
                            toastr['error'](response.message);
                        }    
                    }
                    
                }); 
             
           			
			});

        </script>


         


      
<script type="text/javascript">
	function AddTaskHistory()
	{
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$("#task_id_history").remove();
  		var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addtaskhistory' : '#') }}";  
    	var input = $("<input id='task_id_history' type=\"hidden\" name=\"task_id\" value=\""+task_id+"\"/>");
    	//var added_followers = Object.keys(added_followers);                     
        
    	$("#GetAddTaskHistoryForm").append(input);
    	var form = $('#GetAddTaskHistoryForm').get(0);
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

	            	$("#description").val('');
	            	if(response.data.comment.type == "comment")
	            	{
	            		$('#comment_append').append('<div class="chat chat-left"><div class="chat-avatar"><a href="profile" class="avatar"><img alt="" src="'+response.data.comment.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><span class="task-chat-user">'+response.data.comment.name+'</span><span class="chat-time"> Just now</span><p>'+response.data.comment.description+'</p></div></div></div></div>');
	            	}
	            	else if(response.data.comment.type == "attachment")
	            	{
	            		$("#attachment").val(null);
	            		$('#comment_append').append('<div class="chat chat-left"><div class="chat-avatar"><a href="profile" class="avatar"><img alt="'+response.data.comment.name+'" src="'+response.data.comment.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><span class="task-chat-user">'+response.data.comment.name+'</span> <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">Just now</span><p>'+response.data.comment.description+'</p><ul class="attach-list"><li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">'+response.data.comment.attachment_name+'</a></li></ul></div></div></div></div>');
	            	}
	            	toastr['success'](response.message);
                    // window.location = "";
	            }
	            else
	            {
	                toastr['error'](response.message);
	            }    
	        }            
	    }); 
	}

	function AddFollowers()
	{
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$("#GetAddFollowerForm").html('');
  		var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addfollowers' : '#') }}";  
    	var input = $("<input type=\"hidden\" name=\"task_id\" value=\""+task_id+"\"/>");
    	//var added_followers = Object.keys(added_followers);                     
        
    	$("#GetAddFollowerForm").append(input);
    	var form = $('#GetAddFollowerForm').get(0);
    	var formData = new FormData(form);	
    	var follows = Object.keys(added_followers);
	    formData.append('followers', follows);
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
		// alert("here");
	}
</script>


<script>
	
$("#updateduedate").on("click",function() {


  //console.log("Date Picker Clicked")
$('.due-date-title').attr('style','display:none');
$("#due-date").attr('style','display:none');

$('#datepicker').attr('style','display:block;width:125px;height:30px;color:red;font-size:13px');

$('#datepicker').datetimepicker({

	format: 'DD/MM/YYYY', debug:true,
	
});

//selectedDate = $("#datepicker").data().date;
//console.log(selectedDate);


//var selectedDate1 = $(".datepicker").find(".active").data("day");
//console.log(selectedDate1)

});

//    $('#datepicker').html('');

$('.datetimepicker').on("dp.show",function(){

$("td.day").on("click", function(){

//var due_date = e.date.format('DD/MM/YYYY');
var date = $(this).attr("data-day");
//date = format('DD/MM/YYYY', Something);

 var due_date = moment(date, "MM/DD/YYYY").format("DD/MM/YYYY");

console.log(due_date);

$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
        		
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/updatetaskduedate' : '#') }}";  
              
               // var status = $(this).text();
               // console.log(status);

                $.ajax({
                    type: "POST",
                    async: false,
                    url: url,
                   
                    data: {due_date:due_date, task_id:task_id},
                    
                    success: function(response)
                    {
                        if(response.status == "SUCCESS")
                        {
                            toastr['success'](response.message);
                            //$('#status-current').text(status);
                            //window.location = "";
                            $('.due-date-title').attr('style','display:block');
							$("#due-date").attr('style','display:block');
							$('#datepicker').attr('style','display:none;width:125px;height:25px;color:red');
						    
						    //console.log(d);

							var changed_date = moment(date, "MM/DD/YYYY").format("MMM D");
						   // console.log(new_date);

						   $('#due-date').text(changed_date);

						     

                            }
                        else
                        {
                            toastr['error'](response.message);
                        }    
                    }
                    
                }); 



});

});

</script>

<!--<script>
   $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

    	$('#preview').attr('style','display:flex');

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<li style="display:inline-block;"><img width="25px" height="25px" style="margin:5px"><i class="fa fa-close" id="remove_file" aria-hidden="true"></i><li>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#attachment').on('change', function() {
        imagesPreview(this, '#display-images');
    });
});
</script> -->

<script>
	$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        $('#preview').attr('style','display:flex');

          var filename = input.files[0].name;
          console.log(filename);
          var data = $('#description').val();
          console.log(data);
          if( filename != data){

         $("#description").text(data+filename+'\n');

         }


        if (input.files) {
            var filesAmount = input.files.length;
              for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img style="width:30px;height:30px;margin-right:5px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#attachment').on('change', function() {
        imagesPreview(this, '#display-images');

      
    });
});
</script>
<script>

	$("#remove_file").on('click', function() {

		$(this).remove();

	});
</script>
