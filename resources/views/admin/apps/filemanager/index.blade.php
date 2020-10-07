@extends('layout.mainlayout')
@section('content')
	@php 
use Illuminate\Support\Facades\Storage;
	@endphp 
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<div class="row">
						<div class="col-sm-12">
							<div class="file-wrap">
								<div class="file-sidebar">
									<div class="file-header justify-content-center">
										<span>Projects</span>
										<a href="javascript:void(0);" class="file-side-close"><i class="fa fa-times"></i></a>
									</div>
									<form class="file-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fa fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search">
										</div>
									</form>
									<div class="file-pro-list">
										<div class="file-scroll">
											<ul class="file-menu ">
												<li class="active" id="all-project-files" role="tab">
													<a href="#">All Projects</a>
												</li>
												@foreach($projects as $project)
											<li id="{{$project->project_title}}" role="tab">
												<a  href="" >{{$project->project_title}} 
													<i id="arrow" class="fa fa fa-chevron-down rotate m-l-10"></i></a>
													@foreach($tasks as $index => $task)
													<ul class="">
												 	@if($task->project_id == $project->id)
														<li>
															<a href=""> {{$task->task_title}}</a>
														</li>
													 @endif
													</ul>
													@endforeach
												</li>
											</ul>
										@endforeach
											
											
											<div class="show-more">
												<a href="#">Show More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="file-cont-wrap">
									<div class="file-cont-inner">
										<div class="file-cont-header">
											<div class="file-options">
												<a href="javascript:void(0)" id="file_sidebar_toggle" class="file-sidebar-toggle">
													<i class="fa fa-bars"></i>
												</a>
											</div>
											<span>File Manager</span>
											<div class="file-options">
												<span class="btn-file"><input type="file" class="upload"><i class="fa fa-upload"></i></span>
											</div>
										</div>
										<div class="file-content">
											<form class="file-search">
												<div class="input-group">
													<div class="input-group-prepend">
														<i class="fa fa-search"></i>
													</div>
													<input type="text" class="form-control" placeholder="Search">
												</div>
											</form>
											<div class="file-body">
												<div class="file-scroll">
													<div class="file-content-inner"  style="display:block;" id="all-files-tab">
														<h4>Project Folders</h4>
														<div class="row row-sm">
															@for($i=0; $i< sizeof($directories); $i++)
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																	<i class="fa fa-folder folder-icon" aria-hidden="true"></i>

																	</div>
																	<div class="card-body">
																		<h6><a href="">{{str_replace("public/","", $directories[$i])}}</a></h6>
																		<span>10.45kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>1 min ago
																	</div>
																</div>
															</div>
															@endfor
														</div>

														<h4>Recent Files</h4>
														<div class="row row-sm">
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-pdf-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">Sample.pdf</a></h6>
																		<span>10.45kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>1 min ago
																	</div>
																</div>
															</div>

															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-word-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">Document.docx</a></h6>
																		<span>22.67kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>30 mins ago
																	</div>
																</div>
															</div>
															
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-image-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">icon.png</a></h6>
																		<span>12.47kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>1 hour ago
																	</div>
																</div>
															</div>
															
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-excel-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">Users.xls</a></h6>
																		<span>35.11kb</span>
																	</div>
																	<div class="card-footer">23 Jul 6:30 PM</div>
																</div>
															</div>

														</div>

														<h4>Files</h4>
														<div class="row row-sm">
															@for($i=0; $i< sizeof($files); $i++)
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
								<div class="card-file-thumb" id="{{\File::extension(str_replace('public/','', $files[$i]) )}}" >
																		<!--<i class="fa fa-file-word-o"></i> -->
																	</div>
																<div class="card-body" id="file-name" >
															<h6 ><a  href="" >{{str_replace("public/","", $files[$i]) }}</a></h6>
																		<span>{{round(Storage::size($files[$i])/1020,2)}}KB</span>
																	</div>
														
																									
							<div class="card-footer">Last Modified: {{date("H:i:s" ,Storage::lastModified($files[$i]))}}</div> 
						
																</div>
															</div>
															@endfor
														</div>
													</div>

													<div class="file-content-inner" style="display:none" id="hospital-files-tab">
														<h4>Hospital Management Files</h4>
														<div class="row row-sm">
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-pdf-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">Sample.pdf</a></h6>
																		<span>10.45kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>1 min ago
																	</div>
																</div>
															</div>

															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-word-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">Document.docx</a></h6>
																		<span>22.67kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>30 mins ago
																	</div>
																</div>
															</div>
															
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-image-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">icon.png</a></h6>
																		<span>12.47kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>1 hour ago
																	</div>
																</div>
															</div>
															
															<div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
																<div class="card card-file">
																	<div class="dropdown-file">
																		<a href="" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="#" class="dropdown-item">View Details</a>
																			<a href="#" class="dropdown-item">Share</a>
																			<a href="#" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
																			<a href="#" class="dropdown-item">Delete</a>
																		</div>
																	</div>
																	<div class="card-file-thumb">
																		<i class="fa fa-file-excel-o"></i>
																	</div>
																	<div class="card-body">
																		<h6><a href="">Users.xls</a></h6>
																		<span>35.11kb</span>
																	</div>
																	<div class="card-footer">23 Jul 6:30 PM</div>
																</div>
															</div>

														</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->

		
		
			<script>
				var links = [];
				$('#file-name a').each(function() {
				  
				 links.push( $(this).text() ); 
	         			       
				});

				 
				 for (var i=0; i < links.length; i++) {
  					

  					console.log(links[i]);

  					if (links[i].match('xlsx')){
						$("#xlsx").append('<i class="fa fa-file-excel-o excel-icon"></i>')
					}

					if (links[i].match('pdf')){
						$("#pdf").append('<i class="fa fa-file-pdf-o pdf-icon"></i> ')
					}
					if (links[i].match('docx')){
						$("#docx").append('<i class="fa fa-file-word-o word-icon"></i>')
					}
					if (links[i].match('png')){
						$("#png").append('<i class="fa fa-file-image-o word-icon"></i>')
					}



  				}

			</script>

			
@endsection