@extends('layout.mainlayout')
@section('content')
<style type="text/css">
.sidebar-menu ul ul.direct-chat-list{display: block !important;}
.sidebar-menu ul ul.direct-chat-list a{padding: 9px 10px 9px 15px;}
</style>
<div class="sidebar" id="sidebar">
   <div class="sidebar-inner slimscroll">
      <div class="sidebar-menu">
         <ul>
            <li> 
               <a href="{{url('/admin/dashboard')}}"><i class="la la-home"></i> <span>Back to Home</span></a>
            </li>
            <li class="menu-title"><span>Chat Groups</span> <a href="#" data-toggle="modal" data-target="#add_group"><i class="fa fa-plus"></i></a></li>
            <li> 
               <a href="chat">
               <span class="chat-avatar-sm user-img">
               <img class="rounded-circle" alt="" src="{{asset('img/user.jpg')}}">
               </span> 
               <span class="chat-user">#General</span>
               </a>
            </li>
            <li> 
               <a href="chat">
               <span class="chat-avatar-sm user-img">
               <img class="rounded-circle" alt="" src="{{asset('img/user.jpg')}}">
               </span> 
               <span class="chat-user">#Video Responsive Survey</span>
               </a>
            </li>
            <li> 
               <a href="chat">
               <span class="chat-avatar-sm user-img">
               <img class="rounded-circle" alt="" src="{{asset('img/user.jpg')}}">
               </span> 
               <span class="chat-user">#500rs</span>
               </a>
            </li>
            <li> 
               <a href="chat">
               <span class="chat-avatar-sm user-img">
               <img class="rounded-circle" alt="" src="{{asset('img/user.jpg')}}">
               </span> 
               <span class="chat-user">#warehouse</span>
               </a>
            </li>
            <li class="menu-title">Direct Chats <a href="#" data-toggle="modal" data-target="#add_chat_user"><i class="fa fa-plus"></i></a></li>
            <ul class="direct-chat-list" id="direct-chat-list">
               @if(!empty($chat_lists))
                  @foreach($chat_lists as $key => $chat_list)
                     <?php $chat_id = $chat_list['chat_id'];?>
                     <?php $user_id = $chat_list['user_id'];?>
                     <li class="" onclick="chatting_window('{{$chat_id}}','{{$user_id}}')" id="chat_{{$chat_id}}">
                        <a href="" onclick="return false;">
                        <span class="chat-avatar-sm user-img">
                        @if(!empty($chat_list['profile_image_url']))
                           <img class="rounded-circle" alt="{{!empty($chat_list['name']) ? $chat_list['name'] : '-'}}" src="{{!empty($chat_list['profile_image_url']) ? $chat_list['profile_image_url'] : '-'}}"><span class="status online"></span>
                        @else
                           <img class="rounded-circle" alt="" src="{{asset('img/profiles/avatar-09.jpg')}}"><span class="status offline"></span>
                        @endif
                        </span> 
                        <span class="chat-user">{{!empty($chat_list['name']) ? $chat_list['name'] : '-'}}</span> <span class="badge badge-pill bg-danger">1</span>
                        </a>
                     </li>
                  @endforeach
               @endif
               <li>
                  <a href="chat">
                  <span class="chat-avatar-sm user-img">
                  <img class="rounded-circle" alt="" src="{{asset('img/profiles/avatar-09.jpg')}}"><span class="status offline"></span>
                  </span> 
                  <span class="chat-user">Richard Miles</span> <span class="badge badge-pill bg-danger">7</span>
                  </a>
               </li>
               <li>
                  <a href="chat">
                  <span class="chat-avatar-sm user-img">
                  <img class="rounded-circle" alt="" src="{{asset('img/profiles/avatar-10.jpg')}}"><span class="status away"></span>
                  </span> 
                  <span class="chat-user">John Smith</span>
                  </a>
               </li>
               <li class="active">
                  <a href="chat">
                  <span class="chat-avatar-sm user-img">
                  <img class="rounded-circle" alt="" src="{{asset('img/profiles/avatar-05.jpg')}}"><span class="status online"></span>
                  </span> 
                  <span class="chat-user">Mike Litorus</span> <span class="badge badge-pill bg-danger">2</span>
                  </a>
               </li>
            </ul>
         </ul>
      </div>
   </div>
