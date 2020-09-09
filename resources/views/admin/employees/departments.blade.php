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
                            <h3 class="page-title">Department</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Department</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Department Name</th>
                                        <th>Prefix</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($departments as $department)
                                    <tr>
                                        <td>{{$department['id']}}</td>
                                        <td>{{ucwords($department['name'])}}</td>
                                        <td>{{strtolower($department['prefix'])}}</td>
                                        <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_department{{$department['id']}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department{{$department['id']}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                            </div>
                                        </td>
                                        
                                        <!-- Edit Department Modal -->
                                        <div id="edit_department{{$department['id']}}" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Department</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ Form::open(array( 'id' => 'editdepartment'.$department['id'] )) }}
                                                            @csrf
                                                            <input type="hidden" name="department_id" value="{{$department['id']}}">
                                                            <div class="form-group">
                                                                <label>Department Name <span class="text-danger">*</span></label>
                                                                <input class="form-control" value="{{ucwords($department['name'])}}" name="name" type="text">
                                                            </div>
                                                             <div class="form-group">
                                                                <label>Prefix <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" name="prefix" value="{{!empty($department['prefix']) ? $department['prefix'] : ''}}">
                                                            </div>
                                                            <div class="submit-section">
                                                                <a onClick="editdepartment('{{$department['id']}}')"class="btn btn-primary submit-btn">Save</a>
                                                            </div>
                                                        {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Department Modal -->

                                        <!-- Delete Department Modal -->
                                        <div class="modal custom-modal fade" id="delete_department{{$department['id']}}" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="form-header">
                                                            <h3>Delete Department</h3>
                                                            <p>Are you sure want to delete?</p>
                                                        </div>
                                                        <div class="modal-btn delete-action">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a onClick="deletedepartment('{{$department['id']}}')" class="btn btn-primary continue-btn">Delete</a>
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
                                        <!-- /Delete Department Modal -->
                                    </tr>
                                    @empty
                                        <tr>
                                            No Record Found
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Add Department Modal -->
            <div id="add_department" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(array( 'id' => 'adddepartment')) }}
                            @csrf
                                <div class="form-group">
                                    <label>Department Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Prefix <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="prefix">
                                </div>
                                <div class="submit-section">
                                    <a onClick="adddepartment()" class="btn btn-primary submit-btn">Submit</a>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Department Modal -->
        </div>
        <!-- /Page Wrapper -->
<script type="text/javascript">
    function adddepartment() {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/adddepartment' : '#') }}";
        var form = $('#adddepartment').get(0);
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
    function editdepartment(id)
    {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/editdepartment' : '#') }}";
        var form = $('#editdepartment'+id).get(0);
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
    function deletedepartment(id)
    {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/deletedepartment' : '#') }}";
        var form = $('#editdepartment'+id).get(0);
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

