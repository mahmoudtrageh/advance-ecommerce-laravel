<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>{{trans('site.login')}} </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">	

	<style>
		.admin-login-page .nav {
			margin-left: 20px;
		}
	</style>
	@if(session()->get('lang') == 'hi')
	<style>
		.admin-login .input-group input{
			text-align: right;
		}
		.admin-login .checkbox{
			text-align: right;
		}
		.admin-login-page .nav {
			text-align: right;
			margin-right: 20px;
		}
		.admin-login-page .dropdown-menu{
			right: 0px;
    		left: auto !important;
		}
	</style>
	@endif
</head>
<body class="hold-transition theme-primary bg-gradient-primary">
	
	<div class="navbar-custom-menu r-side admin-login-page">
        <ul class="nav" style="display: block;">
	<!-- User Account-->
	<li class="dropdown user user-menu">	
		<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
			<i class="fa fa-globe" style="font-size: 30px;margin-top: 5px"></i>
		</a>
		<ul class="dropdown-menu animated flipInX" style="padding:10px;">
			@if(session()->get('lang') == 'hi')       
			<li><a href="{{route('site.change.lang',['lang'=>'en'])}}">الإنجليزية</a></li>
			@else
			<li><a href="{{route('site.change.lang',['lang'=>'hi'])}}">Arabic</a></li>
			 @endif      
		</ul>
	  </li>	

		</ul>
	</div>

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
	<div class="content-top-agile p-10">
		<p class="text-white-50">{{trans('site.login-to-admin-panel')}}</p>							
	</div>
	<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
 

 <form class="admin-login" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf 

			<div class="form-group">
				<div class="input-group mb-3">
 					<input type="email" id="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="{{trans('site.email')}}">
					 <div class="input-group-prepend">
						<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group mb-3">
 					<input type="password" id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="{{trans('site.password')}}">
					 <div class="input-group-prepend">
						<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
					</div>
				</div>
			</div>
				  <div class="checkbox text-white">
					<input type="checkbox" id="basic_checkbox_1" >
					<label for="basic_checkbox_1">{{trans('site.remember-me')}}</label>
				  </div>
				  <div class="row">

				<div class="col-12 text-center">
				  <button type="submit" class="btn btn-info btn-rounded mt-10">{{trans('site.login')}}</button>
				</div>
				<!-- /.col -->
			  </div>
		</form>														
		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	

</body>
</html>