</div>
<!-- /Sidebar -->
<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Chat Main Row -->
   <div class="chat-main-row">
      <!-- Chat Main Wrapper -->
      <div class="chat-main-wrapper">
         <!-- Chats View -->
         <div class="col-lg-9 message-view task-view">
            <div class="chat-window" id="chat-window">
               
            </div>
         </div>
         <!-- /Chats View -->
         <!-- Chat Right Sidebar -->
         <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="task_window" style="display:none">
            <div class="chat-window video-window">
               <div class="fixed-header">
                  <ul class="nav nav-tabs nav-tabs-bottom">
                     <li class="nav-item"><a class="nav-link" href="#calls_tab" data-toggle="tab">Calls</a></li>
                     <li class="nav-item"><a class="nav-link active" href="#profile_tab" data-toggle="tab">Profile</a></li>
                  </ul>
               </div>
               <div class="tab-content chat-contents">
                  <div class="content-full tab-pane" id="calls_tab">
                     <div class="chat-wrap-inner">
                        <div class="chat-box">
                           <div class="chats">
                              <div class="chat chat-left">
                                 <div class="chat-avatar">
                                    <a href="profile" class="avatar">
                                    <img alt="" src="{{asset('img/profiles/avatar-02.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="chat-body">
                                    <div class="chat-bubble">
                                       <div class="chat-content">
                                          <span class="task-chat-user">You</span> <span class="chat-time">8:35 am</span>
                                          <div class="call-details">
                                             <i class="material-icons">phone_missed</i>
                                             <div class="call-info">
                                                <div class="call-user-details">
                                                   <span class="call-description">Jeffrey Warden missed the call</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="chat chat-left">
                                 <div class="chat-avatar">
                                    <a href="profile" class="avatar">
                                    <img alt="" src="{{asset('img/profiles/avatar-02.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="chat-body">
                                    <div class="chat-bubble">
                                       <div class="chat-content">
                                          <span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
                                          <div class="call-details">
                                             <i class="material-icons">call_end</i>
                                             <div class="call-info">
                                                <div class="call-user-details"><span class="call-description">This call has ended</span></div>
                                                <div class="call-timing">Duration: <strong>5 min 57 sec</strong></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="chat-line">
                                 <span class="chat-date">January 29th, 2019</span>
                              </div>
                              <div class="chat chat-left">
                                 <div class="chat-avatar">
                                    <a href="profile" class="avatar">
                                    <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="chat-body">
                                    <div class="chat-bubble">
                                       <div class="chat-content">
                                          <span class="task-chat-user">Richard Miles</span> <span class="chat-time">8:35 am</span>
                                          <div class="call-details">
                                             <i class="material-icons">phone_missed</i>
                                             <div class="call-info">
                                                <div class="call-user-details">
                                                   <span class="call-description">You missed the call</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="chat chat-left">
                                 <div class="chat-avatar">
                                    <a href="profile" class="avatar">
                                    <img alt="" src="{{asset('img/profiles/avatar-02.jpg')}}">
                                    </a>
                                 </div>
                                 <div class="chat-body">
                                    <div class="chat-bubble">
                                       <div class="chat-content">
                                          <span class="task-chat-user">You</span> <span class="chat-time">8:35 am</span>
                                          <div class="call-details">
                                             <i class="material-icons">ring_volume</i>
                                             <div class="call-info">
                                                <div class="call-user-details">
                                                   <a href="#" class="call-description call-description--linked" data-qa="call_attachment_link">Calling John Smith ...</a>
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
                  <div class="content-full tab-pane show active" id="profile_tab">
                     <div class="display-table">
                        <div class="table-row">
                           <div class="table-body">
                              <div class="table-content">
                                 <div class="chat-profile-img">
                                    <div class="edit-profile-img">
                                       <img src="{{asset('img/profiles/avatar-02.jpg')}}" alt="">
                                       <span class="change-img">Change Image</span>
                                    </div>
                                    <h3 class="user-name m-t-10 mb-0">John Doe</h3>
                                    <small class="text-muted">Web Designer</small>
                                    <a href="javascript:void(0);" class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
                                 </div>
                                 <div class="chat-profile-info">
                                    <ul class="user-det-list">
                                       <li>
                                          <span>Username:</span>
                                          <span class="float-right text-muted">johndoe</span>
                                       </li>
                                       <li>
                                          <span>DOB:</span>
                                          <span class="float-right text-muted">24 July</span>
                                       </li>
                                       <li>
                                          <span>Email:</span>
                                          <span class="float-right text-muted">johndoe@example.com</span>
                                       </li>
                                       <li>
                                          <span>Phone:</span>
                                          <span class="float-right text-muted">9876543210</span>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="transfer-files">
                                    <ul class="nav nav-tabs nav-tabs-solid nav-justified mb-0">
                                       <li class="nav-item"><a class="nav-link active" href="#all_files" data-toggle="tab">All Files</a></li>
                                       <li class="nav-item"><a class="nav-link" href="#my_files" data-toggle="tab">My Files</a></li>
                                    </ul>
                                    <div class="tab-content">
                                       <div class="tab-pane show active" id="all_files">
                                          <ul class="files-list">
                                             <li>
                                                <div class="files-cont">
                                                   <div class="file-type">
                                                      <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                   </div>
                                                   <div class="files-info">
                                                      <span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
                                                      <span class="file-author"><a href="#">Loren Gatlin</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                                   </div>
                                                   <ul class="files-action">
                                                      <li class="dropdown dropdown-action">
                                                         <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                         <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane" id="my_files">
                                          <ul class="files-list">
                                             <li>
                                                <div class="files-cont">
                                                   <div class="file-type">
                                                      <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                   </div>
                                                   <div class="files-info">
                                                      <span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
                                                      <span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                                                   </div>
                                                   <ul class="files-action">
                                                      <li class="dropdown dropdown-action">
                                                         <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                         <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </li>
                                          </ul>
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
         <!-- /Chat Right Sidebar -->
      </div>
      <!-- /Chat Main Wrapper -->
   </div>
   <!-- /Chat Main Row -->
   <!-- Drogfiles Modal -->
   <div id="drag_files" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Drag and drop files upload</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form id="js-upload-form">
                  <div class="upload-drop-zone" id="drop-zone">
                     <i class="fa fa-cloud-upload fa-2x"></i> <span class="upload-text">Just drag and drop files here</span>
                  </div>
                  <h4>Uploading</h4>
                  <ul class="upload-list">
                     <li class="file-list">
                        <div class="upload-wrap">
                           <div class="file-name">
                              <i class="fa fa-photo"></i>
                              photo.png
                           </div>
                           <div class="file-size">1.07 gb</div>
                           <button type="button" class="file-close">
                           <i class="fa fa-close"></i>
                           </button>
                        </div>
                        <div class="progress progress-xs progress-striped">
                           <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                        </div>
                        <div class="upload-process">37% done</div>
                     </li>
                     <li class="file-list">
                        <div class="upload-wrap">
                           <div class="file-name">
                              <i class="fa fa-file"></i>
                              task.doc
                           </div>
                           <div class="file-size">5.8 kb</div>
                           <button type="button" class="file-close">
                           <i class="fa fa-close"></i>
                           </button>
                        </div>
                        <div class="progress progress-xs progress-striped">
                           <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                        </div>
                        <div class="upload-process">37% done</div>
                     </li>
                     <li class="file-list">
                        <div class="upload-wrap">
                           <div class="file-name">
                              <i class="fa fa-photo"></i>
                              dashboard.png
                           </div>
                           <div class="file-size">2.1 mb</div>
                           <button type="button" class="file-close">
                           <i class="fa fa-close"></i>
                           </button>
                        </div>
                        <div class="progress progress-xs progress-striped">
                           <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                        </div>
                        <div class="upload-process">Completed</div>
                     </li>
                  </ul>
               </form>
               <div class="submit-section">
                  <a class="btn btn-primary submit-btn">Submit</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /Drogfiles Modal -->
   <!-- Add Group Modal -->
   <div id="add_group" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Create a group</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <p>Groups are where your team communicates. They’re best when organized around a topic — #leads, for example.</p>
               <form>
                  <div class="form-group">
                     <label>Group Name <span class="text-danger">*</span></label>
                     <input class="form-control" type="text">
                  </div>
                  <div class="form-group">
                     <label>Send invites to: <span class="text-muted-light">(optional)</span></label>
                     <input class="form-control" type="text">
                  </div>
                  <div class="submit-section">
                     <button class="btn btn-primary submit-btn">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- /Add Group Modal -->
   <!-- Add Chat User Modal -->
   <div id="add_chat_user" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Direct Chat</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="row ">
               <div class="col-md-6">
                  <div class="radio">
                     <label><input type="radio" name="radio" checked onchange="list_enable('employee');"> Employees</label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="radio">
                     <label><input type="radio" name="radio" onchange="list_enable('client');" > Clients</label>
                  </div>
               </div>
            </div>
            <div class="modal-body">
               <div class="m-b-30 tag-control tag-input scrollbars">
                  <div class="add_follower d-flex" id="add_followers" style="width: max-content;">
                     <input placeholder="Add Follower" type="hidden" name="add_followers">
                  </div>                  
               </div>
               <!--<div class="input-group m-b-30">
                  <input placeholder="Search to start a chat" class="form-control search-input" type="text">
                  <span class="input-group-append">
                  <button class="btn btn-primary">Search</button>
                  </span>
               </div> -->
               <div>
                  <h5>Conversation Start</h5>
                  @if(!empty($employees_list))
                  <ul class="chat-user-list" id="employee-chat-users">
                     @foreach($employees_list as $key => $employee)
                     <li id="{{$employee['id']}}">
                        <a href="#">
                           <div class="media">
                              <input type="hidden" name="start_conversation_user_id" class="f-id" value="{{!empty($employee['id']) ? $employee['id'] : '-'}}">
                              <span class="avatar align-self-center">
                              <img src="{{!empty($employee['profile_image_url']) ? $employee['profile_image_url'] : '-'}}" alt="{{!empty($employee['name']) ? ucwords($employee['name']) : '-'}}">
                              </span>
                              <div class="media-body align-self-center text-nowrap">
                                 <div class="user-name f-name">{{!empty($employee['name']) ? ucwords($employee['name']) : '-'}}</div>
                                 <span class="designation">{{!empty($employee['designation_name']) ? ucwords($employee['designation_name']) : '-'}}</span>
                              </div>
                              <div class="text-nowrap align-self-center">
                                 @if(!empty($employee['logout_time']))
                                    @if($employee['is_login'] == 0)
                                       <?php 
                                          $match_date = strtotime($employee['logout_time']);
                                          $date = strtotime(date("Y-m-d H:i:s"));
                                          $difference = $date - $match_date;
                                       ?>
                                       @if($difference < 86400)
                                          <div class="online-date">Today,{{date("H:i:s A",$match_date)}}</div>
                                       @elseif($difference < 172800)
                                          <div class="online-date">Yesterday,{{date("H:i:s A",$match_date)}}</div>
                                       @else
                                          <div class="online-date">{{date("Y-m-d,H:i:s A",$match_date)}}</div>
                                       @endif
                                    @else
                                       <div class="online-date">Login User</div>
                                    @endif
                                 @else
                                    <div class="online-date">This person is not login yet</div>
                                 @endif
                              </div>
                           </div>
                        </a>
                     </li>
                     @endforeach
                  </ul>
                  @endif

                  @if(!empty($clients_list))
                  <ul class="chat-user-list" id="client-chat-users" style="display: none;">
                     @foreach($clients_list as $key => $client)
                     <li id="{{$client['id']}}">
                        <a href="#">
                           <div class="media">
                              <input type="hidden" name="start_conversation_user_id" class="f-id" value="{{!empty($client['id']) ? $client['id'] : '-'}}">
                              <span class="avatar align-self-center">
                              <img src="{{!empty($client['profile_image_url']) ? $client['profile_image_url'] : '-'}}" alt="{{!empty($client['name']) ? ucwords($client['name']) : '-'}}">
                              </span>
                              <div class="media-body align-self-center text-nowrap">
                                 <div class="user-name f-name">{{!empty($client['name']) ? ucwords($client['name']) : '-'}}</div>
                                 <span class="designation">-</span>
                              </div>
                              <div class="text-nowrap align-self-center">
                                 @if(!empty($client['logout_time']))
                                    @if($client['is_login'] == 0)
                                       <?php 
                                          $match_date = strtotime($client['logout_time']);
                                          $date = strtotime(date("Y-m-d H:i:s"));
                                          $difference = $date - $match_date;
                                       ?>
                                       @if($difference < 86400)
                                          <div class="online-date">Today,{{date("H:i:s A",$match_date)}}</div>
                                       @elseif($difference < 172800)
                                          <div class="online-date">Yesterday,{{date("H:i:s A",$match_date)}}</div>
                                       @else
                                          <div class="online-date">{{date("Y-m-d,H:i:s A",$match_date)}}</div>
                                       @endif
                                    @else
                                       <div class="online-date">Login User</div>
                                    @endif
                                 @else
                                    <div class="online-date">This person is not login yet</div>
                                 @endif
                              </div>
                           </div>
                        </a>
                     </li>
                     @endforeach
                  </ul>
                  @endif
               </div>
               <div class="submit-section">
                  <a onclick="start_chat();" class="btn btn-primary submit-btn">Submit</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /Add Chat User Modal -->
   <!-- Share Files Modal -->
   <div id="share_files" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Share File</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="files-share-list">
                  <div class="files-cont">
                     <div class="file-type">
                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                     </div>
                     <div class="files-info">
                        <span class="file-name text-ellipsis">AHA Selfcare Mobile Application Test-Cases.xls</span>
                        <span class="file-author"><a href="#">Bernardo Galaviz</a></span> <span class="file-date">May 31st at 6:53 PM</span>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label>Share With</label>
                  <input class="form-control" type="text">
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Share</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /Share Files Modal -->
</div>
<!-- /Page Wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.0/socket.io.js"></script>
<script type="text/javascript">
   //Socket Working Start
   var socket = io('http://'+document.domain+':2020');
   //var socket = io('http://107.22.52.19:2020');
   var my_user_id = '{{isset(Auth::user()->id) ? Auth::user()->id : "0"}}';
   <?php if(!empty($chat_ids)) { ?>
      var chat_ids = JSON.parse('{{$chat_ids}}');
   <?php } else { ?>
      var chat_ids = [];
   <?php }?>
   //var chat_ids = "";
   function setUserid(user_id,chat_ids) {
      if (user_id && user_id != "0") {
         var data =  {user_id : user_id ,chat_ids:chat_ids};
         socket.emit('add_user_id', data);
      }
   }
   setUserid(my_user_id,chat_ids);
   
   //To check the online status
   <?php if(!empty($user_ids)) { ?>
      var user_ids = '{{$user_ids}}';
      setInterval(function(){ 
         var data =  {user_ids : user_ids,my_user_id : my_user_id};
         socket.emit('online_status', data); 
      },5000);

      socket.on('online_status', function (data) {
         if(chat_ids.length != 0)
         {
            for(var i=0;i<chat_ids.length;i++)
            {
               if(chat_ids.indexOf(data[i].chat_id) != -1)
               {

               }
               console.log(data[i]);
            }
         }
      });
   <?php } ?>
   //Socket Working End
