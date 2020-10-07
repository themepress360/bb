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
											</ul>
												@for($i=0; $i< sizeof($directories); $i++)
											<div class="dropdown-btn m-b-10" id="getTaskFolders">
											<i class="fa fa-folder folder-icon" aria-hidden="true"></i>	
											<a href="#" id="folder_name" >{{ucwords(str_replace("public/FileManager/","", $directories[$i]))}}</a>
							
											</div>
												<div class="dropdown-container" style="display:none">
													@php $path = 'public/FileManager/' . str_replace("public/FileManager/","", $directories[$i]);
												
													   $task_folders = Storage::directories($path);
													
													  @endphp 
													<ul class="folder-menu">
										@foreach($task_folders as $task_folder)
														<li id="getTaskFiles" >
											 <i class="fa fa-folder folder-icon" aria-hidden="true"></i>
											
							 <a href="#" class="m-r-10"  id="folder_name">{{ucwords(str_replace($path.'/', "" , $task_folder) )}}</a>
							 <input type="hidden" id="path" value="{{str_replace('public/FileManager/','', $directories[$i] . '/')}}">
														</li>
														@endforeach
													</ul>
													 
												</div>
											
										@endfor
											
											
											<!--<div class="show-more">
												<a href="#">Show More</a>
											</div> -->
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
				
					<div class="card card-file" id="getTaskFolders">
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
																	<div class="card-file-thumb" >
																	<i class="fa fa-folder folder-icon" aria-hidden="true"></i>

																	</div>
																	<div class="card-body" >
		<h6><a href="" id="folder_name" >{{str_replace("public/FileManager/","", $directories[$i])}}</a></h6>
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
																	@php $ext =\File::extension(str_replace('public/','', $files[$i]) );  @endphp 

																	@if($ext == "png")
																	<div class="card-file-thumb" id="" >
																		<i class="fa fa-file-image-o word-icon"></i>
																	</div>
																	@endif
																	@if($ext == "docx")
																	<div class="card-file-thumb" id="" >
																		<i class="fa fa-file-word-o word-icon"></i>
																	</div>
																	@endif
																	@if($ext == "svg")
																	<div class="card-file-thumb" id="" >
																		<i class="fa fa-file-image-o svg-icon"></i>
																	</div>
																	@endif
																	@if($ext == "jpeg")
																	<div class="card-file-thumb" id="" >
																		<img src="{{asset('/img/jpeg-icon.svg')}}" width="58" height="58">
																	</div>
																	@endif
																	@if($ext == "jpg")
																	<div class="card-file-thumb" id="" >
																		<img src="{{asset('/img/jpg-icon.svg')}}" width="58" height="58">
																	</div>
																	@endif
																	@if($ext == "gif")
																	<div class="card-file-thumb" id="" >
																		<img src="{{asset('/img/gif-icon.svg')}}" width="58" height="58">
																	</div>
																	@endif
																	@if($ext == "pdf")
																	<div class="card-file-thumb" id="" >
																		<i class="fa fa-file-pdf-o pdf-icon"></i>
																	</div>
																	@endif
																	@if($ext == "xlsx")
																	<div class="card-file-thumb" id="" >
																		<i class="fa fa-file-excel-o excel-icon"></i>
																	</div>
																	@endif
																	@if($ext == "zip")
																	<div class="card-file-thumb" id="" >
																		<i class="fa fa-file-archive-o zip-icon" aria-hidden="true"></i>
																	</div>
																	@endif
																	@if($ext == "rar")
																	<div class="card-file-thumb" id="" >
																		<img src="{{asset('/img/rar-icon.svg')}}" width="58" height="58">
																	</div>
																	@endif
																	@if($ext == "txt")
																	<div class="card-file-thumb" id="" >
																		<i class="fa fa-file-text-o" aria-hidden="true"></i>
																	</div>
																	@endif
																	@if($ext == "pptx")
																	<div class="card-file-thumb ppt-icon" id="" >
																		<i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>
																	</div>
																	@endif
																	@if($ext == "mp4")
																	<div class="card-file-thumb ppt-icon" id="" >
																			<img src="{{asset('/img/mp4-icon.svg')}}" width="58" height="58">
																	</div>
																	@endif
																	

																	
																	

																<div class="card-body" id="file-name" >
											<h6 ><a download href="{{Storage::url($files[$i])}}" >{{str_replace("public/FileManager/","", $files[$i]) }}</a></h6>
																		<span>{{round(Storage::size($files[$i])/1020,2)}}KB</span>
																	</div>
														
																									
							<div class="card-footer">Last Modified: {{date("H:i:s" ,Storage::lastModified($files[$i]))}}</div> 
						
																</div>
															</div>
															@endfor
														</div>
													</div>

													<div class="file-content-inner" id="displayTaskFolders">

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
  					
				 	//console.log(links[i]);

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

					 if(links[i].match('jpeg')){

					 	$("#jpeg").append('<i class="fa fa-file-image-o word-icon"></i>')
					 }
					 if(links[i].match('jif')){

					 	$("#gif").append('<i class="fa fa-file-image-o word-icon"></i>')
					 }
					 if(links[i].match('jpg')){

					 	$("#jpg").append('<i class="fa fa-file-image-o word-icon"></i>')
					 }
					 if(links[i].match('svg')){

					 	$("#svg").append('<i class="fa fa-file-image-o svg-icon"></i>')
					 }



  				}

			</script>

			<script>
				var dropdown = document.getElementsByClassName("dropdown-btn");
					var i;

					for (i = 0; i < dropdown.length; i++) {
					  dropdown[i].addEventListener("click", function() {
					    this.classList.toggle("active");
					    var dropdownContent = this.nextElementSibling;
					    if (dropdownContent.style.display === "block") {
					      dropdownContent.style.display = "none";
					    } else {
					      dropdownContent.style.display = "block";
					    }
					  });
					} 
			</script>

			<script>
				
				$(document).on('click', '#getTaskFolders',  function(e) {
				 e.preventDefault();
 					
				   //console.log(task_id);             
				      $.ajaxSetup({
				   headers: {
				     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				   }
				   });
   	
          var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/gettaskfolders' : '#') }}";  
        
          var folder_name = $(this).find("#folder_name").text();


          console.log(folder_name);
          
          //var status = status;
   
          
          $.ajax({
              type: "POST",
              async: false,
              url: url,
             
              data: {folder_name:folder_name},
              
              success: function(response)
              {
                  if(response.status == "SUCCESS")
                  {
                      toastr['success'](response.message);
                      $('#all-files-tab').attr("style","display:none")
                      $('#displayTaskFolders').html();
                      $("#displayTaskFolders").html(response.data.gettaskfoldershtml);

                      }
                  else
                  {
                      toastr['error'](response.message);

                  }    
              }
              
          }); 

			});   
					   
    	   </script>
  				

  				<script>
					$(document).on('click', '#getTaskFiles',  function(e) {

			 e.preventDefault();
           
				      $.ajaxSetup({
				   headers: {
				     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				   }
				   });
   	
          var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/gettaskfiles' : '#') }}";  
        
          var folder_name = $(this).find("#folder_name").text();
           var path = $(this).find("#path").val();

          console.log(folder_name);
          console.log(path);
          
          //var status = status;
   
          
          $.ajax({
              type: "POST",
              async: false,
              url: url,
             
              data: {folder_name:folder_name,path:path},
              
              success: function(response)
              {
                  if(response.status == "SUCCESS")
                  {
                      toastr['success'](response.message);
                      $('#all-files-tab').attr("style","display:none")
                      $('#displayTaskFolders').html();
                      $("#displayTaskFolders").html(response.data.gettaskfileshtml);

                      }
                  else
                  {
                      toastr['error'](response.message);

                  }    
              }
              
          }); 

			});   
					   
    	   </script>
   
		
			
@endsection