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
                            <h3 class="page-title">Projects</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create Project</a>
                            <div class="view-icons">
                                <a href="projects" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                <a href="project-list" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Project Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3"> 
                        <div class="form-group form-focus select-focus">
                            <select class="select floating"> 
                                <option>Select Roll</option>
                                <option>Web Developer</option>
                                <option>Web Designer</option>
                                <option>Android Developer</option>
                                <option>Ios Developer</option>
                            </select>
                            <label class="focus-label">Role</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <a href="#" class="btn btn-success btn-block"> Search </a>  
                    </div>     
                </div>
                <!-- /Search Filter -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Project Id</th>
                                        <th>Leader</th>
                                        <th>Team</th>
                                        <th>Deadline</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <a href="project-view">{{ucwords($project->project_title)}}</a>
                                        </td>
                                        <td>PRO-{{sprintf("%04d",$project->id)}}</td>
                                        <td>

                                             

                                            <ul class="team-members">
                               @foreach($employees as $employee)
                        @if($employee->id  == $project->user_id)

                                                <li>
                @if(!empty($employee->profile_image))
                @if( $employee->profile_image != asset('/storage/profile_images/noimage.png'))
                 <a href="#" data-toggle="tooltip" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                    <img alt="" src="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                    <img src="{{{$employee->profile_image}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}"></a>
                             @else
                               <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                                             <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
                                                {{ mb_substr($employee['name'], 0, 1) }}
                                                    
                                             </span>
                                            </div>
                                             @endif
                                            @else
                                            <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                                             <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
                                                {{ mb_substr($employee['name'], 0, 1) }}
                                                    
                                             </span>
                                            </div>                  
                                                </li>
                                                @endif
                                          @endif
                                        @endforeach
                                            </ul>
                                             
                                        </td>
                                        <td>
                                            <ul class="team-members text-nowrap">
                                               @foreach($project_members as $key => $members)
                      @if($members['project_id'] == $project->project_id) 
                      
                        @foreach($employees as $employee)
                        @if($employee->id  == $members['user_id'])   
                                                <li>
             @if(!empty($employee->profile_image))
                @if( $employee->profile_image != asset('/storage/profile_images/noimage.png'))
                    <a href="#" data-toggle="tooltip" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                        <img alt="" src="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                           <img src="{{{$employee->profile_image}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                       </a> @else
                               <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                                             <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
                                                {{ mb_substr($employee['name'], 0, 1) }}
                                                    
                                             </span>
                                            </div>
                                             @endif
                                            @else
                                            <div class="symbol symbol-sm-35 m-r-10" id="name-character" data-toggle="tooltip" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                                             <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
                                                {{ mb_substr($employee['name'], 0, 1) }}
                                                    
                                             </span>
                                            </div>  
                                               @endif
                                         
                                                </li>
                                                @endif
                                       @endforeach

                         @endif
                     @endforeach
                                      
                                            </ul>
                                        </td>
                                        <td class="text-danger">{{date("j M, y",strtotime(str_replace('/', '-',$project->end_date)))}}</td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                               @if($project->status == "1")
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
                                                @else
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                @endif
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
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
             {{ Form::open(array( 'id' => 'AddProjectForm' ,  'enctype'=>'multipart/form-data')) }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Project Name<span class="text-danger">*</span></label>
                           <input class="form-control" name="project_title" type="text">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Client<span class="text-danger">*</span></label>
                           <select class="select" name="clients">
                              @foreach($clients as $client)
                              <option  value="{{$client->user_id}}">{{$client->company_name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Start Date<span class="text-danger">*</span></label>
                           <div class="cal-icon">
                              <input class="form-control datetimepicker" name="start_date" type="text">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>End Date<span class="text-danger">*</span></label>
                           <div class="cal-icon">
                              <input class="form-control datetimepicker" name="end_date" type="text">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Priority<span class="text-danger">*</span></label>
                           <select class="select" name="priority">
                              <option value="high">High</option>
                                    <option value="normal">Normal</option>
                                    <option value="low">Low</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Department<span class="text-danger">*</span></label>
                           <select class="select" name="department">
                              @foreach($departments as $department)
                              <option value="{{$department->id}}">{{strtoupper($department->name)}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Add Project Leader<span class="text-danger">*</span></label>
                           <!--<input class="form-control" type="text"> -->
                           <div class="dropdown">
                              <a href="#" class="followers-add" data-toggle="dropdown"><i class="material-icons">add</i></a>
                              <div class="dropdown-menu">
                                 <div>
                                    <ul class="chat-user-list" id="team-leader" >
                                      @foreach($employees as $employee)
                                       @if($employee->role == "team lead")
                                       <li id="{{{$employee->id}}}">
                                          <a href="#">
                                             <div class="media">
                                                @if(!empty($employee->profile_image))
                                                   @if( $employee->profile_image != asset('/storage/profile_images/noimage.png'))
                                          <a href="" class="avatar" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                                          <img src="{{{$employee->profile_image}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                                          @else
                                          <div class="symbol symbol-sm-35 symbol-primary m-r-10" id="name-character">
                                          <span class="symbol-label font-size-h3 font-weight-boldest">
                                          {{ mb_substr($employee['name'], 0, 1) }}
                                          </span>
                                          </div>
                                          @endif
                                          @endif
                                          </a>
                                          <!--<span class="avatar"><img alt="" src="img/profiles/avatar-16.jpg"></span> -->
                                          <div class="media-body media-middle text-nowrap">
                                          <div class="user-name">{{ $employee->name }}</div>
                                          <span class="designation">{{ucwords($employee->role)}}</span>
                                          </div>
                                          </div>
                                          </a>
                                       </li>
                                       @endif
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Team Leader</label>
                         <div class="d-flex align-items-center">
                            <div class="project-members" name="team_leaders[]" id="team-lead" >
                              <!-- <a href="#" data-toggle="tooltip" title="{{$employee->name}}" class="avatar" id="team-lead" >
                                 <img src="img/profiles/avatar-16.jpg" alt=""> 
                                 </a> -->
                                
                              </div>
                          <div>
                             <span class="all-team" id="total_leaders">+0</span>
                          </div>
                      </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Add Team<span class="text-danger">*</span></label>
                           <!--<input class="form-control" type="text">-->
                           <div class="dropdown">
                              <a href="#" class="followers-add" data-toggle="dropdown"><i class="material-icons">add</i></a>
                              <div class="dropdown-menu">
                                 <div>
                                    <ul class="chat-user-list" id="team-members">
                                       @foreach($employees as $employee)
                                       @if($employee->role == "employee")
                                       <li   id="{{{$employee->id}}}">
                                          
                                             <div class="media">
                                                @if(!empty($employee->profile_image))
                                                 @if( $employee->profile_image != asset('/storage/profile_images/noimage.png'))
                                          <a href="" class="avatar" title="{{isset($employee->name) ? ucwords($employee->name) : '-'}}" id="TeamMember">
                                          <img src="{{{$employee->profile_image}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}" >
                                          @else
                                          <div class="symbol symbol-sm-35 symbol-primary m-r-10" id="name-character">
                                          <span class="symbol-label font-size-h3 font-weight-boldest">
                                          {{ mb_substr($employee['name'], 0, 1) }}
                                          </span>
                                          </div>
                                          @endif
                                          @else
                                            <div class="symbol symbol-sm-35 m-r-10" id="name-character">
                                             <span class="symbol-label font-size-h3 font-weight-boldest letter-text">
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
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Team Members</label>
                             <div class="d-flex align-items-center">
                           <div class="project-members" name="members[]" id="all-team-members" >
                              <!--  <a href="#" data-toggle="tooltip" title="{{$employee->name}}"  id="all-team-members"  class="avatar"></a>-->
                             
                           </div>
                         <div>
                           <span class="all-team" id="total_members">+0</span>
                       </div>
                        </div>
                    </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Description</label>
                     <textarea rows="4" class="form-control summernote" placeholder="Enter your message here" name="description"></textarea>
                  </div>
                  <div class="form-group">
                     <label>Upload Files</label>
                     <input class="form-control" type="file" name="project_file">
                  </div>
                  <div class="submit-section">
                     <a onClick="addProject()" class="btn btn-primary submit-btn">Submit</a>
                  </div>
                {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>
   <!-- /Create Project Modal -->
            
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
                                                <a href="#" data-toggle="tooltip" title="Jeffery Lalor" class="avatar">
                                                    <img src="img/profiles/avatar-16.jpg" alt="">
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
                                                <a href="#" data-toggle="tooltip" title="John Doe" class="avatar">
                                                    <img src="img/profiles/avatar-16.jpg" alt="">
                                                </a>
                                                <a href="#" data-toggle="tooltip" title="Richard Miles" class="avatar">
                                                    <img src="img/profiles/avatar-09.jpg" alt="">
                                                </a>
                                                <a href="#" data-toggle="tooltip" title="John Smith" class="avatar">
                                                    <img src="img/profiles/avatar-10.jpg" alt="">
                                                </a>
                                                <a href="#" data-toggle="tooltip" title="Mike Litorus" class="avatar">
                                                    <img src="img/profiles/avatar-05.jpg" alt="">
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
            
            <!-- Delete Project Modal -->
            <div class="modal custom-modal fade" id="delete_project" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Project</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Project Modal -->
            
        </div>
        <!-- /Page Wrapper -->

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
   var total_leaders = 0  ;
   var added_team_leaders = [];
   var added_team_members = [];

   $(document).on('click','#team-leader li', function() {
     
         var id = $(this).attr('id');
      if(typeof  added_team_leaders[id] === 'undefined') 
      {
         var employeeObject = search(id);
         added_team_leaders[employeeObject.id] = employeeObject;
       //  console.log(added_employees);
         var html = '';
         html +='<a href="#" data-toggle="tooltip" value = "'+id+'"  title="'+employeeObject.name+'"  class="avatar"">'
         html +='<img alt="'+employeeObject.name+ '" src="'  +employeeObject.profile_image+ ' " />'  
         $('#team-lead').append(html);
         total_leaders = total_leaders + 1;
         $('#total_leaders').html('+'+total_leaders); 

      }
      else
      {
         var employeeObject = search(id);
         added_team_leaders[employeeObject.id] = employeeObject;
         toastr['error']( employeeObject.name + " Already Added" );
      }
      
                
      });

   $(document).on('click','#team-members li', function() {  
      var id = $(this).attr('id');
      if(typeof added_team_members[id] === 'undefined') 
      {
         var employeeObject = search(id);
         added_team_members[employeeObject.id] = employeeObject;
       //  console.log(added_employees);
         var html = '';
         html +='<a href="#" data-toggle="tooltip" value = "'+id+'" title="'+employeeObject.name+'" class="avatar" id="all-team-members" class="avatar"" value="'+employeeObject.name+ '" >'
         html +='<img alt="'+employeeObject.name+ '" src="'  +employeeObject.profile_image+ ' " />'
         $('#all-team-members').append(html);
         total_members = total_members + 1;
         $('#total_members').html('+'+total_members); 
      }
      else
      {
         var employeeObject = search(id);
         added_team_members[employeeObject.id] = employeeObject;
          toastr['error'](employeeObject.name + " Already Added");
      }
      
                   
      })

</script>



<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script type="text/javascript">

            function addProject() {
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addprojects' : '#') }}";  
                var form = $('#AddProjectForm').get(0);
                var formData = new FormData(form);
                           
                var team_leaders = Object.keys(added_team_leaders);
                var team_members = Object.keys(added_team_members);

                console.log(team_leaders, team_members);
                            
               formData.append('team_leaders', team_leaders);
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

        <script src="{{asset('js/name-letter.js')}}" type='application/javascript'></script>
@endsection