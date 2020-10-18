@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
				<div class="chat-main-row">
					<div class="chat-main-wrapper">
						<div class="col-lg-8 message-view task-view">
							<div class="chat-window">
								<div class="ticket-fixed-header">
									<div class="ticket-navbar">
										<div class="ticket-view-details">
											<div class="ticket-header">
												<span>Status: </span> <span class="badge badge-warning">New</span> <span class="m-l-15 text-muted">Client: </span>
												<a href="#">Delta Infotech</a>    
												<span class="m-l-15 text-muted">Created: </span>
												<span>5 Jan 2019 07:21 AM </span> 
												<span class="m-l-15 text-muted">Created by:</span>
												<span><a href="profile">John Doe</a></span>
																					
											</div>
							 
										</div>
										
										<div class="navbar">
										<span class="m-l-15 m-r-10">Assigned to:</span>
												<a href="#" data-toggle="tooltip" data-placement="bottom" title="John Doe" class="avatar">
												<img src="http://ec2-107-22-52-19.compute-1.amazonaws.com/storage/profile_images/5f67c0e8df9f3.jpg" alt="">
												</a>
										<a href="#" class="followers-add" title="Add Assignee" data-toggle="modal" data-target="#assignee">
												<i class="material-icons">add</i></a>
											</div>
									</div>
									<ul class="nav float-right custom-menu">
											<li class="nav-item dropdown dropdown-action">
												<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_ticket">Edit Ticket</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_ticket">Delete Ticket</a>
												</div>
											</li>
										</ul>
														

								</div> 
								

								<div class="chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div class="task-wrapper">
													<div class="card">
														<div class="card-body">
															<div class="project-title">
																<div class="m-b-20">
																	<span class="h5 card-title ">Laptop Issue</span>
																	<div class="float-right ticket-priority"><span>Priority:</span>
																		<div class="btn-group">
																			<a href="#" class="badge badge-danger dropdown-toggle" data-toggle="dropdown">Highest </a>
																			<div class="dropdown-menu dropdown-menu-right">
																				<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a>
																				<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a>
																				<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a>
																				<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														<div class="d-flex">
															
															<div class="timeline-comment border-md timeline-comment--caret">
															<p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel elit neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum sollicitudin libero vitae est consectetur, a molestie tortor consectetur. Aenean tincidunt interdum ipsum, id pellentesque diam suscipit ut. Vivamus massa mi, fermentum eget neque eget, imperdiet tristique lectus. Proin at purus ut sem pellentesque tempor sit amet ut lectus. Sed orci augue, placerat et pretium ac, hendrerit in felis. Integer scelerisque libero non metus commodo, et hendrerit diam aliquet. Proin tincidunt porttitor ligula, a tincidunt orci pellentesque nec. Ut ultricies maximus nulla id consequat. Fusce eu consequat mi, eu euismod ligula. Aliquam porttitor neque id massa porttitor, a pretium velit vehicula. Morbi volutpat tincidunt urna, vel ullamcorper ligula fermentum at. </p>
															<p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel elit neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum sollicitudin libero vitae est consectetur, a molestie tortor consectetur. Aenean tincidunt interdum ipsum, id pellentesque diam suscipit ut. Vivamus massa mi, fermentum eget neque eget, imperdiet tristique lectus. Proin at purus ut sem pellentesque tempor sit amet ut lectus. Sed orci augue, placerat et pretium ac, hendrerit in felis. Integer scelerisque libero non metus commodo, et hendrerit diam aliquet. Proin tincidunt porttitor ligula, a tincidunt orci pellentesque nec. Ut ultricies maximus nulla id consequat. Fusce eu consequat mi, eu euismod ligula. Aliquam porttitor neque id massa porttitor, a pretium velit vehicula. Morbi volutpat tincidunt urna, vel ullamcorper ligula fermentum at. </p>
														
													</div>
													<div>
															<span class="timeline-comment-avatar m-l-10"><a href="">
																<img class="avatar avatar-user" src="http://ec2-107-22-52-19.compute-1.amazonaws.com/storage/profile_images/5f67c0c3c7a22.jpg" alt="" width="40" height="40">
															</a></span>
														</div>
												</div>

												<div class="d-flex">
													<div>
															<span class="timeline-comment-avatar"><a href="">
																<img class="avatar avatar-user" src="http://ec2-107-22-52-19.compute-1.amazonaws.com/storage/profile_images/5f64e7147f43b.jpg" alt="" width="40" height="40">
															</a></span>
														</div>

															<div class="timeline-comment border-md timeline-comment--caret-left">
																<div class="timeline-comment-header">
																	<span><a href="">themepress360</a></span> commented 1 hour ago
																</div>
															<p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel elit neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum sollicitudin libero vitae est consectetur, a molestie tortor consectetur. Aenean tincidunt interdum ipsum, id pellentesque diam suscipit ut. Vivamus massa mi, fermentum eget neque eget, imperdiet tristique lectus. Proin at purus ut sem pellentesque tempor sit amet ut lectus. Sed orci augue, placerat et pretium ac, hendrerit in felis. Integer scelerisque libero non metus commodo, et hendrerit diam aliquet. Proin tincidunt porttitor ligula, a tincidunt orci pellentesque nec. Ut ultricies maximus nulla id consequat. Fusce eu consequat mi, eu euismod ligula. Aliquam porttitor neque id massa porttitor, a pretium velit vehicula. Morbi volutpat tincidunt urna, vel ullamcorper ligula fermentum at. </p>
																													
													</div>
													
												</div>
											
											<div class="d-flex">
															
															<div class="timeline-comment border-md timeline-comment--caret">

																<div class="timeline-comment-header">
																<span class="comment-reply-right"><a href="">Delta Infotech</a>  replied 30min ago</span>
																</div>

															<p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel elit neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum sollicitudin libero vitae est consectetur, a molestie tortor consectetur. Aenean tincidunt interdum ipsum, id pellentesque diam suscipit ut. Vivamus massa mi, fermentum eget neque eget, imperdiet tristique lectus. Proin at purus ut sem pellentesque tempor sit amet ut lectus. Sed orci augue, placerat et pretium ac, hendrerit in felis. Integer scelerisque libero non metus commodo, et hendrerit diam aliquet. Proin tincidunt porttitor ligula, a tincidunt orci pellentesque nec. Ut ultricies maximus nulla id consequat. Fusce eu consequat mi, eu euismod ligula. Aliquam porttitor neque id massa porttitor, a pretium velit vehicula. Morbi volutpat tincidunt urna, vel ullamcorper ligula fermentum at. </p>
															
														
													</div>
													<div>
															<span class="timeline-comment-avatar m-l-10"><a href="">
																<img class="avatar avatar-user" src="http://ec2-107-22-52-19.compute-1.amazonaws.com/storage/profile_images/5f67c0c3c7a22.jpg" alt="" width="40" height="40">
															</a></span>
														</div>
												</div>

												<div class="d-flex">
												<div style="position:relative;">
															<span class="timeline-comment-avatar"><a href="">
																<img class="avatar avatar-user" src="http://ec2-107-22-52-19.compute-1.amazonaws.com/storage/profile_images/5f64e7147f43b.jpg" alt="" width="40" height="40">
															</a></span>

												<a class="link attach-icon" href="#" style="position:absolute;bottom:25px">
								               <span class="btn-file">
								               <input multiple="" type="file" class="upload" name="attachment[]" id="attachment">
								               <img type="file" src="http://127.0.0.1:8000/img/attachment.png" alt=""></span>
								               </a>
								           </div>
											    
										<div id="froala-editor" class="comment-editor timeline-comment--caret-editor" style="width:100%">		
											
											</div>
											
											
								          

										   </div>
														 <a href="#" class="btn add-btn"><i class="fa fa-send"></i> Submit Ticket</a>
													</div>
													
													<div id="preview"  style="display:none">
												      <ul id="result" class="list-style">
												      </ul>
												   </div>

												</div>
												
												<div class="notification-popup hide">
													<p>
														<span class="task"></span>
														<span class="notification-text"></span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>
				
				<!-- Edit Ticket Modal -->
				<div id="edit_ticket" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Ticket</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Ticket Subject</label>
												<input class="form-control" type="text" value="Laptop Issue">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Ticket Id</label>
												<input class="form-control" type="text" readonly value="TKT-0001">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Assign Staff</label>
												<select class="select">
													<option>-</option>
													<option selected>Mike Litorus</option>
													<option>John Smith</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Client</label>
												<select class="select">
													<option>-</option>
													<option >Delta Infotech</option>
													<option selected>International Software Inc</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Priority</label>
												<select class="select">
													<option>High</option>
													<option selected>Medium</option>
													<option>Low</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>CC</label>
												<input class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Assign</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Ticket Assignee</label>
												<div class="project-members">
													<a title="John Smith" data-toggle="tooltip" href="#" >
														<img src="img/profiles/avatar-10.jpg" alt="">
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Add Followers</label>
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Ticket Followers</label>
												<div class="project-members">
													<a title="Richard Miles" data-toggle="tooltip" href="#" class="avatar">
														<img src="img/profiles/avatar-09.jpg" alt="">
													</a>
													<a title="John Smith" data-toggle="tooltip" href="#" class="avatar">
														<img src="img/profiles/avatar-10.jpg" alt="">
													</a>
													<a title="Mike Litorus" data-toggle="tooltip" href="#" class="avatar">
														<img src="img/profiles/avatar-05.jpg" alt="">
													</a>
													<a title="Wilmer Deluna" data-toggle="tooltip" href="#" class="avatar">
														<img src="img/profiles/avatar-11.jpg" alt="">
													</a>
													<span class="all-team">+2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Description</label>
												<textarea class="form-control" rows="4"></textarea>
											</div>
											<div class="form-group">
												<label>Upload Files</label>
												<input class="form-control" type="file">
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Ticket Modal -->
				
				<!-- Delete Ticket Modal -->
				<div class="modal custom-modal fade" id="delete_ticket" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Ticket</h3>
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
				<!-- /Delete Ticket Modal -->
				
				<!-- Assignee Modal -->
				<div id="assignee" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Assign to this task</h5>
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
													<span class="avatar">
														<img src="img/profiles/avatar-09.jpg" alt="">
													</span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">Richard Miles</div>
														<span class="designation">Web Developer</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar">
														<img src="img/profiles/avatar-10.jpg" alt="">
													</span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">John Smith</div>
														<span class="designation">Android Developer</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="media">
													<span class="avatar">
														<img src="img/profiles/avatar-10.jpg" alt="">
													</span>
													<div class="media-body align-self-center text-nowrap">
														<div class="user-name">Jeffery Lalor</div>
														<span class="designation">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Assign</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Assignee Modal -->
				
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
													<span class="avatar">
														<img src="img/profiles/avatar-10.jpg" alt="">
													</span>
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
													<span class="avatar">
														<img src="img/profiles/avatar-08.jpg" alt="">
													</span>
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
													<span class="avatar">
														<img src="img/profiles/avatar-11.jpg" alt="">
													</span>
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

			<!-- Include JS file. -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js'></script>

