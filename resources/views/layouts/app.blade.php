<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon.ico') }}">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $title.' - '.configuration('APP_NAME') }}</title>

	<!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">	<link href="/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="{{ asset('/global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/ui/slinky.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/ui/ripple.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('/global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/validation/localization/messages_id.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/pickers/anytime.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>

	<script src="{{ asset('/js/app.js') }}"></script>
	{{-- <script src="{{ asset('/global_assets/js/demo_pages/dashboard.js') }}"></script> --}}
	{{-- <script src="{{ asset('/global_assets/js/demo_pages/form_validation.js') }}"></script> --}}
	<script src="{{ asset('/global_assets/js/demo_pages/extra_sweetalert.js') }}"></script>
	<!-- /theme JS files -->

	{{-- othen plugins --}}
	<!-- jquery mask -->
	<script src="{{ asset('plugins/jquery-mask/jquery.mask.min.js') }}"></script>
	<script src="{{ asset('plugins/cell-edit/cell-edit.js') }}"></script>
	<script src="{{ asset('plugins/printjs/print.min.js') }}"></script>

	<link href="{{ asset('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
	<script src="{{ asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	
	<!-- Print / Export -->
	<!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">

	<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>-->
	<!-- End Print / Export -->
</head>
<body class="">

	@include('layouts.navbar')
	<!-- Page content -->
	<div class="page-content">
		@include('layouts.sidebar')
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			{{-- <div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{ $title }}</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">

					</div>
				</div>
			</div> --}}
			<!-- /page header -->


			<!-- Content area -->
			<div class="content mt-0">

				@yield('content')

			</div>
			<!-- /content area -->

			@include('layouts.footer')

			</div>
			<!-- /main content -->
		</div>
	<!-- /page content -->
	<script>
		var dataCd;
		var rowData;

		$(document).ready(function(){
			$('.money').mask('000.000.000.000.000', {reverse: true});
			$('.mask-date').mask('00/00/0000');
			$('.mask-time').mask('00:00');
			$('.mask-phone').mask('00000000000');

			$('.form-check-input-styled').uniform();

			$.ajaxSetup({
				headers: { "X-CSRF-TOKEN":  $('meta[name="csrf-token"]').attr('content')},
				crossDomain : true,
				xhrFields: {
					withCredentials: true
				},
			});

			$('form').each(function() {
				var validator = $(this).validate({
					ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
					errorClass: 'validation-invalid-label',
					successClass: 'validation-valid-label',
					validClass: 'validation-valid-label',
					highlight: function(element, errorClass) {
						$(element).removeClass(errorClass);
					},
					unhighlight: function(element, errorClass) {
						$(element).removeClass(errorClass);
					},
					// Different components require proper error label placement
					errorPlacement: function(error, element) {

						// Unstyled checkboxes, radios
						if (element.parents().hasClass('form-check')) {
							error.appendTo( element.parents('.form-check').parent() );
						}

						// Input with icons and Select2
						else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
							error.appendTo( element.parent() );
						}

						// Input group, styled file input
						else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
							error.appendTo( element.parent().parent() );
						}

						// Other elements
						else {
							error.insertAfter(element);
						}
					},
					rules: {
						password: {
							minlength: 5
						},
						repeat_password: {
							equalTo: '#password'
						},
						email: {
							email: true
						},
						repeat_email: {
							equalTo: '#email'
						},
						minimum_characters: {
							minlength: 10
						},
						maximum_characters: {
							maxlength: 10
						},
						minimum_number: {
							min: 10
						},
						maximum_number: {
							max: 10
						},
						number_range: {
							range: [10, 20]
						},
						url: {
							url: true
						},
						date: {
							date: true
						},
						date_iso: {
							dateISO: true
						},
						numbers: {
							number: true
						},
						digits: {
							digits: true
						},
						creditcard: {
							creditcard: true
						},
						basic_checkbox: {
							minlength: 2
						},
						styled_checkbox: {
							minlength: 2
						},
						switchery_group: {
							minlength: 2
						},
						switch_group: {
							minlength: 2
						}
					},
					messages: {
						custom: {
							required: 'This is a custom error message'
						},
						basic_checkbox: {
							minlength: 'Please select at least {0} checkboxes'
						},
						styled_checkbox: {
							minlength: 'Please select at least {0} checkboxes'
						},
						switchery_group: {
							minlength: 'Please select at least {0} switches'
						},
						switch_group: {
							minlength: 'Please select at least {0} switches'
						},
						agree: 'Please accept our policy'
					}
				});

				// Reset form
				$('#reset').on('click', function() {
					validator.resetForm();
				});
			});

			$('.table-single-select tbody').on( 'click', 'tr', function () {
				if ( ! $(this).hasClass('group_row') ) {
					if ( $(this).hasClass('selected') ) {
						$(this).removeClass('selected');
						dataCd 	= null;
						rowData	= null;
					}else{
						var selectedTable = $('#'+$(this).closest('table').attr('id')).DataTable();
						selectedTable.$('tr.selected').removeClass('selected');
						var data = selectedTable.row(this).data();
						if (data != null) {
							$(this).addClass('selected');
							rowData=data;
							dataCd=data[Object.keys(data)[0]];
						}
					}
				}
			});

			$('.modal').on('hidden.bs.modal', function() {
				dataCd=null;
				rowData=null;
			});

			/* $.extend( $.fn.dataTable.defaults, {
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					orderable: false,
					width: 100,
					targets: [ 7 ]
				}],
				dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
				language: {
					search: '<span>Filter:</span> _INPUT_',
					searchPlaceholder: 'Type to filter...',
					lengthMenu: '<span>Show:</span> _MENU_',
					paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
				}
			}); */

			@if(session('success'))
				swal({
					title: "{{ session('success') }}",
					type: "success",
					showCancelButton: false,
					showConfirmButton: false,
					timer: 1000
				}).then(() => {
					swal.close();
				});
			@endif

			@if(session('error'))
				swal({
					title: "{{ session('error') }}",
					type: "error",
					showCancelButton: false,
					showConfirmButton: false,
					timer: 1000
				}).then(() => {
					swal.close();
				});
			@endif

			$('.form-control-select2').select2();
		});

		function regionLayout(region) {
			if (!region.id) {
				return region.text;
			}

			var root = '';
			if (region.root != null) {
				root = region.root;
			}

			/*var $state = $(
				'<div class="list" style="overflow:hidden;">'+
				'<div><strong>'+ region.text +'</strong> <br></div>'+
				'<i class="icon-location4"></i> '+region.long_region+
				'</div>'
				);*/
			var $state = $(
				'<div class="list" style="overflow:hidden;">'+
				'<div><strong>'+ root +'</strong> <br></div>'+
				'<i class="icon-location4"></i> '+region.text+
				'</div>'
				);

			return $state;
		};

		function spelling(a){
			let val;
			if (isNaN(a) || a==="" ||  a === null){
			val = 0;
			}else{
			a = parseFloat(a);
			val = (a/1).toFixed(0).replace('.', ',');
			val=val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			}
			return val;
		}

		function getCurrentDateTime() {
			return moment().format('DD/MM/YYYY HH:mm:ss')
		}
	</script>
	@stack('scripts')
</body>
</html>
