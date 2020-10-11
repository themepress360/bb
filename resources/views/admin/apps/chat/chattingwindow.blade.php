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
               @if(!empty($chat_messages))
                  @foreach($chat_messages as $key => $chat_message)
                     @if(!empty($chat_message['message']) || $chat_message['is_attachment'] == 1)   
                        @if($chat_message['sender_user_id'] == Auth::user()->id)
                           <div class="chat chat-left">
                              <div class="chat-avatar">
                                 <a href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$chat_message['sender_user_id'] : '#') }}" class="avatar">
                                    @if(!empty($chat_message['sender_profile_image_url']))
                                       <img alt="{{$chat_message['sender_name']}}" src="{{$chat_message['sender_profile_image_url']}}">
                                    @else
                                       <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                                    @endif
                                 </a>
                              </div>
                              <div class="chat-body">
                                 <div class="chat-bubble">
                                    <div class="chat-content">
                                       @if(!empty($chat_message['message']))
                                          <p>{{$chat_message['message']}}</p>
                                       @endif
                                       @if(!empty($chat_message['attachments']))
                                          <ul class="attach-list">
                                             @foreach($chat_message['attachments'] as $attachment_key => $attachment_value)
                                                @if(strpos($attachment_value['attachment_name'],".jpg") != false || strpos($attachment_value['attachment_name'],".jpeg") != false || strpos($attachment_value['attachment_name'],".png" != false))
                                                <li class="pdf-file"><i class="fa fa-image" style="font-size:24px;margin-right:0px"></i> <a href="#">{{$attachment_value['attachment_name']}}</a></li>
                                                @else
                                                   <li class="pdf-file"><i class="fa fa-file-pdf-o" ></i> <a href="#">{{$attachment_value['attachment_name']}}</a></li>
                                                @endif
                                             @endforeach
                                          </ul>
                                       @endif
                                       <span class="chat-time">{{ !empty($chat_message['created_at']) ? date("M d, Y h:i:s A",strtotime($chat_message['created_at'])) : '-' }}</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @else
                           <div class="chat chat-right">
                              <div class="chat-avatar">
                                 <a href="{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$chat_message['sender_user_id'] : '#') }}" class="avatar">
                                    @if(!empty($chat_message['sender_profile_image_url']))
                                       <img alt="{{$chat_message['sender_name']}}" src="{{$chat_message['sender_profile_image_url']}}">
                                    @else
                                       <img alt="" src="{{asset('img/profiles/avatar-05.jpg')}}">
                                    @endif
                                 </a>
                              </div>
                              <div class="chat-body">
                                 <div class="chat-bubble">
                                    <div class="chat-content">
                                       @if(!empty($chat_message['message']))
                                          <p>{{$chat_message['message']}}</p>
                                       @endif
                                       @if(!empty($chat_message['attachments']))
                                          <ul class="attach-list">
                                             @foreach($chat_message['attachments'] as $attachment_key => $attachment_value)
                                                @if(strpos($attachment_value['attachment_name'],".jpg") != false || strpos($attachment_value['attachment_name'],".jpeg") != false || strpos($attachment_value['attachment_name'],".png" != false))
                                                   <li class="pdf-file"><i class="fa fa-image" style="font-size:24px;margin-right:0px"></i> <a href="#">{{$attachment_value['attachment_name']}}</a></li>
                                                @else
                                                   <li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">{{$attachment_value['attachment_name']}}</a></li>
                                                @endif
                                             @endforeach
                                          </ul>
                                       @endif
                                       <span class="chat-time">{{ !empty($chat_message['created_at']) ? date("M d, Y @ h:i:s A",strtotime($chat_message['created_at'])) : '-' }}</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @endif
                     @endif
                  @endforeach
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
<div class="chat-footer">
   <div class="message-bar">
      <form id="GetSendMessageForm" style="display: contents;">
      <div class="message-inner">
         <a class="link attach-icon" href="#">
         <span class="btn-file">
         <input multiple type="file" class="upload" name="attachment[]" id="attachment">
         <img type="file" src="{{asset('img/attachment.png')}}" alt=""></span></a>
         <div class="message-area">
            <div class="input-group">
               <textarea class="form-control" placeholder="Type message..." id="message" name="message"></textarea>
               <span class="input-group-append">
               <button onclick="SendMessage();" class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
               </span>
            </div>
         </div>
      </div>
      </form>
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
      profile_url : "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/employee-profile/'.$user['id'] : '#') }}",
      user_id : "{{$user['id']}}"
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
      
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         $("#chat_id").remove();
         var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/sendmessage' : '#') }}";
         var input = $("<input id='chat_id' type=\"hidden\" name=\"chat_id\" value=\""+conversation_chat_id+"\"/>");

         $("#GetSendMessageForm").append(input);
         var form = $('#GetSendMessageForm').get(0);
         var formData = new FormData(form);

         var getfiles = attachment_array;
         var post_index = 0;
         var new_attachment = [];
         if(getfiles.length == deleted_attachment_array.length)
         {

         }
         else
         {
            for (var index = 0; index < getfiles.length; index++) {
               if(deleted_attachment_array.indexOf(index) == -1)
               {
                  new_attachment[post_index] = getfiles[index];
                  formData.append("attachment_array[]", getfiles[index]);
                  post_index++;
               }
               else
               {
                  console.log(index+" found");
               }
            }
         }
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
                  $('#message').val('');
                  deleted_attachment_array = [];
                  new_attachment = [];
                  attachment_array = [];
                  attachment_index = 0;
                  post_index = 0;
                  deleted_attachment_key = 0;
                  div_id = 0;
                  $("#attachment").val('');
                  $("#result").html('');
                  $('#result').hide();
                  if(response.data.is_attachment == '0')
                  {
                     $('#chats').append('<div class="chat chat-left"><div class="chat-avatar"><a href="'+my_user.profile_url+'" class="avatar"><img alt="'+my_user.name+'" src="'+my_user.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p>'+message+'</p><span class="chat-time">Just Now</span></div></div></div></div>');
                  }
                  else if(response.data.is_attachment == '1')
                  {
                     if(response.data.message == "")
                     {
                        var html = '<div class="chat chat-left"><div class="chat-avatar"><a href="'+my_user.profile_url+'" class="avatar"><img alt="'+my_user.name+'" src="'+my_user.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content">';
                        html += '<ul class="attach-list">';
                        for(var i=0;i<response.data.attachments.length;i++)
                        {
                           html += '<li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">'+response.data.attachments[i].attachement_name+'</a></li>';
                        }
                        html += '</ul>';

                        html += '<span class="chat-time">Just Now</span></div></div></div></div>';                   
                        $('#chats').append(html);
                     }
                     else
                     {
                        var html = '<div class="chat chat-left"><div class="chat-avatar"><a href="'+my_user.profile_url+'" class="avatar"><img alt="'+my_user.name+'" src="'+my_user.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content">';
                        
                        html += '<p>'+message+'</p>';
                        html += '<ul class="attach-list">';
                        for(var i=0;i<response.data.attachments.length;i++)
                        {
                           if(response.data.attachments[i].attachement_name.indexOf(".jpg") || response.data.attachments[i].attachement_name.indexOf(".jpeg") || response.data.attachments[i].attachement_name.indexOf(".png"))
                              html += '<li class="pdf-file"><i class="fa fa-image" style="font-size:24px;margin-right:0px"></i> <a href="#">'+response.data.attachments[i].attachement_name+'</a></li>';
                           else
                              html += '<li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">'+response.data.attachments[i].attachement_name+'</a></li>';
                        }
                        html += '</ul>';

                        html += '<span class="chat-time">Just Now</span></div></div></div></div>';                   
                        $('#chats').append(html);
                     }
                  }
                  var emit_data = {"user_id" : other_user.user_id,"message_data" : response.data};
                  socket.emit('single_message_emit',emit_data);
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
   socket.on('single_message_emit', function (data) {
    console.log(data);
    addChatMessage(data);
   });
   
   function addChatMessage(data)
   {
      if(data.message_data.is_attachment == '0')
      {
         $('#chats').append('<div class="chat chat-right"><div class="chat-avatar"><a href="'+my_user.profile_url+'" class="avatar"><img alt="'+other_user.name+'" src="'+other_user.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content"><p>'+data.message_data.message+'</p><span class="chat-time">Just Now</span></div></div></div></div>');
      }
      else if(data.message_data.is_attachment == '1')
      {
         if(data.message_data.message == "")
         {
            var html = '<div class="chat chat-right"><div class="chat-avatar"><a href="'+other_user.profile_url+'" class="avatar"><img alt="'+other_user.name+'" src="'+other_user.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content">';
            html += '<ul class="attach-list">';
            for(var i=0;i<data.message_data.attachments.length;i++)
            {
               if(data.message_data.attachments[i].attachement_name.indexOf(".jpg") || data.message_data.attachments[i].attachement_name.indexOf(".jpeg") || data.message_data.attachments[i].attachement_name.indexOf(".png"))
                  html += '<li class="pdf-file"><i class="fa fa-image" style="font-size:24px;margin-right:0px"></i> <a href="#">'+data.message_data.attachments[i].attachement_name+'</a></li>';
               else
                  html += '<li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">'+data.message_data.attachments[i].attachement_name+'</a></li>';
            }
            html += '</ul>';

            html += '<span class="chat-time">Just Now</span></div></div></div></div>';                   
            $('#chats').append(html);
         }
         else
         {
            var html = '<div class="chat chat-right"><div class="chat-avatar"><a href="'+other_user.profile_url+'" class="avatar"><img alt="'+other_user.name+'" src="'+other_user.profile_image_url+'"></a></div><div class="chat-body"><div class="chat-bubble"><div class="chat-content">';
                        
            html += '<p>'+data.message_data.message+'</p>';
            html += '<ul class="attach-list">';
            for(var i=0;i<data.message_data.attachments.length;i++)
            {
               if(data.message_data.attachments[i].attachement_name.indexOf(".jpg") || data.message_data.attachments[i].attachement_name.indexOf(".jpeg") || data.message_data.attachments[i].attachement_name.indexOf(".png"))
                  html += '<li class="pdf-file"><i class="fa fa-image" style="font-size:24px;margin-right:0px"></i> <a href="#">'+data.message_data.attachments[i].attachement_name+'</a></li>';
               else
                  html += '<li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">'+data.message_data.attachments[i].attachement_name+'</a></li>';
            }
            html += '</ul>';

            html += '<span class="chat-time">Just Now</span></div></div></div></div>';                   
            $('#chats').append(html);
         }
      }
   }
</script>
