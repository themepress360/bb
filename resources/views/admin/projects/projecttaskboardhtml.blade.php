
<div class="row board-view-header">
                    <div class="col-4">
                        <div class="pro-teams" style="display:inline-flex">
                            <div class="pro-team-lead">
                                <h4>Lead</h4>
                                <div class="avatar-group">
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image" src="img/profiles/avatar-11.jpg">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image" src="img/profiles/avatar-01.jpg">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image" src="img/profiles/avatar-16.jpg">
                                    </div>
                                    <div class="avatar">
                                        <a href="" class="avatar-title rounded-circle border border-white" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-team-members">
                                <h4>Team</h4>
                                <div class="avatar-group">
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image" src="img/profiles/avatar-02.jpg">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image" src="img/profiles/avatar-09.jpg">
                                    </div>
                                    <div class="avatar">
                                        <img class="avatar-img rounded-circle border border-white" alt="User Image" src="img/profiles/avatar-12.jpg">
                                    </div>
                                    <div class="avatar">
                                        <a href="" class="avatar-title rounded-circle border border-white" data-toggle="modal" data-target="#assign_user"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 text-right">
                        <a href="#" class="btn btn-white float-right ml-2" data-toggle="modal" data-target="#add_task_board"><i class="fa fa-plus"></i> Create List</a>
                        <a href="project-view" class="btn btn-white float-right" title="View Board"><i class="fa fa-link"></i></a>
                    </div>

                    <div class="col-12">
                        <div class="pro-progress" style="display:block">
                            <div class="pro-progress-bar">
                                <h4>Progress</h4>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%"></div>
                                </div>
                                <span>20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="kanban-board card mb-0" style="display:block">
                    <div class="card-body" >
                        <div class="kanban-cont" >
                            
                            @if(!empty($task_boards))
                            @foreach ($task_boards as $task_board)
                           

                            <div class="kanban-list kanban-success drag_parent_{{$task_board['task_board_name']}}">
                              
                                <div class="kanban-header" style="background-color:{{$task_board['task_board_color']}}">
                                <span class="status-title">{{ucwords($task_board['task_board_name'])}}</span>
                                  <div class="dropdown kanban-action">
                                     <a href="" data-toggle="dropdown">
                                     <i class="fa fa-ellipsis-v"></i>
                                     </a>
                                     <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_task_board">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                     </div>
                                  </div>
                               </div>
                                                                                         
                                 
                                   <div class="kanban-wrap connectedSortable">
                                    @if(!empty($task_board['tasks']))
                                @foreach($task_board['tasks'] as $task)
                                      <div class="card panel drag_task_{{$task['id']}}">
                                         <div class="kanban-box">
                                            <div class="task-board-header">
                                               <span class="status-title"><a href="task-view">{{ucwords($task['task_title'])}}</a></span>
                                               <div class="dropdown kanban-task-action">
                                                  <a href="" data-toggle="dropdown">
                                                  <i class="fa fa-angle-down"></i>
                                                  </a>
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_task_modal">Edit</a>
                                                     <a class="dropdown-item" href="#">Delete</a>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="task-board-body">
                                               <div class="kanban-info">
                                                  <div class="progress progress-xs">
                                                     <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                  <span>70%</span>
                                               </div>
                                               <div class="kanban-footer">
                                                  <span class="task-info-cont">
                                                  <span class="task-date"><i class="fa fa-clock-o"></i> {{ !empty($task['due_date']) ? date("M j",strtotime(str_replace('/', '-', $task['due_date']))) : '-' }}</span>
                                                  <span class="task-priority badge bg-inverse-danger">{{ !empty($task['priority']) ?  ucwords($task['priority']) : '-' }}</span>
                                                  </span>
                                                  <span class="task-users">
                                                  @if(!empty($task['assign_to_profile_image_url']))
                                                    <img src="{{ !empty($task['assign_to_profile_image_url']) ?  $task['assign_to_profile_image_url'] : '-' }}" class="task-avatar" width="24" height="24" alt="{{ !empty($task['name']) ?  $task['name'] : '-' }}">
                                                  @endif
                                                  </span>
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                      @endforeach
                                   @endif
                                   </div>
                                
                                   
                               <div class="add-new-task">
                                  <a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal">Add New Task</a>
                               </div>
                            </div>
                            
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>

<script>
$( function() {
    $( ".kanban-wrap" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
} );

$( ".kanban-wrap" ).sortable({
  beforeStop: function( event, ui ) {      
    // console.log($(ui.item).attr('class'));
    // console.log($(ui.item).parent().parent().attr('class').split("drag_parent_")[1]);
    var status = $(ui.item).parent().parent().attr('class').split("drag_parent_")[1];
    var task = $(ui.item).attr('class').split("drag_task_")[1];
    var task_id = task.replace(" ui-sortable-handle", "");
    // console.log(task.replace(" ui-sortable-handle", ""));
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });            
      var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/updatetaskstatus' : '#') }}";            
      $.ajax({
        type: "POST",
        url: url,             
        data: {status:status,task_id:task_id},              
        success: function(response)
        {
          if(response.status == "SUCCESS")
          {
            toastr['success'](response.message);
            //window.location = "";
          }
          else
          {
            toastr['error'](response.message);
          }    
        }                    
      }); 
    }
});
// $( ".kanban-wrap" ).sortable({
//   activate: function( event, ui ) {  
//     console.log(event);
//   console.log($(ui.item).attr('class'));
//   console.log($(ui.item).parent().parent().attr('class'));
// }
// });
</script>