</script>


<script>
   var start_conversation_user_id = 0;
   $('#client-chat-users li,#employee-chat-users li').on('click', function(){
      var follower =  $(this).find("div.f-name").text();
      start_conversation_user_id = $(this).find("input.f-id").val();
      $('#add_followers').html('');
      $('#add_followers').append('<span id="name" align="center" class="follower-tag">' + follower + '</span>');
   });
   
   function list_enable(type)
   {
      start_conversation_user_id = 0;
      if(type == "client")
      {
         $('#client-chat-users').show();
         $('#employee-chat-users').hide();
         $('#add_followers').html('');
      }
      else if(type == "employee")
      {
         $('#client-chat-users').hide();
         $('#employee-chat-users').show();
         $('#add_followers').html('');
      }
   }
   
   function chatting_window(chat_id,user_id)
   {
      $('#direct-chat-list li').removeClass("active");
      $('#chat_'+chat_id).addClass("active");
      $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/chattingwindow' : '#') }}";
         $.ajax({
            type: "POST",
            async: false,
            url: url,    
            data: {chat_id:chat_id,user_id:user_id},     
            success: function(response)
            {
               if(response.status == "SUCCESS")
               {
                  $("#chat-window").html('');
                  $("#chat-window").append(response.data.getchatwindowhtml);
                  // $('#chat-window').animate({
                  //    scrollTop: $(".scroll_chat").offset().top},
                  // 'slow');
               }
               else
               {
                  toastr['error'](response.message);
               }    
            }
         });
   }

   function start_chat()
   {
      if(start_conversation_user_id != 0)
      {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addchat' : '#') }}";
         $.ajax({
            type: "POST",
            async: false,
            url: url,    
            data: {start_conversation_user_id:start_conversation_user_id},     
            success: function(response)
            {
               if(response.status == "SUCCESS")
               {
                  $('#add_followers').html('');
                  $('#direct-chat-list li').removeClass("active");
                  $('#direct-chat-list').append('<li class="active"><a href="chat"><span class="chat-avatar-sm user-img"><img class="rounded-circle" alt="" src="'+response.data.user.profile_image_url+'"><span class="status online"></span></span> <span class="chat-user">'+response.data.user.name+'</span></a></li>');
                  $('#add_chat_user').modal('hide');
                  chatting_window(response.data.chat_id,start_conversation_user_id);
                  start_conversation_user_id = 0;
                  toastr['success'](response.message);    
               }
               else
               {
                  toastr['error'](response.message);
               }    
            }
         });
      }
      else 
      {
         toastr['error']('Select the user first');
      }
   }

   $(document).on('click', '#close', function(){
      $(this).closest('#name').remove();
      var id = $(this).find("input.remove-id").val();
      const index = added_followers.indexOf(added_followers[id]);
      if (index > -1) {
            added_followers.splice(index, 1);
            // console.log("+++++++++++++");
            // console.log(added_followers);
      }
   });

   $( document ).ready(function() {
      <?php if(!empty($chat_lists)) { ?>
         var default_chat_window_chat_id = "<?php echo $chat_lists[0]['chat_id'];?>";
         var default_chat_window_user_id = "<?php echo $chat_lists[0]['user_id'];?>";
         chatting_window(default_chat_window_chat_id,default_chat_window_user_id);
      <?php } ?>
   });
</script>
@endsection