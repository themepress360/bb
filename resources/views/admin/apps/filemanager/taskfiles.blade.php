<div class="file-content-inner"  style="display:block;" id="all-files-tab">
														<h4>{{$folder_name}} (Folders & Files)</h4>
													<!--	<div class="row row-sm">
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
														</div> -->

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
																	
																<div class="card-body" id="task-file-name" >
															<h6 ><a  href="" >{{str_replace("$file_path/","", $files[$i]) }}</a></h6>
																		<span>{{round(Storage::size($files[$i])/1020,2)}}KB</span>
																	</div>
														
																									
							<div class="card-footer">Last Modified: {{date("H:i:s" ,Storage::lastModified($files[$i]))}}</div> 
						
																</div>
															</div>
															@endfor
														</div>
													</div>

							<script>
							var links = [];
							$('#task-file-name a').each(function() {
							  
							 links.push( $(this).text() ); 
				         			       
							});

							 
							 for (var i=0; i < links.length; i++) {
			

			  				//	console.log(links[i]);

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