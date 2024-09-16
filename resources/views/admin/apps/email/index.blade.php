@extends('layout.mainlayout')
@section('content')
   
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<ul>
							<li> 
								<a href="{{url('/admin/dashboard')}}"><i class="la la-home"></i> <span>Back to Home</span></a>
							</li>
							<li class="active"> 
								<a href="inbox">Inbox <span class="mail-count">({{count($unread)}})</span></a>
							</li>
							<li> 
								<a href="#">Starred</a>
							</li>
							<li> 
								<a href="#">Sent Mail</a>
							</li>
							<li> 
								<a href="#">Trash</a>
							</li>
							<li> 
								<a href="#">Draft <span class="mail-count">(8)</span></a>
							</li>
							<li class="menu-title">Label <a href="#"><i class="fa fa-plus"></i></a></li>
							<li> 
								<a href="#"><i class="fa fa-circle text-success mail-label"></i> Work</a>
							</li>
							<li> 
								<a href="#"><i class="fa fa-circle text-danger mail-label"></i> Office</a>
							</li>
							<li> 
								<a href="#"><i class="fa fa-circle text-warning mail-label"></i> Personal</a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
@php

									$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "", "");

											// get information about the current mailbox (INBOX in this case)
											$mboxCheck = imap_check($mbox);

											// get the total amount of messages
											$totalMessages = $mboxCheck->Nmsgs;
											
											//echo($totalMessages);

											// select how many messages you want to see
											$showMessages = 10;

											// get those messages    
								$result = array_reverse(imap_fetch_overview($mbox,($totalMessages-$showMessages+1).":".$totalMessages));

											@endphp 			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Inbox</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Inbox</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="compose" class="btn add-btn"><i class="fa fa-plus"></i> Compose</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card mb-0">
								<div class="card-body">
									<div class="email-header">
										<div class="row">
											<div class="col top-action-left">
												<div class="float-left">
													<div class="btn-group dropdown-action">
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">Select <i class="fa fa-angle-down "></i></button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">All</a>
															<a class="dropdown-item" href="#">None</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Read</a>
															<a class="dropdown-item" href="#">Unread</a>
														</div>
													</div>
													<div class="btn-group dropdown-action">
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">Actions <i class="fa fa-angle-down "></i></button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">Reply</a>
															<a class="dropdown-item" href="#">Forward</a>
															<a class="dropdown-item" href="#">Archive</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Mark As Read</a>
															<a class="dropdown-item" href="#">Mark As Unread</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</div>
													<div class="btn-group dropdown-action">
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown"><i class="fa fa-folder"></i> <i class="fa fa-angle-down"></i></button>
														<div role="menu" class="dropdown-menu">
															<a class="dropdown-item" href="#">Social</a>
															<a class="dropdown-item" href="#">Forums</a>
															<a class="dropdown-item" href="#">Updates</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Spam</a>
															<a class="dropdown-item" href="#">Trash</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">New</a>
														</div>
													</div>
													<div class="btn-group dropdown-action">
														<button type="button" data-toggle="dropdown" class="btn btn-white dropdown-toggle"><i class="fa fa-tags"></i> <i class="fa fa-angle-down"></i></button>
														<div role="menu" class="dropdown-menu">
															<a class="dropdown-item" href="#">Work</a>
															<a class="dropdown-item" href="#">Family</a>
															<a class="dropdown-item" href="#">Social</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Primary</a>
															<a class="dropdown-item" href="#">Promotions</a>
															<a class="dropdown-item" href="#">Forums</a>
														</div>
													</div>
												</div>
												<div class="float-left d-none d-sm-block">
													<input type="text" placeholder="Search Messages" class="form-control search-message">
												</div>
											</div>
											<div class="col-auto top-action-right">
												<div class="text-right">
													<button type="button" title="Refresh" data-toggle="tooltip" class="btn btn-white d-none d-md-inline-block"><i class="fa fa-refresh"></i></button>
													<div class="btn-group">
														<a class="btn btn-white"><i class="fa fa-angle-left"></i></a>
									<a href="#" class="btn btn-white" onClick="NextMsgs()"><i class="fa fa-angle-right" ></i></a>
													</div>
												</div>
												<div class="text-right">
													<span class="text-muted d-none d-md-inline-block">Showing 10 of 112 </span>
												</div>
											</div>
										</div>
									</div>
									<div class="email-content">
										<div class="table-responsive">
											<table class="table table-inbox table-hover">
												<thead>
													<tr>
														<th colspan="6">
															<input type="checkbox" class="checkbox-all">
														</th>
													</tr>
												</thead>
												<tbody>
												
												@foreach ($result as $mail)
													@if($mail->seen == 1)
													<tr class="unread clickable-row seen" data-href="mail-view/{{$mail->msgno}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star starred"></i></span></td>
														<td class="name">{{$mail->from}}</td>
																				
														<td class="subject">{{imap_utf8($mail->subject)}}</td>
																								
													  <td><i class="fa fa-paperclip"></i></td>
													 
													<td class="mail-date">{{$mail->date}}</td>
													</tr>
													@else
													<tr class="unread clickable-row" data-href="mail-view/{{$mail->msgno}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star starred"></i></span></td>
														<td class="name">{{$mail->from}}</td>
														
														<td class="subject ">{{imap_utf8($mail->subject)}}</td>
													 													
													 	 <td><i class="fa fa-paperclip"></i></td>
													 													
														<td class="mail-date">{{$mail->date}}</td>
													</tr>
													@endif
													@endforeach
													{{$mail->msgno}}
													{{Session::put('lastmsgNo', $mail->msgno) }}
												
												</tbody>
											</table>
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
	
			</div>
			<!-- /Main Wrapper -->
<script>
			function NextMsgs()
	{
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
  		var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/nextmessages' : '#') }}";  
    
	    $.ajax({
	        type: "POST",
	        url: url,
	       // data: formData,
	       // processData: false,
	       // contentType: false,
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
		// alert("here");
	}
</script>

@endsection