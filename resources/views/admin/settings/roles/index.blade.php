@extends('layout.mainlayout')
@section('content')
   
			@include('admin.settings.sidebar')
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Roles & Permissions</h3>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
							<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> Add Roles</a>
							<div class="roles-menu">
								<ul>
									@foreach($roles as $index => $role_list)
									<li class="active">
										<a href="#">{{ucwords($role_list['role_name'])}}
											<span class="role-action">
												<span class="action-circle large" data-toggle="modal" data-target="#edit_role{{$role_list['id']}}">
													<i class="material-icons">edit</i>
												</span>
				<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role{{$role_list['id']}}">
													<i class="material-icons">delete</i>
												</span> 
											</span>
										</a>
									</li>

									<!-- Edit Role Modal -->
				<div id="edit_role{{$role_list['id']}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-md">
							<div class="modal-header">
								<h5 class="modal-title">Edit Role</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							{{ Form::open(array( 'id' => 'EditRole'.$role_list['id'])) }}
                               @csrf
									<div class="form-group">
										<label>Role Name <span class="text-danger">*</span></label>
										<input class="form-control" value="{{$role_list['role_name']}}" type="text" name="role_name">
										<input type="hidden" value="{{$role_list['id']}}" name="role_id">
									</div>
									<div class="submit-section">
										<a onClick="EditRole('{{$role_list['id']}}')" class="btn btn-primary submit-btn">Save</a>
									</div>
								 {{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Role Modal -->


				<!-- Delete Role Modal -->
				<div class="modal custom-modal fade" id="delete_role{{$role_list['id']}}" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Role</h3>
									<p>Are you sure want to delete?</p>
								</div>
								
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<input type="hidden" value="{{$role_list['id']}}" name="role_id">
											<a onClick="DeleteRole('{{$role_list['id']}}')" href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
											
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
				<!-- /Delete Role Modal -->

								@endforeach
				
								</ul>


							</div>
						</div>



						<div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
							<h6 class="card-title m-b-20">Module Access</h6>
							<div class="m-b-30">
								<ul class="list-group notification-list">
									<li class="list-group-item">
										Client
										<div class="status-toggle">
											<input type="checkbox" id="staff_module" class="check">
											<label for="staff_module" class="checktoggle">checkbox</label>
										</div>
									</li>
									<li class="list-group-item">
										Projects
										<div class="status-toggle">
											<input type="checkbox" id="holidays_module" class="check" checked>
											<label for="holidays_module" class="checktoggle">checkbox</label>
										</div>
									</li>
									<li class="list-group-item">
										Tasks
										<div class="status-toggle">
											<input type="checkbox" id="leave_module" class="check" checked>
											<label for="leave_module" class="checktoggle">checkbox</label>
										</div>
									</li>
									
								</ul>
							</div>      	
							<div class="table-responsive">
								<table class="table table-striped custom-table">
									<thead>
										<tr>
											<th>Module Permission</th>
											<th class="text-center">Read</th>
											<th class="text-center">Write</th>
											<th class="text-center">Create</th>
											<th class="text-center">Delete</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Clients</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											
										</tr>
										<tr>
											<td>Projects</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											
										</tr>
										<tr>
											<td>Tasks</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											<td class="text-center">
												<input type="checkbox" checked="">
											</td>
											
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
				<!-- Add Role Modal -->
                              
				<div id="add_role" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Role</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							  {{ Form::open(array( 'id' => 'AddRole')) }}
							   <input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Role Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="role_name">
									</div>
									<div class="submit-section">
										<a onClick="addRole()" class="btn btn-primary submit-btn" >Submit</a>
									</div>
								 {{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Role Modal -->
							
             </div>
			<!-- /Page Wrapper -->
			</div>
		<!-- /Main Wrapper -->


<script type="text/javascript">
            function addRole() {
           	
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addrole' : '#') }}";  
                var form = $('#AddRole').get(0);
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


            function EditRole(id)
            {
                
            	console.log(id);

                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/editrole' : '#') }}";
                var form = $('#EditRole'+id).get(0);
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




            	 function DeleteRole(id)
            {
                            	
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/deleterole' : '#') }}";
                var form = $('#EditRole'+id).get(0);
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