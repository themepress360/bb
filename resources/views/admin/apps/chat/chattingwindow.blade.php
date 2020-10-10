<div class="fixed-header">
   <div class="navbar">
      <div class="user-details mr-auto">
         <div class="float-left user-img">
            @if(!empty($user))
               <a class="avatar" href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$user['id'] : '#') }}" title="{{!empty($user['name']) ? $user['name'] : '-'}}">
               <img src="{{!empty($user['profile_image_url']) ? $user['profile_image_url'] : '-'}}" alt="" class="rounded-circle">
               <span class="status online"></span>
               </a>
            @endif
         </div>
         @if(!empty($user))
            <div class="user-info float-left">
               <a href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$user['id'] : '#') }}" title="{{!empty($user['name']) ? $user['name'] : '-'}}"><span>{{!empty($user['name']) ? $user['name'] : '-'}}</span> <i class="typing-text">Typing...</i></a>
               <span class="last-seen">Last seen today at 7:50 AM</span>
            </div>
         @endif
      </div>
      <ul class="nav custom-menu">
         <li class="nav-item">
            <a class="nav-link task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa-user"></i></a>
         </li>
         <li class="nav-item">
            <a href="voice-call" class="nav-link"><i class="fa fa-phone"></i></a>
         </li>
         <li class="nav-item">
            <a href="video-call" class="nav-link"><i class="fa fa-video-camera"></i></a>
         </li>
         <!-- <li class="nav-item dropdown dropdown-action">
            <a aria-expanded="false" data-toggle="dropdown" class="nav-link dropdown-toggle" href=""><i class="fa fa-cog"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
               <a href="javascript:void(0)" class="dropdown-item">Delete Conversations</a>
               <a href="javascript:void(0)" class="dropdown-item">Settings</a>
            </div>
            </li> -->
      </ul>
   </div>
