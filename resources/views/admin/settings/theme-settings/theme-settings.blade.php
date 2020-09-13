@extends('layout.mainlayout')
@section('content')
@include('admin.settings.sidebar')
<!-- Page Wrapper -->
<div class="page-wrapper">
   <!-- Page Content -->
   <div class="content container-fluid">
      <div class="row">
         <div class="col-md-8 offset-md-2">
            <!-- Page Header -->
            <div class="page-header">
               <div class="row">
                  <div class="col-sm-12">
                     <h3 class="page-title">Theme Settings</h3>
                  </div>
               </div>
            </div>
            <!-- /Page Header -->
            {{ Form::open(array( 'id' => 'ThemeSetting')) }}
            @csrf
               <input type="hidden" name="module" value="theme">
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Website Name</label>
                  <div class="col-lg-9">
                     <input name="website_name" class="form-control" value="{{!empty($theme['website_name']) ? $theme['website_name'] : ''}}" type="text">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Light Logo</label>
                  <div class="col-lg-7">
                     <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="WebsiteLogo"
                      name="website_logo">
                     <span class="form-text text-muted">Recommended image size is 40px x 40px</span>
                  </div>
                  <div class="col-lg-2">
                     <div class="img-thumbnail float-right">
                        @if(!empty($theme['website_image_url']))
                           <img id="WebsiteLogoPreview" alt="{{isset($theme['website_name']) ? ucwords($theme['website_name']) : '-'}}" src="{{{$theme['website_image_url']}}}" width="40" height="40">
                        @else
                           <img id="WebsiteLogoPreview" src="{{asset('img/profiles/avatar-21.jpg')}}" alt="No Image" width="40" height="40">
                        @endif
                     </div>
                  </div>
               </div>
              
               <div class="submit-section">
                  <a onClick="ThemeSetting()" class="btn btn-primary submit-btn">Save</a>
               </div>
            {{ Form::close() }}
         </div>
      </div>
   </div>
   <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->
</div>
<script type="text/javascript">
   function readURL(input,id) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onloadend = function(e) {
            $('#'+id).attr('src', e.target.result);
         }
         if (input) { 
            reader.readAsDataURL(input.files[0]);
            return true;
         } else {
            return false;
         }
      }
      else
         return false;
   }
   $("#WebsiteLogo").change(function() {
      var upload = readURL(this,'WebsiteLogoPreview');
      if(upload)
      {
      }
   });
   
   function ThemeSetting()
   {
       var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/addthemesetting' : '#') }}";var form = $('#ThemeSetting').get(0);
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