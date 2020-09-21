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
                                <a href="projects" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                                <a href="project-list" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
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
                            <label class="focus-label">Designation</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <a href="#" class="btn btn-success btn-block"> Search </a>  
                    </div>     
                </div>
                <!-- Search Filter -->
                
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown dropdown-action profile-action">
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
                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="{{asset('img/profiles/avatar-02.jpg')}}"></a>
                                        </li>
                                        <li>
                           <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="{{asset('img/profiles/avatar-09.jpg')}}"></a></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}"></a>
                                        </li>
                                        <li class="dropdown avatar-dropdown">
                                            <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="avatar-group">
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="img/profiles/avatar-02.jpg">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-09.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}">
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
                                <div class="dropdown dropdown-action profile-action">
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
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="img/profiles/avatar-05.jpg"></a>
                                        </li>
                                        <li class="dropdown avatar-dropdown">
                                            <a href="#" class="all-users dropdown-toggle" data-toggle="dropdown" aria-expanded="false">+15</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="avatar-group">
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-02.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-09.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-11.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-12.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-13.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-01.jpg')}}">
                                                    </a>
                                                    <a class="avatar avatar-xs" href="#">
                                                        <img alt="" src="{{asset('img/profiles/avatar-16.jpg')}}">
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
                                <div class="dropdown dropdown-action profile-action">
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
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}"></a>
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
                                                        <img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}">
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
                                <div class="dropdown dropdown-action profile-action">
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
                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}"></a>
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
                                                        <img alt="" src="{{asset('img/profiles/avatar-10.jpg')}}">
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
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Project Name<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Client<span class="text-danger">*</span></label>
                                            <select class="select">
                                                @foreach($clients as $client)
                                                <option>{{$client->name}}</option>
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
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>End Date<span class="text-danger">*</span></label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Priority<span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>High</option>
                                                <option>Medium</option>
                                                <option>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Department<span class="text-danger">*</span></label>
                                            <select class="select">
                                               @foreach($departments as $department)
                                                <option name="{{$department->id}}">{{strtoupper($department->name)}}</option>
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
									<ul class="chat-user-list" id="team-lead-image" >
										@foreach($employees as $employee)
                                         @if($employee->role == "team lead")
                                        <li>
											<a href="#">
												<div class="media">
                                                    @if(!empty($employee->profile_image))
                             <a href="" class="avatar">
                         <img src="{{{$employee->profile_image}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
                            @else
                               <div class="symbol symbol-sm-35 symbol-primary m-r-10">
                                             <span class="symbol-label font-size-h3 font-weight-boldest">
                                                {{ mb_substr($employee['name'], 0, 1) }}
                                                    
                                             </span>
                                            </div>

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
                                        @foreach($employees as $employee)
                                         @if($employee->role == "team lead")
                                            <div class="project-members" >
                                          <a href="#" data-toggle="tooltip" title="{{$employee->name}}" class="avatar" id="team-lead">
                                                   <!-- <img src="img/profiles/avatar-16.jpg" alt=""> -->
                                                </a> 
                                            </div>
                                            @endif
                                            @endforeach
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
											<a href="#">
												<div class="media">
													 @if(!empty($employee->profile_image))
                             <a href="" class="avatar">
                         <img src="{{{$employee->profile_image}}}" alt="{{isset($employee->name) ? ucwords($employee->name) : '-'}}">
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
														<span class="designation">{{$employee->designation_name}}</span>
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
                                            <label>Team Members</label>
                                       
                                            <div class="project-members" id="all-team-members" >
                                           
                                         
                                            
                                         </div>
                                              
                                          
                                        <span class="all-team">+2</span>
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
                                                    <img src="{{asset('img/profiles/avatar-10.jpg')}}" alt="">
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
								<div class="input-group m-b-30">
									<input placeholder="Search to add" class="form-control search-input" type="text">
									<span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
								</div>
								<div>
									<ul class="chat-user-list">
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar"><img alt="" src="img/profiles/avatar-16.jpg"></span>
													<div class="media-body media-middle text-nowrap">
														<div class="user-name">Jeffery Lalor</div>
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
														<div class="user-name">Catherine Manseau</div>
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
														<div class="user-name">Wilmer Deluna</div>
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
            
        </div>
        <!-- /Page Wrapper -->


<script>

 
</script>
       

    <script>

        
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function search(id){
            var employees = <?php echo json_encode($employees); ?>;
            for (var i=0; i < employees.length; i++) {
                if (employees[i].id == id) {
                    return employees[i];
                }
            }
        }

         $('#team-members li').click(function() {
           
             var imgUrl = $(this).find("img").attr("src");
                var id = $(this).attr('id');
                             
                var name = "Ali";

                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addmembers': '#') }}";  
               
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { id:id},
                    success: function(response)
                    {
                        
                        var employeeObject = search(id);
                        if(response.status == "SUCCESS")
                        {
                            toastr['success'](response.message);
                            window.location = "";
                        }
                        else
                        {
                            toastr['error'](response.message);
                            if (typeof imgUrl === "undefined") 
                            {
                                var html = '';
                                html +='<div class="symbol symbol-sm-35 symbol-primary m-r-10">'
                                html +='<span class="symbol-label font-size-h3 font-weight-boldest">'
                                html +=' {{ mb_substr($employee['name'], 0, 1) }}'
                                html +='</div>'
                                html +='</span>'     
                                $('#all-team-members').append(html);
                            }else{           
                                var html = '';
                                html +='<a href="#" data-toggle="tooltip" title="'+employeeObject.name+'" class="avatar" id="all-team-members" class="avatar"">'
                                html +='<img src="'  +imgUrl+ ' " />'    
                                $('#all-team-members').append(html);           
                                var title =  $("#title").attr("title");
                                 
                            }
                        }    
                    }
                    
                }); 
            })

    </script>

           
@endsection 
                                            