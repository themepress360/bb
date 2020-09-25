@extends('layout.mainlayout')
@section('content')
@include('admin.settings.sidebar')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-md-6 offset-md-3">
						
							<!-- Page Header -->
							<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">Set Task Status Color</h3>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
							
				  {{ Form::open(array( 'id' => 'UpdateTaskColor' ,  'enctype'=>'multipart/form-data')) }} 
						<div class="form-group">
						    <label>{{ucwords($assigned['task_board_name'])}}</label>	
							<div class="input-group mb-3">
                                <div class="input-group-prepend bfh-colorpicker" data-name="assigned"></div>
                              </div>

                          </div>
						<div class="form-group">
						    <label>{{ucwords($admin_review['task_board_name'])}}</label>	
							  <div class="input-group mb-3">
                                  <div class="input-group-prepend bfh-colorpicker" data-name="admin_review"></div>
                             </div>
                         </div>

								<div class="submit-section">
									<a class="btn btn-primary submit-btn" onClick="updateColor()">Update</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Page Content -->
				
			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
<script>

	$(document).ready(function(){

		var assigned = <?php echo $assigned; ?>;

		var assinged_color = Object.values(assigned)[2];

		console.log(assigned);
		console.log(assinged_color);

		$('input[name="assigned"]').attr('placeholder', "assigned_color");
});

</script>



		

		 <script type="text/javascript">

            function updateColor() {
                var url = "{{ URL::to(isset(Auth::user()->type) ? Auth::user()->type.'/updatecolor' : '#') }}";  
                var form = $('#UpdateTaskColor').get(0);
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


		  <script src=" https://bootstrapformhelpers.com/assets/js/bootstrap-formhelpers.min.js"></script>
        <script src=" https://bootstrapformhelpers.com/assets/js/jquery-1.10.2.min.js"></script>

@endsection