</div>
<div class="chat-contents">
   <div class="chat-content-wrap">
      <div class="chat-wrap-inner">
         <div class="chat-box">
            <div class="chats" id="chats">
               <div class="chat chat-right">
                  <div class="chat-avatar">
                     <a href="profile" class="avatar">
                     <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                     </a>
                  </div>
                  <div class="chat-body">
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p> Hello. What can I do for you?</p>
                           <span class="chat-time">8:30 am</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="chat-line">
                  <span class="chat-date">October 8th, 2018</span>
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
                           <p>I'm just looking around.</p>
                           <p>Will you tell me something about yourself? </p>
                           <span class="chat-time">8:35 am</span>
                        </div>
                     </div>
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>Are you there? That time!</p>
                           <span class="chat-time">8:40 am</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="chat chat-right">
                  <div class="chat-avatar">
                     <a href="profile" class="avatar">
                     <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                     </a>
                  </div>
                  <div class="chat-body">
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>Where?</p>
                           <span class="chat-time">8:35 am</span>
                        </div>
                     </div>
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>OK, my name is Limingqiang. I like singing, playing basketballand so on.</p>
                           <span class="chat-time">8:42 am</span>
                        </div>
                     </div>
                  </div>
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
                           <p>You wait for notice.</p>
                           <span class="chat-time">8:30 am</span>
                        </div>
                     </div>
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>Consectetuorem ipsum dolor sit?</p>
                           <span class="chat-time">8:50 am</span>
                        </div>
                     </div>
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>OK?</p>
                           <span class="chat-time">8:55 am</span>
                        </div>
                     </div>
                     <div class="chat-bubble">
                        <div class="chat-content img-content">
                           <div class="chat-img-group clearfix">
                              <p>Uploaded 3 Images</p>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">placeholder.jpg</div>
                                    <div class="chat-file-desc">842 KB</div>
                                 </div>
                              </a>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">842 KB</div>
                                 </div>
                              </a>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">placeholder.jpg</div>
                                    <div class="chat-file-desc">842 KB</div>
                                 </div>
                              </a>
                           </div>
                           <span class="chat-time">9:00 am</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="chat chat-right">
                  <div class="chat-avatar">
                     <a href="profile" class="avatar">
                     <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                     </a>
                  </div>
                  <div class="chat-body">
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>OK!</p>
                           <span class="chat-time">9:00 am</span>
                        </div>
                     </div>
                  </div>
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
                           <p>Uploaded 3 files</p>
                           <ul class="attach-list">
                              <li><i class="fa fa-file"></i> <a href="#">example.avi</a></li>
                              <li><i class="fa fa-file"></i> <a href="#">activity.psd</a></li>
                              <li><i class="fa fa-file"></i> <a href="#">example.psd</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>Consectetuorem ipsum dolor sit?</p>
                           <span class="chat-time">8:50 am</span>
                        </div>
                        <div class="chat-action-btns">
                           <ul>
                              <li><a href="#" class="share-msg" title="Share"><i class="fa fa-share-alt"></i></a></li>
                              <li><a href="#" class="edit-msg"><i class="fa fa-pencil"></i></a></li>
                              <li><a href="#" class="del-msg"><i class="fa fa-trash-o"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <p>OK?</p>
                           <span class="chat-time">8:55 am</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="chat chat-right">
                  <div class="chat-body">
                     <div class="chat-bubble">
                        <div class="chat-content img-content">
                           <div class="chat-img-group clearfix">
                              <p>Uploaded 6 Images</p>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">placeholder.jpg</div>
                                    <div class="chat-file-desc">842 KB</div>
                                 </div>
                              </a>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">842 KB</div>
                                 </div>
                              </a>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">placeholder.jpg</div>
                                    <div class="chat-file-desc">842 KB</div>
                                 </div>
                              </a>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">placeholder.jpg</div>
                                    <div class="chat-file-desc">842 KB</div>
                                 </div>
                              </a>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">placeholder.jpg</div>
                                    <div class="chat-file-desc">842 KB</div>
                                 </div>
                              </a>
                              <a class="chat-img-attach" href="#">
                                 <img width="182" height="137" alt="" src="img/placeholder.jpg">
                                 <div class="chat-placeholder">
                                    <div class="chat-img-name">placeholder.jpg</div>
                                    <div class="chat-file-desc">842 KB</div>
                                 </div>
                              </a>
                           </div>
                           <span class="chat-time">9:00 am</span>
                        </div>
                     </div>
                  </div>
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
                           <ul class="attach-list">
                              <li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">Document_2016.pdf</a></li>
                           </ul>
                           <span class="chat-time">9:00 am</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="chat chat-right">
                  <div class="chat-avatar">
                     <a href="profile" class="avatar">
                     <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                     </a>
                  </div>
                  <div class="chat-body">
                     <div class="chat-bubble">
                        <div class="chat-content">
                           <ul class="attach-list">
                              <li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">Document_2016.pdf</a></li>
                           </ul>
                           <span class="chat-time">9:00 am</span>
                        </div>
                     </div>
                  </div>
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
                           <p>Typing ...</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="chat-footer">
   <div class="message-bar">
      <div class="message-inner">
         <a class="link attach-icon" href="#">
         <span class="btn-file">
         <input multiple type="file" class="upload" name="attachment[]" id="attachment">
         <img type="file" src="{{asset('img/attachment.png')}}" alt=""></span></a>
         <div class="message-area">
            <div class="input-group">
               <textarea class="form-control" placeholder="Type message..." id="message"></textarea>
               <span class="input-group-append">
               <button onclick="SendMessage();" class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
               </span>
            </div>
         </div>
      </div>
   </div>
   <div id="preview"  style="display:none">
      <ul id="result" class="list-style">
      </ul>
   </div>
</div>
<script type="text/javascript">
   var conversation_chat_id = '{{$chat_id}}';
   var other_user = {
      profile_image_url : "{{$user['profile_image_url']}}",
      name : "{{$user['name']}}",
      profile_url : "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$user['id'] : '#') }}"
   };
   var my_user = {
      profile_image_url : "{{$mydetail['profile_image_url']}}",
      name : "{{$mydetail['name']}}",
      profile_url : "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$mydetail['id'] : '#') }}"
   };
   console.log(my_user);
   function SendMessage()
   {
      var message = $('#message').val();
      if(message != "")
      {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/sendmessage' : '#') }}";
         $.ajax({
            type: "POST",
            async: false,
            url: url,    
            data: {chat_id:conversation_chat_id,message:message},     
            success: function(response)
            {
               if(response.status == "SUCCESS")
               {
                  $('#message').val('');
                  if(response.data.is_attachemnt == '0')
                     $('#chats').append('<div class="chat chat-left"><div class="chat-avatar"><a href="'+my_user.profile_url+'" class="avatar"><img alt="'+my_user.name+'" src="'+my_user.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p>'+message+'</p><span class="chat-time">Just Now</span></div></div></div></div>');
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
         toastr['error']('Empty Message not sent');
      }
   }
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