<script>
new FroalaEditor('div#froala-editor', {
  // Set custom buttons.
  quickInsertEnabled:false,
  toolbarButtons: [['bold', 'italic', 'underline', 'strikeThrough', ], ['insertLink','fontFamily', 'fontSize', 'textColor', 'backgroundColor','emoticons']]
})

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
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-pdf-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
            }
            if(fextension.match('docx')){
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-word-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
            }
            if(fextension.match('xlsx')){
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-excel-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
            }
            if(fextension.match('csv')){
               $("<li id = '"+div_id+"' ><i class='fa fa-file fa-2x' aria-hidden='true'></i><i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
            }
            //Only pics
            if(img_ext.includes(fextension)){                              
               img_src = window.URL.createObjectURL(files[i]);                       
               $("<li id = '"+div_id+"' class='file-preview'><img class='thumbnail' src='" + img_src + "'" +  "title='" + fname + "'/> " + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');      
            }
            if(fextension.match('zip')){
               $("<li id = '"+div_id+"' ><i class='fa fa-file-archive-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');          
            }
            if(fextension.match('zip')){
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-archive-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');             
            }
            if(fextension.match('mp4')){     
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-video-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
            }
            if(fextension.match('ppt')){
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-powerpoint-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
            }
            if(fextension.match('txt')){
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-text-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
            }
            if(code_ext.includes(fextension)){
               $("<li id = '"+div_id+"'  class='file-preview'><i class='fa fa-file-code-o fa-2x' aria-hidden='true'></i>" + fname + "<i class='fa fa-times close' id='remove_file' aria-hidden='true'></i></li>").appendTo('#result');
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
	 $("#result").on('click', '#remove_file' , function() {  
	 
      $(this).closest('li').remove();
      var num = $("#result").find("li").length;
      console.log(num);
      if (num < 1) {
		  console.log(num);
		$('#preview').hide();
		}

  });

	</script>
	
@endsection