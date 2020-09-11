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
                                            @if(!empty($mydetail['profile_image_url']))
                                            <a href="#"><img alt="{{isset($mydetail['name']) ? ucwords($mydetail['name']) : '-'}}" src="{{{$mydetail['profile_image_url']}}}"></a>
                                            @else
                                            <a href="#"><img alt="No Image" src="{{asset('img/profiles/avatar-21.jpg')}}"></a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0">{{isset($mydetail['name']) ? ucwords($mydetail['name']) : '-'}}</h3>
                                                    <h6 class="text-muted">UI/UX Design Team</h6>
                                                    <small class="text-muted">Web Designer</small>
                                                    <div class="staff-id">Employee ID : {{isset($mydetail['id']) ? ucwords($mydetail['id']) : '-'}}</div>
                                                    <div class="small doj text-muted">Date of Join : {{isset($mydetail['date_of_joining']) ? date('M j, Y',strtotime($mydetail['date_of_joining'])) : '-'}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Phone:</div>
                                                        <div class="text"><a href="">{{isset($mydetail['phone_no']) ? ucwords($mydetail['phone_no']) : '-'}}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href="">{{isset($mydetail['email']) ? strtolower($mydetail['email']) : '-'}}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Birthday:</div>
                                                        <div class="text">{{isset($mydetail['dob']) ? date('M j, Y',strtotime($mydetail['dob'])) : '-'}}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Address:</div>
                                                        <div class="text">{{isset($mydetail['address']) ? ucwords($mydetail['address']) : '-'}}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Gender:</div>
                                                        <div class="text">{{isset($mydetail['gender']) ? ucwords($mydetail['gender']) : '-'}}</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                                <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content">
                
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
                    <div class="tab-pane fade" id="emp_projects">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Projects Tab -->
                    
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
               
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editprofile" onsubmit="return false">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <input type="hidden" name="user_id" value="{{isset($mydetail['id']) ? $mydetail['id'] : '-'}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            @if(!empty($mydetail['profile_image_url']))
                                            <img id="imagePreview" class="inline-block" src="{{$mydetail['profile_image_url']}}" alt="{{isset($mydetail['name']) ? ucwords($mydetail['name']) : '-'}}">
                                            @else
                                            <img id="imagePreview" class="inline-block" src="{{asset('img/profiles/avatar-21.jpg')}}" alt="No Image">
                                            @endif
                                            <div class="fileupload btn">
                                                <span class="btn-text">Edit</span>
                                                <input class="upload" type='file' name="profile_image" id="editimageUpload" accept=".png, .jpg, .jpeg" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="first_name" value="{{isset($mydetail['first_name']) ? ucwords($mydetail['first_name']) : '-'}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" value="{{isset($mydetail['last_name']) ? ucwords($mydetail['last_name']) : '-'}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control datetimepicker" type="text" name="dob" value="{{isset($mydetail['dob']) ? date('d/m/y',strtotime($mydetail['dob'])) : '-'}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="select form-control" name="gender">
                                                        <option value="male" {{$mydetail["gender"] == "male" ? 'selected' : ''}}>Male</option>
                                                        <option value="female" {{$mydetail["gender"] == "female" ? 'selected' : ''}}>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="{{isset($mydetail['address']) ? ucwords($mydetail['address']) : '-'}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="state" value="{{isset($mydetail['state']) ? $mydetail['state'] : '-'}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" name="country" value="{{isset($mydetail['country']) ? $mydetail['country'] : '-'}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="text" class="form-control" name="zip_code" value="{{isset($mydetail['zip_code']) ? $mydetail['zip_code'] : '-'}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone_no" value="{{isset($mydetail['phone_no']) ? $mydetail['phone_no'] : '-'}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button onClick="editprofile()" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Profile Modal -->
            
            <!-- Personal Info Modal -->
            <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport No</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport Expiry Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <div class="cal-icon">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="select form-control">
                                                <option>-</option>
                                                <option>Single</option>
                                                <option>Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employment of spouse</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. of children </label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Personal Info Modal -->
            
            <!-- Family Info Modal -->
            <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Family Info Modal -->
            
            <!-- Emergency Contact Modal -->
            <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Emergency Contact Modal -->
            
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
        <script type="text/javascript">
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
                
            function editprofile() {
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/editprofile' : '#') }}";  
                var form = $('#editprofile').get(0);
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
            html +='<input type="text" class="form-control floating datetimepicker" value="" id="start_date'+image_row+'" name="education_informations['+image_row+'][start_date]">'
            html +='<label class="focus-label">Starting Date</label>'
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
            html +='<div class="cal-icon">'
            html +='<input type="text" class="form-control floating" value="" id="degree'+image_row+'" name="education_informations['+image_row+'][degree]">'
            html +='</div>'
            html +='<label class="focus-label">Degree</label>'                                                    
            html +='</div>'
            html +='</div>'
            html +='<div class="col-md-6">'
            html +='<div class="form-group form-focus">'
            html +='<div class="cal-icon">'
            html +='<input type="text" class="form-control floating" value="" id="grade'+image_row+'" name="education_informations['+image_row+'][grade]">'
            html +='</div>'
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
            image_row++;
          });
        // remove Form
        $(document).on('click', '#removeEduForm', function () {
            $(this).closest('#inputEduForm').remove();
        });
        function EducationInformation()
        {
            var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/saveeducationinformation' : '#') }}";  
            var form = $('#EducationInformationForm').get(0);
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
            experience_row++;
        });

        // remove Form
        $(document).on('click', '#removeExpForm', function () {
            $(this).closest('#inputExpForm').remove();
        });

        function addExperience()
        {
            var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/saveexperiences' : '#') }}";  
            var form = $('#ExperienceForm').get(0);
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
    </script>
        <!-- /Page Wrapper -->
@endsection