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
							<li class="menu-title">
								<span>Mail</span>
							</li>
							<li class="active"> 
								<a href="{{url('/admin/inbox')}}">Inbox <span class="mail-count">({{count($unread)}})</span></a>
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
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">View Message</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">View Message</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="compose.html" class="btn add-btn"><i class="fa fa-plus"></i> Compose</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
			
					<div class="row">
						<div class="col-sm-12">
							<div class="card mb-0">
								<div class="card-body">
									<div class="mailview-content">
									
										<div class="mailview-header">
											<div class="row">
												<div class="col-sm-9">
													<div class="text-ellipsis m-b-10">
														<span class="mail-view-title">{{imap_utf8($headers->subject)}}</span>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="mail-view-action">
														<div class="btn-group">
															<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Delete"> <i class="fa fa-trash-o"></i></button>
															<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Reply"> <i class="fa fa-reply"></i></button>
															<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Forward"> <i class="fa fa-share"></i></button>
														</div>
														<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Print"> <i class="fa fa-print"></i></button>
													</div>
												</div>
											</div>
											<div class="sender-info">
												<div class="sender-img">
													<img width="40" alt="" src="assets/img/profiles/avatar-02.jpg" class="rounded-circle">
												</div>
												<div class="receiver-details float-left">
													<span class="sender-name">{{$headers->fromaddress}}</span>
													<span class="receiver-name">
														to
														<span>me</span>, <span>Richard</span>, <span>Paul</span>
													</span>	
												</div>	
												<div class="mail-sent-time">
													<span class="mail-time">{{ date('d M Y h:i A', strtotime($headers->Date)) }}</span>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										
										<div class="mailview-inner">
											<p>{!! $messageBody !!}</p>
										</div>
									</div>
									<div class="mail-attachments">
										<p><i class="fa fa-paperclip"></i> {{sizeof($attachments)}} Attachments - <a href="#">View all</a> | <a href="#">Download all</a></p>
										<ul class="attachments clearfix">
							@if(is_array($attachments) || is_object($attachments) )
										@foreach ($attachments as $attachment) 
										<li>
											<div class="attach-file"><i class="fa fa-file-pdf-o"></i></div>
			<div class="attach-info"> <a download href="{{asset('/' . $headers->Msgno.'/'.$headers->Msgno.'-'.$attachment['name'] )}}" class="attach-filename">{{$attachment["name"]}}</a> <div class="attach-fileize"> 842 KB</div></div>
											</li>
											
									@endforeach
									@endif
										</ul>
									</div>
									<div class="mailview-footer">
										<div class="row">
											<div class="col-sm-6 left-action">
												<button type="button" class="btn btn-white"><i class="fa fa-reply"></i> Reply</button>
												<button type="button" class="btn btn-white"><i class="fa fa-share"></i> Forward</button>
											</div>
											<div class="col-sm-6 right-action">
												<button type="button" class="btn btn-white"><i class="fa fa-print"></i> Print</button>
												<button type="button" class="btn btn-white"><i class="fa fa-trash-o"></i> Delete</button>
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
			
        </div>
		<!-- /Main Wrapper -->

		@endsection