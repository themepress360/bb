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
                            <h3 class="page-title">Employee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employee</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                            <div class="view-icons">
                                <a href="employees" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                                <a href="employees-list" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
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
                            <label class="focus-label">Employee ID</label>
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
                                <option>Select Designation</option>
                                <option>Web Developer</option>
                                <option>Web Designer</option>
                                <option>Android Developer</option>
                                <option>Ios Developer</option>
                            </select>
                            <label class="focus-label">Designation</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <a href="#" class="btn btn-success btn-block"> Search </a>  
                    </div>
                </div>
                <!-- Search Filter -->
                 
                <div class="row staff-grid-row">
                          @foreach($employees_list as $index => $employee)
                            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                                <div class="profile-widget">
                                   <div class="d-flex">
                                    <div class="profile-img-card">
                                       
                            @if(!empty($employee['profile_image_url']))
                                 <a href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$employee['id'] : '#') }}" class="avatar">

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
                                    <div class="m-l-10"><h4 class="user-name m-t-10 mb-0"><a href=""></a>{{$employee['name']}}</h4>
                                        <span class="text-muted"><h6>{{ucwords($employee['designation_name'])}}<h6></span>
                                            <span class="text-muted"><h6>Emp ID: {{strtoupper($employee['prefix'])}}-{{sprintf("%04d",$employee['id'])}}<h6></span>
                                        <span class="label lable-sm label-light-warning">{{ucwords($employee['role'])}}</span>
                                    </div>
                                    
                                </div>

                                 <div class="d-flex align-items-center justify-content-between m-t-10" >
                                    <span>
                                        Department:
                                    </span>    
                           <span><h5 class="text-muted m-t-10 mb-0 text-ellipsis"><a href=""> {{ucwords($employee['department_name'])}}</a></h5></span>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between m-t-10" >
                                    <span>
                                        Email:
                                    </span>    
                           <span><h5 class="text-muted m-t-10 mb-0 text-ellipsis"><a href=""> {{$employee['email']}}</a></h5></span>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between m-t-10" >
                                    <span>
                                        Phone:
                                    </span>    
                           <span><h5 class="text-muted m-t-10 mb-0 text-ellipsis"><a href=""> {{$employee['phone_no']}}</a></h5></span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between m-t-10" >
                                    <span>
                                        Location:
                                    </span>    
                           <span><h5 class="text-muted m-t-10 mb-0 text-ellipsis"><a href=""> {{$employee['country']}}</a></h5></span>
                                    </div>

                           
                        
                                    <div class="dropdown profile-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                    </div>
                                    <a href="chat" class="btn btn-light-success btn-sm m-t-10">Message</a>
                                    <a href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'. $employee['id'] : '#') }}" class="btn btn-light-primary btn-sm m-t-10">View Profile</a>
                            </div>
                </div>
                 @endforeach
            </div>
            <!-- /Page Content -->
            
            <!-- Add Employee Modal -->
            <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           {{ Form::open(array( 'id' => 'AddEmployeeForm')) }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="last_name">
                                        </div>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Password<span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                    </div>
                                                                      
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date_of_joining"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone <span class="text-danger">*</span> </label>
                                            <input class="form-control" type="text" name="phone_no">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                           
                                            <select class="select" name="department">
                                                <option>Select Department</option>
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
                                              <option>Select Designation</option>
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
                                              <option>Select Role</option>
                                                 @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{strtoupper($role->role_name)}}</option>
                                              @endforeach
                                             </select>
                                           
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="select form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="submit-section">
                                    <a onClick="addEmployee()" class="btn btn-primary submit-btn">Submit</a>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Employee Modal -->
            
           
            <!-- Edit Employee Modal -->
            <div id="edit_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" value="John" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name</label>
                                            <input class="form-control" value="Doe" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                            <input class="form-control" value="johndoe" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" value="johndoe@example.com" type="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Password</label>
                                            <input class="form-control" value="johndoe" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input class="form-control" value="johndoe" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                            <input type="text" value="FT-0001" readonly class="form-control floating">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control" value="9876543210" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Company</label>
                                            <select class="select">
                                                <option>Global Technologies</option>
                                                <option>Delta Infotech</option>
                                                <option selected>International Software Inc</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select Department</option>
                                                <option>Web Development</option>
                                                <option>IT Management</option>
                                                <option>Marketing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select Designation</option>
                                                <option>Web Designer</option>
                                                <option>Web Developer</option>
                                                <option>Android Developer</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="table-responsive m-t-15">
                                    <table class="table table-striped custom-table">
                                        <thead>
                                            <tr>
                                                <th>Module Permission</th>
                                                <th class="text-center">Read</th>
                                                <th class="text-center">Write</th>
                                                <th class="text-center">Create</th>
                                                <th class="text-center">Delete</th>
                                                <th class="text-center">Import</th>
                                                <th class="text-center">Export</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Holidays</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Leaves</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Clients</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Projects</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tasks</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chats</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Assets</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Timing Sheets</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Employee Modal -->
            
            <!-- Delete Employee Modal -->
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Employee</h3>
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
            <!-- /Delete Employee Modal -->
            
        </div>
        <!-- /Page Wrapper -->

 <script type="text/javascript">

            function addEmployee() {

                console.log("Employee Function Called");
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addemployees' : '#') }}";  
                var form = $('#AddEmployeeForm').get(0);
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




@endsection