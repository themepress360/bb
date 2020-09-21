<!-- jQuery -->

		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('js/popper.min.js')}}" type='application/javascript'></script>
        <script src="{{asset('js/bootstrap.min.js')}}" type='application/javascript'></script>
		
		<!-- Slimscroll JS -->
		<script src="{{asset('js/jquery.slimscroll.min.js')}}" type='application/javascript'></script>
		<!-- Select2 JS -->
		<script src="{{asset('js/select2.min.js')}}" type='application/javascript'></script>

		<script src="{{asset('js/jquery-ui.min.js')}}" type='application/javascript'></script>
		<script src="{{asset('js/jquery.ui.touch-punch.min.js')}}" type='application/javascript'></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{asset('js/moment.min.js')}}" type='application/javascript'></script>
		<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}" type='application/javascript'></script>
		
		<!-- Calendar JS -->
		<script src="{{asset('js/jquery-ui.min.js')}}" type='application/javascript'></script>
        <script src="{{asset('js/fullcalendar.min.js')}}" type='application/javascript'></script>
        <script src="{{asset('js/jquery.fullcalendar.js')}}" type='application/javascript'></script>

		<!-- Multiselect JS -->
		<script src="{{asset('js/multiselect.min.js')}}" type='application/javascript'></script>

		<!-- Datatable JS -->
		<script src="{{asset('js/jquery.dataTables.min.js')}}" type='application/javascript'></script>
		<script src="{{asset('js/dataTables.bootstrap4.min.js')}}" type='application/javascript'></script>

		<!-- Summernote JS -->
		<script src="{{asset('plugins/summernote/dist/summernote-bs4.min.js')}}" type='application/javascript'></script>
		
			
		<script src="{{asset('plugins/sticky-kit-master/dist/sticky-kit.min.js')}}" type='application/javascript'></script>

		<!-- Task JS -->
		<script src="{{asset('js/task.js')}}" type='application/javascript'></script>

		<!-- Dropfiles JS
		<script src="js/dropfiles.js"></script> -->

		<!-- Custom JS -->
		<script src="{{asset('js/app.js')}}" type='application/javascript'></script>
		
	

		<script>
		 $(document).ready(function(){
		
        // Read value on page load
        $("#result b").html($("#customRange").val());

        // Read value on change
        $("#customRange").change(function(){
            $("#result b").html($(this).val());
        });
    });        
		$(".header").stick_in_parent({
			
		});
		// This is for the sticky sidebar    
		$(".stickyside").stick_in_parent({
			offset_top: 60
		});
		$('.stickyside a').click(function() {
			$('html, body').animate({
				scrollTop: $($(this).attr('href')).offset().top - 60
			}, 500);
			return false;
		});
		// This is auto select left sidebar
		// Cache selectors
		// Cache selectors
		var lastId,
			topMenu = $(".stickyside"),
			topMenuHeight = topMenu.outerHeight(),
			// All list items
			menuItems = topMenu.find("a"),
			// Anchors corresponding to menu items
			scrollItems = menuItems.map(function() {
				var item = $($(this).attr("href"));
				if (item.length) {
					return item;
				}
			});

		// Bind click handler to menu items


		// Bind to scroll
		$(window).scroll(function() {
			// Get container scroll position
			var fromTop = $(this).scrollTop() + topMenuHeight - 250;

			// Get id of current scroll item
			var cur = scrollItems.map(function() {
				if ($(this).offset().top < fromTop)
					return this;
			});
			// Get the id of the current element
			cur = cur[cur.length - 1];
			var id = cur && cur.length ? cur[0].id : "";

			if (lastId !== id) {
				lastId = id;
				// Set/remove active class
				menuItems
					.removeClass("active")
					.filter("[href='#" + id + "']").addClass("active");
			}
		});
		$(function () {
			$(document).on("click", '.btn-add-row', function () {
				var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
				console.log(id);
				var div = $("<tr />");
				div.html(GetDynamicTextBox(id));
				$("#"+id+"_tbody").append(div);
			});
			$(document).on("click", "#comments_remove", function () {
				$(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
				$(this).closest("tr").remove();
			});
			function GetDynamicTextBox(table_id) {
				$('#comments_remove').remove();
				var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
				return '<td>'+rowsLength+'</td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
			}
		});
		
		</script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type='application/javascript'></script>
        <script>
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "5000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
        </script>
        <script>

        	var $loading = $('#loader').hide();
            $(document)
            .ajaxStart(function () {
              $loading.show();
            })
            .ajaxStop(function () {
             $loading.hide();
            });

        </script>