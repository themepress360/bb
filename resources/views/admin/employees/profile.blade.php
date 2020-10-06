@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="page-title">Profile</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/dashboard' : '#') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Profile</li>
               </ul>
            </div>
         </div>
      </div>
      <!-- /Page Header -->
      <div class="card mb-0">
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="profile-view">
                     <div class="profile-img-wrap">
                        <div class="profile-img">
                           <a href="">
                            @if(!empty($employee['profile_image_url']))
                                <img src="{{{$employee['profile_image_url']}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                            @else
                               <div class="symbol symbol-lg-75 symbol-primary">
                                             <span class="symbol-label font-size-h3 font-weight-boldest">
                                                {{ mb_substr($employee['name'], 0, 1) }}
                                                    
                                             </span>
                                            </div>

                            @endif
                           </a>
                        </div>
                     </div>
                     <div class="profile-basic">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="profile-info-left">
                                <h3 class="user-name m-t-0">{{isset($employee['name']) ? ucwords($employee['name']) : '-'}}</h3>
                                
                                 <h5 class="company-role m-t-0 mb-0 text-muted">{{isset($employee['designation_name']) ? ucwords($employee['designation_name']) : '-'}}</h5>
                                
                                 <div class="staff-id text-muted">Department: {{ucwords($employee['department_name'])}}</div>
                                
                                 <div class="staff-id text-muted">Employee ID : {{strtoupper($employee->prefix)}}-{{isset($employee['id']) ? ucwords($employee['id']) : '-'}}</div>

                                  <div class="staff-id text-muted">Role :{{isset($employee['role']) ? ucwords($employee['role']) : '-'}}</div>
                                  <div class="staff-id text-muted">Date of Join : {{$employee->date_of_joining}}</div>
                                 
                                 <div class="staff-msg "><a href="chat" class="btn btn-light-success">Send Message</a></div>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <ul class="personal-info">
                                 <li>
                                    <span class="title">Phone:</span>
                                    <span class="text"><a href="">{{isset($employee['phone_no']) ? ucwords($employee['phone_no']) : '-'}}</a></span>
                                 </li>
                                 <li>
                                    <span class="title">Email:</span>
                                    <span class="text"><a href="">{{isset($employee['email']) ? $employee['email'] : '-'}}</a></span>
                                 </li>
                                 <li>
                                    <span class="title">Date of Birth:</span>
                                    <span class="text">31/12/1981</span>
                                 </li>
                                 <li>
                                    <span class="title">Address:</span>
                                    <span class="text">{{isset($employee['address']) ? ucwords($employee['address']) : '-'}}</span>
                                 </li>
                                 <li>
                                    <span class="title">Gender:</span>
                                    <span class="text">{{isset($employee['gender']) ? ucwords($employee['gender']) : '-'}}</span>
                                 </li>

                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="pro-edit"><a data-target="#employee_profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Profile Modal -->
      <div id="employee_profile_info" class="modal custom-modal fade" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">employee Profile Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="modal-body">
                    {{ Form::open(array( 'id' => 'Editemployee')) }}
                    @csrf
                        <div class="profile-img-wrap edit-img">
                            @if(!empty($employee['profile_image_url']))
                                <img id="imagePreview" class="inline-block" src="{{$employee['profile_image_url']}}" alt="{{isset($employee['name']) ? ucwords($employee['name']) : '-'}}">
                            @else
                                <img id="imagePreview" class="inline-block" src="{{asset('img/profiles/avatar-21.jpg')}}" alt="No Image">
                            @endif
                            <div class="fileupload btn">
                                <span class="btn-text">Edit</span>
                                <input class="upload" type='file' name="profile_image" id="editimageUpload" accept=".png, .jpg, .jpeg" />
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$employee['id']}}">
                        <div class="row" style="text-align: left !important">
                            <?php $name = explode(' ', $employee['name']);?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{isset($name[0]) ? ucwords($name[0]) : '-'}}" type="text" onkeyup="this.value = this.value.replace(/\s/g,'')" onkeypress="return /[A-Z a-z 0-9 _]+$/i.test(event.key)" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Last Name</label>
                                        <input class="form-control" value="{{isset($name[1]) ? ucwords($name[1]) : '-'}}" type="text" onkeyup="this.value = this.value.replace(/\s/g,'')" onkeypress="return /[A-Z a-z 0-9 _]+$/i.test(event.key)" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control floating" value="{{isset($employee['email']) ? $employee['email'] : '-'}}" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" name="password" type="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Address<span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="address" value="{{isset($employee['address']) ? $employee['address'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                        <select class="select form-control" name="gender">
                                            <option {{$employee['gender'] == "male" ? 'selected' : ''}} value="male">Male</option>
                                            <option {{$employee['gender'] == "female" ? 'selected' : ''}} value="female">Female</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Date Of Joining</label>
                                <div class="form-group form-focus">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker" value="{{isset($employee['date_of_joining']) ? date("d/m/y",strtotime($employee['date_of_joining'])) : '-'}}" name="date_of_joining">
                                    </div>
                                    <label class="focus-label">Date Of Joining</label>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">State<span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="state" value="{{isset($employee['state']) ? $employee['state'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Country<span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="country" value="{{isset($employee['country']) ? $employee['country'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Zip Code<span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="zip_code" value="{{isset($employee['zip_code']) ? $employee['zip_code'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                    <input class="form-control floating" value="{{strtoupper($employee->prefix)}}-{{isset($employee['id']) ? ucwords($employee['id']) : '-'}}" type="text" readonly="true" name="employee_id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input class="form-control" value="{{isset($employee['phone_no']) ? $employee['phone_no'] : '-'}}" name="phone_no" type="text">
                                </div>
                            </div>
                       
                              <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                           
                                            <select class="select" name="department">
                                                <option value="{{$employee->department_id}}">{{strtoupper($employee->department_name)}}</option>
                                                 @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{strtoupper($department->name)}}</option>
                                                 @endforeach
                                              </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                             <select class="select" name="designation">
                                              <option value="{{$employee->designation_id}}">{{strtoupper($employee->designation_name)}}</option>
                                                 @foreach($designations as $designation)
                                               <option value="{{$designation->id}}">{{strtoupper($designation->name)}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Assign Role <span class="text-danger">*</span></label>
                                         
                                           <select class="select" name="employee_role">
                                              <option value="{{$employee->role_id}}">{{strtoupper($employee->role)}}</option>
                                                 @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{strtoupper($role->role_name)}}</option>
                                              @endforeach
                                             </select>
                                           
                                        </div>
                                    </div>
                        </div>
                        <div class="submit-section">
                            <a onClick="Editemployee()" class="btn btn-primary submit-btn">Save</a>
                        </div>
                    {{ Form::close() }}
                    </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /Profile Modal -->
      <div class="card tab-box">
         <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
               <ul class="nav nav-tabs nav-tabs-bottom">
               <!--  <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                  <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li> -->
                  <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" href="#emp_profile">Profile</a></li>
                  <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#myprojects">Projects</a></li> 
                  <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#tasks">Tasks</a></li>
               </ul>
            </div>
         </div>
      </div>
  
      <div class="row">
         <div class="col-lg-12">
           <div class="tab-content profile-tab-content">

   <!-- Profile Info Tab -->
                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                         <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @if (!empty($educations_informations))
                                                    @foreach($educations_informations as $index => $education_info)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/" class="name">{{ucwords($education_info['institute'])}}</a>
                                                                <div>{{strtoupper($education_info['degree'])}} {{ucwords($education_info['subject'])}}</div>
                                                                <span class="time">{{date('Y',strtotime(str_replace('/', '-', $education_info['start_date'])))}} - {{date('Y',strtotime(str_replace('/', '-', $education_info['complete_date'])))}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @if (!empty($experiences))
                                                    @foreach($experiences as $index => $experience)
                                                        <li>
                                                            <div class="experience-user">
                                                                <div class="before-circle"></div>
                                                            </div>
                                                            <div class="experience-content">
                                                                <div class="timeline-content">
                                                                    <a href="#/" class="name">{{ucwords($experience['job_position'])}} at {{ucwords($experience['company_name'])}}</a>
                                                                    <span class="time">{{date('Y M',strtotime(str_replace('/', '-', $experience['period_from'])))}} - {{date('Y M',strtotime(str_replace('/', '-', $experience['period_to'])))}}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Profile Info Tab -->


                      <!-- Projects Tab -->
               <div id="myprojects" class="tab-pane fade ">
                  <div class="row">
                     <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                           <div class="card-body">
                              <div class="dropdown profile-action">
                                 <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                 </div>
                              </div>
                              <h4 class="project-title"><a href="project-view">Office Management</a></h4>
                              <small class="block text-ellipsis m-b-15">
                              <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                              <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                              </small>
                              <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                 typesetting industry. When an unknown printer took a galley of type and
                                 scrambled it...
                              </p>
                              <div class="pro-deadline m-b-15">
                                 <div class="sub-title">
                                    Deadline:
                                 </div>
                                 <div class="text-muted">
                                    17 Apr 2019
                                 </div>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Project Leader :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="img/profiles/avatar-16.jpg"></a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Team :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="img/profiles/avatar-09.jpg"></a></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                       <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                       <div class="dropdown-menu dropdown-menu-right">
                                          <div class="avatar-group">
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-02.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-09.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-10.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-05.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-11.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-12.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-13.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-01.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-16.jpg">
                                             </a>
                                          </div>
                                          <div class="avatar-pagination">
                                             <ul class="pagination">
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Previous">
                                                   <span aria-hidden="true">«</span>
                                                   <span class="sr-only">Previous</span>
                                                   </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Next">
                                                   <span aria-hidden="true">»</span>
                                                   <span class="sr-only">Next</span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                              <div class="progress progress-xs mb-0">
                                 <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                           <div class="card-body">
                              <div class="dropdown profile-action">
                                 <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                 </div>
                              </div>
                              <h4 class="project-title"><a href="project-view">Project Management</a></h4>
                              <small class="block text-ellipsis m-b-15">
                              <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                              <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                              </small>
                              <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                 typesetting industry. When an unknown printer took a galley of type and
                                 scrambled it...
                              </p>
                              <div class="pro-deadline m-b-15">
                                 <div class="sub-title">
                                    Deadline:
                                 </div>
                                 <div class="text-muted">
                                    17 Apr 2019
                                 </div>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Project Leader :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="img/profiles/avatar-16.jpg"></a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Team :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="img/profiles/avatar-09.jpg"></a></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                       <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                       <div class="dropdown-menu dropdown-menu-right">
                                          <div class="avatar-group">
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-02.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-09.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-10.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-05.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-11.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-12.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-01.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-16.jpg">
                                             </a>
                                          </div>
                                          <div class="avatar-pagination">
                                             <ul class="pagination">
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Previous">
                                                   <span aria-hidden="true">«</span>
                                                   <span class="sr-only">Previous</span>
                                                   </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Next">
                                                   <span aria-hidden="true">»</span>
                                                   <span class="sr-only">Next</span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                              <div class="progress progress-xs mb-0">
                                 <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                           <div class="card-body">
                              <div class="dropdown profile-action">
                                 <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                 </div>
                              </div>
                              <h4 class="project-title"><a href="project-view">Video Calling App</a></h4>
                              <small class="block text-ellipsis m-b-15">
                              <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                              <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                              </small>
                              <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                 typesetting industry. When an unknown printer took a galley of type and
                                 scrambled it...
                              </p>
                              <div class="pro-deadline m-b-15">
                                 <div class="sub-title">
                                    Deadline:
                                 </div>
                                 <div class="text-muted">
                                    17 Apr 2019
                                 </div>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Project Leader :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="img/profiles/avatar-16.jpg"></a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Team :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="img/profiles/avatar-09.jpg"></a></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                       <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                       <div class="dropdown-menu dropdown-menu-right">
                                          <div class="avatar-group">
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-02.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-09.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-10.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-05.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-11.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-12.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-13.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-01.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-16.jpg">
                                             </a>
                                          </div>
                                          <div class="avatar-pagination">
                                             <ul class="pagination">
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Previous">
                                                   <span aria-hidden="true">«</span>
                                                   <span class="sr-only">Previous</span>
                                                   </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Next">
                                                   <span aria-hidden="true">»</span>
                                                   <span class="sr-only">Next</span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                              <div class="progress progress-xs mb-0">
                                 <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                           <div class="card-body">
                              <div class="dropdown profile-action">
                                 <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                 </div>
                              </div>
                              <h4 class="project-title"><a href="project-view">Hospital Administration</a></h4>
                              <small class="block text-ellipsis m-b-15">
                              <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                              <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                              </small>
                              <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                 typesetting industry. When an unknown printer took a galley of type and
                                 scrambled it...
                              </p>
                              <div class="pro-deadline m-b-15">
                                 <div class="sub-title">
                                    Deadline:
                                 </div>
                                 <div class="text-muted">
                                    17 Apr 2019
                                 </div>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Project Leader :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="img/profiles/avatar-16.jpg"></a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="project-members m-b-15">
                                 <div>Team :</div>
                                 <ul class="team-members">
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="img/profiles/avatar-02.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="img/profiles/avatar-09.jpg"></a></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="img/profiles/avatar-10.jpg"></a>
                                    </li>
                                    <li>
                                       <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="img/profiles/avatar-05.jpg"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                       <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                       <div class="dropdown-menu dropdown-menu-right">
                                          <div class="avatar-group">
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-02.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-09.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-10.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-05.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-11.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-12.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-13.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-01.jpg">
                                             </a>
                                             <a class="avatar avatar-xs" href="#">
                                             <img alt="" src="img/profiles/avatar-16.jpg">
                                             </a>
                                          </div>
                                          <div class="avatar-pagination">
                                             <ul class="pagination">
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Previous">
                                                   <span aria-hidden="true">«</span>
                                                   <span class="sr-only">Previous</span>
                                                   </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                   <a class="page-link" href="#" aria-label="Next">
                                                   <span aria-hidden="true">»</span>
                                                   <span class="sr-only">Next</span>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                              <div class="progress progress-xs mb-0">
                                 <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /Projects Tab -->
               <!-- Task Tab -->
               <div id="tasks" class="tab-pane fade">
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
               <!-- /Task Tab -->

                    <!-- Education Modal -->
            <?php $image_row = 0; ?>
            <div id="education_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Education Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(array( 'id' => 'EducationInformationForm')) }}
                            @csrf
                                <div class="form-scroll">                             
                                    <div class="card">
                                        @if (!empty($educations_informations))
                                            @foreach($educations_informations as $index => $education_info) 
                                                <div class="card-body">
                                                    <h3 class="card-title">Education Informations
                                                        @if ($index != 0)
                                                        <a href="javascript:void(0);" class="delete-icon" id="removeEduForm">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                        @endif
                                                    </h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" value="{{$education_info['institute']}}" class="form-control floating" id="institute<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][institute]">
                                                                <label class="focus-label">Institution</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" value="{{$education_info['subject']}}" class="form-control floating" id="subject<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][subject]">
                                                                <label class="focus-label">Subject</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <div class="cal-icon">
                                                                    <input type="text" value="{{$education_info['start_date']}}" class="form-control floating datetimepicker" id="start_date<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][start_date]">
                                                                </div>
                                                                <label class="focus-label">Starting Date</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <div class="cal-icon">
                                                                    <input type="text" value="{{$education_info['complete_date']}}" class="form-control floating datetimepicker" id="complete_date<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][complete_date]">
                                                                </div>
                                                                <label class="focus-label">Complete Date</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" value="{{$education_info['degree']}}" class="form-control floating" id="degree<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][degree]">
                                                                <label class="focus-label">Degree</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" value="{{$education_info['grade']}}" class="form-control floating" id="grade<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][grade]">
                                                                <label class="focus-label">Grade</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="add-more">
                                                        <a href="javascript:void(0);" id="addMoreEducation"><i class="fa fa-plus-circle"></i> Add More</a>
                                                    </div>
                                                </div>
                                                <?php $image_row++; ?>
                                            @endforeach
                                        @else
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="" class="form-control floating" id="institute<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][institute]">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="" class="form-control floating" id="subject<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][subject]">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="" class="form-control floating datetimepicker" id="start_date<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][start_date]">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="" class="form-control floating datetimepicker" id="complete_date<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][complete_date]">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="" class="form-control floating" id="degree<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][degree]">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="" class="form-control floating" id="grade<?php echo $image_row;?>" name="education_informations[<?php echo $image_row;?>][grade]">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);" id="addMoreEducation"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                        <?php $image_row++; ?>
                                        @endif
                                    </div>
                                    <div class="" id="card_body_education">
                                        
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <a onClick="EducationInformation()" class="btn btn-primary submit-btn">Submit</a>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Education Modal -->
            
            <!-- Experience Modal -->
            <?php $experience_row = 0; ?>
            <div id="experience_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Experience Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(array( 'id' => 'ExperienceForm')) }}
                            @csrf
                                <div class="form-scroll">
                                    <div class="card">
                                        @if (!empty($experiences))
                                            @foreach($experiences as $index => $experience) 
                                                <div class="card-body">
                                                    <h3 class="card-title">Experience Informations 
                                                        @if ($index != 0)
                                                        <a href="javascript:void(0);" class="delete-icon" id="removeEduForm">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                        @endif
                                                    </h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus">
                                                                <input type="text" class="form-control floating" value="{{$experience['company_name']}}" id="company_name<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][company_name]">
                                                                <label class="focus-label">Company Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus">
                                                                <input type="text" class="form-control floating" value="{{$experience['location']}}" id="location<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][location]">
                                                                <label class="focus-label">Location</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus">
                                                                <input type="text" class="form-control floating" value="{{$experience['job_position']}}" id="job_position<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][job_position]">
                                                                <label class="focus-label">Job Position</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus">
                                                                <div class="cal-icon">
                                                                    <input type="text" class="form-control floating datetimepicker" value="{{$experience['period_from']}}" id="period_from<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][period_from]">
                                                                </div>
                                                                <label class="focus-label">Period From</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus">
                                                                <div class="cal-icon">
                                                                    <input type="text" class="form-control floating datetimepicker" value="{{$experience['period_to']}}" id="period_to<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][period_to]">
                                                                </div>
                                                                <label class="focus-label">Period To</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="add-more">
                                                        <a href="javascript:void(0);" id="addMoreExperience"><i class="fa fa-plus-circle"></i> Add More</a>
                                                    </div>
                                                </div>
                                                <?php $experience_row++; ?>
                                            @endforeach
                                        @else
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="" id="company_name<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][company_name]">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="" id="location<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][location]">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="" id="job_position<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][job_position]">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" value="" id="period_from<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][period_from]">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" value="" id="period_to<?php echo $experience_row;?>" name="expirences[<?php echo $experience_row;?>][period_to]">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);" id="addMoreExperience"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                        <?php $experience_row++; ?>
                                        @endif
                                    </div>
                                    <div class="" id="card_body_experience">
                                        
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <a onClick="addExperience()" class="btn btn-primary submit-btn">Submit</a>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Experience Modal -->
            </div>
         </div>
      </div>
   </div>
   <!-- /Page Content -->
</div>
<script type="text/javascript">
    function Editemployee()
    {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/editemployee' : '#') }}";
        var form = $('#Editemployee').get(0);
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            if (input) { 
                reader.readAsDataURL(input.files[0]);
                return true;
            } else {
                return false;
            }
        }
        else
            return false;
    }
    $("#editimageUpload").change(function() {
        var upload = readURL(this);
        if(upload)
        {
        }
    });
</script>

  <script type="text/javascript">
        var image_row = <?php echo $image_row; ?>;
        var experience_row = <?php echo $experience_row; ?>;
        // add Form
        $(document).on('click', '#addMoreEducation', function () {
            var html = '';
            html +='<div class="card" id="inputEduForm">'
            html +='<div class="card-body">'
            html +='<h3 class="card-title">Education Informations'
            html +='<a href="javascript:void(0);" class="delete-icon" id="removeEduForm">'
            html +='<i class="fa fa-trash-o">'
            html +='</i>'
            html +='</a>'
            html +='</h3>'
            html +='<div class="row">'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<input type="text" class="form-control floating" value="" id="institute'+image_row+'" name="education_informations['+image_row+'][institute]">'
            html +='<label class="focus-label">Institute</label>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<input type="text" class="form-control floating" value="" id="subject'+image_row+'" name="education_informations['+image_row+'][subject]">'
            html +='<label class="focus-label">Subject</label>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<div class="cal-icon">'
            html +='<input type="text" class="form-control floating datetimepicker" value="" id="start_date'+image_row+'" name="education_informations['+image_row+'][start_date]">'
            html +='<label class="focus-label">Starting Date</label>'
            html +='</div>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<div class="cal-icon">'
            html +='<input type="text" class="form-control floating datetimepicker" value="" id="complete_date'+image_row+'" name="education_informations['+image_row+'][complete_date]">'
            html +='</div>'
            html +='<label class="focus-label">Complete Date</label>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
           
            html +='<input type="text" class="form-control floating" value="" id="degree'+image_row+'" name="education_informations['+image_row+'][degree]">'
          
            html +='<label class="focus-label">Degree</label>'                                                    
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
          
            html +='<input type="text" class="form-control floating" value="" id="grade'+image_row+'" name="education_informations['+image_row+'][grade]">'
          
            html +='<label class="focus-label">Grade</label>'                                                    
            html +='</div>'
            html +='</div>'
            html +='</div>'
            html +='<div class="add-more">'
            html +='<a href="javascript:void(0);" id="addMoreEducation">'
            html +='<i class="fa fa-plus-circle">'
            html +='</i>'
            html +='Add More'
            html +='</a>'
            html +='</div>'
            html +='</div>'
            html +='</div>';
            $('#card_body_education').append(html);
            $('#start_date'+image_row).datetimepicker({ format: 'DD/MM/YY' });
             $('#complete_date'+image_row).datetimepicker({ format: 'DD/MM/YY' });
            image_row++;
          });
        // remove Form
        $(document).on('click', '#removeEduForm', function () {
            $(this).closest('#inputEduForm').remove();
        });
        function EducationInformation()
        {
           
          $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

            var url =  window.location.pathname;
            var id = url.substring(url.lastIndexOf('/') + 1);
            

            var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/saveEmpEducation' : '#') }}";  
            var form = $('#EducationInformationForm').get(0);
           // console.log(id);
            var formData = new FormData(form);

             formData.append('emp_id', id);

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

            <script type="text/javascript">
        // add Form
        $(document).on('click', '#addMoreExperience', function () {
            var html = '';
            html +='<div class="card" id="inputExpForm">'
            html +='<div class="card-body">'
            html +='<h3 class="card-title">Experience Informations'
            html +='<a href="javascript:void(0);" class="delete-icon" id="removeExpForm">'
            html +='<i class="fa fa-trash-o">'
            html +='</i>'
            html +='</a>'
            html +='</h3>'
            html +='<div class="row">'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<input type="text" class="form-control floating" value="" id="company_name'+experience_row+'" name="expirences['+experience_row+'][company_name]">'
            html +='<label class="focus-label">Company Name</label>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<input type="text" class="form-control floating" value="" id="location'+experience_row+'" name="expirences['+experience_row+'][location]">'
            html +='<label class="focus-label">Location</label>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<input type="text" class="form-control floating" value="" id="job_position'+experience_row+'" name="expirences['+experience_row+'][job_position]">'
            html +='<label class="focus-label">Job Position</label>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<div class="cal-icon">'
            html +='<input type="text" class="form-control floating datetimepicker" value="" id="period_from'+experience_row+'" name="expirences['+experience_row+'][period_from]">'
            html +='</div>'
            html +='<label class="focus-label">Period From</label>'
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<div class="cal-icon">'
            html +='<input type="text" class="form-control floating datetimepicker" value="" id="period_to'+experience_row+'" name="expirences['+experience_row+'][period_to]">'
            html +='</div>'
            html +='<label class="focus-label">Period To</label>'                                                    
            html +='</div>'
            html +='</div>'
            html +='</div>'
            html +='<div class="add-more">'
            html +='<a href="javascript:void(0);" id="addMoreExperience">'
            html +='<i class="fa fa-plus-circle">'
            html +='</i>'
            html +='Add More'
            html +='</a>'
            html +='</div>'
            html +='</div>'
            html +='</div>';
            $('#card_body_experience').append(html);
            $('#period_from'+experience_row).datetimepicker({ format: 'DD/MM/YY' });
            $('#period_to'+experience_row).datetimepicker({ format: 'DD/MM/YY' }); 
            experience_row++;
        });

        // remove Form
        $(document).on('click', '#removeExpForm', function () {
            $(this).closest('#inputExpForm').remove();
        });

        function addExperience()
        {
            var url =  window.location.pathname;
            var id = url.substring(url.lastIndexOf('/') + 1);
                     

            var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/saveEmpExperience' : '#') }}";  
            var form = $('#ExperienceForm').get(0);
            var formData = new FormData(form);
            formData.append('emp_id', id);

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