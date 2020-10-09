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
											<a href="#" id="folder_name" >{{ucwords(str_replace("$projectFolders_path","", $directories[$i]))}}</a>
							
											</div>
												<div class="dropdown-container" style="display:none">
													@php $path_new = $projectFolders_path . str_replace("$projectFolders_path","", $directories[$i]);
												
													    $task_folders = Storage::directories($path_new);
													
													  @endphp 
													<ul class="folder-menu">
										@foreach($task_folders as $task_folder)
														<li id="getTaskFiles" >
											 <i class="fa fa-folder folder-icon" aria-hidden="true"></i>
											
							 <a href="#" class="m-r-10"  id="folder_name">{{ucwords(str_replace($path_new.'/', "" , $task_folder) )}}</a>
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
											<div class="file-options"  data-toggle="modal" data-target="#drag_files">
												<span class="btn-file">
													<!--<input type="file" class="upload">-->
													<i class="fa fa-upload"></i>
												</span>
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
													<div class="d-flex" style="justify-content: space-between;">
														<h4>Project Folders</h4>
								<a href="#" class="followers-add" data-toggle="modal" data-target="#create_folder"><i class="material-icons">add</i></a>
							</div>
														
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
		<h6><a href="" id="folder_name" >{{str_replace("$projectFolders_path","", $directories[$i])}}</a></h6>
																		<span>10.45kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>1 min ago
																	</div>
																</div>

															</div>
															@endfor
														</div>
														@if(!empty($myFolders))
														<h4>My Folders</h4>
														<div class="row row-sm">
															@foreach($myFolders as $folders)
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
															<h6><a href="">{{str_replace("$myFolder_path","", $folders)}}</a></h6>
																		<span>10.45kb</span>
																	</div>
																	<div class="card-footer">
																		<span class="d-none d-sm-inline">Last Modified: </span>1 min ago
																	</div>
																</div>
															</div>
																@endforeach
															@endif
													

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
															<a download href="{{Storage::url($files[$i])}}" class="dropdown-item">Download</a>
																			<a href="#" class="dropdown-item">Rename</a>
				<a href="#" data-name="{{str_replace('public/FileManager/','', $files[$i]) }}" class="dropdown-item" id="delete">Delete</a>
																		</div>
																	</div>
																	@php $ext =\File::extension(str_replace('public/FileManager','', $files[$i]) );  @endphp 

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
																	

																	
																	

																<div class="card-body">
											<h6 ><a download id="file-name" href="{{Storage::url($files[$i])}}" >{{str_replace("public/FileManager/","", $files[$i]) }}</a></h6>
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

<!-- Task Followers Modal -->
<div id="create_folder" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Create Folder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
                           {{ Form::open(array( 'id' => 'CreateFolder' ,  'enctype'=>'multipart/form-data')) }}  
                              	<div class="form-group">
                                            <label class="col-form-label">Folder Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="folder_name">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Folder Path <span class="text-danger">*</span></label>
                                            <input class="form-control" readonly type="text" name="path" placeholder="{{$myFolder_path}}" value="{{$myFolder_path}}">
                                        </div>
                              {{ Form::close() }}
            <div>
               
            </div>
            <div class="submit-section">
               <a href="#" onClick="createFolder()" class="btn btn-success submit-btn">Create Folder</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /Task Followers Modal -->


<!-- Drogfiles Modal -->
				<div id="drag_files" class="modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Drag and drop files upload</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
                          									  	
											   
                           {{ Form::open(array( 'id' => 'uploadFiles' ,  'enctype'=>'multipart/form-data')) }}  
										      
										              <div class="form-group files color">
										            
										      <input type="file" class="form-control" multiple="" name="files[]" id="attachment">
										              </div>
										{{ Form::close() }}

										          <div id="preview"  style="display:none">
												         <ul id="result" class="list-style">
												         </ul>
												      </div>	
											      
										      
											
								<div class="submit-section">
									<a href="#" onClick = "uploadFiles()"class="btn btn-primary submit-btn">Upload</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Drogfiles Modal -->
	

<script type="text/javascript">

          $(document).on('click', '#delete',  function(e) {

          	  var file_name = $(this).attr('data-name');

          	  console.log(file_name);

          	 e.preventDefault();

          	  $.ajaxSetup({
				   headers: {
				     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				   }
				   });

                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/deletefile' : '#') }}";  
                var form = $('#uploadFiles').get(0);
             
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {file_name:file_name},
                   
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

          });
				 
				
          

        </script>

<script type="text/javascript">

            function uploadFiles() {
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/uploadfiles' : '#') }}";  
                var form = $('#uploadFiles').get(0);
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

            function createFolder() {
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/createfolder' : '#') }}";  
                var form = $('#CreateFolder').get(0);
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
   
		
			<script>
	var attachment_array = [];
    var attachment_index = 0;
    var div_id = 0;
   $(function(){
        
      //Check File API support
      if(window.File && window.FileList && window.FileReader)
      {
          var filesInput = document.getElementById("attachment");
          filesInput.addEventListener("change", function(event){
              $('#result').show();
               $('#preview').attr('style','display:flex');
   
              var files = event.target.files; //FileList object
               for(var i = 0; i<files.length; i++){
                  attachment_array[attachment_index] = files[i];
                  attachment_index++;
               	var fname = files[i].name;
               	fextension = fname.substring(fname.lastIndexOf('.')+1);
                
                   Extensions = ["jpg","pdf","jpeg","gif","png","doc","docx","xls","xlsx","ppt","pptx","txt","zip","rar","gzip"];
   
                   img_ext = ["jpg","png","jpeg","gif","svg"];
   
                   code_ext = ["php","html","css"]
   
                  if(fextension.match('pdf')){
   
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-pdf-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                  }
                  if(fextension.match('docx')){
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-word-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                  }
                  if(fextension.match('xlsx')){
   
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-excel-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                  }
                  if(fextension.match('csv')){
   
                      $("<li id = '"+div_id+"' class='file-preview-fm' ><i class='fa fa-file fa-2x' aria-hidden='true'></i><i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                       
                  }
                  //Only pics
                  if(img_ext.includes(fextension)){
                  	                     
                 img_src = window.URL.createObjectURL(files[i]);
                                    
           	  $("<li id = '"+div_id+"' class='file-preview-fm'><img class='thumbnail' src='" + img_src + "'" +  "title='" + fname + "'/> <span>" + fname + "</span><i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
                   
                  }
                  
                 if(fextension.match('zip')){
   
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-archive-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                       
                  }
                  if(fextension.match('mp4')){
   
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-video-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                       
                  }
                  if(fextension.match('ppt')){
   
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-powerpoint-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                       
                  }
                   if(fextension.match('txt')){
   
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-text-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                       
                  }
                   if(code_ext.includes(fextension)){
   
                      $("<li id = '"+div_id+"'  class='file-preview-fm'><i class='fa fa-file-code-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
   
                       
                  }
   
                  div_id++;
                          
               }
              var output = document.getElementById("result");
   
               
              
                     
             
          });
      }
      else
      {
          console.log("Your browser does not support File API");
      }
   });
     
   
</script>

<script>
   var deleted_attachment_array = [];
   var deleted_attachment_key = 0;
   $("#result").on('click', '#remove_file' , function() {
   
   	
   	$(this).closest('li').remove();

      
      var id=$(this).closest('li').attr("id");
      deleted_attachment_array[deleted_attachment_key] = parseInt(id);
      deleted_attachment_key++;
      // files.splice(id,1);
         
      if (!$(".list-style").find('li').length) {
      		$('#preview').hide()
    }
   	
   
   });
</script>

			
@endsection