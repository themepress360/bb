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
                            @if(!empty($client['profile_image_url']))
                                <img src="{{{$client['profile_image_url']}}}" alt="{{isset($client['name']) ? ucwords($client['name']) : '-'}}">
                            @else
                                <img alt="No Image" src="{{asset('img/profiles/avatar-21.jpg')}}">
                            @endif
                           </a>
                        </div>
                     </div>
                     <div class="profile-basic">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="profile-info-left">
                                 <h3 class="user-name m-t-0">{{isset($client['name']) ? ucwords($client['name']) : '-'}}</h3>
                                 <h5 class="company-role m-t-0 mb-0">{{isset($client['client_data']['company_name']) ? ucwords($client['client_data']['company_name']) : '-'}}</h5>
                                 <small class="text-muted">{{isset($client['client_data']['client_designation']) ? ucwords($client['client_data']['client_designation']) : '-'}}</small>
                                 <div class="staff-id">Client ID : {{config('app.clientprefix')}}-{{isset($client['id']) ? ucwords($client['id']) : '-'}}</div>
                                 <div class="staff-msg"><a href="chat" class="btn btn-custom">Send Message</a></div>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <ul class="personal-info">
                                 <li>
                                    <span class="title">Phone:</span>
                                    <span class="text"><a href="">{{isset($client['phone_no']) ? ucwords($client['phone_no']) : '-'}}</a></span>
                                 </li>
                                 <li>
                                    <span class="title">Email:</span>
                                    <span class="text"><a href="">{{isset($client['email']) ? ucwords($client['email']) : '-'}}</a></span>
                                 </li>
                                 <li>
                                    <span class="title">Address:</span>
                                    <span class="text">{{isset($client['address']) ? ucwords($client['address']) : '-'}}</span>
                                 </li>
                                 <li>
                                    <span class="title">Gender:</span>
                                    <span class="text">{{isset($client['gender']) ? ucwords($client['gender']) : '-'}}</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="pro-edit"><a data-target="#client_profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Profile Modal -->
      <div id="client_profile_info" class="modal custom-modal fade" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Client Profile Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="modal-body">
                    {{ Form::open(array( 'id' => 'EditClient')) }}
                    @csrf
                        <div class="profile-img-wrap edit-img">
                            @if(!empty($client['profile_image_url']))
                                <img id="imagePreview" class="inline-block" src="{{$client['profile_image_url']}}" alt="{{isset($client['name']) ? ucwords($client['name']) : '-'}}">
                            @else
                                <img id="imagePreview" class="inline-block" src="{{asset('img/profiles/avatar-21.jpg')}}" alt="No Image">
                            @endif
                            <div class="fileupload btn">
                                <span class="btn-text">Edit</span>
                                <input class="upload" type='file' name="profile_image" id="editimageUpload" accept=".png, .jpg, .jpeg" />
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$client['id']}}">
                        <div class="row" style="text-align: left !important">
                            <?php $name = explode(' ', $client['name']);?>
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
                                    <input class="form-control floating" value="{{isset($client['email']) ? $client['email'] : '-'}}" type="email" name="email">
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
                                    <input class="form-control" type="text" name="address" value="{{isset($client['address']) ? $client['address'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                        <select class="select form-control" name="gender">
                                            <option {{$client['gender'] == "male" ? 'selected' : ''}} value="male">Male</option>
                                            <option {{$client['gender'] == "female" ? 'selected' : ''}} value="female">Female</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Date Of Joining</label>
                                <div class="form-group form-focus">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control floating datetimepicker" value="{{isset($client['date_of_joining']) ? date("d/m/y",strtotime($client['date_of_joining'])) : '-'}}" name="date_of_joining">
                                    </div>
                                    <label class="focus-label">Date Of Joining</label>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">State<span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="state" value="{{isset($client['state']) ? $client['state'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Country<span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="country" value="{{isset($client['country']) ? $client['country'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Zip Code<span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="zip_code" value="{{isset($client['zip_code']) ? $client['zip_code'] : '-'}}">
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label class="col-form-label">Client ID <span class="text-danger">*</span></label>
                                    <input class="form-control floating" value="{{config('app.clientprefix')}}-{{$client['id']}}" type="text" readonly="true" name="client_id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input class="form-control" value="{{isset($client['phone_no']) ? $client['phone_no'] : '-'}}" name="phone_no" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Company Name</label>
                                    <input class="form-control" type="text" value="{{isset($client['client_data']['company_name']) ? $client['client_data']['company_name'] : '-'}}" name="company_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Client Designation<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="client_designation" value="{{isset($client['client_data']['client_designation']) ? $client['client_data']['client_designation'] : '-'}}">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <a onClick="EditClient()" class="btn btn-primary submit-btn">Save</a>
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
                  <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" href="#myprojects">Projects</a></li>
                  <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#tasks">Tasks</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="tab-content profile-tab-content">
               <!-- Projects Tab -->
               <div id="myprojects" class="tab-pane fade show active">
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
            </div>
         </div>
      </div>
   </div>
   <!-- /Page Content -->
</div>
<script type="text/javascript">
    function EditClient()
    {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/editclient' : '#') }}";
        var form = $('#EditClient').get(0);
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
@endsection