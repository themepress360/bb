
<?php $__env->startSection('content'); ?>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<ul>
							<li> 
								<a href="index"><i class="la la-home"></i> <span>Back to Home</span></a>
							</li>
							<li class="menu-title"><span>Chat Groups</span> <a href="#" data-toggle="modal" data-target="#add_group"><i class="fa fa-plus"></i></a></li>
							<li> 
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/user.jpg">
									</span> 
									<span class="chat-user">#General</span>
								</a>
							</li>
							<li> 
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/user.jpg">
									</span> 
									<span class="chat-user">#Video Responsive Survey</span>
								</a>
							</li>
							<li> 
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/user.jpg">
									</span> 
									<span class="chat-user">#500rs</span>
								</a>
							</li>
							<li> 
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/user.jpg">
									</span> 
									<span class="chat-user">#warehouse</span>
								</a>
							</li>
							<li class="menu-title">Direct Chats <a href="#" data-toggle="modal" data-target="#add_chat_user"><i class="fa fa-plus"></i></a></li>
							<li>
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/profiles/avatar-02.jpg"><span class="status online"></span>
									</span> 
									<span class="chat-user">John Doe</span> <span class="badge badge-pill bg-danger">1</span>
								</a>
							</li>
							<li>
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/profiles/avatar-09.jpg"><span class="status offline"></span>
									</span> 
									<span class="chat-user">Richard Miles</span> <span class="badge badge-pill bg-danger">7</span>
								</a>
							</li>
							<li>
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/profiles/avatar-10.jpg"><span class="status away"></span>
									</span> 
									<span class="chat-user">John Smith</span>
								</a>
							</li>
							<li class="active">
								<a href="chat">
									<span class="chat-avatar-sm user-img">
										<img class="rounded-circle" alt="" src="img/profiles/avatar-05.jpg"><span class="status online"></span>
									</span> 
									<span class="chat-user">Mike Litorus</span> <span class="badge badge-pill bg-danger">2</span>
								</a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
			<div class="page-wrapper">
			
				<!-- Incoming Call -->
				<div class="call-box incoming-box">
					<div class="call-wrapper">
						<div class="call-inner">
							<div class="call-user">
								<img class="call-avatar" src="img/profiles/avatar-11.jpg" alt="">
								<h4>Wilmer Deluna</h4>
								<span>Calling ...</span>
							</div>							
							<div class="call-items">
								<a href="chat" class="btn call-item call-end"><i class="material-icons">call_end</i></a>
								<a href="video-call" class="btn call-item call-start"><i class="material-icons">call</i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /Incoming Call -->
				
            </div>
			<!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smarthr_laravel\resources\views/incoming-call.blade.php ENDPATH**/ ?>