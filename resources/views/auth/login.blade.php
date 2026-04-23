<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ url('/images/favicon.ico') }}">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ 'Login | '.configuration('APP_NAME') }}</title>

	<!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">	<link href="/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="{{ url('/global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ url('/global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ url('/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ url('/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script src="{{ url('/global_assets/js/plugins/ui/ripple.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ url('/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ url('/global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ url('/global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ url('/global_assets/js/plugins/forms/validation/localization/messages_id.js') }}"></script>

	<script src="{{ url('/js/app.js') }}"></script>
</head>
<body>
	<!-- Page content -->
	<div class="page-content login-cover2">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
                <form class="login-form wmin-sm-650" id="form-login" method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="card mb-0">
						<div class="card-body">
							{{-- <div class="text-center mb-3">
								<img src="{{ url('/images/logo-01.png') }}" class="img-fluid mb-3" width="400" height="150" alt="">
								<h5 class="mb-0">{{ configuration('APP_NAME') }}</h5>
								<span class="d-block text-muted">{{ configuration('APP_DESC') }}</span>
							</div> --}}

                            <div class="logo-content">
                                <div class="row">
                                    <div class="col my-2 text-left">
                                        <img src="{{ url('/images/logo-01.png') }}" class="logo">
                                    </div>
                                </div>
                                <div class="row ml-1">
                                    <div class="col px-0">
                                        <p class="header-text mb-0">Selamat Datang</p>
                                        <p class="sub-header">Masukan data diri pengguna</p>
                                    </div>
                                </div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
                                <div class="input-group custom-form py-1">
                                    <div class="input-group-prepend px-2 mx-auto">
                                        <span class="input-group-text icons p-0" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    </div>
                                    <input type="text" name="login" class="form-control px-0 py-2" placeholder="{{ __('User ID') }}"  required="" placeholder="" aria-invalid="false" />
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<div class="input-group custom-form py-1">
									<div class="input-group-prepend px-2 mx-auto">
										<span class="input-group-text icons p-0" id="basic-addon1"><i class="bi bi-lock"></i></span>
									</div>
									<input type="password" name="password" class="form-control px-0 py-2" placeholder="{{ __('Password') }}" required="" aria-invalid="false" autocomplete="off"/>
									<div class="input-group-prepend hide-password px-2 py-1 mx-auto" style="cursor: pointer;">
										<span class="input-group-text icons-disabled p-0 pr-2" id="hide-password-logo"><i class="bi bi-eye"></i></span>
										<span class="input-group-text d-none icons-disabled p-0 pr-2" id="show-password-logo"><i class="bi bi-eye-slash"></i></span>
									</div>
								</div>
							</div>

                            <div class="form-group mt-4">
								<button type="submit" class="btn btn-primary btn-block p-0">
									<div class="input-group justify-content-center px-0 py-1">
										<div class="input-group-prepend align-content-middle align-self-middle m-0">
											<span class="input-group-text btn-text align-middle" id="basic-addon1"><i class="bi bi-box-arrow-in-right" style="font-size: 1.5rem; padding-right: 8px;"></i> {{ __('Login') }}</span>
										</div>
									</div>
								</button>
                            </div>

							<!--
							<div class="form-group d-flex align-items-center">
								<div class="form-check mb-0">
									<label class="form-check-label">
										<input type="checkbox" name="remember" class="form-input-styled" data-fouc>
										{{ __('Ingat Saya') }}
									</label>
								</div>

								{{-- <a href="{{ route('password.request') }}" class="ml-auto">{{ __('Lupa Kata Sandi?') }}</a> --}}
							</div>

                            <span class="form-text text-center text-muted">{{ configuration('INST_NAME') }}</span>
							-->
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
<script>
    $(document).ready(function(){
        $('.form-input-styled').uniform();

        $(".hide-password").on("click", function() {
            if ($("#show-password-logo").hasClass("d-none")) {
                console.log("hello world");
                $("#show-password-logo").removeClass("d-none");
                $("#hide-password-logo").addClass("d-none");
                $("input[name=password]").attr("type", "text");
            } else {
                $("#hide-password-logo").removeClass("d-none");
                $("#show-password-logo").addClass("d-none");
                $("input[name=password]").attr("type", "password");
            }
        })

		@if ($errors->has('email'))
            swal({
                title: "{{ $errors->first('email') }}",
                type: "error",
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                swal.close();
            });
        @endif

		@if ($errors->has('user_id'))
            swal({
                title: "{{ $errors->first('user_id') }}",
                type: "error",
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                swal.close();
            });
        @endif

        @if ($errors->has('password'))
            swal({
                title: "{{ $errors->first('password') }}",
                type: "error",
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                swal.close();
            });
        @endif

		var validator = $('#form-login').validate({
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
					error.appendTo( element.parent().parent() );
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
    });
</script>
</html>
