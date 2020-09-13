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
                            <h3 class="page-title">Designations</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/dashboard' : '#') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Designations</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Designation </th>
                                        <th>Department </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($designations as $designation)
                                    <tr>
                                        <td>{{$designation['id']}}</td>
                                        <td>{{ucwords($designation['name'])}}</td>
                                        <td>{{ucwords($designation['dept_name'])}}</td>
                                        <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_designation{{$designation['id']}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_designation{{$designation['id']}}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                            </div>
                                        </td>
                                        <!-- Edit Designation Modal -->
                                            <div id="edit_designation{{$designation['id']}}" class="modal custom-modal fade" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Designation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ Form::open(array( 'id' => 'editdesignation'.$designation['id'] )) }}
                                                            @csrf
                                                                <input type="hidden" name="designation_id" value="{{$designation['id']}}">
                                                                <div class="form-group">
                                                                    <label>Designation Name <span class="text-danger">*</span></label>
                                                                    <input class="form-control" name="name" value="{{ucwords($designation['name'])}}" type="text">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Department <span class="text-danger">*</span></label>
                                                                    <select class="select" name="department_id">
                                                                        <option>Select Department</option>
                                                                        @foreach($department as $dept)
                                                                        <option {{$dept['id'] == $designation['department_id'] ? 'selected' : ''}} value ="{{$dept['id']}}" >{{ucwords($dept['name'])}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="submit-section">
                                                                    <a onClick="editdesignation('{{$designation['id']}}')" class="btn btn-primary submit-btn">Save</a>
                                                                </div>
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Edit Designation Modal -->
                                            
                                            <!-- Delete Designation Modal -->
                                            <div class="modal custom-modal fade" id="delete_designation{{$designation['id']}}" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="form-header">
                                                                <h3>Delete Designation</h3>
                                                                <p>Are you sure want to delete?</p>
                                                            </div>
                                                            <div class="modal-btn delete-action">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <a onClick="deletedesignation('{{$designation['id']}}')" class="btn btn-primary continue-btn">Delete</a>
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
                                            <!-- /Delete Designation Modal -->
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

            <!-- Add Designation Modal -->
            <div id="add_designation" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Designation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           {{ Form::open(array('id' => 'adddesignation' )) }}
                            @csrf
                                <div class="form-group">
                                    <label>Designation Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                   <select class="select" name="department_id">
                                        <option>Select Department</option>
                                        @foreach($department as $dept)
                                        <option value ="{{$dept['id']}}" >{{ucwords($dept['name'])}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="submit-section">
                                    <a onClick="adddesignation()" class="btn btn-primary submit-btn">Submit</a>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Designation Modal -->
        </div>
        <!-- /Page Wrapper -->
<script type="text/javascript">
    function adddesignation() {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/adddesignation' : '#') }}";
        var form = $('#adddesignation').get(0);
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
    function editdesignation(id)
    {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/editdesignation' : '#') }}";
        var form = $('#editdesignation'+id).get(0);
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
                    //window.location = "";
                }
                else
                {
                    toastr['error'](response.message);
                }    
            }
        });
    }
    function deletedesignation(id)
    {
        var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/deletedesignation' : '#') }}";
        var form = $('#editdesignation'+id).get(0);
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