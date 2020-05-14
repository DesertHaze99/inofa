<!DOCTYPE html>
<html lang="en">
<head>
	<title>Selamat datang di Inofa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('loginRegister/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('loginRegister/css/main.css') }}">
<!--===============================================================================================-->

    <link href="{{ asset('limitless/Template/layout_3/LTR/default/full/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/Template/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body style="background-color: #2868e3;">
	
    <div class="limiter" style="background-color: white">
		<div class="container-login100">
			<div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="text-center mb-0 font-weight-bold" >
                        Selamat Datang
                    </h5>
					<p class="text-center text-muted py-3">
						Masuk kontrol panel admin
                    </p>
                    <br>


                    <div class="d-flex align-items-center justify-content-center ">
                        <i class="icon-envelop5 mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate = "Email yang valid berupa : emailvalid@inova.com">
                            <input id="email" class="input100 form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" type="email" name="email">
                            <span class="focus-input100"></span>
                            <span class="label-input100 "> Email</span>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-center">
                        <i class="icon-lock2 mr-3" style="color: grey"></i> 
                        <div class="wrap-input100 validate-input" data-validate="Masukkan password!">
                            <input id="password" class="input100 form-control @error('password') is-invalid @enderror" autocomplete="current-password" type="password" name="password">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Password</span>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <br>
					<div class="d-flex align-items-center justify-content-center">
                        <div class="row" style="width:21vw">
                            <div class="col-md-6">
                                <div class="contact100-form-checkbox">
                                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="label-checkbox100" for="ckb1">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="float-right">
                                    <a href="#" class="txt1">
                                       Lupa password?
                                    </a>
                                </div>
                            </div>

                        </div>
					</div>
			
                    <br>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div><br>
                    <p class="text-center margin">atau register <a href="{{URL::to('/register')}}" class="d-inline-block text-warning">di sini</a></p>
					
				</form>

                <div class="login100-more" style="background-color:#2868e3;padding-top:13%">
                    <center>
                        <img src="{{ asset('loginRegister/images/login.png') }}" width="500" style="margin-top: -10vh"  alt="">
                    </center>
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="{{ asset('loginRegister/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginRegister/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginRegister/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('loginRegister/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginRegister/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginRegister/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('loginRegister/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginRegister/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('loginRegister/js/main.js') }}"></script>

</body>
</html>