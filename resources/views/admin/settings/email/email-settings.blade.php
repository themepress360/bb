@extends('layout.mainlayout')
@section('content')
@include('admin.settings.sidebar')
<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <?php $email = json_decode($emailconfigure['data'],true);?>
            {{ Form::open(array( 'id' => 'EmailConfigure')) }}
            @csrf
               <input type="hidden" name="type" value="smtp">
               <h4 class="page-title m-t-30">SMTP Email Settings</h4>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>SMTP HOST</label>
                        <input class="form-control" type="text" name="smtp_host" value="{{!empty($email['smtp_host']) ? $email['smtp_host'] : ''}}">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>SMTP USER</label>
                        <input class="form-control" type="text" name="smtp_user" value="{{!empty($email['smtp_user']) ? $email['smtp_user'] : ''}}">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>SMTP PASSWORD</label>
                        <input class="form-control" type="password" name="smtp_password" value="{{!empty($email['smtp_password']) ? $email['smtp_password'] : ''}}">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>SMTP PORT</label>
                        <input class="form-control" type="text" name="smtp_port" value="{{!empty($email['smtp_port']) ? $email['smtp_port'] : ''}}">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>SMTP Security</label>
                        <select class="select" name="smtp_security">
                           <option>None</option>
                           <option value="ssl" {{!empty($email['smtp_security']) &&  $email['smtp_security'] == "ssl"? 'selected' : ''}} >SSL</option>
                           <option value="tls" {{!empty($email['smtp_security']) &&  $email['smtp_security'] == "tls"? 'selected' : ''}}>TLS</option>
                        </select> 
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>SMTP Authentication Domain</label>
                        <input class="form-control" type="text" name="smtp_authentication_domain" value="{{!empty($email['smtp_authentication_domain']) ? $email['smtp_authentication_domain'] : ''}}">
                     </div>
                  </div>
                   
               </div>
               <div class="submit-section">
                  <a onClick="EmailConfigure()" class="btn btn-primary submit-btn">Save &amp; update</a>
               </div>
            {{ Form::close() }}
         </div>
      </div>
   </div>
   <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
</div>
<!-- /Page Wrapper -->
</div>
<script type="text/javascript">
   function EmailConfigure() {
      var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/emailconfigure' : '#') }}";
      var form = $('#EmailConfigure').get(0);
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
<!-- /Main Wrapper -->
@endsection